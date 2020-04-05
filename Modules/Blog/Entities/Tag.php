<?php

namespace Modules\Blog\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;

    protected $table = 'blog__tags';
    public $translatedAttributes = [];
    protected $fillable = [];
}
