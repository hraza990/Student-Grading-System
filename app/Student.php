<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'email', 'password', 'class_id'
    ];

    public function studentClass() {
        return $this->belongsTo('App\Classes', 'class_id', 'id');
    }
}
