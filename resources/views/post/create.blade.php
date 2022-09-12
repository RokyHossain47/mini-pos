@extends('layouts.app')
@section('content')

<div id="add_invoice" class="container">
    <div class="card p-0">
        <div class="card-header">
            Add Invoice
        </div>
        <form action="{{route('post.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

        <div class="card-body">
            <div class="invoice">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <div class="form-label">Invoice Number *</div>
                            <input type="text" name="invoice_number" placeholder="1234" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <div class="form-label">Date *</div>
                            <input type="date" name="date" class="form-control" required>
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
                                    <input type="number" value="1" name="invoice_no" class="form-control text-center">
                                </td>
                                <td>
                                    <select name="category" class="form-control" id="category">
                                        <option value="0">-Select-</option>
                                        <option value="1">category1</option>
                                        <option value="2">category2</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="description" class="form-control">
                                </td>
                                <td>
                                    <input type="number" id="quentity" name="quentity" value="1" class="text-center form-control">
                                </td>
                                <td>
                                    <input type="number" id="price" name="price" class="form-control text-center">
                                </td>
                                <td>
                                    <input id="amount" type="number" name="amount" class="form-control text-center">
                                </td>
                                <td>
                                    <span class="m-2 p-2 rounded bg-dark text-light"> + </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" ></td>
                                <td><strong>Total =</strong></td>
                                <td>
                                    <input type="text" id="total" name="total" class="form-control text-center" value="" readonly>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="7" class="text-left">
                                    <strong>Attach File: </strong>
                                    <input type="file" name="file" class="p-2">
                                </td>
                               
                            </tr>

                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-dark w-25">Save Invoice</button>
                </div>
            </div>
        </div>
    </form>
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

            }); 
        </script>

@endsection