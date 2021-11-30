<?php

include('../home.php');

// if (!isset($_SESSION['admin_login'])) {
//   header("location: ../Login/index.php");
// }
?>
<?php

$connection = new PDO ("mysql:host=localhost;dbname=meddb","root","");
if(isset($_POST['signup'])){
 $role = $_POST['role'];
 $user_name = $_POST['user_name'];
 $password = $_POST['password'];
 
 $insert = $connection->prepare("INSERT INTO users (role,user_name,password)
values(:role,:user_name,:password) ");
$insert->bindParam(':role',$role);
$insert->bindParam(':user_name',$user_name);
$insert->bindParam(':password',$password);
$password= md5($password);

// $insert->execute();

if ($insert->execute()) {
  // echo'<script>alter("Registration Done") </script>';
  // $_SESSION['success'] = "Register Successfully...";
  echo '<script>alert("User created successfuly")</script>';
  // header("location: index.php");
}
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Create Member</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- This need for make responsive screen -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> <!-- link with your boostrap file -->

	 <!-- <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" media="all"> -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
	 <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
	 <link rel="stylesheet" type="text/css" href="../css/login.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" 
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>

<style>
  
body{
	
	/* background-image: url("../img/login.jpg"); */

}
.container {
	border-radius: 5px;
	background-color: #ffffff;
	padding: 62px;
	width:30%;
	opacity: 0.8;
	border-radius: unset;
  margin-top: 26px;
  padding-right: 42px;
    padding-left: 43px;
    margin-right: 32%;
  }

  @media screen and (max-width: 600px) {
	.col-25, .col-75 ,.container {
	  width: 90%;
    margin-top: 0;
    margin-left: 18px;
	}
	
	button[type=submit]{
  
	  width: 100%;
    margin-top: 14px;
  margin-left: 18px;
    
  }
  h3{
	font-size: 16px;
}
.table-responsive{
  width: 246px;

}
.editbtn{
width: 72px;
    margin-bottom: 4px;
}
h1{
		font-size: 17px;
	}
  }

  </style>
<!--  -->
<div class="page-wrap">


<div class="container">

	<!-- <div class="login-box"> -->
<h2 style="margin-left:94px">Create Users</h2>

	<!-- <div class="row"> -->
		
		<!-- <div class="col-md-6"> -->

			<form action="" method="post" class="needs-validation" novalidate><hr>
      <div class="row">

<div class="col-25">

      <label>User Type</label>
      </div>
      <div class="col-75">
      
      <select name="role" class="form-control" required>
                    <option value="" selected="selected">- Select Role -</option>
                    <option value="super">Super Admin</option>

                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
</div>
</div>

<div class="row">
      <div class="col-25">
          <label>User Name</label>
      </div>
      <div class="col-75">
          
					<input type="text" name="user_name" class="form-control" required>
				</div>
        </div>

        <div class="row">
      <div class="col-25">
          <label>Password</label>
      </div>
      <div class="col-75">
          
					<input type="password" name="password" class="form-control" required>
        </div>
    </div>
    <div class="row">
        
				<button type="submit"  name="signup" class="btn btn-dark">Submit</button>
        </div>

			</form>
		</div><!-- col-6-->

	<!-- </div>row -->
	<!-- </div>light-box -->
<!-- </div>container -->


<?php
$sql = 'SELECT * FROM users';
$statement = $connection->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<div class="container" style="width: 60%;margin-top: 0px;    margin-right: 226px;">
 
    <div class="card-header">
      <h2>All people</h2>
    </div>
    <div class="table-responsive">
    <div class="card-body">
      <table class="table table-bordered table v-middle" style="  border-collapse: collapse;">
        <tr>
          <!-- <th>ID</th> -->
          <th>Role</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
        <?php foreach($users as $users): ?>
          <tr>
            <td style=" text-transform: capitalize;"><?= $users->role; ?></td>
            <td><?= $users->user_name; ?></td>
            <td>
              <div class=" editbtn">
              <a href="edit.php?id=<?= $users->id ?>" class="btn btn-info" style="width: 74px; margin-bottom: 5px; background-color: #4b83ba;">Edit</a>
        </div>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $users->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
    </div>
  </div>
</div>
</div>

<?php

// include('../footer.php');
?>

<!-- java script CDN -->

	  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/5a68cbe4d9.js"></script>
    <script src="../js/script.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</body>
</html>


