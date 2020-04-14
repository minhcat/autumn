<?php

namespace Modules\Blog\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;

    public $translatedAttributes = ['name', 'slug'];
    protected $fillable = ['name', 'slug'];
    protected $table = 'blog__tags';

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
