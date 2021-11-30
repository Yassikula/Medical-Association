<?php 

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
	 <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
	 <link rel="stylesheet" type="text/css" href="../css/login.css">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<style>
* {
  box-sizing: border-box;
}


body{
	
	background-image: url("../img/login.jpg");

}
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}

.container {
    width: 30%;
    padding: 16px;
    margin-bottom: 39px;
    border-radius: unset;
    margin-top: 120px;
    background-color: #ffffff;
    opacity: 0.8;
    padding-left: 52px;
    padding-right: 52px;
}


}
@media screen and (max-width: 600px) {
	.col-25, .col-75 ,.container {
	  width: 90%;
	  margin-top: 0;
	}
	
	button[type=submit]{
  
	  width: 100%;
	  margin-top: 14px;
  }
  h3{
	font-size: 16px;
}
  }


</style>
    <div class="container">
    <h3>Login</h3>


      

        <form action="login_db.php" method="post" class="form-horizontal my-5 needs-validation" novalidate>
        
        <div class="row">

<div class="col-25">

      <label>Select Type</label>
      </div>
      <div class="col-75">
      
      <select name="role" class="form-control" required>
                    <option value="" selected="selected">- Select Role -</option>
                    <option value="admin">Admin</option>
                    <option value="super">Super Admin</option>
                    <option value="user">User</option>
                </select>
                <div class="invalid-feedback">
                Please provide a Role 
        </div>
</div>
</div>

<div class="row">
      <div class="col-25">
          <label>User Name</label>
      </div>
      <div class="col-75">
          
					<input type="text" name="user_name" class="form-control" required>
                <div class="invalid-feedback">
                Please provide a User Name
        </div>
      </div>
        </div>

        <div class="row">
      <div class="col-25">
          <label>Password</label>
      </div>
      <div class="col-75">
          
                    <input type="password" name="password" class="form-control" id="password-field" required>
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <div class="invalid-feedback">
                    Please provide a Password
        </div>
        </div>
    </div>
    
    <div class="row">
        
				<button type="submit"  name="btn_login" class="btn btn-success">Login</button>
        </div>
       

        </form>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/5a68cbe4d9.js"></script>
    <script src="../js/script.js"></script>
        
</body>
</html>


<script>

(function () {
  'use strict'

  var forms = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
    </script>


<script>
$(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
</script>