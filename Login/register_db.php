<?php 

require_once '../database connection.php';


    session_start();

    if (isset($_POST['btn_register'])) {
        // $username = $_POST['txt_username'];
        $user_name = $_POST['txt_user_name'];
        $password = $_POST['txt_password'];
        $role = $_POST['txt_role'];

        // if (empty($username)) {
        //     $errorMsg[] = "Please enter username";
        if (empty($user_name)) {
            $errorMsg[] = "Please enter user_name";
        } else if (empty($password)) {
            $errorMsg[] = "Please enter password";
        } else if (strlen($password) < 4) {
            $errorMsg[] = "Password must be atleast 6 characters";
        } else if (empty($role)) {
            $errorMsg[] = "pelase select role";
        } else {
            try {
                $select_stmt = $connection->prepare("SELECT user_name FROM users WHERE  user_name = :uuser_name");
                // $select_stmt->bindParam(":uname", $username);
                $select_stmt->bindParam(":uuser_name", $user_name);
                $select_stmt->execute();
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

                // if ($row['username'] == $username) {
                //     $errorMsg[] = "Sorry username already exists";
              if ($row['user_name'] == $user_name) {
                    $errorMsg[] = "Sorry user_name already exists";
                } else if (!isset($errorMsg)) {
                    $insert_stmt = $connection->prepare("INSERT INTO users( user_name, password, role) VALUES (:uuser_name, :upassword, :urole)");
                    // $insert_stmt->bindParam(":uname", $username);
                    $insert_stmt->bindParam(":uuser_name", $user_name);
                    $insert_stmt->bindParam(":upassword", $password);
                    $insert_stmt->bindParam(":urole", $role);

                    if ($insert_stmt->execute()) {
                        $_SESSION['success'] = "Register Successfully...";
                        header("location: index.php");
                    }
                }
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }


?>