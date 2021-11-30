<?php

//fetch_single.php

include('../database connection.php');


if(isset($_POST["course_id"]))
{
 $query = "SELECT * FROM tbl_med WHERE id = '".$_POST["course_id"]."'";

 $statement = $connection->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = ' <div class="table-responsive">  
 <table class="table table-bordered">'; 
 foreach($result as $row)
 {
    $output .= '  
    <tr>  
         <td width="30%"><label>Name</label></td>  
         <td width="70%">'.$row["name"].'</td>  
    </tr>  
    <tr>  
         <td width="30%"><label>NIC</label></td>  
         <td width="70%">'.$row["nic"].'</td>  
    </tr>  
    <tr>  
         <td width="30%"><label>Contact</label></td>  
         <td width="70%">'.$row["contact"].'</td>  
    </tr>  
    <tr>  
         <td width="30%"><label>Email</label></td>  
         <td width="70%">'.$row["email"].'</td>  
    </tr>  
   
    <tr>  
    <td width="30%"><label>Hospital Name</label></td>  
    <td width="70%">'.$row["hospital_name"].' </td>  
</tr>  
<tr>  
<td width="30%"><label>Hospital City</label></td>  
<td width="70%">'.$row["hospital_city"].' </td>  
</tr>  
<tr>  
<td width="30%"><label>Department</label></td>  
<td width="70%">'.$row["department"].' </td>  
</tr>  
<td width="30%"><label>Designation</label></td>  
<td width="70%">'.$row["designation"].' </td>  
</tr> 
<td width="30%"><label>Activity</label></td>  
<td width="70%">'.$row["activity"].' </td>  
</tr> 
';  
}  
$output .= '  
</table>  
</div>  
';  
echo $output;  
}  
?>