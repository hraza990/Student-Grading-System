<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'class_id', 'total_marks'
    ];

    public function subjectClass() {
        return $this->belongsTo('App\Classes', 'class_id', 'id');
    }

    public function subjectMarks() {
        return $this->hasMany('App\SubMarkGrade', 'subject_id', 'id');

    }
}
