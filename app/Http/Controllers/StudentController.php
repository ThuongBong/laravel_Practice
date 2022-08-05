<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function studentList(Request $request){
//        $student = Student::all();
        $paramSearch = $request->get("search");
        $student = Student::SearchName($paramSearch)->simplePaginate(10);
        return view("/student.listStudents",[
            "student"=>$student
        ]);
    }
}
