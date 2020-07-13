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
        <li class="breadcrumb-item active" aria-current="page">Books</li>
    </ol>
</nav>
<div class="panel">
    <div class="panel-body">
        <a class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#addBook">New Book</a>
        <br><br>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($inventory as $inventories)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$inventories->attr_name}}</td>
                        <td>{{$inventories->Author['attr_name']}}</td>
                        <td>{{$inventories->ISBN}}</td>
                        <td><a href="#" title="Edit Book">&#9998;</a><a style="margin-left:15px;" href="{{route('deleteBook' ,['id' => $inventories->id])}}" title="Delete Book">&#9746;</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Code Add A New Book -->

<div class="modal fade" id="addBook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form method="post" action="{{route('newBook')}}">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">New Book</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid" style="margin:15px;">
                        <div class="row" style="margin-bottom:25px;">
                            <div class="row">
                                <label>Author Name</label>
                                <input type="text" class="form-control" name="author" required>
                            </div>
                            <div class="row">
                                <label>Book Name</label>
                                <input type="text" class="form-control" name="bookName" required>
                            </div>
                            <div class="row">
                                <label>Book ISBN</label>
                                <input type="text" class="form-control" name="isbn" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
