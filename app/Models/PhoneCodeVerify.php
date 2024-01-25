<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;

class PhoneCodeVerify extends Model
{

    protected $table = 'phone_code_verify';
}
