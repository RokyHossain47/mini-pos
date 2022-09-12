@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="float-left">All Invoice</h5>
            <span class="btn btn-dark float-right"><a class="text-light text-decoration-none" href="{{route('post.create')}}">Add Invoice</a></span>
        </div>
        <div class="card-body">
            <table id="example" class="table text-center table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Invoice Number</th>
                        <th>Invoice No</th>
                        <th>Date</th>                       
                        <th>Category</th>
                        <th>Quentity</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Total</th>
                        <th>File</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->date}}</td>
                        <td>{{$value->invoice_number}}</td>
                        <td>{{$value->invoice_no}}</td>
                        <td>{{$value->category}}</td>
                        <td>{{$value->quentity}}</td>
                        <td>{{$value->price}}</td>
                        <td>{{$value->amount}}</td>
                        <td>{{$value->total}}</td>
                        <td><img src="{{ asset('storage/app/File/'.$value->file) }}" width="50px" height="50px" alt=""></td>
                    </tr> 
                    @endforeach
                    
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
$(function () {
    $('#example').DataTable();
});
</script>
@endsection