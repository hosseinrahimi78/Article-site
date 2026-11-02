<?php
  include("CtoDB.php");
  $date=date("Y-m-d");

  if(isset($_POST["username"]) && !empty($_POST["username"])){
    $username=$_POST["username"];
  }
  if(isset($_POST["Emailaddress"]) && !empty($_POST["Emailaddress"])){
    $Emailaddress=$_POST["Emailaddress"];
  }
  if(isset($_POST["password"]) && !empty($_POST["password"])){
    $password=$_POST["password"];
  }
  if(isset($_POST["repassword"]) && !empty($_POST["repassword"])){
    $repassword=$_POST["repassword"];
  }
  if(isset($_POST["usertype"]) && !empty($_POST["usertype"])){
    $usertype=$_POST["usertype"];
  }else{
    $usertype="user";
  }
  if(isset($_FILES["uploadimage"]) && !empty($_FILES["uploadimage"])){
    $file = $_FILES["uploadimage"];
    $name = $file["name"];
   $format  = $file["type"];
  }
  $adres="apload image file/";
  $from = $file["tmp_name"];
  if($password==$repassword){

      if(($format !== "image/png") || ($format !== "image/jpeg")){
          $to = $adres . $name;
          $sql = "INSERT INTO `user`
          (`Username`,`PassWord`,`Date_of_membership`,`User_type`,`address_Email`,`address_image`,`Number_of_articles`)
        VALUES
          ('$username','$password','$date','$usertype','$Emailaddress','$name','0')";
          $qr = mysqli_query($con,$sql);
          if($qr){
                move_uploaded_file($from,$to);
                header("location:login.php");
            }else{
                header("location:login.php?error= !...");
            }
              mysqli_close($con);
        }  
    }else{
      header("location:login.php?error=Passwords do not match!");
    }
?>