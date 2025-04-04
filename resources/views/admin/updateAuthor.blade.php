@extends('admin.index')

@section('title')
Add Author
@endsection

@section('main')
{{-- <h2 class="text-center mt-2 text-xl font-serif"> Add authors</h2> --}}
<div class="grid place-items-center my-4">
@if(isset($msg))
            <div
                class="alert alert-success w-[600px] my-1 rounded-none"
                role="alert"
            >
                <strong>Added!</strong> {{ $msg }} and their <b>author's ID is </b> {{ $id }}
            </div>
        @endif
    <div class="w-[80%] border-1 bg-gray-200 border-slate-500 text-md font-serif rounded-md">
        <form method="post" action="{{ URL::current() }}">
        <h2 class="p-2 border bg-slate-500 text-white text-lg font-serif font-bold rounded-t-md">Update Author Details</h2>
            @csrf

            <div class="w-[100%] p-3 font-semibold">
                <label for="">Author ID</label><br>
                <input type="text" name="Aid" id="" placeholder="Enter Author ID" class="w-[100%] text-sm rounded-md" value="{{$obj->id}}">
                <span class="text text-danger text-sm">
                    @error('Aid')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="w-[100%] p-3 font-semibold">
                <label for="">Author Name</label><br>
                <input type="text" name="AName" id="" placeholder="Enter author name" class="w-[100%] text-sm rounded-md" value="{{$obj->AuthorsName}}">
                <span class="text text-danger text-sm">
                    @error('AName')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="w-[100%] p-3">
                <button class="btn btn-primary font-serif rounded-md border-white text-md border-2 font-semibold">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

