@extends('layouts.main')

@section('title')
authorDetail
@endsection

@section('main')
<div class="w-[90%] border-1 bg-white border-slate-500 text-md font-serif rounded-md m-auto mt-3 pb-0">
    <h2 class="p-2 border bg-slate-500 text-white text-lg font-serif font-bold rounded-t-md">Author :- {{$Author->AuthorsName}} All Available Book</h2>
        <div class="my-3 flex justify-between px-1">
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
            <div class="mb-0">
                <table class="table table-bordered ">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">SI.no</th>
                            <th scope="col">BookName</th>
                            <th scope="col">AuthorId</th>
                            <th scope="col">ISBN</th>
                        </tr>
                    </thead>
                    @foreach ($obj  as $value)
                    <tbody>
                        <tr>
                            <td>{{ $value['id']}}</td>
                            <td>{{ $value['BookName']}}</td>
                            <td>{{ $value->AuthorId }}</td>
                            <td>{{ $value->ISBN }}</td>
                        </tr>
                    @endforeach

                        
                    </tbody>
                </table>
            </div>
    </div>
@endsection