<?php 
include('../database connection.php');
include('function.php');

if(isset($_POST["operation"]))
{
    if($_POST["operation"] == "Add")
    {
        $statement = $connection->prepare("INSERT INTO tbl_med (name, nic,contact, email,hospital_name,hospital_city, department,designation, activity)
         VALUES (:name, :nic,:contact, :email,:hospital_name,:hospital_city ,:department,:designation, :activity)");
        $result = $statement->execute(
             array(
                ':name'   =>  $_POST["name"],
                ':nic' =>  $_POST["nic"],
                ':contact'   =>  $_POST["contact"],
                ':email' =>  $_POST["email"],
                ':hospital_name'   =>  $_POST["hospital_name"],
                ':hospital_city'   =>  $_POST["hospital_city"],
                ':department' =>  $_POST["department"],
                ':designation'   =>  $_POST["designation"],
                ':activity' =>  $_POST["activity"],
             )
        );
    }
    if($_POST["operation"] == "Edit")
    {
        $statement = $connection->prepare("UPDATE tbl_med SET name= :name, nic = :nic,contact = :contact, email = :email,hospital_name = :hospital_name,hospital_city = :hospital_city, department= :department,designation = :designation, activity= :activity
         WHERE id = :id");
        $result = $statement->execute(
             array(
                ':name'   =>  $_POST["name"],
                ':nic' =>  $_POST["nic"],
                ':contact'   =>  $_POST["contact"],
                ':email' =>  $_POST["email"],
                ':hospital_name'   =>  $_POST["hospital_name"],
                ':hospital_city'   =>  $_POST["hospital_city"],
                ':department' =>  $_POST["department"],
                ':designation'   =>  $_POST["designation"],
                ':activity' =>  $_POST["activity"],
                ':id'       =>  $_POST["course_id"]
             )
        );
    }
    
}
?>