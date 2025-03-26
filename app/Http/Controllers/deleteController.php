<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\author;

class deleteController extends Controller
{
    function deleteStudent($SID){
        $del = student::where('SID','=',$SID)->delete();
        if($del){
            return redirect('/showStudent')->With('msg','Record has been delete successfully where student ID is '.$SID);
        }
    }
    function deleteAuthor($id){
        $obj = author::destroy($id);
        if($obj){
            return redirect('/showAuthor')->With('notice','Deleted')->with('msg' , 'Author record has been deleted successfully where authorId is '.$id);
        }
    }
}
