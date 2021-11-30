
<?php  

session_start();


if (!isset($_SESSION['admin_login'])) {
 header("location:https://smartideas.lk/medical_association/Login/index.php");
}


require('database connection.php');
include("home.php");


?>
<div class="page-wrap">
<?php

include('pie.php');

include('pie_city.php');


?>
</div>


<!DOCTYPE html>
<html>
<head>
   <title>Dashboard</title>


<body>

<style>

.header{
    position: relative;
       margin-left: 45%;
font-size: xx-large;
   margin-top: -71%;
}

.header img {
  float: left;
  height: 85px;
  margin-left: -70px;
}

.header h3 {
  position: relative;
  top: 26px;
  left: -7px;
}

@media screen and (min-width: 1000px) {

   .header h3{
      position: relative;
    top: 115px;
    left: -72px;
    

   }
   img{

      position: relative;
    top: 93px;
    left: -72px;

   }
}

</style>

<div class="header">
<img src="img/gov.jpg" alt="gov_image" style="  ">
<h3>Ministry of Health Sri Lanka</h3>
</div>




</body>
</head>
</html>

<div style="margin-inline-end: -8px; margin-top: 86%;   margin-bottom: -9px;">

<?php
// include('footer.php');


?>

</div>
