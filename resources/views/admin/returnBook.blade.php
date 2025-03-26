@extends('admin.index')

@section('title')
DueBook
@endsection

@section('main')

        <div class="grid place-items-center my-4">
            <div class="w-[90%] border-1 bg-gray-200 border-slate-500 text-md font-serif rounded-md">
                <form method="post" action="{{URL::current()}}">
                    @csrf
                    <h2 class="p-2 border bg-slate-500 text-white text-lg font-serif font-bold rounded-t-md">Update Issued Book</h2>
                    <div class="w-[100%] p-3 font-semibold">
                        <label for="">Student Id</label><br>
                        <input type="number" name="Id" id="" placeholder="enter student id" class="w-[100%] text-sm rounded-md" value="{{$data[0]->SID}}">
                        <span class="text text-danger text-sm">
                            @error('Id')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="w-[100%] p-3 font-semibold">
                        <label for="name">Book Name</label><br>
                        <input type="Text" name="BName" id="" placeholder="enter book name" class="w-[100%] text-sm rounded-md" value="{{$data[0]->BookName}}">
                        <span class="text text-danger text-sm">
                            @error('BName')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="w-[100%] p-3 font-semibold">
                        <label for="">ISBN number or Title</label><br>
                        <input type="text" name="ISBN" id="" placeholder="enter ISBN number or Book Title" class="w-[100%] text-sm rounded-md" value="{{$data[0]->ISBN}}">
                        <span class="text text-danger text-sm">
                            @error('ISBN')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="w-[100%] p-3 font-semibold">
                        <label for="">Day</label><br>
                        <input type="number" name="day" id="" placeholder="day" class="w-[100%] text-sm rounded-md" value="{{$day}}">
                        <span class="text text-danger text-sm">
                            @error('day')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="w-[100%] p-3 font-semibold">
                        <label for="">Fine</label><br>
                        <input type="number" name="fine" id="" placeholder="fine" class="w-[100%] text-sm rounded-md" value="{{$fine}}">
                        <span class="text text-danger text-sm">
                            @error('fine')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="w-[100%] p-3">
                        <button class="btn btn-primary font-serif rounded-md border-white text-md border-2 font-semibold">Update issued book</button>
                    </div>
                </form>
            </div>
        </div>

            
@endsection    