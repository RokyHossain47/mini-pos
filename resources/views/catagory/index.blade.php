@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">All Catagory
                <span class="float-right">
                    <a class="btn btn-primary" href="{{route('catagory.create')}}">New Catagory</a>
                </span>
            </div>
            <div class="card-body">
                <table id="example1" class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="col-4">#</th>
                            <th class="col-4">Name</th>
                            <th class="col-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catagory as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->catagory_name}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection