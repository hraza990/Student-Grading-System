<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;

class ClassController extends Controller
{
    public function create()
    {
        $classes = Classes::select('name', 'desc')->get();
        return view('grades.classes.add-class', compact('classes'));
    }

    public function save(Request $request)
    {
        //dd($request->all());

        $saveData = new Classes();
            $saveData->name  = $request->name;
            $saveData->desc = $request->desc;
        $saveData->save();

        return redirect()->route('grades-home')->with('message-status', $request->name.' Class added in database successfuly!');
    }
}
