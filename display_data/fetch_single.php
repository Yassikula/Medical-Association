<?php 
include('../database connection.php');
include('function.php');

if(isset($_POST["course_id"]))
{
    $output = array();
    $statement = $connection->prepare("SELECT * FROM tbl_med WHERE id = '".$_POST["course_id"]."' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output["id"] = $row["id"];
        $output["name"] = $row["name"];
        $output["nic"] = $row["nic"];
        $output["contact"] = $row["contact"];
        $output["email"] = $row["email"];
        $output["hospital_name"] = $row["hospital_name"];
        $output["hospital_city"] = $row["hospital_city"];
        $output["department"] = $row["department"];
        $output["designation"] = $row["designation"];
        $output["activity"] = $row["activity"];
      
    }
    echo json_encode($output);
}
?>

                           