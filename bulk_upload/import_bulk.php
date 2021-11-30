<?php 
include('../database connection.php');
?>
<?php


//import.php

if(isset($_POST["name"]))
{

 $name = $_POST["name"];
 $nic = $_POST["nic"];
 $contact = $_POST["contact"];
 $email = $_POST["email"];
 $hospital_name = $_POST["hospital_name"];
 $hospital_city = $_POST["hospital_city"];
 $department = $_POST["department"];
 $designation = $_POST["designation"];
 $activity = $_POST["activity"];
 foreach($name as $key => $value)
 {
     
   $insert_data = array(
    ':name'  => $value,
    ':nic'  => $nic[$key],
    ':contact'  => $contact[$key],
    ':email'  => $email[$key],
    ':hospital_name'  => $hospital_name[$key],
    ':hospital_city'  => $hospital_city[$key], 
    ':department'  => $department[$key],
    ':designation'  => $designation[$key],
    ':activity'  => $activity[$key]
   );

   $query = "
   INSERT INTO tbl_med 
   (name, nic, contact, email, hospital_name, hospital_city, department, designation, activity) 
   VALUES (:name, :nic, :contact, :email, :hospital_name, :hospital_city, :department, :designation, :activity)
   ";

   $statement = $connection->prepare($query);
   $statement->execute($insert_data);
  
 }
}



?>