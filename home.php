



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  /* margin: 0; */
  	font-family: "Open Sans",sans-serif;
  	 /* overflow:auto; */
     /* height: 100%; */
     min-height: 100%;
	/* margin: 0 auto -50px; */

}
b{
    color: #517599;
}
.p1{
  font-size: 12px;
    color: #a0a0a0;
}


.page-wrap {
  min-height: 100%;
  /* equal to footer height */
  margin-bottom: 0; 
}
.page-wrap:after {
  content: "";
  display: block;
}
.site-footer, .page-wrap:after {
  height: 115px; 
}
.site-footer {
    background-color: #f3f3f3;
    position: fixed;

    text-align: center;
}

/* 
.footer {
  position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #f3f3f3;
    color: #959595;
    height: 49px;
    text-align: center;
} */
.sidenav {
  height: 100%;
  width: 197px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
 
}

.sidenav a {
  padding: 6px 8px 6px 16px;
    font-size: 15px;
    font-weight: 600;
    color: #818181;
    padding-bottom: 39px;
    display: block;
    text-decoration: none;

}

}


.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<div class="sidenav">
<a style="color: white;margin-bottom: 30px;text-decoration: none; text-transform: capitalize;">
                <?php if(isset($_SESSION['admin_login'])) { ?>
                Welcome, <br> <?php echo $_SESSION['admin_login']; }?>
                  
            <h3>
                <?php if(isset($_SESSION['user_login'])) { ?>
                Welcome,  <br> <?php echo $_SESSION['user_login']; }?>
            </h3>
            </a>

  <!-- <a href="login.php">Login</a> -->
  <a style="text-decoration: none;" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/medical_association/dashboard.php" ?>">Dashboard</a>

  <a style="text-decoration: none;" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/medical_association/display_data/index.php" ?>">Manage Association Data</a>
  <a style="text-decoration: none;" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/medical_association/Search_filter/index.php" ?>">Search Association Data</a>

  <a style="text-decoration: none;" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/medical_association/bulk_upload/index_bulk.php" ?>"> Data Upload</a>
  <a style="text-decoration: none;" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/medical_association/Login/create_admin.php" ?>"> User Management</a>



<!-- <?php echo "http://" . $_SERVER['SERVER_NAME']; ?> -->
<!-- logout   -->

<a  href="<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/medical_association/Login/logout.php" ?>"   style=" height: 4px; background-color: #ffeb00;margin-bottom: 73px;text-decoration: none;">Logout</a>


<div >

<p class="p1">Powered by <b> Hirely </b> loyalty & Supported by <b> Nova</b> <br>  2021 <i class="fa fa-copyright"></i> CH17 All Rights Reserved.</p>

</div>


</div>


            <?php if(isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <h3>
                        <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

        
  

   
<div>
<?php

// include('../footer.php');


?>
</div>



</body>
</html> 