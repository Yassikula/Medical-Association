<!DOCTYPE html>
<html>
   <head>
     <title>Import Data From Excel or CSV File to Mysql using PHPSpreadsheet</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   </head>
   <body>

   <style>

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
   </style>
   <div class="container" style="margin-left: 324px;width: 78%;margin-top: 52px;">


     <label style="margin-left: 156px;">Download Excel Form</label>
<p><a href="download.php?path=Medical Association Data Upload.xlsx"><button  style="width: 186px;"class="btn"><i class="fa fa-download"></i> Download</button></a></p>

      <br />
      <br />
        <!-- <div class="panel panel-default"> -->
          <!-- <div class="panel-body"> -->
          <div class="table-responsive">
           <span id="message"></span>
              <form method="post" id="import_excel_form" enctype="multipart/form-data">
                <table class="table">
     <label style="margin-left: 156px;">Select Excel File</label>

                  <tr>
                    <!-- <td width="25%" align="right"><lable>Select Excel File</lable></td> -->
                    <td width="50%"><input type="file" name="import_excel" style="margin-left: 145px;margin-top: 28px;"/></td>
                    <td width="25%"><button type="submit" name="import" id="import" class="btn btn-primary" style=" margin-left: -335px;margin-top: 16px;"><i class="fa fa-upload" aria-hidden="true"></i> Import File</button></td>
                  </tr>
                </table>
              </form>
           <br />
              
          <!-- </div>
          </div> -->
        <!-- </div> -->
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
</html>
<script>
$(document).ready(function(){
  $('#import_excel_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"import.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').val('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_form')[0].reset();
        $('#import').attr('disabled', false);
        $('#import').val('Import');
      }
    })
  });
});
</script>
