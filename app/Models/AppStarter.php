<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;

class AppStarter extends Model
{

    use Translatable;

    protected $translatable = ['title', 'description'];

    protected $table = 'app_starter';

}
