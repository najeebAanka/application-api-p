<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;

class AnimalsCategory extends Model
{

    use Translatable;
    use SoftDeletes;

    protected $translatable = ['title'];

    protected $table = 'animals_categories';

    public function childs()
    {
        return $this->hasMany(AnimalsCategory::class, 'parent_id');
    }

}
