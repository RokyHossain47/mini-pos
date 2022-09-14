@extends('layouts.app')
@section('content')
<div class="container">
    <div class="mx-3">
        <div class="card p-0">
            <div class="card-header">
                Add Invoice
            </div>

            <form action="{{route('post.update',['id'=>$posts->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                <div class="invoice">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-label">Invoice Number *</div>
                                <input type="text" name="invoice_number" value="{{$posts->invoice_number}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-label">Date *</div>
                                <input type="date" value="{{$posts->date}}" name="date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category *</th>
                                    <th>Description</th>
                                    <th>Quantity *</th>
                                    <th>Price *</th>
                                    <th>Amount *</th>
                                    <th>Add</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="number" value="{{$posts->invoice_no}}" name="invoice_no" class="form-control text-center">
                                    </td>
                                    <td>
                                        <select name="category" class="form-control" id="category">
                                            <option posts="{{$posts->category}}">-Select-</option>
                                            @foreach ($catagory as $value)
                                                <option value="{{$value->catagory_name}}">{{$value->catagory_name}}</option>
                                            @endforeach
                                            
                                            
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="description" value="{{$posts->description}}" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" id="quentity" value="{{$posts->quentity}}" name="quentity" class="text-center form-control">
                                    </td>
                                    <td>
                                        <input type="number" value="{{$posts->price}}" id="price" name="price" class="form-control text-center">
                                    </td>
                                    <td>
                                        <input value="{{$posts->amount}}" type="number" id="amount" name="amount" class="form-control text-center">
                                    </td>
                                    <td>
                                        <span class="m-2 p-2 rounded bg-dark text-light"> + </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" ></td>
                                    <td><strong>Total =</strong></td>
                                    <td>
                                        <input type="text" id="total" value="{{$posts->total}}" name="total" class="form-control text-center" posts="" readonly>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-left">
                                        <strong>Attach File: </strong>
                                        <input type="file" name="file" class="p-2">
                                        <strong class="mr-5 text-danger">* After Modification Click on Amount Fields *</strong>

                                    </td>
                                   
                                </tr>
    
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-dark w-25">Update</button>
                    </div>
                    
                </div>
            </div>
    </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
        
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
        </script>

        <script>
            $(document).ready(function(){
                $("#amount").click(function(){
                    var a = $("#quentity").val();
                    var b = $("#price").val();
                    var sum = a * b;
                    $('#total').val(sum);
                 });
                 $("#amount").click(function(){
                    var a = $("#quentity").val();
                    var b = $("#price").val();
                    var sum = a * b;
                    $('#amount').val(sum);
                    
                });
                $("#amount").click(function(){
                    var invoice_number = $("#invoice_number").val();
                    var date = $("#date").val();
                    var invoice_no = $("#invoice_no").val();
                    var category = $("#category").val();
                    var description = $("#description").val();
                    var quentity = $("#quentity").val();
                    var price = $("#price").val();
                    var amount = $("#amount").val();
                    var total = $("#total").val();
                    $('#invoice_number_view').val(invoice_number);
                    $('#date_view').val(date);
                    $('#invoice_no_view').val(invoice_no);
                    $('#category_view').val(category);
                    $('#description_view').val(description);
                    $('#quentity_view').val(quentity);
                    $('#price_view').val(price);
                    $('#amount_view').val(amount);
                    $('#total_view').val(total);
                });

            }); 
        </script>
@endsection