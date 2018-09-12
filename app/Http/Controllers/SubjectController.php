<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Subject;


class SubjectController extends Controller
{
    public function create()
    {
        $classesList = Classes::pluck('name', 'id');
        $subjects = Subject::with('subjectClass')->get();
        return view('grades.subjects.add-subject', compact('classesList', 'subjects'));
    }

    public function save(Request $request)
    {
        //dd($request->all());

        $saveData = new Subject();
            $saveData->name  = $request->name;
            $saveData->class_id = $request->class;
            $saveData->total_marks = $request->total_marks;
        $saveData->save();

        return redirect()->route('grades-home')->with('message-status', $request->name.' Subject added in database successfuly!');
    }
}
