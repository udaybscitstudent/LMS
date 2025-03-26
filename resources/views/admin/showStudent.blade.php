@extends('admin.index')

@section('title')
ShowAll student
@endsection

@section('main')
{{-- <h2 class="text-center mt-2 text-xl font-serif"> This is under process. You can saw all student after completed</h2> --}}
<div class="w-[90%] m-auto mt-3">
@if(session('msg'))
    <div
        class="alert alert-success"
        role="alert my-0"
    >
        <strong>Success</strong> {{session('msg')}}
    </div>
@endif
</div>

<div class="border-2 w-[90%] m-auto p-2 rounded-t-md bg-white my-3">
    <div class="my-3 flex justify-between">
        <div>
            Show Record - 
            <select class="border dropdown text-xs rounded-md">
                <option>10</option>
                <option>20</option>
                <option>30</option>
                <option>40</option>
            </select>
        </div>
        <div class="">
            search
            <input type="search" placeholder="search student" class="text-sm h-8 rounded-md">
        </div>
    </div>
    <Table align="Center" class="w-[100%] border-2 ">
        <thead class="bg-blue-200 h-12">
            <th class="border p-2">SI.no</th>
            <th class="border p-2 min-w-24">Name</th>
            <th class="border p-2 min-w-24">Roll</th>
            <th class="border p-2 min-w-24">Id</th>
            <th class="border p-2 min-w-24">Phone</th>
            <th class="border p-2">Email</th>
            <th class="border p-2 min-w-20">Action</th>
        </thead>
        @php
        $i=0;
        @endphp
        @foreach($obj as $val)
        <tbody class="odd:bg-slate-100">
            <td class="border p-2">{{ ++$i }}</td>
            <td class="border p-2">{{ $val->Name }}</td>
            <td class="border p-2">{{ $val->Roll }}</td>
            <td class="border p-2">{{ $val->SID }}</td>
            <td class="border p-2">{{ $val->Phone }}</td>
            <td class="border p-2">{{ $val->Email }}</td>
            <td class="border p-2 text-center">
                <a href="/studentDetail/{{$val->SID}}" title="user-details"><i class='bx bxs-user-detail text-xl mx-1 text text-primary'></i></a>
                <a href="/updateStudent/{{$val->SID}}" title="update"><i class='bx bxs-edit text-lg mx-1 text text-success' ></i></a>
                <a href="#" onclick="myfun({{$val->SID}})" title="Delete"><i class="bi bi-trash3 text-lg mx-1 text text-danger"></i></a>
            </td>
        </tbody>
        @endforeach
    </Table>
    <div class="my-2">
    {{$obj->links()}}
    </div>
</div>
<script>
    function myfun(sid){
        let con = confirm(`Are you sure? You want to delete This Record where id = ${sid}`);
        if(con){
            location.href = `deleteStudent/${sid}`;
        }
    }
</script>


@endsection
