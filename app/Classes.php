<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'desc'
    ];

    public function ClassSubjects() {
        return $this->hasMany('App\Subject', 'class_id', 'id');

    }
}
