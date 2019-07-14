<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fees;
use App\Student;
use Illuminate\Support\Facades\DB ;

class FeesController extends Controller
{
    public function saveFee(Request $request){
        $this->validate($request,[
            'number' => 'required',
            'dop' => 'required',
            'amount' => 'required'
        ]);

        $student = Student::where('student_number', $request->input('number'))->firstOrFail();
        //dd($student->id);
        $fees = new Fees;
        $fees->student_number = $request->input('number');
        $fees->DOP = $request->input('dop');
        $fees->amount = $request->input('amount');
        $fees->student_id = $student->id;
        $fees->save();

        return view('101891.welcome');
        //dd($request->all());
    }

    public function display(){

        $students = Student::has('fees')->withCount([
            'fees as paid' => function($query){
                $query->select(DB::raw('sum(amount)'));
            } 
        ])->get();
        
        return view('101891.table',['students' => $students]);
    }

    public function search(Request $request){

        $this->validate($request,[
            'number' => 'required'
        ]);

        $student = Student::where('student_number', $request->input('number'))->firstOrFail();

        $fees = Fees::with('student')->where('student_id',$student->id)->get();
        //dd($fees);

        return view('101891.search',['fees' => $fees]);

    }
}
