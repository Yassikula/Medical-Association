
<?php

include('../database connection.php');

$column = array('hospital_name', 'designation', 'contact', 'department', 'nic', 'name', 'hospital_city');

$query = "
SELECT * FROM tbl_med 
";

if($_POST['filter_designation'] != '' || $_POST['filter_name'] != ''  || $_POST['filter_nic'] != '' || $_POST['filter_department'] != '' || $_POST['filter_hospital_name'] != ''|| $_POST['filter_hospital_city'] != '')
{
 $query .= '
 WHERE designation LIKE "'.$_POST['filter_designation'].'%"  AND name  LIKE "'.$_POST['filter_name'].'%" AND nic  LIKE "'.$_POST['filter_nic'].'%"  AND department  LIKE "'.$_POST['filter_department'].'%" AND hospital_name  LIKE "'.$_POST['filter_hospital_name'].'%"  AND hospital_city  LIKE "'.$_POST['filter_hospital_city'].'%"
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY name ASC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connection->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connection->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();



$data = array();

foreach($result as $row)
{

    

 $sub_array = array();
 $sub_array[] = '<button type="button" name="view" id="'.$row["id"].'" style="height: 34px;width: 72px;" class="btn btn-primary btn-xs view">View</button>';

 $sub_array[] = $row['name'];
 $sub_array[] = $row['hospital_name'];
 $sub_array[] = $row['hospital_city'];
 $sub_array[] = $row['department'];
 $sub_array[] = $row['designation'];
//  $sub_array[] = '<div  <td style="display:none">'.$row["name"].'</td> </div> ';
 $sub_array[] = $row["nic"];
 $sub_array[] = $row["contact"];
 $sub_array[] = $row["email"];
 $sub_array[] = $row["activity"];

//  $sub_array[] = '<div style=" white-space: nowrap; width: 50px; overflow: hidden;text-overflow: ellipsis; "> '.$row['activity'].'</div>';
//  $sub_array[] = '< style="color:red"'.$row['name'].'>';



$data[] = $sub_array;
}

function count_all_data($connection)
{
 $query = "SELECT * FROM tbl_med";
 $statement = $connection->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 "draw"       =>  intval($_POST["draw"]),
 "recordsTotal"   =>  count_all_data($connection),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);

echo json_encode($output);

?>


