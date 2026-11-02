<?php 

if(isset($_POST["textarea"]) && !empty($_POST["textarea"])){
    $textarea=$_POST["textarea"];
    session_start();
    include("CtoDB.php");
    $date_time=date("Y-m-d H:i:s");
    $UserId=$_SESSION["IDuser"];
    
    $IDarticle = $_SESSION["IDarticle"];
    $sql = "INSERT INTO `comment`
    (`comment`,`dateANDtime_comment`,`id_user`,`id_article`)
VALUES
    ('$textarea','$date_time','$UserId','$IDarticle')";
     $qr = mysqli_query($con,$sql);
     header("location:article.php"); 
  }else{
    header("location:article.php");
  }


?>

