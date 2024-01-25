<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\PhoneCodeVerify;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function forgetPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string'
        ]);

        if ($validator->fails()) {
            return parent::sendError(parent::error_processor($validator), 403);
        }

        $user = User::
        where('email', $request->email)->
        orWhere('phone', $request->email)->first();

        if (!$user) {
            return parent::sendError([['message' => trans('messages.incorrect phone')]], 403);
        }


        PasswordReset::where([
            'phone' => $user->email
        ])->delete();

        $pr = new PasswordReset();
        $pr->phone = $request->email;
        $pr->code = generateRandomCode();
        $pr->created_at = Carbon::now()->toDateTimeString();
        $pr->save();

        return parent::sendSuccess(trans('messages.Check your phone!'), null);

    }

    public function verifyCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'code' => 'required|string'
        ]);

        if ($validator->fails()) {
            return parent::sendError(parent::error_processor($validator), 403);
        }

        $data = PasswordReset::where([
            'phone' => $request->email,
            'code' => $request->code
        ])->first();

        if ($data) {
            return parent::sendSuccess(trans('messages.Correct Code!'), null);
        } else {
            return parent::sendError([['message' => trans('messages.Code Not Correct!')]], 403);
        }

    }

    public function resetPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'code' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        if ($validator->fails()) {
            return parent::sendError(parent::error_processor($validator), 403);
        }

        $user = User::
        where('email', $request->email)->
        orWhere('phone', $request->email)->
        first();

        if (!$user) {
            return parent::sendError([['message' => trans('messages.incorrect phone')]], 403);
        }


        $pr = PasswordReset::where([
            'phone' => $request->email,
            'code' => $request->code
        ])->first();

        if ($pr) {
            $user->password = bcrypt($request->password);
            $user->update();
            $pr->delete();
            return parent::sendSuccess(trans('messages.Password Reset Successfully!'), null);
        } else {
            return parent::sendError([['message' => trans('messages.Error in the token sent')]], 403);
        }
    }

    public function info(Request $request)
    {

        return parent::sendSuccess(trans('messages.Data Got!'), [
            'user' => \App\Resources\User::make(auth()->user()),
        ]);
    }


    public function sendCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string'
        ]);

        if ($validator->fails()) {
            return parent::sendError(parent::error_processor($validator), 403);
        }

        $this->sendSMSCode($request->phone);

        return parent::sendSuccess(trans('messages.Code Sent!'), null);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'phone' => 'nullable|string|unique:users,phone',
            'password' => 'required|string|confirmed'
        ]);

        if ($validator->fails()) {
            return parent::sendError(parent::error_processor($validator), 403);
        }

//        $personal_picture = 'users/default.png';
//        if ($request->hasFile('personal_picture')) {
//            $slug = 'users';
//            $data_type = DataType::where('slug', $slug)->first();
//            $row = DataRow::where('data_type_id', $data_type->id)->where('field', 'personal_picture')->first();
//            $personal_picture = (new ContentImage($request, $slug, $row, $row->details))->handle();
//        }


        $user = new User();
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->status = 1;
        $user->role_id = getRoleID('user');
        $user->password = bcrypt($request->password);
        $user->save();

        $token = $user->createToken('apiToken')->plainTextToken;
        $user = User::where('id', $user->id)->first();

//        $this->sendSMSCode($request->phone);


        return parent::sendSuccess(trans('messages.Data Got!'), [
            'token' => $token,
            'user' => \App\Resources\User::make($user),
        ]);
    }

    public function sendSMSCode($phone)
    {
        $phone_code = new PhoneCodeVerify();
        $phone_code->phone = $phone;
        $phone_code->code = generateRandomCode();
        $phone_code->save();
    }


    public function updateAnimalCategories(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'categories' => 'required|array'
        ]);


        if ($validator->fails()) {
            return parent::sendError(parent::error_processor($validator), 403);
        }

        $categories = $request->get('categories');
        $currents = auth('sanctum')->user()->categories->pluck('id');
        $currents = json_decode(json_encode($currents));
        $not_in = [];
        foreach ($currents as $current) {
            if (!in_array($current, $categories)) {
                array_push($not_in, $current);
            }
        }

        foreach ($categories as $category) {
            if (!in_array($category, $currents)) {
                $ua = new \App\Models\UserAnimalsCategory();
                $ua->user_id = auth('sanctum')->user()->id;
                $ua->animals_category_id = $category;
                $ua->save();
            }
        }

        \App\Models\UserAnimalsCategory::whereIn('animals_category_id', $not_in)->delete();

        return parent::sendSuccess(trans('messages.Data Saved!'), null);
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'country_id' => 'nullable|numeric|exists:countries,id',
            'city_id' => 'nullable|numeric|exists:countries_states,id',
            'password' => 'nullable|string|confirmed',
        ]);


        if ($validator->fails()) {
            return parent::sendError(parent::error_processor($validator), 403);
        }

        if ($request->email) {
            $user = User::where('email', $request->email)->where('id', '<>', auth()->user()->id)->first();
            if ($user) {
                return parent::sendError([['message' => trans('messages.email used before!')]], 403);
            }
        }

        if ($request->phone) {
            $user = User::where('phone', $request->phone)->where('id', '<>', auth()->user()->id)->first();
            if ($user) {
                return parent::sendError([['message' => trans('messages.phone used before!')]], 403);
            }
        }

//        $personal_picture = 'users/default.png';
//        if ($request->hasFile('personal_picture')) {
//            $slug = 'users';
//            $data_type = DataType::where('slug', $slug)->first();
//            $row = DataRow::where('data_type_id', $data_type->id)->where('field', 'personal_picture')->first();
//            $personal_picture = (new ContentImage($request, $slug, $row, $row->details))->handle();
//        }

        $user = auth()->user();


        $user->full_name = $request->has('full_name') ? $request->get('full_name') : $user->full_name;
        $user->country_id = $request->has('country_id') ? $request->get('country_id') : $user->country_id;
        $user->city_id = $request->has('city_id') ? $request->get('city_id') : $user->city_id;
        $user->email = $request->has('email') ? $request->get('email') : $user->email;
        if ($request->get('email')) {
            $user->email_verified_at = NULL;
        }
        $user->phone = $request->has('phone') ? $request->get('phone') : $user->phone;
        if ($request->get('phone')) {
            $user->phone_verified_at = NULL;
        }
        $user->password = $request->has('password') ? bcrypt($request->password) : $user->password;
        $user->update();

        return parent::sendSuccess(trans('messages.Data Updated!'), [
            'user' => \App\Resources\User::make($user)
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return parent::sendError(parent::error_processor($validator), 403);
        }

        $user = User::where('e', $request->e)->
        orWhere('phone', $request->phone)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return parent::sendError([['message' => trans('messages.incorrect username or password')]], 403);
        }

        if (is_null($user->phone_verified_at)) {
            $this->sendSMSCode($user->phone);
        }

        $token = $user->createToken('apiToken')->plainTextToken;
        return parent::sendSuccess(trans('messages.Logged In!'), [
            'token' => $token,
            'user' => \App\Resources\User::make($user)
        ]);
    }


    public function delete(Request $request)
    {
        auth()->user()->tokens()->delete();
        User::where('id', auth()->user()->id)->delete();
        return parent::sendSuccess(trans('messages.Data Deleted!'), null);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return parent::sendSuccess(trans('messages.User logged out'), null);
    }
}
