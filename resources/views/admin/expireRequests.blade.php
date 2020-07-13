@extends('layouts.admin')

@section('pagename')
Non Returned Books
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
        <li class="breadcrumb-item active" aria-current="page">Books Expired</li>
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
                        <th>Returning Date</th>
                        <th>Total Fine</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$book->bookName['attr_name']}}</td>
                        <td>{{$book->get_date}}</td>
                        <td>{{$book->return_date}}</td>
                        <td>{{$book->fine}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
