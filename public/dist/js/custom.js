$(function () {
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});


  $("#example1").DataTable({
    // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    "responsive": false, 
    "lengthChange": true, 
    "autoWidth": false
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": false,
    "info": true,
    "autoWidth": true,
    "responsive": true,
  });


// DESIGN

$(document).onready(function(){
  $('[data-toggle="tooltip"]').tooltip();
  var actions = $("table td:last-child").html();
  // Append table with add row form on add new button click
    $(".add-new").onclick(function(){
    $(this).attr("disabled", "disabled");
    var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
            '<td><input type="text" class="form-control" name="name" id="name" placeholder="name"></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
            '<td><input type="number" class="form-control" name="number_of_client" id="number_of_client"></td>' +
            '<td><input type="text" class="form-control" name="remark" id="remark"></td>' +
      '<td>' + actions + '</td>' +
        '</tr>';
      $("table").append(row);		
    $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
  // Add row on add button click
  $(document).on("click", ".add", function(){
    var empty = false;
    var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
      if(!$(this).val()){
        $(this).addClass("error");
        empty = true;
      } else{
                $(this).removeClass("error");
            }
    });
    $(this).parents("tr").find(".error").first().onfocus();
    if(!empty){
      input.each(function(){
        $(this).parent("td").html($(this).val());
      });			
      $(this).parents("tr").find(".add, .edit").toggle();
      $(".add-new").removeAttr("disabled");
    }		
    });
  // Edit row on edit button click
  $(document).on("click", ".edit", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
      $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
    });		
    $(this).parents("tr").find(".add, .edit").toggle();
    $(".add-new").attr("disabled", "disabled");
    });
  // Delete row on delete button click
  $(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
    $(".add-new").removeAttr("disabled");
    });

  //   $('#path1').click(function() {
  //     var a = $('#division').val();
  //     var a1 = a.slice(0, 3);
  //     var b = $('#district').val();
  //     var b1 = b.slice(0, 3);
  //     var c = $('#upazilla').val();
  //     var c1 = c.slice(0, 3);
  //     var e = $('#jln').val();
  //     var e1 = e.slice(0, 3);
  //     var f = $('#sheet').val();
  //     var f1 = f.slice(0, 3);
  //     var g = $('#sv').val();
  //     var g1 = g.slice(0, 3);
  //     $('#m_code').val(a1+'_'+b1+'_'+c1+'_'+e1+'_'+f1+'_'+g1);
  //     $('#m_code').css('text-transform','uppercase');    
  // });
  // $('#name').click(function() {
  //     var x = 'rowImage';
  //     var a = $('#division').val();
  //     var b = $('#district').val();
  //     var c = $('#upazilla').val();
  //     $('#path').val(x+'/'+a+'/'+b+'/'+c);
  //     $('#path').css('text-transform','uppercase');
  //   });
  
    // $('#name').onclick(function() {
    //   var x = 'ImageCAD';
    //   var a = $('#division').val();
    //   var b = $('#district').val();
    //   var c = $('#upazilla').val();
    //   var y = $('#name').val();
    //   $('#path2').val(x+'/'+a+'/'+b+'/'+c+'/'+y);
    //   $('#path2').css('text-transform','uppercase');
    // });


    
//   $('#path1').onclick(function(){
//     var a = $('#division').val();
//     var b = $('#district').val();
//     var c = $('#upazilla').val();
//     var x = "RenameImage";
//     $('#path1').val(x+'/'+a+'/'+b+'/'+c);
// });
// $('#path1').click(function(){
//       var a = $('#division').val();
//       var a1 = a.slice(0, 3);
//       var b = $('#district').val();
//       var b1 = b.slice(0, 3);
//       var c = $('#upazilla').val();
//       var c1 = c.slice(0, 3);
//   $('#m_code').val(a1+'_'+b1+'_'+c1);
// });
// $('#path2').click(function(){
//   var a = $('#division').val();
//   var b = $('#district').val();
//   var c = $('#upazilla').val();
//   var d = $('#m_code').val();
//   var x = "ImageCAD";
//   $('#path2').val(x+'/'+a+'/'+b+'/'+c+'/'+d);
// });


  //   $('#division').change(function() {
  //     var name = $(this).val();
  //     if(name) {
  //         $.ajax({
  //             url: '/get/'+ name,
  //             type: "GET",
  //             data : {"_token":"{{ csrf_token() }}"},
  //             dataType: "json",
  //             success:function(data)
  //             {
  //               if(data){
  //                  $('#district').empty();
  //                  $('#district').append('<option hidden>Choose One</option>'); 
  //                  $.each(data, function($id, district){
  //                      $('select[name="district"]').append('<option value="'+$id+'">' +district.district+ '</option>');
  //                  });
  //              }else{
  //                  $('#district').append('<option hidden>not working</option>');;
  //              }
  //           }
  //         });
  //     }else{
  //       $('#district').empty();
  //     }
  //  });

