@extends('layouts.main')

{{-- passing to title --}}
@section('title')
    Issued Book
@endsection

{{-- passing main --}}
@section('main')
{{-- <h2 class="text-center mt-2 text-xl font-serif"> hello welcome to issued book page </h2> --}}

<div class="border-2 mt-3 w-[90%] m-auto p-2 rounded-t-md bg-white">
    <div class="my-3 flex justify-between">
        <div>
            Show Record - 
            <select class="border dropdown text-xs rounded-md">
                <option>10</option>
                <option>20</option>
                <option>30</option>
                <option>40</option>
                <option>50</option>
            </select>
        </div>
        <div class="">
            search
            <input type="search" placeholder="search student" class="text-sm h-8 rounded-md">
        </div>
    </div>
    <table class="table table-bordered ">
    <thead class="table-primary">
        <tr>
            <th scope="col">SI.no</th>
            <th scope="col">BookName</th>
            <th scope="col">ISBN</th>
            <th scope="col">IssueDate</th>
            <th scope="col">DueDate</th>
            <th scope="col">Day</th>
            <th scope="col">Fine</th>
            <th scope="col">ReturnDate</th>
        </tr>
    </thead>
    @php
    $i=0;
    @endphp
    @foreach($obj as $val)
    <tbody class="even:bg-red-400">
        <tr>
            <td>{{++$i}}</td>
            <td>{{$val->BookName}}</td>
            <td>{{$val->ISBN}}</td>
            <td>{{$val->IssueDate}}</td>
            <td>{{$val->DueDate}}</td>
            <td>{{$val->Day}}</td>
            <td>{{$val->Fine}}</td>
            <td>{{!empty($val->ReturnDate)?$val->ReturnDate:"Not returned Yet" }}</td>
        </tr>
    </tbody>
    @endforeach
    </table>
    <div class="my-2">
    {{$obj->links()}}
    </div>
</div>
@endsection