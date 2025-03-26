@extends('layouts.main')

@section('title')
Available Book
@endsection

@section('main')
{{-- <h2 class="text-center mt-2 text-xl font-serif"> hello welcome to Available Book page</h2> --}}
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
            <th scope="col">AuthorId</th>
            <th scope="col">BookImage</th>
        </tr>
    </thead>
    @foreach($obj as $val)
    <tbody class="even:bg-red-400">
        <tr>
            <th scope="row">{{ $val->id }}</th>
            <td>{{ $val->BookName }}</td>
            <td>{{ $val->AuthorId }}</td>
            <td><img src="/storage/uploads/{{ $val->BookImage }}" width="50px"></td>
        </tr>
    </tbody>
    @endforeach
    </table>
    <div class="my-2">
    {{$obj->links()}}
    </div>
</div>
@endsection