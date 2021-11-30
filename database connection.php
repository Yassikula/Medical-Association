<?php 

    $connection_host = "localhost"; // localhost server
    $connection_user = "root"; // database username
    $connection_password = ""; // database password
    $connection_name = "meddb"; // database name

    try {

        $connection = new PDO("mysql:host={$connection_host};dbname={$connection_name}", $connection_user, $connection_password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        $e->getMessage();
    }


?>