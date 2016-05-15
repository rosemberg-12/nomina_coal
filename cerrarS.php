<?php
 session_start();
  unset($_SESSION["nombre"]); 
  unset($_SESSION["documento"]);
  unset($_SESSION["id"]);
  session_destroy();
  header("Location: index.php");
  exit;
?>