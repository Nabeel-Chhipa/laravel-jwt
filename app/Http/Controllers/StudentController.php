<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() {
        return view('index');
    }

    // public function create() {
    //     return view('create');
    // }

    public function store(Request $request) {
        $student = new Student;
        $student->name = $request->input('name'); 
        $student->age = $request->input('age');
        $student->class = $request->input('class');
        $student->subject = $request->input('subject');

        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtention();
            $fileName = time().'.'.$extention;
            $file->move('upload/students/', $fileName);
            $student->image = $fileName;
        }
        $student->save();
        return redirect('create');
    }
}
