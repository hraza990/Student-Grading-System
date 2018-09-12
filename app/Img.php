<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    protected $table = 'images';

    public $timestamps = false;

    protected $fillable = [
        'id', 'article_id', 'img'
    ];
}
