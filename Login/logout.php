<?php 

    session_start();
    header("location: index.php");
    // header("http://" . $_SERVER['SERVER_NAME'] ."index.php");
    // /123/display_data/index.php
    // http://" . $_SERVER['SERVER_NAME'] ."/123/display_data/index.php
    session_destroy();

?>