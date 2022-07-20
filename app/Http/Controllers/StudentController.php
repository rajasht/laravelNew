<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // ------------------------ HTML FORM OPERATIONS ------------------------

    // Adding Students Details from HTML Form
    
    public function studentDetails(Request $req){
        $student = new Student;

        $student->roll_no = $req->roll_no;
        $student->student_name = $req->student_name;
        $student->father_name = $req->father_name;
        $student->class = $req->class;
        $student->dob = $req->dob;
        $student->issued_book_id = $req->issued_book_id;
        $student->save();
        return redirect('addstd');
    }

    public function studentsList(){
        $data = Student::all();
        return view('StudentsList',['students'=>$data]);
    }

    public function delStud($st_id){
        $std = Student::where('student_id',$st_id)->delete();
        session()->flash('studentDeleteSuccess','Student deleted successfully.');
        return redirect('stdlist');
    }

    public function editStdDtl($std_id){
        $edtStd = Student::where('student_id',$std_id)->get();
        return view('EditStudPage',['data'=>$edtStd]);
    }

    public function updateStudent(Request $updReq){
        $updStd = Student::where('student_id',$updReq->student_id)
        ->update([
            "roll_no" => $updReq->roll_no,
            "student_name" => $updReq->student_name,
            "father_name" => $updReq->father_name,
            "class" =>$updReq->class,
            "dob" =>$updReq->dob,
            "issued_book_id" => $updReq->issued_book_id
        ]);
        session()->flash('studentUpdateSuccess','Student Updated successfully.');
        return redirect('stdlist');
    }

    //------------------------------ API OPERATIONS -----------------------------------------

    public function getAllStudent(){
        return Student::all();
    }

    public function getThisStudent($std_nm){
        $data = Student::where('student_name','like','%'.$std_nm.'%')->get();
        return $data;
    }

    public function addStudent(Request $addReq){
        $std = new Student;

        $std->roll_no = $addReq->roll_no;
        $std->student_name = $addReq->student_name;
        $std->father_name = $addReq->father_name;
        $std->class = $addReq->class;
        $std->dob = $addReq->dob;
        $std->issued_book_id = $addReq->issued_book_id;
        $res = $std->save();

        if($res){
            return ["Result"=>"Student Added Sussessfully."];
        }
        else{
            return ["Result"=>"Student Added Sussessfully."];
        }

    }

    public function updateStd(Request $updstd){
        $data = Student::where('student_name',$updstd->student_name)
        ->update([
            "roll_no" => $updstd->roll_no,
            "student_name" => $updstd->student_name,
            "father_name" => $updstd->father_name,
            "class" => $updstd->class,
            "dob" => $updstd->dob,
            "issued_book_id" => $updstd->issued_book_id
        ]);
        if($data){
            return ["Result"=>"Student Details Updated Succesfully."];
        }
        else{
            return ["Result"=>"Student Details Updatation Failed."];
        }
    }

    public function deleteStudent($delStd){
        $delcheck = Student::where('student_id',$delStd)->delete();
        if($delcheck){
            return ["Reult"=>"Student Removed Successfully."];
        }
        else{
            return ["Reult"=>"Student Removed Successfully."];
        }

    }
}
