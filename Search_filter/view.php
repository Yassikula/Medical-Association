
<?php


include('../database connection.php');

if(isset($_GET["course_id"]))
{
 $query = "SELECT * FROM tbl_med WHERE id = '".$_GET["course_id"]."'";

 $statement = $connection->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '';

 foreach($result as $row)
 {
   
     $output .= '
     <div class="col-md-9" style="with:30%">
     <hr>
      <p><label>Name :&nbsp;</label>'.$row["name"].'</p><hr>
      <p><label>NIC :&nbsp;</label>'.$row["nic"].'</p><hr>
      <p><label>Contact :&nbsp;</label>'.$row["contact"].'</p><hr>
      <p><label>Email :&nbsp;</label>'.$row["email"].'</p><hr>
       <p><label>Hospital Name :&nbsp;</label>'.$row["hospital_name"].'</p><hr>
      <p><label>Hospital City :&nbsp;</label>'.$row["hospital_city"].'</p><hr>
      <p><label>Department :&nbsp;</label>'.$row["department"].'</p><hr>
      <p><label>Designation :&nbsp;</label>'.$row["designation"].'</p><hr>
      <p><label>Activity :&nbsp;</label>'.$row["activity"].'</p><hr>
     </div>
     </div><br />
     ';
    }
    echo $output;
   }
   

?> 
