<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id', 'category_id', 'article'
    ];

    public function Category() {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function Img() {
        return $this->hasMany('App\Img', 'article_id', 'id');

    }
}
