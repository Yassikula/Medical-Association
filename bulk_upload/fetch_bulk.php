
<?php



if(!empty($_FILES['csv_file']['name']))
{
 $file_data = fopen($_FILES['csv_file']['tmp_name'], 'r');
 $column = fgetcsv($file_data);
 while($row = fgetcsv($file_data))
 {
  $row_data[] = array(
   'name'  => $row[0],
   'nic'  => $row[1] == ''?'- ':$row[1],
   'contact'  => $row[2] == ''?'0 ':$row[2],
   'email'  => $row[3] == ''?'- ':$row[3],
   'hospital_name'  => $row[4] == ''?'- ':$row[4],
   'hospital_city'  => $row[5] == ''?' -':$row[5],
   'department'  => $row[6] == ''?' -':$row[6],
   'designation'  => $row[7] == ''?'- ':$row[7],
   'activity'  => '-'
  );
 }
 $output = array(
  'column'  => $column,
  'row_data'  => $row_data
 );

 echo json_encode($output);

}


?>
