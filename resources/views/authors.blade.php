@extends('layouts.main')

@section('title')
Authors
@endsection

@section('main')
{{-- <h2 class="text-center mt-2 text-xl font-serif"> This is under process. You can saw all Author after completed</h2> --}}
@if(session('msg'))
<div
    class="alert alert-success w-[90%] m-auto mt-3 mb-0"
    role="alert"
>
    <strong>{{session('notice')}} </strong>  {{session('msg')}}
</div>
@endif


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
            <th scope="col">AuthorId</th>
            <th scope="col">AuthorName</th>
            {{-- <th scope="col">CreateAt</th> --}}
            {{-- <th scope="col">UpdateAt</th> --}}
            <th scope="col">AuthorsDetails</th>
        </tr>
    </thead>
    @foreach($obj as $val)
    <tbody class="even:bg-red-400">
        <tr>
            <th scope="row">{{ $val->id }}</th>
            <td>{{ $val->AuthorsName }}</td>
            {{-- <td>{{ $val->created_at }}</td> --}}
            {{-- <td>{{ $val->updated_at }}</td> --}}
            <td class="">
                <a href="authorDetail/{{$val->id}}" title="user-details"><i class='bx bxs-user-detail text-xl mx-1 text text-primary'></i></a>
            </td> 
        </tr>
    </tbody>
    @endforeach
    </table>
    <div class="my-2">
    {{$obj->links()}}
    </div>
</div>
@endsection
