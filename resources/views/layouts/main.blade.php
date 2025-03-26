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
    <body class="bg-slate-100">
        {{-- open sidebar--}}
        <div class="fixed left-0 h-screen w-[250px] border border-black bg-slate-400 rounded-l-lg">
            <div>
                <i class='bx bxs-book-reader text-9xl ml-14 text-white bg-transparent'></i>
                <h2 class="text-center text-xl mt-0 font-serif font-bold text-white leading-none drop-shadow-lg lowercase">ONLINE LIBRARY <br> MANAGEMENT SYSTEM</h2>
                <hr class="mt-3 border-2 border-white">
                <div>
                    <ul class="text-md font-semibold mt-3 font-serif">
                        <a href="{{route('main')}}"><li class="p-2 hover:shadow-sm hover:shadow-white m-2"><i class='bx bx-home m-1'></i>Home</li></a>
                        <a href="issued/26704"><li class="p-2 hover:shadow-sm hover:shadow-white m-2"><i class="bi bi-person-add m-1"></i>Issue Book</li></a>
                        <a href="{{route('authors')}}"><li class="p-2 hover:shadow-sm hover:shadow-white m-2"><i class="bi bi-person-fill-add  m-1"></i>Authors</li></a>
                        <a href="{{route('availableBook')}}"><li class="p-2 hover:shadow-sm hover:shadow-white m-2"><i class='bx bxs-book-add  m-1'></i>Available Book</li></a>
                        <a href=""><li class="p-2 hover:shadow-sm hover:shadow-white m-2"><i class='bx bx-log-out m-1' ></i>Log out</li></a>
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
                <div class="border-1 shadow-md rounded-sm flex justify-between py-2 border-b-slate-400">
                    <h2 class="ml-4 py-2 text-lg font-serif font-bold">welcome:- {{!empty($SName[0]->Name)?$SName[0]->Name:"uday kumar"}} </h2>
                    <a href="#" class=""><h2 class="mx-4 px-3 py-2 font-serif text-md font-semibold bg-blue-500 text-white rounded-md">Logout</h2></a>
                </div>
            <div class="h-[90vh] overflow-auto">
                {{-- yield calling --}}
                @hasSection('main')
                    @yield('main')
                @else
                {{-- card --}}
                <div class="m-3  font-bold flex flex-wrap justify-around">
                    <a href=""><div class="h-32 w-[260px] mr-3 mb-3 border-b-2 bg-white  hover:border-slate-600  shadow-md rounded-md grid gap-0 place-items-center"> 
                        <div class="text-center"><i class='bx bxs-book-alt text-blue-500 text-5xl'></i><br>1<h2 align="center">Maximum Allowed</h2></div>
                    </div></a>
                    <a href=""><div class="h-32 w-[260px] mr-3 mb-3 bg-white border-b-2 hover:border-slate-600 shadow-md rounded-md grid place-items-center"> 
                        <div class="text-center"><i class='bx bxs-book-alt text-blue-500 text-5xl'></i><br>{{(empty($obj[0]))?0:1}}<h2 align="center">Issued</h2></div>
                    </div></a>
                    <a href=""><div class="h-32 w-[260px] mr-3 mb-3 bg-white border-b-2 hover:border-slate-600 shadow-md rounded-md grid place-items-center"> 
                    <div class="text-center"><i class='bx bxs-book-alt text-blue-500 text-5xl'></i><br>{{!empty($obj[0])?0:1}}<h2 align="center">Eligible</h2></div>
                    </div></a>
                    <a href="issued/26704"><div class="h-32 w-[260px] mr-3 mb-3 bg-white border-b-2 hover:border-slate-600 shadow-md rounded-md grid place-items-center"> 
                        <div class="text-center"><i class='bx bxs-book-alt text-blue-500 text-5xl'></i><br>{{$count}}<h2 align="center">Total Issued Till Now</h2></div>
                    </div></a>
                </div>

                <div class="w-[90%] border-1 m-auto bg-white border-slate-500 text-md font-serif rounded-md overflow-x-auto">
                <h2 class="p-2 border bg-slate-500 text-white text-lg font-serif font-bold rounded-t-md">Issued Book</h2>
                    <div class="mb-0">
                        @forelse($obj as $val)
                        <table class="table table-bordered ">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">S.ID</th>
                                    <th scope="col">BookName</th>
                                    <th scope="col">AuthorId</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">IssuedDate</th>
                                    <th scope="col">DueDate</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            {{-- @forelse($obj as $val) --}}
                            <tbody>
                                <tr>
                                    <td>{{ $val->SID }}</td>
                                    <td>{{ $val->BookName }}</td>
                                    <td>{{ $AN->AuthorsName }}</td>
                                    <td>{{ $val->ISBN }}</td>
                                    <td>{{ $val->IssueDate }}</td>
                                    <td>{{ $val->DueDate }}</td>
                                    <td><h1 class="btn btn-success">Active</h1></td>
                                </tr>
                            </tbody>
                        </table>
                        @empty
                            <tr>
                                <h1 class="m-2">You have no any Issued book</h1>
                            </tr>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </body>
</html>
