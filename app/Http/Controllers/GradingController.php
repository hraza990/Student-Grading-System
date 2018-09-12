<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\SubMarkGrase;

class GradingController extends Controller
{
    public function index()
    {
        return view('grades.home');
    }

    public function create()
    {
        $grades = Grade::orderBy('id', 'DESC')->get();
        //dd($grades);
        return view('grades.grades.add-grade', compact('grades'));
    }

    public function save(Request $request)
    {
        //dd($request->all());

        $saveData = new Grade();
            $saveData->name  = $request->name;
            $saveData->desc = $request->desc;
            $saveData->condition  = $request->condition;
            $saveData->percentage  = $request->percentage;
        $saveData->save();

        return redirect()->route('grades-home')->with('message-status', $request->name.' Grade added in database successfuly!');
    }

    public function saveMarks(Request $request)
    {
        //dd($request->all());
        $student_id = request()->student_id;
        if (isset($request->subjects) && count($request->subjects) > 0) {
        	//dd($request->subjects);
        	foreach ($request->subjects as $subject) {

        		//dd($subject);

        		$grades = Grade::get();

        		$marks_in_percentage = round($subject['subject_obtain_marks'] / ($subject['subject_total_marks'] / 100),2);

        		//dd($marks_in_percentage);

        		foreach ($grades as $grade) {
        			//dd($grade->condition);
        			if ($subject['subject_obtain_marks'] $grade->condition, $grade->percentage) {
        				dd($grade->name);
        			}else{
        				dd('oops...');
        			}
        		}

        		$updateResult = SubMarkGrase::updateOrCreate(['student_id' => $student_id, 'subject_id' => $subject['subject_id']], [ 
				    'student_id' => $student_id,
				    'subject_id' => $subject['subject_id'],
				    'obtain_marks' => $subject['subject_obtain_marks'],
				    'percentage' => $marks_in_percentage,
				    'grade' => ''
				]);
        	}
        }

        $saveData = new Grade();
            $saveData->name  = $request->name;
            $saveData->desc = $request->desc;
            $saveData->condition  = $request->condition;
        $saveData->save();

        return redirect()->route('grades-home')->with('message-status', $request->name.' Grade added in database successfuly!');
    }
}
