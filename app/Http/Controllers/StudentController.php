<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function saveStudent(Request $request){
        
        $this->validate($request,[
            'number' => 'required',
            'name' => 'required',
            'dob' => 'required',
            'address' => 'required'
        ]);

        $student = new Student;
        $student->student_name = $request->input('name');
        $student->student_number = $request->input('number');
        $student->DOB = $request->input('dob');
        $student->address = $request->input('address');
        $student->save();

        return view('101891.welcome');
        //dd($request->all());
        }
}
