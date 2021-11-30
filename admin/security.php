<?php
session_start();
include('../database connection.php');
if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: ../database connection.php");
}
?>