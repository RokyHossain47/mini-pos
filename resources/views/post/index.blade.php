@extends('layouts.app')
@section('content')


<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="float-left">All Invoice</h5>
            <span class="btn btn-dark float-right"><a class="text-light text-decoration-none" href="{{route('post.create')}}">Add Invoice</a></span>
        </div>
        <div class="card-body">
            <table id="example1" class="table text-center table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="col-1">ID</th>
                        <th class="col-1">Invoice Number</th>
                        <th class="col-1">Date</th>                       
                        <th class="col-1">Category</th>
                        <th class="col-1">Quentity</th>
                        <th class="col-1">Price</th>
                        <th class="col-1">Amount</th>
                        <th class="col-1">Total</th>
                        <th class="col-1">File</th>
                        <th class="col-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->invoice_number}}</td>
                        <td>{{$value->date}}</td>
                        <td>{{$value->category}}</td>
                        <td>{{$value->quentity}}</td>
                        <td>{{$value->price}}</td>
                        <td>{{$value->amount}}</td>
                        <td>{{$value->total}}</td>
                        <td>5</td>
                        <td>
                            <button><a href="{{ route('post.edit',['id'=>$value->id]) }}"><i class="fas fa-edit"></i></a></button>
                            <form action="{{ route('post.destroy', $value->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"><i class="fas fa-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr> 
                    @endforeach
                    
            </table>
        </div>
    </div>
</div>


@endsection