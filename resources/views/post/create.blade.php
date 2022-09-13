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
                            <input type="text" name="invoice_number" id="invoice_number" placeholder="1234" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <div class="form-label">Date *</div>
                            <input type="date" id="date" name="date" class="form-control" required>
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
                                    <input type="number" value="1" id="invoice_no" name="invoice_no" class="form-control text-center">
                                </td>
                                <td>
                                    <select name="category" id="category" class="form-control" id="category">
                                        <option value="0">-Select-</option>
                                        @foreach ($catagory as $value)
                                            <option value="{{$value->catagory_name}}">{{$value->catagory_name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="description" id="description" class="form-control">
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
                    <a href="#" id="preview" class="btn btn-dark w-25" data-toggle="modal" data-target="#exampleModalCenter">Preview</a>
                </div>
                
            </div>
        </div>
    
    <div class="row">

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Invoice Preview </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                


                <div class="card-body">
                    <div class="invoice">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-label">Invoice Number *</div>
                                    <input type="text" id="invoice_number_view" placeholder="1234" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-label">Date *</div>
                                    <input type="date" id="date_view" value="" class="form-control" readonly>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="number" value="1" id="invoice_no_view" value="" readonly class="form-control text-center">
                                        </td>
                                        <td>
                                            <input type="text" value="1" id="category_view" value="" readonly class="form-control text-center">   
                                        </td>
                                        <td>
                                            <input type="text" id="description_view" value="" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" id="quentity_view" value="" readonly value="1" class="text-center form-control">
                                        </td>
                                        <td>
                                            <input type="number" value="" readonly id="price_view" class="form-control text-center">
                                        </td>
                                        <td>
                                            <input id="amount_view" value="" readonly type="number" class="form-control text-center">
                                        </td> 
                                    </tr>
                                    <tr>
                                        <td colspan="4" ></td>
                                        <td><strong>Total =</strong></td>
                                        <td>
                                            <input type="text" id="total_view" value="" readonly class="form-control text-center" value="" readonly>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="text-left">
                                            <strong>Attach File: </strong>
                                            <img src="" alt="" width="80px" height="80px">
                                        </td>  
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <strong class="mr-5 text-danger">* After Modification Click on Amount Fields *</strong>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark"> Save Invoice </button>
              </div>
              
            </div>
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