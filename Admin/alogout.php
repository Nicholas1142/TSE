<?php
  session_start();
  session_unset();
  session_destroy();

  // Redirect to login page
  header("Location: adminlogin.php");
  exit();
?>