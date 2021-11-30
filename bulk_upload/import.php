<?php

//import.php

include 'vendor/autoload.php';
include('../database connection.php');


// $connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

if($_FILES["import_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'csv', 'xlsx');
 $file_array = explode(".", $_FILES["import_excel"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

  $spreadsheet = $reader->load($file_name);

  unlink($file_name);

  $data = $spreadsheet->getActiveSheet()->toArray();

  foreach($data as $row)
  {
   $insert_data = array(
    ':name'  => $row[0],
    ':nic'  => $row[1],
    ':contact'  => $row[2],
    ':email'  => $row[3],
    ':hospital_name'  => $row[4],
    ':hospital_city'  => $row[5], 
    ':department'  => $row[6],
    ':designation'  => $row[7],
    ':activity'  => $row[8]
   );

   $query = "
   INSERT INTO tbl_med 
   (name, nic, contact, email, hospital_name, hospital_city, department, designation, activity) 
   VALUES (:name, :nic, :contact, :email, :hospital_name, :hospital_city, :department, :designation, :activity)
   ";

   $statement = $connection->prepare($query);
   $statement->execute($insert_data);
  }
  $message = '<div class="alert alert-success">Data Imported Successfully</div>';

 }
 else
 {
  $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>