<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //API OPERATIONS

    // To- DO -         // orderby, having, offset, limit etc. 


    // Retrieving All Book details of Books table 
    public function getAllBooks(){
        return Book::all();
    }

    // Searching and Retrieving particular Book details of Books table on the basis of characters
    public function getThisBook($bk_dtl){
        return Book::where('book_title','like','%'.$bk_dtl.'%')->get();
    }

    // Adding bookdetails by Api-Json-insertion/ Api-Form filling
    public function addBook(Request $req){
        $book = new Book;

        $book->book_title = $req->book_title;
        $book->book_author = $req->book_author;
        $book->pages_count = $req->pages_count;
        $book->price = $req->price;
        $book->published_on = $req->published_on;
        $res = $book->save();

        if($res){
            return ["Result"=>"Book Added Successfully."];
        }
        else{
            return ["Result"=>"Book Not Added."];
        }
    }

    // Updating a Book details of Books table on the basis of book name 
    public function updateBook(Request $req){    
        $updbook = Book::where('book_title',$req->book_title)
        ->update([
            "book_title" => $req->book_title,
            "book_author" => $req->book_author,
            "pages_count" => $req->pages_count,
            "price" =>$req->price,
            "published_on" => $req->published_on
        ]);
    
        if($updbook){
            return ["res"=>"Book Updated Successfully."];
        }
        else{
            return ["res"=>"Book Updation Failed."];
        }
    }

    // Deleting a Book from Books table on the basis of book name
    public function deletebook($name){
        $dltbook = Book::where('book_title',$name)->delete();
        if($dltbook){
            return ['Result'=>'Book Deleted Successfully'];
        }
        else{
            return ['Result'=>'Book Not Deleted.'];
        }
    }


    //---------------------- HTML FORM OPERATIONS-------------------------

    // Adding bookdetails by HTML - form filling

    public function addNewBook(Request $req){
        $book = new Book;

        $book->book_title = $req->book_title;
        $book->book_author = $req->book_author;
        $book->pages_count = $req->pages_count;
        $book->price = $req->price;
        $book->published_on = $req->published_on;
        $res = $book->save();
        return redirect('booklist');
    }

    // Retriving bookdetails as HTML - List

    public function bookList(){
        // $data = Book::all();
        $data = Book::simplePaginate(3);
        return view('BookList',["books"=>$data]);
    }


    // Editing a Book details of Books table on the basis of book name 

    public function editBook($bk_id){
        $bookdata =  Book::where('id',$bk_id)->get();
        return view('EditBookForm',['bookdetails'=>$bookdata]);
    }


    public function getBook(Request $bk_id){
        $data = Book::find($bk_id);
        return view('showSearchBook',['book'=>$data]);
    }

    // Updating Edited Book Details from the form
    
    public function updateBk(Request $req){
        $updbk = Book::where('book_title',$req->book_title)
        ->update([
            "book_title" => $req->book_title,
            "book_author" => $req->book_author,
            "pages_count" => $req->pages_count,
            "price" =>$req->price,
            "published_on" => $req->published_on
        ]);
        session()->flash('bookUpdateSuccess','Book Updated successfully.');
        return redirect('booklist');
    }

    // Deleting a Book from Books table on the basis of book id

    public function delBook($bk_id){
        $delbook = Book::where('id',$bk_id);
        $delbook->delete();
        session()->flash('bookDeleteSuccess','Book deleted successfully.');
        return redirect('booklist');
    }

}
