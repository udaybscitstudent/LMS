@extends('admin.index')

@section('title')
Add Student
@endsection

@section('main')
    <div class="w-[80%] border-1 bg-gray-200 border-slate-500 text-md font-serif rounded-md m-auto mt-3 pb-0">
        <h2 class="p-2 border bg-slate-500 text-white text-lg font-serif font-bold rounded-t-md">Student Details</h2>
            <div>
                <table class="table table-bordered ">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Roll</th>
                            <th scope="col">SID</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody class="even:bg-red-400">
                        <tr>
                            <td>{{ $obj[0]->Name }}</td>
                            <td>{{ $obj[0]->Roll }}</td>
                            <td>{{ $obj[0]->SID }}</td>
                            <td>{{ $obj[0]->Phone }}</td>
                            <td>{{ $obj[0]->Email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        <h2 class="p-2 border bg-slate-500 text-white text-lg font-serif font-bold rounded-t-md mt-4">Issued Book Details</h2>
            <div class="mb-0">
                <table class="table table-bordered ">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">SI.no</th>
                            <th scope="col">BookName</th>
                            <th scope="col">AuthorId</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">IssueDate</th>
                            <th scope="col">DueDate</th>
                            <th scope="col">ReturnDate</th>
                            <th scope="col">Day</th>
                            <th scope="col">Fine</th>
                        </tr>
                    </thead>
                    @php
                    $fine = 0;
                    @endphp
                    @foreach ($val  as $value)
                    <tbody>
                        <tr>
                            <td>{{ $value['id']}}</td>
                            <td>{{ $value['BookName']}}</td>
                            <td>{{ $value->AuthorId }}</td>
                            <td>{{ $value->ISBN }}</td>
                            <td>{{ $value->IssueDate }}</td>
                            <td>{{ $value->DueDate }}</td>
                            <td>{{ $value->ReturnDate }}</td>
                            <td>{{ $value->Day }}</td>
                            <td>{{ $value->Fine }}</td>
                        </tr>
                        @php
                        $fine = $fine+ $value->Fine
                        @endphp
                    @endforeach

                        <tr>
                            <td colspan="8" class="text-right font-bold">Total Fine</td>
                            <td>{{$fine}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
@endsection