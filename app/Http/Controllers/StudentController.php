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

    public function studentForm(){
        return view("/student.student-create");
    }

    public function studentCreate(Request $request){
        Student::create([
            "name"=>$request->get("name"),
            "age"=>$request->get("age"),
            "address"=>$request->get("address"),
            "phone"=>$request->get("phone")
        ]);
        return redirect()->to("student/list")->with("success","Update product successfully");
    }

    //edit
    public function studentEdit($id){
        $student = Student::find($id);
        return view('student.student-edit',[
            'student'=>$student
        ]);
    }

    public function studentUpdate(Request $request, Student $student){
        $student->update([
            "name"=>$request->get("name"),
            "age"=>$request->get("age"),
            "address"=>$request->get("address"),
            "phone"=>$request->get("phone")
        ]);
        return redirect()->to("student/list")->with("success","Update product successfully");
    }

    public function studentDelete(Student $student){
        try {
            $student->delete();
            return redirect()->to("student/list")->with("success", "Delete product successfully");
        }catch (\Exception $e){
            return redirect()->to("student/list")->with("error", "Delete Failed");
        }
    }
}
