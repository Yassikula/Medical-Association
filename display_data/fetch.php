<?php 
include('../database connection.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_med ";
if(isset($_POST["search"]["value"]))
{
    $query .= 'WHERE name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR nic LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR department LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR designation LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR hospital_city LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR hospital_name LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
    $query .= 'ORDER BY name ASC ';
}

if($_POST["length"] != -1)
{
    $query .= 'LIMIT ' .$_POST['start']. ', ' .$_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
    $sub_array = array();

    // $sub_array[] = $row["id"];
    $sub_array[] = $row["name"];
    $sub_array[] = $row["hospital_name"];
    $sub_array[] = $row["hospital_city"];
    $sub_array[] = $row["department"];
    $sub_array[] = $row["designation"];


    $sub_array[] = '<button type="button" style="background-color: #84c231; name="view" id="'.$row["id"].'" class="btn btn-primary btn-sm view"  >View</button>';
    $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-primary btn-sm update">Edit</button>';
    $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete">Delete</button>';
    $data[] = $sub_array;
}



$output = array(
    "draw"              =>  intval($_POST["draw"]),
    "recordsTotal"      =>  $filtered_rows,
    "recordsFiltered"   =>  get_total_all_records(),
    "data"              =>  $data
);
echo json_encode($output);
?>






                       