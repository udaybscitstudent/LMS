@extends('admin.index')

@section('title')
Add Student
@endsection

@section('main')
{{-- <h2 class="text-center mt-2 text-xl font-serif"> Add new student</h2> --}}
<div class="grid place-items-center m-4">
        @if(isset($msg))
            <div
                class="alert alert-success w-[80%] m-1"
                role="alert"
            >
                <strong>Added</strong> {{ $msg }}
            </div>
        @endif
    <div class="w-[80%] border-1 bg-gray-200 border-slate-500 text-md font-serif rounded-md">
        <form method="post" action="addstudent">
        @csrf
        <h2 class="p-2 border bg-slate-500 text-white text-lg font-serif font-bold rounded-t-md">Add new Student</h2>
            <div class="w-[100%] px-2 py-0 my-3 font-semibold">
                <label for="name">Name</label><br>
                <input type="Text" name="name" id="" placeholder="uday kumar" class="w-[100%] text-sm rounded-md" value="{{old('name')}}">
                <span class="text text-danger text-sm">
                    @error('name')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="w-[100%] px-2 py-0 my-3 font-semibold">
                <label for="">Roll</label><br>
                <input type="number" name="roll" id="" placeholder="18" class="w-[100%] text-sm rounded-md" value="{{old('roll')}}">
                <span class="text text-danger text-sm">
                    @error('roll')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="w-[100%] px-2 py-0 my-3 font-semibold">
                <label for="">Id</label><br>
                <input type="number" name="id" id="" placeholder="26704" class="w-[100%] text-sm rounded-md" value="{{old('id')}}">
                <span class="text text-danger text-sm">
                    @error('id')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="w-[100%] px-2 py-0 my-3 font-semibold">
                <label for="">Phone</label><br>
                <input type="number" name="phone" id="" placeholder="9334612356" class="w-[100%] text-sm rounded-md" value="{{old('phone')}}">
                <span class="text text-danger text-sm">
                    @error('phone')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="w-[100%] px-2 py-0 my-3 font-semibold">
                <label for="">Email</label><br>
                <input type="text" name="email" id="" placeholder="uday@gmail.com" class="w-[100%] text-sm rounded-md" value="{{old('email')}}">
                <span class="text text-danger text-sm">
                    @error('email')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="w-[100%] p-2">
                <button class="btn btn-primary font-serif rounded-md mb-2 border-white text-md border-2 font-semibold">Add student</button>
            </div>
        </form>
    </div>
</div>
@endsection
