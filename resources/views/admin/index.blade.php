<!doctype html>
<html lang="en">
    <head>
    {{-- title calling dynamically --}}
        <title>@yield('title')</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous" />
            {{-- link CDN for icon --}}
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
            @vite('resources/css/app.css')
    </head>
    <body>
        <body class="bg-slate-100">
        {{-- open sidebar--}}
        <div class="fixed left-0 h-screen w-[250px] border-l border-y  border-black bg-blue-950 text-white rounded-l-lg">
            <div>
                <i class='bx bxs-book-reader text-9xl ml-14 text-white bg-transparent'></i>
                <h2 class="text-center text-xl mt-0 font-serif font-bold text-white leading-none drop-shadow-lg lowercase">ONLINE LIBRARY <br> MANAGEMENT SYSTEM</h2>
                <hr class="mt-3 border-2 border-white">
                <div>
                    <ul class="text-md font-semibold mt-3 font-serif">
                        <a href="{{url('/')}}/admin"><li class="p-2 hover:shadow-sm hover:shadow-white m-2"><i class='bx bx-home m-1'></i>Home</li></a>
                        <a href="{{url('/')}}/addstudent"><li class="p-2 hover:shadow-sm hover:shadow-white m-2"><i class="bi bi-person-add m-1"></i>Add student</li></a>
                        <a href="{{url('/')}}/addauthor"><li class="p-2 hover:shadow-sm hover:shadow-white m-2"><i class="bi bi-person-fill-add  m-1"></i>Add Authors</li></a>
                        <a href="{{url('/')}}/addbook"><li class="p-2 hover:shadow-sm hover:shadow-white m-2"><i class='bx bxs-book-add  m-1'></i>Add Book</li></a>
                        <a href="#"><li class="p-2 hover:shadow-sm hover:shadow-white m-2 "><i class='bx bxs-book m-1'></i>Issued Book</li></a>
                        <a href="{{route('dueBook')}}"><li class="p-2 hover:shadow-sm hover:shadow-white m-2"><i class="bi bi-book  m-1"></i>Due Book </li></a>
                        <a href="#"><li class="p-2 hover:shadow-sm hover:shadow-white m-2"><i class='bx bx-log-out m-1' ></i>Log out</li></a>
                    </ul>
                </div>

                {{-- sidebar footer --}}
                <div class="fixed bottom-3 m-2 text-lg  ">
                    <ul class="mt-3 ml-5">
                        <a href=""><i class="bi bi-instagram p-1 hover:text-xl hover:text-white"></i></a>
                        <a href=""><i class="bi bi-linkedin p-1 hover:text-xl hover:text-white"></i></a>
                        <a href=""><i class="bi bi-github p-1 hover:text-xl hover:text-white"></i></a>
                        <a href=""><i class="bi bi-facebook p-1 hover:text-xl hover:text-white"></i></a>
                        <a href=""><i class="bi bi-youtube p-1 hover:text-xl hover:text-white"></i></a>
                    </ul>
                </div>
            </div>
        </div>
            {{-- close sidebar --}}
        <div class="fixed border w-auto border-black left-[250px]  right-0 h-screen ml-0 rounded-r-lg">
                <div class="border-1 shadow-md rounded-sm flex justify-between py-2 border-b-slate-400 ">
                    <h2 class="ml-4 py-2 text-lg font-serif font-bold">welcome {{(Auth::check())?Auth::user()->name:"uday"}}</h2>
                    <a href="{{Auth::logout()}}" class=""><h2 class="mx-4 px-3 py-2 font-serif text-md font-semibold bg-blue-500 text-white rounded-md">Logout</h2></a>
                </div>
        <div class="h-[90vh] overflow-auto">
                {{-- yield calling --}}
                @hasSection('main')
                    @yield('main')
                @else
                {{-- card --}}
                <div class="m-3  font-bold flex flex-wrap justify-around">
                    <a href="{{ route('showStudent') }}"><div class="h-32 w-[260px] mr-3 mb-3 border-b-2 bg-white  hover:border-slate-600  shadow-md rounded-md grid gap-0 place-items-center"> 
                        <div class="text-center"><i class="bi bi-people text-5xl text-blue-500"></i><br>{{$total['totalStudent']}}<h2 align="center">Registered Students</h2></div>
                    </div></a>
                    <a href=" {{ route('showBook') }}"><div class="h-32 w-[260px] mr-3 mb-3 bg-white border-b-2 hover:border-slate-600 shadow-md rounded-md grid place-items-center"> 
                        <div class="text-center"><i class='bx bxs-book-alt text-blue-500 text-5xl'></i><br>{{$total['totalAuthor']}}<h2 align="center">Total Book</h2></div>
                    </div></a>
                    <a href=" {{ route('showAuthor') }}"><div class="h-32 w-[260px] mr-3 mb-3 bg-white border-b-2 hover:border-slate-600 shadow-md rounded-md grid place-items-center"> 
                    <div class="text-center"><i class="bi bi-people text-5xl text-blue-500"></i><br>{{$total['totalBook']}}<h2 align="center">Authors</h2></div>
                    </div></a>
                    <a href=" {{ route('history') }}"><div class="h-32 w-[260px] mr-3 mb-3 bg-white border-b-2 hover:border-slate-600 shadow-md rounded-md grid place-items-center"> 
                        <div class="text-center"><i class='bx bx-history text-5xl text-blue-500'></i><br>{{$total['totalIssue']}}<h2 align="center">Issued Book History</h2></div>
                    </div></a>
                </div>

        {{-- issue a new book --}}

            <div class="grid place-items-center">
            @if(session('msg'))
            <div
                class="alert alert-success w-[90%] m-auto mb-0"
                role="alert"
            >
                <strong>Book Issued</strong> {{session('msg')}}
            </div>
            
            @endif
                <div class="w-[90%] border-1 bg-gray-200 border-slate-500 text-md font-serif rounded-md">
                    <form method="post" action="{{URL::current()}}">
                        @csrf
                        <h2 class="p-2 border bg-slate-500 text-white text-lg font-serif font-bold rounded-t-md">Issue a new Book</h2>
                        <div class="w-[100%] p-3 font-semibold">
                            <label for="">Student Id</label><br>
                            <input type="number" name="Id" id="" placeholder="26704" class="w-[100%] text-sm rounded-md" value="{{old('Id')}}">
                            <span class="text text-danger text-sm">
                                @error('Id')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <div class="w-[100%] p-3 font-semibold">
                            <label for="name">Book Name</label><br>
                            <input type="Text" name="BName" id="" placeholder="enter book name" class="w-[100%] text-sm rounded-md" value="{{old('BName')}}">
                            <span class="text text-danger text-sm">
                                @error('BName')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        {{-- <div class="w-[100%] p-3 font-semibold">
                            <label for="">Author Id</label><br>
                            <input type="number" name="AId" id="" placeholder="enter author id" class="w-[100%] text-sm rounded-md" value="{{old('AId')}}">
                            <span class="text text-danger text-sm">
                                @error('AId')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div> --}}

                        <div class="w-[100%] p-3 font-semibold">
                        select Author<br>
                        <select class="w-[100%] rounded-md text-sm" name="Author">
                            <option>Select Author</option>
                            @foreach($Author as $val)
                            <option value="{{$val->id}}">{{$val->AuthorsName}}</option>
                            @endforeach
                        </select>
                        <span class="text text-danger text-sm">
                                @error('Author')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="w-[100%] p-3 font-semibold">
                            <label for="">ISBN number or Title</label><br>
                            <input type="text" name="ISBN" id="" placeholder="enter ISBN number or Book Title" class="w-[100%] text-sm rounded-md" value={{old('ISBN')}}>
                            <span class="text text-danger text-sm">
                                @error('ISBN')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="w-[100%] p-3">
                            <button class="btn btn-primary font-serif rounded-md border-white text-md border-2 font-semibold">Issue Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                @endif
            </div>
    </body>
</html>
