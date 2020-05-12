<?php

namespace Modules\Fall\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Green extends Model
{
    use Translatable;

    protected $table = 'fall__greens';
    public $translatedAttributes = [];
    protected $fillable = [];
}
