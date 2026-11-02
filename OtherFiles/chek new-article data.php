<?php
session_start();
$UserId=$_SESSION["IDuser"];
include("CtoDB.php");

$date=date("Y-m-d");

if(isset($_POST["subject_article"]) && !empty($_POST["subject_article"])){
  $subject_article=$_POST["subject_article"];
}else{
  header("location:new-article.php?error=Enter subject article!...");
}
if(isset($_POST["article_text"]) && !empty($_POST["article_text"])){
  $article_text=$_POST["article_text"];
}
if(isset($_POST["fav_language"]) && !empty($_POST["fav_language"])){
  $fav_language=$_POST["fav_language"];
}
if(isset($_FILES["uploadimage"]) && !empty($_FILES["uploadimage"])){
  $file = $_FILES["uploadimage"];
  $name = $file["name"];
 $format  = $file["type"];
}
$adres="File article/";
$from = $file["tmp_name"];
if(($format !== "image/png") || ($format !== "image/jpeg")){
  $to = $adres . $name;
  $sql = "INSERT INTO `article`
(`subject _article`,`article_text`,`article_category`,`user_ID_article`,`file_article`,`Date_of_Release`)
VALUES
('$subject_article','$article_text','$fav_language','$UserId','$name','$date')";
   $qr = mysqli_query($con,$sql);
   if($qr){
           
           $sqlselect="SELECT * FROM `user` WHERE `Id_User`='$UserId'";
           $qrselect=mysqli_query($con,$sqlselect);
           if($qrselect){
              $rselsect=mysqli_fetch_array($qrselect);
              $Number_of_articles = $rselsect["Number_of_articles"]+1;
              $sqlnumber="UPDATE `user` SET `Number_of_articles`='$Number_of_articles' WHERE `Id_User`='$UserId'";
              $qrnumber=mysqli_query($con,$sqlnumber);
              if($qrnumber){
                move_uploaded_file($from,$to);
               header("location:../index.php");
              }else{
                header("location:new-article.php?error=Failed to complete successfully!...");
              }
            }else{
              header("location:new-article.php?error=Failed to complete successfully!...");
            }

          }else{
           header("location:new-article.php?error=Failed to complete successfully!...");
          }
      }else{
        header("location:new-article.php?error=error format image(PNG,JPEG)!...");
      }
      mysqli_close($con);
?>
