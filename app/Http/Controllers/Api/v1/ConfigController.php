<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Models\AnimalsCategory;
use App\Models\AppStarter;
use App\Models\Country;
use App\Models\Language;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function start(Request $request)
    {
        $categories = \App\Resources\AnimalsCategory::collection(AnimalsCategory::orderby('c_order')->get()->translate(app()->getLocale(), 'fallbackLocale'));
        $languages = \App\Resources\Language::collection(Language::get()->translate(app()->getLocale(), 'fallbackLocale'));
        $countries = \App\Resources\Country::collection(Country::get()->translate(app()->getLocale(), 'fallbackLocale'));
        $app_started = \App\Resources\AppStarter::collection(AppStarter::get()->translate(app()->getLocale(), 'fallbackLocale'));
        $animal_categories = \App\Resources\AnimalsCategory::collection(AnimalsCategory::get()->translate(app()->getLocale(), 'fallbackLocale'));
        $is_logged_in = auth('sanctum')->check();

        return parent::sendSuccess(trans('messages.Data Got!'), [
            'is_logged_in' => $is_logged_in,
            'categories' => $categories,
            'animal_categories' => $animal_categories,
            'languages' => $languages,
            'app_started' => $app_started,
            'countries' => $countries,
        ]);
    }

}
