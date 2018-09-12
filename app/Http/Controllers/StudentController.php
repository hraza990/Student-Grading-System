<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Student;

class StudentController extends Controller
{
    public function create()
    {
        $classesList = Classes::pluck('name', 'id');
        $students = Student::with('studentClass')->get();
        return view('grades.students.add-student', compact('classesList', 'students'));
    }

    public function save(Request $request)
    {
        //dd($request->all());

        $saveData = new Student();
            $saveData->name  = $request->name;
            $saveData->email = $request->email;
            $saveData->password = $request->password;
            $saveData->class_id = $request->class;
        $saveData->save();

        return redirect()->route('grades-home')->with('message-status', $request->name.' Student added in database successfuly!');
    }

    public function view($id)
    {
        $student = Student::whereId($id)->with('studentClass.ClassSubjects.subjectMarks')
            ->orWhereHas('studentClass.ClassSubjects.subjectMarks', function($query) use ($id) {
                $query->whereStudentId($id);
            })->first();
        //dd($student);
        return view('grades.students.view-student', compact('student'));
    }
}
