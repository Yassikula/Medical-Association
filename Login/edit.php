<?php
require '../database connection.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM users WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$users = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['user_name'])  && isset($_POST['role']) && isset($_POST['password']) ) {
  $user_name = $_POST['user_name'];
  $role = $_POST['role'];
  $password = $_POST['password'];
  $password=md5($password);
  $sql = 'UPDATE users SET user_name=:user_name, role=:role, password=:password WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':user_name' => $user_name, ':role' => $role,':password' => $password, ':id' => $id])) {
    echo '<script>alert("User created successfuly")</script>';

    header("Location: create_admin.php");

  }


 

}


 ?>

<?php

include('../home.php');


?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>

      <form action= "" method="post" class="needs-validation" novalidate>
<!-- 
      <div class="form-group">
          <label for="type">Type</label>
          <input type="text" value="<?= $users->role; ?>" name="role" id="type" class="form-control">
        </div> -->
        
      <div class="form-group">
          <label for="type">User Type</label>
          <select name="role" class="form-control" style=" text-transform: capitalize;" required>
                    <option value="<?= $users->role; ?>"name="role" id="type" ><?= $users->role; ?></option>
                    <option value="super">Super Admin</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>

                    </select>
      
        </div>
        <div class="form-group">
          <label for="user_name">Name</label>
          <input value="<?= $users->user_name; ?>" type="text" name="user_name" id="user_name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" value="<?= $users->password; ?>" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="../js/script.js"></script>
