@extends('layouts.admin')

@section('pagename')
Books Expired
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
                        <th>get Date</th>
                        <th>Return Date</th>
                        <th>Fine</th>
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
                        <td>{{$book->fine}}</td>
                        <td><a style="margin-left:15px;" href="{{route('returnBook' ,['id' => $book->book_id])}}" title="Return Book">&#10004;</a></td>
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
            <form>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">New Book</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid" style="margin:15px;">
                        <div class="row" style="margin-bottom:25px;">
                            <div class="row">
                                <label>Author Name</label>
                                <select name="author" class="form-control" required>
                                    <option>Author 1</option>
                                    <option>Author 2</option>
                                </select>
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
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
