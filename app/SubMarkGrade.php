<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMarkGrade extends Model
{
    protected $table = 'student_marks_grades';

    public $timestamps = false;

    protected $fillable = [
        'id', 'marks', 'percentage', 'grade', 'student_id', 'subject_id'
    ];

    public function studentWise() {
        return $this->belongsTo('App\Student', 'student_id', 'id');
    }

    public function subjectWise() {
        return $this->belongsTo('App\Subject', 'subject_id', 'id');
    }


}
