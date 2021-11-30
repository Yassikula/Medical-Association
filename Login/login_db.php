<?php 

require('../database connection.php');

// include("Location:https://smartideas.lk/medical_association/../database connection.php");

    session_start();

    if (isset($_POST['btn_login'])) {
        $user_name = $_POST['user_name']; // textbox name 
        $password = $_POST['password']; // password
        $password=md5($password);
        $role = $_POST['role']; // select option role
  
        if (empty($user_name)) {
            $errorMsg[] = "Please enter user_name";
        } else if (empty($password)) {
            $errorMsg[] = "Please enter password";
        } else if (empty($role)) {
            $errorMsg[] = "Please select role";
        } else if ($user_name AND $password AND $role) {
            try {
                $select_stmt = $connection->prepare("SELECT user_name, password, role FROM users WHERE user_name = :uuser_name AND password = :upassword AND role = :urole");
                $select_stmt->bindParam(":uuser_name", $user_name);
                $select_stmt->bindParam(":upassword", $password);
                $select_stmt->bindParam(":urole", $role);
                $select_stmt->execute(); 

                while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                    $connectionuser_name = $row['user_name'];
                    $connectionpassword = $row['password'];
                    $connectionrole = $row['role'];
                }
                if ($user_name != null AND $password != null AND $role != null) {
                    if ($select_stmt->rowCount() > 0) {
                        if ($user_name == $connectionuser_name AND $password == $connectionpassword AND $role == $connectionrole) {
                            switch($connectionrole) {
                                case 'user':
                                    $_SESSION['user_login'] = $user_name;
                                    // $_SESSION['success'] = "User... Successfully Login...";
                                    header("location: ../Search_filter/index.php");
                                    
                                break;
                                case 'super':
                                    $_SESSION['super_login'] = $user_name;
                                    // $_SESSION['success'] = "Admin... Successfully Login...";
                                    header("location:create_admin.php");
                                break;
                                case 'admin':
                                    $_SESSION['admin_login'] = $user_name;
                                    // $_SESSION['success'] = "Admin... Successfully Login...";
                                    header("location:create_admin.php");
                                break;
                                default:
                                    // $_SESSION['error'] = "Wrong username or password or role";
                                    // echo '<script> alert("Wrong username or password or role") </script>';
                                    header("location: index.php");
                            }
                        }
                    } else {
                        echo "<script>
                        alert('Wrong username or password or role');
                        window.location.href='index.php';
                            </script>";
                    }
                }
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }

?>

