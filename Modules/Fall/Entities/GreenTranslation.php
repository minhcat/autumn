<?php

namespace Modules\Fall\Entities;

use Illuminate\Database\Eloquent\Model;

class GreenTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'fall__green_translations';
}
