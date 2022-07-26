<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

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
        // $data = Student::all();
        $data = Student::simplePaginate(3);
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
            return ["Reult"=>"Student Removal Failed."];
        }
    }

    public function showQueryResult(){

        // Adding Student into Student Table using Insert Query
        
        /*
        $data = DB::table('students')        // NOTE : There will be "NULL" 'created at' and 'Modified at' Value for this type of insertion
        ->insert([
            "roll_no"=>30,
            "student_name"=>'Rajkumar Singh',
            "father_name"=>'Rajbabbar Singh',
            "class"=>25,
            "dob"=>'2003-07-11',
            "issued_book_id"=>132
        ]);
         if($data){
            echo "Student Added Sucessfully.";
        }
        else{
            echo "Student Addition Failed.";
        }
        */





        
        
        // Updating A Book Details into Book Table using Update Query
        /*
        $data = DB::table('books')
        ->where('book_id',122)
        ->update([
            "book_title"=>'This is Keshav',
            "book_author"=>'Supream Leader',
            "pages_count"=>150,
            "price"=>350,
            "published_on"=>'1998-06-05'
        ]);

        if($data){
            echo "Book Updated Sucessfully.";
        }
        else{
            echo "Book Updation Failed.";
        }
        */

        // Check if Record is Already present than Update the record otherwise create a new record in the table

        /*
        $bk_id = 120;
        if(DB::table('books')->where('book_id','=',$bk_id)->count()>0)
        {
            $data = DB::table('books')
            ->where('book_id',$bk_id)
            ->update([
            "book_title"=>'This is me',
            "book_author"=>'RK Prasad',
            "pages_count"=>300,
            "price"=>250,
            "published_on"=>'2022-06-05']);

            if($data){
                echo "Book Updated Sucessfully.";
            }
            else{
                echo "Book Updation Failed.";
            }
        }
        else{
            $data = DB::table('books')
            ->insert([
            "book_title"=>'This is me',
            "book_author"=>'RK Prasad',
            "pages_count"=>300,
            "price"=>250,
            "published_on"=>'2022-06-05']);
            if($data){
                echo "Book Added Sucessfully.";
            }
            else{
                echo "Book Added Failed.";
            }
        }
        */



        // Deleting any Record from the Books Table using Delete Query
        /*
        $data = DB::table('books')
        ->where('book_id',125)->delete();
        if($data){
            echo "Book Deleted Sucessfully.";
        }
        else{
            echo "Book Deletion Failed.";
        }
        */

        // Aggregate Functions
        /*
        $total_rec =  DB::table('books')->count();
        $max_price =  DB::table('books')->max('price');
        $min_price = DB::table('books')->min('price');
        $sum_total_price = DB::table('books')->sum('price');
        $avg_price = DB::table('books')->avg('price');
        echo "Total Record : ".$total_rec."<br>Maximum Price : ".$max_price."<br>Minimum Price : ".$min_price."<br> Average Price : ".$avg_price.
        "<br>Sum Total Price : ".$sum_total_price;
        */

        // returning all data of books tbale and employees table respectively to display
        /*
            return DB::table('books)->get();
            return DB::table('employees')->get();
        */

        
        /*
        $data =  DB::table('books')->get();
        return view('showdata',['data'=>$data]);  //--- To Show the data in tabluar form we need to modify the desired variable names constantly
        */


        // storing all data of books and employees table respectively into '$data' variable for further user
        /*
            $data =  DB::table('employees')->get();
        */

        // return DB::table('books')

        // joining books table and employees table and show  all data of both the tables
        
        /*
        $data = DB::table('books')
        ->join('students','books.book_id','=','students.issued_book_id')
        ->get();
        return view('showdata',['data'=>$data]);
        */
        // return DB::table('books as b')
        
        // joining books table and employees table and show some specefic data of both the tables with the use of alias
        /*
        $data = DB::table('books as b')
        ->join('students as s','b.book_id','=','s.issued_book_id')
        ->select('s.student_id','s.roll_no','s.student_name','b.book_title','b.book_author','b.pages_count')
        ->get();
        return view('showdata',['data'=>$data]);
        */

        // return  DB::table('students as s')

        // Fetching Students list and their alloted book with condition having student id greater than 1114
    /*    
        $data =   DB::table('students as s')
        ->join('books as b','s.issued_book_id','=','b.book_id')
        ->select('s.student_id','s.roll_no','s.student_name','b.book_title','b.book_author','b.pages_count')
        ->where('s.student_id','>','1114') 
        ->get();
        return view('showdata',['data'=>$data]);
    */
    }

    
    /*
    public function accr(){
        return Student::all();
    }
    */

    // Mutator method in Student Controller

    public function mttr(){
        
        $student = new Student;
        
        $student->roll_no = 26;
        $student->student_name = "Sumit Sharma";
        $student->father_name = "Rajeev Sharma";
        $student->class = 11;
        $student->dob = '1999-12-12';
        $student->issued_book_id = 128;
        $student->save();

        if($student){
            echo "Mutation Done Successfully.";
        }
        else{
            echo "Mutation UnSuccessfull.";
        }
    }

    // public function index(){
    //     return Student::where('student_name','Vicky Prasad')->get()->getBook;
    // }


}
