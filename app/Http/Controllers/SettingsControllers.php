<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 16/07/2022
 * Time: 10:36 AM
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class SettingsControllers extends Controller
{

    function changeLanguage($lang = 'en')
    {
        Session::put('lang', $lang);
        app()->setLocale($lang);
        return redirect()->back();
    }

    function clearCache()
    {
        $exitCode = Artisan::call('config:clear');
        $exitCode = Artisan::call('cache:clear');
        $exitCode = Artisan::call('config:cache');
//    $exitCode = Artisan::call('storage:link');
        return 'DONE'; //Return anything
    }
}
