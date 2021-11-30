<?php

function get_total_all_records()
{
	include('../database connection.php');
	$statement = $connection->prepare("SELECT * FROM tbl_med");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>
                           