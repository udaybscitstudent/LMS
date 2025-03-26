<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\author;
use App\Models\book;
use App\Models\issued_book;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class lmsController extends Controller
{
    //code for admin function 
    public function admin(){

        // if(Auth::check())
        // {

        $total = ['totalStudent' => student::count('SID'),
        'totalAuthor' => author::count('id'),
        'totalBook' => book::count('id'),
        'totalIssue' => issued_book::count('id'),
        ];
        $val = compact('total');
        return view('/admin/index',$val)->with('Author',author::select('AuthorsName','id')->get());
        // }
        // else{
        //     return redirect('adminLogin');
        // }
    }
    //close admin function 

    //function for store details of issued book
    function issuedBook(Request $request){
        $validates = $request->validate([
            'Id' => 'required|Exists:students,SID',
            'BName' =>'required',
            'Author' => 'required|not_in:Select Author',
            'ISBN' =>'required'
        ],[
            'Id.required' => 'The student Id must be required',
            'Id.exists' => 'The student is not registered',
            'BName.required' => 'The Book Name field is required',
            'Author.not_in' => 'The Author field is required',
            'ISBN.required' => 'The ISBN number must be required'
        ]);

        if($validates){

            $obj = new issued_book();
            $obj->SID = $request['Id'];
            $obj->BookName = $request['BName'];
            $obj->AuthorId = $request['Author'];
            $obj->ISBN = $request['ISBN'];
            $obj->DueDate =  Carbon::now()->addDays(7);

            if($obj->Save()){
                
                // $total = ['totalStudent' => student::count('SID'),
                // 'totalAuthor' => author::count('id'),
                // 'totalBook' => book::count('id'),
                // 'totalIssue' => issued_book::count('id'),
                
                // ];
                // $val = compact('total');
                // return view('/admin/index',$val)->with('Author',author::select('AuthorsName')->get());
                return redirect('admin')->with('msg' , 'New Book Issued successfully');
            }
            

        }
    }


    //close issuedBook function 
    public function student(Request $request){
        $request->validate([
            'name' => 'required',
            'roll' => 'required',
            'id' => 'required|unique:students,SID',
            'phone' => 'required|digits:10',
            'email' => 'required|email|unique:students'
        ]);

        $obj = new student;
        $obj->Name = $request->name;
        $obj->Roll = $request->roll;
        $obj->SID = $request->id;
        $obj->Phone = $request->phone;
        $obj->Email = $request->email;
        if($obj->Save()){
            return view('admin/addstudent' , ['msg' => 'New student added successfully']);
        }
    }

    public function author(Request $request){
        $request->validate([
            'AName' => 'required|unique:authors,AuthorsName'
        ]);
        $obj = new author();
        $obj->AuthorsName = $request['AName'];
        if($obj->save()){
        $fetch = author::max('id');
        return view('admin.addauthors',['msg' => 'Authors added successfully','id'=>$fetch]);
        }
    }
    
    public function addBook(Request $request){
        $request->validate([
            'BName' => 'required|exists:books,BookName',
            'AId' => 'required|exists:authors,id',
            'ISBN' => 'required|exists:books,ISBN',
            'BImage' => 'required'
        ],[
            'BName.required' => 'The Book name field is required',
            'BName.exists' => 'This book is not available',
            'AId.required' => 'The author id field is required',
            'AId.exists' => 'The book of this author is not available',
            'ISBN.required' => 'The ISBN field is required',
            'ISBN.exists' => 'Invalid ISBN number or Not available at this time',
            'BImage.required' => 'The Book cover must be required' 
        ]);

        $obj = new book();
        
        $filename = $request->file('BImage');
        $fname = rand().'img.'.$filename->getClientOriginalExtension();
        $filename->storeAs('/public/uploads' ,$fname);

        $obj->BookName = $request['BName'];
        $obj->AuthorId = $request['AId'];
        $obj->ISBN = $request['ISBN'];
        $obj->BookImage = $fname;
        try{
            $obj->Save();
            $data = [
                'status' => 'Added',
                'msg' => 'New book added successfully',
                'class' => 'alert-success'
            ];
            $val = compact('data');
            return view('/admin.addbook')->with($val);
        }
        catch(QueryException $e){
            // return response()->json(['error' => $e->getMessage(),500]);
            $data = [
                'status' => 'Failed',
                'msg' => 'failed to add. please enter valid author id',
                'class' => 'alert-danger'
            ];
            $val = compact('data');
            return view('/admin.addbook')->with($val);
        }
    }
}
