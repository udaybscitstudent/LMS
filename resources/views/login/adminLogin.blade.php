@extends('login.index')

@section('loginMain')
<div class="grid place-items-center h-screen ">
        <div class="h-auto py-4 w-[450px] border border-gray-500 rounded-md bg-white font-serif shadow-md font-bold">
            <div class="w-[100px] h-[100px] rounded-full m-auto border-1 border-gray-500 text-center shadow-md">
            <i class='bx bxs-book-reader text-7xl mt-2'></i>
            </div>
            <h2 class="text-center text-xl font-semibold ">Admin Login</h2>
            <form method="post" action="{{URL::current()}}">
            @csrf
            <div class="w-[80%] m-auto mb-3 ">
                <label for="">Email</label><br>
                <div class="flex justify-between border-1 border-gray-400 rounded-md active:border visited:border-red-300 relative">
                <input type="Text" name="email" placeholder="Enter email or username " class="w-[100%] text-sm rounded-md border-none focus:ring-0">
                <i class='bx bxs-user-circle text-2xl m-0.5 mr-1 absolute right-0'></i>
                </div>
                <span class="text-danger text-sm text-center">
                @error('email')
                {{$message}}
                @enderror
                </span>
            </div>
            <div class="w-[80%] m-auto mb-2">
                <label for="">Password</label><br>
                <div class="flex justify-between border-1 border-gray-400 rounded-md relative">
                <input type="password" name="password" placeholder="Enter password " class="w-[100%] text-sm rounded-md border-none focus:ring-0">
                <i class='bx bxs-lock text-2xl m-0.5 mr-1 absolute right-0'></i>
                </div>
                <span class="text-danger text-sm text-center">
                @error('password')
                {{$message}}
                @enderror
                </span>
            </div>
            <div class="w-[80%] flex justify-between m-auto mb-3">
                <div class="">
                <input type="checkbox" id="remember" class="focus:ring-0 checked:rounded-md rounded-sm">
                <label for="remember">Remember me</label>
                </div>
                <a href="">Forget Password</a>
            </div>
            <div class="text-center">
                <button class="p-2 rounded-md text-white px-4 w-[80%] bg-gray-500 hover:bg-gray-600 font-bold">Login</button>
            </div>
            {{-- <p class="text-center my-2">Don't have an account?<a href="" class="text-blue-500 font-bold hover:underline">Sign-up</a></p>
            <div class="flex justify-center">
                <hr width="35%" class="m-2">
                <b>OR</b>
                <hr width="35%" class="m-2">
            </div>
            <div class="text-center">
                <b>Sign-in with Social</b>
                <div class="my-2">
                    <a href=""><i class='bx bxl-instagram text-xl p-1 py-0 border-1 border-black bg-slate-500 text-white rounded-full m-1' ></i></a>
                    <a href=""><i class='bx bxl-google text-xl p-1 py-0 border-1 border-1 border-black bg-slate-500 text-white rounded-full m-1' ></i></a>
                    <a href=""><i class='bx bxl-facebook-circle text-xl p-1 py-0 border-1 border-1 border-black bg-slate-500 text-white rounded-full m-1' ></i></a>
                </div>
            </div> --}}
            </form>
            
        </div>
    </div>

@endsection