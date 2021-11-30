<?php

 session_start();
 


if (!isset($_SESSION['admin_login'])) {
  header("location:../Login/index.php");
}
include('../home.php');
?>



<!DOCTYPE html>
<html>
 <head>
  <title>CSV File Editing and Importing in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  .box
  {
   max-width:600px;
   width:100%;
   margin: 0 auto;;
  }
  </style>
 </head>
 <body>

 <style>
 	#myInput {
  background-image: url('search.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 50%;
  font-size: 16px;
  padding: 8px 20px 8px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
.btnimport{
  margin-top: -65%;
  margin-left: 55%;
}
.btn {
  background-color: #255380;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 17px;
      margin-left:435px;
    margin-top: -40px;
}

.btn:hover {
  background-color: #7898b8;
}

@media screen and (max-width: 1000px) {

  input[type=submit]{
    margin-top: -258px;
  
    margin-left: 52%;
}

#myInput{

  margin-left: 18%;
}

.col-md-3{

  margin-left: 113px;
}
.col-md-4{

margin-left: 262px;
}
.table-responsive{
margin-left: -76px;
}
 .btnimport{
margin-top: -107%;
}
}

 </style>
            <div class="page-wrap">

 <h2 style="margin-left: 326px;margin-top: 102px;padding-bottom: 46px; margin-left: 19%;">Association Data Upload</h2>
  <div class="container" style="margin-left: 324px;width: 78%;margin-top: 52px;">
  
   <br />
   <br />
<!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for ID" title="Type in a name"> -->

<!--download excel form-->
<label style="margin-left: 156px;">Download Excel Form</label>
<p><a href="download.php?path=Data.xlsx"><button  style="width: 186px;"class="btn"><i class="fa fa-download"></i> Download</button></a></p>


   <form id="upload_csv" method="post" enctype="multipart/form-data">
    <div class="col-md-3" style=" margin-left: 142px;">
     <br />
     <label>Select CSV File</label>
      <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top: 11px;margin-left: -13px;background-color: #f6f6f6;width: 94%;    padding: 22px;  height: 70px;" />
    </div>  
    <!--<div style="border: solid;">-->
                <!--<div class="col-md-4">  -->
                   
                <!--</div>  -->
                   <!--</div>  -->
                <!--<div class="col-md-5">  -->
                   <button type="submit" name="upload" id="upload"  style="margin-top:74px;margin-left: 2px;" class="btn" /><i class="fa fa-upload" aria-hidden="true"></i>Upload the File </button>
                    <!-- <div align="center"><button type="button" id="import_data" class="btn btn-success" style="margin-top: -125px;height: 40px;">Import to Database</button></div> -->
             
               
                <div style="clear:both"></div> 
   </form>
   <br />
   <br />
   <div style="margin-right: 110px;" id="csv_file_data"></div>


   
  </div>
  </div>

 </body>
</html>
<?php

// include('../footer.php');
?>

<script>

$(document).ready(function(){
 $('#upload_csv').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"fetch_bulk.php",
   method:"POST",
   data:new FormData(this),
   dataType:'json',
   contentType:false,
   cache:false,
   processData:false,
   success:function(data)
   {
    console.log(data)
    $('#upload_csv').html('<div class="alert alert-success">Data Uploaded Successfully</div>');
    var html = '<table class="table table-striped table-bordered table-responsive" style="overflow-x:auto;id="myTable">';
    if(data.column)
    {
     html += '<tr>';
     for(var count = 0; count < data.column.length; count++)
     {
      html += '<th>'+data.column[count]+'</th>';
     }
     html += '</tr>';
    }

    if(data.row_data)
    {
     
    html += '<div align="center" ><button type="button"  style=" background-color:#84c231;margin-left: 88%;margin-top: -58px;width: 100px;" id="import_data" onclick="myFunction()"  class="btn btn-success">Import</button></div>';

     for(var count = 0; count < data.row_data.length; count++)
     {

      html += '<tr>';
      html += '<td class="name" contenteditable>'+data.row_data[count].name+'</td>';
      html += '<td class="nic" contenteditable>'+data.row_data[count].nic+'</td>';
      html += '<td class="contact" contenteditable>'+data.row_data[count].contact+'</td>';
      html += '<td class="email" contenteditable>'+data.row_data[count].email+'</td>';
      html += '<td class="hospital_name" contenteditable>'+data.row_data[count].hospital_name+'</td>';
      html += '<td class="hospital_city" contenteditable>'+data.row_data[count].hospital_city+'</td>';
      html += '<td class="department" contenteditable>'+data.row_data[count].department+'</td>';
      html += '<td class="designation" contenteditable>'+data.row_data[count].designation+'</td>';
      html += '<td class="activity" contenteditable>'+data.row_data[count].activity+'</td></tr>';
     }
    }
    html += '<table>';



   

    $('#csv_file_data').html(html);
    $('#upload_csv')[0].reset();
   }
  })
 });

 $(document).on('click', '#import_data', function(){
  var name = [];
  var nic = [];
  var contact = [];
  var email = [];
  var hospital_name = [];
  var hospital_city = [];
  var department = [];
  var designation = [];
  var activity = [];
  $('.name').each(function(){
    name.push($(this).text());
  });
  $('.nic').each(function(){
    nic.push($(this).text());
  });
  $('.contact').each(function(){
    contact.push($(this).text());
  });

  $('.email').each(function(){
    email.push($(this).text());
  });

  $('.hospital_name').each(function(){
    hospital_name.push($(this).text());
  });
  $('.hospital_city').each(function(){
    hospital_city.push($(this).text());
  });
  $('.department').each(function(){
    department.push($(this).text());
  });
  $('.designation').each(function(){
    designation.push($(this).text());
  });
  $('.activity').each(function(){
    activity.push($(this).text());
  });
  $.ajax({
   url:"import_bulk.php",
   method:"post",
   data:{name:name, nic:nic , contact:contact , email:email, hospital_name:hospital_name, hospital_city:hospital_city, department:department, designation:designation, activity:activity},
   success:function(data)
   {
    $('#csv_file_data').html('<div class="alert alert-success">Data Imported Successfully</div>');
   }
  })
  document.getElementById("import_data").disabled = true;

 });
});

</script>


<!-- <script>
function myFunction() {
  document.getElementById("import_data").disabled = true;
}
</script> -->
<!-- 
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script> -->
