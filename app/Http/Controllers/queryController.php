<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\issued_book;
use App\Models\author;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class queryController extends Controller
{
    public function showStudent(){
        // $obj = student::all();
        $obj = DB::table('students')
        ->orderBy('Roll')
        ->Paginate(10); //simplePaginate() , cursorPaginate().
        $data = compact('obj');
        return view('admin.showStudent')->with($data);
    }

    public function showBook(){
        $obj= DB::table('books')
        ->orderBy('id')
        ->Paginate('10');
        $data = compact('obj');
        return view('admin.showBook')->with($data);
    }

    public function showAuthor(){
        $data = DB::table('authors')
        ->orderBy('id')
        ->paginate(10);
        // $data = compact('obj')
        return view('admin.showAuthor' , ['obj' => $data]);
    }

    public function BookHistory(){
        $data = DB::table('issued_books')
        ->orderBy('id')
        ->paginate(10);
        // $data = compact('obj')
        return view('admin.ShowHistory' , ['obj' => $data]);
    }

    public function dueBook()
    {

        $data = DB::table('issued_books')
        ->orderBy('id')
        ->where('ReturnDate','=', NULL)
        ->paginate(10);
        return view('admin.dueBook',['obj' => $data]);

    }
    public function returnBook($SID){
        $data = issued_Book::select('*')
        ->where('SID','=',$SID)
        ->where('ReturnDate','=',NULL)->get();

        $date1 = Carbon::parse($data[0]->IssueDate);
        $date2 =  Carbon::parse(now());
        $d1= Carbon::parse($date1->format('d-m-Y'));
        $d2 = Carbon::parse($date2->format('d-m-Y'));
        $dateDiff = $d1->diffInDays($d2);
        
        if($dateDiff>7 && $dateDiff<14){
            $fine = 50;
        }
        elseif($dateDiff>14)
        {
            $fine = 100;
        }
        else{
            $fine = 0;
        }
        return view('admin.returnBook', ['day' => $dateDiff , 'fine' => $fine])->with(compact('data'));
    }

    public function updateBook(Request $request ,$SID){
        // you can validate here
        $data = issued_Book::select('*')
        ->where('SID','=',$SID)
        ->where('ReturnDate','=',NULL)->get();
        
        $data[0]->SID = $request['Id'];
        $data[0]->BookName = $request['BName'];
        $data[0]->ISBN = $request['ISBN'];
        $data[0]->ReturnDate = now();
        $data[0]->Day = $request['day'];
        $data[0]->Fine = $request['fine'];

        if($data[0]->save()){
            $data = DB::table('issued_books')
            ->orderBy('id')
            ->where('ReturnDate','=', NULL)
            ->paginate(10);
            return view('admin.dueBook',['obj' => $data]);
        }

        // print "this is under process in query controller on line number 70";
    }
    //update student details
    function sendStudentDetail($SID)
    {
        $obj = student::where('SID','=',$SID)->get();
        return view('admin.updateStudent', compact('obj'));
    }

    function updateStudent(Request $request ,$SID)
    {
        $obj = student::where('SID','=',$SID)->update([

        // return $obj;
        'Name' => $request['name'],
        'Roll' => $request['roll'],
        'SID' => $request['id'],
        'Phone' => $request['phone'],
        'Email' => $request['email']
        ]);
        if($obj){
        return redirect('/showStudent')->with('msg','Student record has been updated where Student id is '.$SID);
        }
    }
    //update author details
    function sendAuthorDetail($id)
    {
        $obj = author::find($id);
        return view('admin.updateAuthor',compact('obj'));
    }

    function updateAuthor(Request $request ,$id)
    {
        $obj = author::find($id);
        $obj->id = $request['Aid'];
        $obj->AuthorsName = $request['AName'];
        if($obj->Save()){
            return redirect('showAuthor')->with('notice','Updated')->with('msg' ,'Author record has been updated where author id is '.$id);
        }
    }

    //student details
    function studentDetail($SID){
        $obj = student::where('SID','=',$SID)->get();
        $val = issued_book::where('SID','=',$SID)->get();
        return view('admin.studentDetail',compact('val'))->with(compact('obj'));
    }
}
