<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\author;
use App\Models\book;
use App\Models\issued_book;
use App\Models\student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function showAuthor(){
        $obj = DB::table('authors')->orderBy('id')->paginate(10);
        return view('/authors',compact('obj'));
    }

    public function availableBook(){
        $obj = DB::table('books')->orderBy('id')->paginate(10);
        return view('available', compact('obj'));
    }
    public function authorDetail($id){
        $AName = author::find($id);
        $obj = book::select('*')->where('AuthorId','=',$id)->get();
        // return $Book;

        return view('authorDetail',compact('obj'))->with('Author',$AName);

    }

    public function main($SID = null){
        $sn = student::select('Name')->where('SID','=',$SID)->get();
        $obj = issued_book::select('*')->where('SID','=',$SID )
        ->where('ReturnDate','=',NULL)->get();
        if(!empty($obj[0]))
        {
        $Aid = $obj[0]->AuthorId;
        $AN = author::find($Aid);
        }
        else
        {
            $AN='uday';
        }

        $count = issued_book::where('SID','=',$SID)->count();
        return view('layouts.main',['SName' => $sn])->with(compact('obj'))->with(compact('AN'))->with(compact('count'));
    }

    function issuedBook($SID){
        $obj = issued_book::select('*')->where('SID','=',$SID)->paginate(10);
        return view('issued',compact('obj'));
    }

    function login(Request $request){
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ],[
            'email.exists' => 'This user is not registered',
            // 'password.exists' => 'The entered password is wrong'
        ]);

        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect('admin');
        }
        else{
            return redirect('adminLogin');
        }
    }
}