//    $('#division').change(function() {
//       var name = $(this).val();
//       if(name) {
//           $.ajax({
//               url: '/get/'+ name,
//               type: "GET",
//               data : {"_token":"{{ csrf_token() }}"},
//               dataType: "json",
//               success:function(data)
//               {
//                 if(data){
//                    $('#upazilla').empty();
//                    $('#upazilla').append('<option hidden>Choose One</option>'); 
//                    $.each(data, function(key, upazilla){
//                        $('#upazilla').append('<option value="'+ key +'">' +upazilla.upazilla+ '</option>');
//                    });
//                }else{
//                    $('#upazilla').append('<option hidden>not working</option>');;
//                }
//             }
//           });
//       }else{
//         $('#upazilla').empty();
//       }
//    });
//    $('#division').change(function() {
//       var name = $(this).val();
//       if(name) {
//           $.ajax({
//               url: '/get/'+ name,
//               type: "GET",
//               data : {"_token":"{{ csrf_token() }}"},
//               dataType: "json",
//               success:function(data)
//               {
//                 if(data){
//                    $('#jln').empty();
//                    $('#jln').append('<option hidden>Choose One</option>'); 
//                    $.each(data, function(key, jln){
//                        $('#jln').append('<option value="'+ key +'">' +jln.jln+ '</option>');
//                    });
//                }else{
//                    $('#jln').append('<option hidden>not working</option>');;
//                }
//             }
//           });
//       }else{
//         $('#jln').empty();
//       }
//    });
//    $('#division').change(function() {
//       var name = $(this).val();
//       if(name) {
//           $.ajax({
//               url: '/get/'+ name,
//               type: "GET",
//               data : {"_token":"{{ csrf_token() }}"},
//               dataType: "json",
//               success:function(data)
//               {
//                 if(data){
//                    $('#sheet').empty();
//                    $('#sheet').append('<option hidden>Choose One</option>'); 
//                    $.each(data, function(key, sheet){
//                        $('#sheet').append('<option value="'+ key +'">' +sheet.sheet+ '</option>');
//                    });
//                }else{
//                    $('#sheet').append('<option hidden>not working</option>');;
//                }
//             }
//           });
//       }else{
//         $('#sheet').empty();
//       }
//    });
//    $('#division').change(function() {
//       var name = $(this).val();
//       if(name) {
//           $.ajax({
//               url: '/get/'+ name,
//               type: "GET",
//               data : {"_token":"{{ csrf_token() }}"},
//               dataType: "json",
//               success:function(data)
//               {
//                 if(data){
//                    $('#vs').empty();
//                    $('#vs').append('<option hidden>Choose One</option>'); 
//                    $.each(data, function(key, vs){
//                        $('#vs').append('<option value="'+ key +'">' +vs.vs+ '</option>');
//                    });
//                }else{
//                    $('#vs').append('<option hidden>not working</option>');;
//                }
//             }
//           });
//       }else{
//         $('#vs').empty();
//       }
//    });
//    $('#division').change(function() {
//       var name1 = $(this).val();
//       if(name1) {
//           $.ajax({
//               url: '/get/'+ name1,
//               type: "GET",
//               data : {"_token":"{{ csrf_token() }}"},
//               dataType: "json",
//               success:function(data)
//               {
//                 if(data){
//                    $('#name1').empty();
//                    $('#name1').append('<option hidden>Choose One</option>'); 
//                    $.each(data, function(key, name1){
//                        $('#name1').append('<option value="'+ key +'">' +name1.name+ '</option>');
//                    });
//                }else{
//                    $('#name1').append('<option hidden>not working</option>');;
//                }
//             }
//           });
//       }else{
//         $('#name1').empty();
//       }
//    });
//    $('#division').change(function() {
//     var name1 = $(this).val();
//     if(name1) {
//         $.ajax({
//             url: '/get/'+ name1,
//             type: "GET",
//             data : {"_token":"{{ csrf_token() }}"},
//             dataType: "json",
//             success:function(data)
//             {
//               if(data){
//                  $('#path').empty();
//                  $('#path').append('<option hidden>Choose One</option>'); 
//                  $.each(data, function(key, path){
//                      $('#path').append('<option value="'+ key +'">' +path.path+ '</option>');
//                  });
//              }else{
//                  $('#path').append('<option hidden>not working</option>');;
//              }
//           }
//         });
//     }else{
//       $('#path').empty();
//     }
//  });
     
});