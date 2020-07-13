@extends('layouts.admin')

@section('pagename')
Book Requests
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
        <li class="breadcrumb-item active" aria-current="page">Book Requests</li>
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
                        <th>Request Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$book->bookName['attr_name']}}</td>
                        <td>{{$book->get_date}}</td>
                        <td><a style="margin-left:15px;" href="{{route('bookReject' ,['id' => $book->id])}}" title="Remove Request">&#9746;</a>
                        <a style="margin-left:15px;" href="{{route('bookApprove' ,['id' => $book->book_id])}}" title="Approve Request">&#10004;</a></td>
                        </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
