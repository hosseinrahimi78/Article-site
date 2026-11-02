<?php
  include("CtoDB.php");

  if(isset($_POST["email"]) && !empty($_POST["email"])){
    $email=$_POST["email"];
  }
  if(isset($_POST["password"]) && !empty($_POST["password"])){
    $password=$_POST["password"];
  }

    $sql="SELECT * FROM `user` WHERE `address_Email` = '$email'";
    $qr=mysqli_query($con,$sql);
    if(mysqli_num_rows($qr)>0){
      $r=mysqli_fetch_array($qr);
      if($r["PassWord"]==$password){
        session_start();
        $_SESSION["login"]= true;
        $_SESSION["IDuser"]=$r["Id_User"];
        header("location:../index.php");
      }else{
        header("location:login.php?error=The password is wrong");
      }
    }else{
        header("location:login.php?error=The email is wrong");
      }
      mysqli_close($con);
?>