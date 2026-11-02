<?php
  session_start();
  if(isset($_SESSION["login"]) && $_SESSION["login"] == true){
    session_unset();
    header("location:../index.php");
  }
?>