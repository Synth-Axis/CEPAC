<?php

    // Check if the user is logged in, if not then redirect him to login page
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
      header("location: login.php");
      exit;
    }

?>