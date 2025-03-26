@extends('admin.index')

@section('title')
Add Book
@endsection

@section('main')
{{-- <h2 class="text-center mt-2 text-xl font-serif"> Add new book</h2> --}}
<div class="grid place-items-center my-4">
@if(isset($data))
            <div
                class="alert {{$data['class']}} w-[80%] my-1"
                role="alert"
            >
                <strong>{{ $data['status']}}! </strong> {{ $data['msg'] }}
            </div>
    @endif
    <div class="w-[80%] border-1 bg-gray-200 border-slate-500 text-md font-serif rounded-md">
        <form method="post" action="{{URL::current()}}" enctype="multipart/form-data">
        @csrf
        <h2 class="p-2 border bg-slate-500 text-white text-lg font-serif font-bold rounded-t-md">Add new Book</h2>
            <div class="w-[100%] p-3 font-semibold">
                <label for="name">Book Name</label><br>
                <input type="Text" name="BName" id="" placeholder="enter book name" class="w-[100%] text-sm rounded-md" value="{{old('BName')}}">
                <span class="text text-danger text-sm">
                    @error('BName')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="w-[100%] p-3 font-semibold">
                <label for="">Author Id</label><br>
                <input type="number" name="AId" id="" placeholder="enter author id" class="w-[100%] text-sm rounded-md" value="{{old('AId')}}">
                <span class="text text-danger text-sm">
                    @error('AId')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="w-[100%] p-3 font-semibold">
                <label for="">ISBN</label><br>
                <input type="text" name="ISBN" id="" placeholder="enter ISBN number" class="w-[100%] text-sm rounded-md" value="{{old('ISBN')}}">
                <span class="text text-danger text-sm">
                    @error('ISBN')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="w-[100%] p-3 font-semibold">
                <label for="">Upload Book cover</label><br>
                <input type="file" name="BImage" id="" placeholder="" class="w-[100%] text-sm">
                <span class="text text-danger text-sm">
                    @error('BImage')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="w-[100%] p-3">
                <button class="btn btn-primary font-serif rounded-md border-white text-md border-2 font-semibold">Add Book</button>
            </div>
        </form>
    </div>
</div>
@endsection