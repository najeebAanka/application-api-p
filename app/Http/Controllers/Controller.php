<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="My First API", version="0.1")
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function sendError($errors, $code)
    {
        return response()->json(['message' => sizeof($errors) > 0 ? $errors[0]['message'] : 'Invalid Input!',
            'errors' => $errors],
            $code);
    }

    public function sendSuccess($message, $data)
    {
        return response()->json(['message' => $message,
            'data' => $data],
            200);
    }

    public function error_processor($validator)
    {
        $err_keeper = [];
        foreach ($validator->errors()->getMessages() as $index => $error) {
            array_push($err_keeper, ['code' => $index, 'message' => $error[0]]);
        }
        return $err_keeper;
    }


}
