<?php
require '../database connection.php';

$id = $_GET['id'];
$sql = 'DELETE FROM users WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: create_admin.php");
}