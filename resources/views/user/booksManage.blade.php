@extends('layouts.admin')

@section('pagename')
Manage Books
@endsection

@section('content')

<style>
.collapsing{
    width: 160px;
    float: right;
    top:335px !important;
    right:310px !important;
    position: absolute;
    right: 0px;
    top: 70px;
    z-index: 1;
}
.collapse{
    width: 160px;
    float: right;
     top:335px !important;
    right:310px !important;
    position: absolute;
    right: 0px;
    top: 70px;
    z-index: 1;
}
.collapse.in{
    width: 160px;
    float: right;
    top:335px !important;
    right:310px !important;
    position: absolute;
    right: 0px;
    top: 70px;
    z-index: 1;
}
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage Books</li>
    </ol>
</nav>
<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>Book Name</th>
                        <th>get Date</th>
                        <th>Return Date</th>
                        <th>Approved</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$book->bookName['attr_name']}}</td>
                        <td>{{$book->get_date}}</td>
                        <td>{{$book->return_date}}</td>
                        <td>{{($book->approved == 0)?'not Approved' : 'Approved'}}</td>
                        @if($book->approved == 0)
                        <td><a style="margin-left:15px;" href="{{route('deleteBook' ,['id' => $book->id])}}" title="Delete Book">&#9746;</a></td>
                        @else
                        <td><a style="margin-left:15px;" href="{{route('returnBook' ,['id' => $book->book_id])}}" title="Return Book">&#10004;</a></td>
                        @endif
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
