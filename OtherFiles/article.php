<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/article.css">
    <link rel="icon" type="image/png" href="../Icons/blog(3).png ">
</head>
<body>
    <section class="header">
        <div class="container">
            <div class="header-content">
                <div class="main-nav">
                    <a class="logo" href="../index.php" >
                        <img src="../Icons/blog(1).png" alt="">
                        <h1>WATARI</h1>
                    </a> 
                </div>
            </div>
        </div>
    </section>
    <section class="main">  
        <?php
            session_start();
           include("CtoDB.php");
           if(isset($_GET["id"]) && !empty($_GET["id"])){
             $ID=$_GET["id"];
             $_SESSION["IDarticle"] = $ID;
            }else{
                $ID = $_SESSION["IDarticle"];
            }
             $sql1="SELECT * FROM `article` WHERE `id_article` = '$ID'";
             $qr=mysqli_query($con,$sql1);
             if($qr){
                $r=mysqli_fetch_array($qr);
                echo'<div class="main_article-image">
                        <img class="main_article--img" src="File article/'.$r["file_article"].'" alt="">
                </div>';
                echo'
                <div class="main_contact">
                    <h1>'.$r["subject _article"].'</h1>
                    <div class="main_article-text">
                    <p>'.$r["article_text"].' </p>
                    </div>
                </div>
              ';
              $idwritr=$r["user_ID_article"];
              $sqluser="SELECT * FROM `user` WHERE `Id_User` = '$idwritr'";
              $qruser=mysqli_query($con,$sqluser);
              if($qruser){
                $ruser=mysqli_fetch_array($qruser);
                 echo' <div class="informatin">';
                 if($ruser["address_image"]!=''){
                    echo'<div class="information_photo">
                    <img class="user_photo--img" src="apload image file/'.$ruser["address_image"].'" alt="hossein">
                </div>';
                }else{
                    echo'<div class="information_photo">
                    <img class="user_photo--img" src="../imag/user_image_1.jpg" alt="hossein">
                    </div>
                 </div>';
                }
                    echo '<div class="informatin_text">

                     <table calss="table_information">
                            <tr class="text-style informatin_name">
                                <th>User name:</th>
                                <td>'.$ruser["Username"].'</td>
                            </tr>
                            <tr class="text-style informatin_type">
                                <th>User type: </th>
                                <td>'.$ruser["User_type"].'</td>
                            </tr>
                            <tr class="text-style informatin_membership">
                                <th>Date of membership: </th>
                                <td>'.$ruser["Date_of_membership"].'</td>
                            </tr>
                            <tr class="text-style informatin_number">
                                <th> Number of articles: </th>
                                <td> '.$ruser["Number_of_articles"].'</td>
                            </tr>
                     </table>
                    </div>
                </div>';
                    
              }
             }
        
        ?>
        <div class="comments">
            <div class="comments-header">
                <img class="comments-header_img" src="../Icons/icons8-comments-48.png" alt="comment">
                <h2 class="C-header-text">Comments</h2>
            </div>
           
                
                    
                        <?php
                        
                        if(isset($_SESSION['login']) && $_SESSION['login'] == true){
                            
                            $IDuser=$_SESSION['IDuser'];
                            $sql2="SELECT * FROM `User` WHERE `Id_User` = $IDuser";
                            $qr=mysqli_query($con,$sql2);
                            if(mysqli_num_rows($qr)>0){
                            $r=mysqli_fetch_array($qr);
                            if($r["User_type"]=="user"){
                                if($r["address_image"]!=''){
                                    echo ' <div class="New-comment">
                                    <div class="comments_new-user">
                                    <div class="new-user_profile">
                                    <img class="new-user_profile--img" src="apload image file/'.$r["address_image"].'" alt="">
                                    </div>
                                    <div class="new-user_neme">
                                        <h3 class="new-user_neme--h3">'.$r["Username"].'</h3>
                                        <p class="new-user_neme--p">New comment</p>  
                                    </div>
                                    </div>
                                    <div class="comments_textarea">
                                        <form action="check new-comment.php" method="post">
                                            <textarea name="textarea" class="textarea_newComment" placeholder="Write your comment" name="" id=""></textarea>
                                            <input  class="textarea-bottem" type="submit" value="Send">
                                        </form> 
                                    </div>
                                    </div>';
                                }else{
                                    echo ' <div class="new-user_profile">
                                    <img class="new-user_profile--img" src="../Icons/person.png" alt="">
                                    </div>
                                    <div class="new-user_neme">
                                        <h3 class="new-user_neme--h3">'.$r["Username"].'</h3>
                                        <p class="new-user_neme--p">New comment</p>  
                                    </div>
                                    </div>
                                    <div class="comments_textarea">
                                        <form action="check new-comment.php" method="post">
                                            <textarea name="textarea" class="textarea_newComment" placeholder="Write your comment " name="" id=""></textarea>
                                            <input  class="textarea-bottem" type="submit" value="Send">
                                        </form> 
                                    </div>
                                </div>';
                                }
                            }else{
                                echo '';
                            }
                            }else{
                                echo'hhh';
                            }
                         }
                        ?>
                            


                
                <?php
                $IDa =$_SESSION["IDarticle"];
                $sql="SELECT * FROM `comment` WHERE `id_article` = $IDa";
                $qr=mysqli_query($con,$sql);
                if(mysqli_num_rows($qr)>0){
                    while($r=mysqli_fetch_array($qr)){
                        $sqluser='SELECT * FROM `user` WHERE `Id_User`= '.$r["id_user"].'';
                        $qruser=mysqli_query($con,$sqluser);
                        if($qruser){ 
                            $ruser=mysqli_fetch_array($qruser);
                    echo'<div class="comments_all">
                    <div class="comments_all--profile">
                    <div class="comments_all--profile_image">
                        <img class="comments_all--profile_img" src="apload image file/'.$ruser["address_image"].'" alt="">
                    </div>
                    <div class="comments_all--profile_content">
                        <div class="profile_content--name">'.$ruser["Username"].'</div>
                        <div class="profile_content--date">'.$r["dateANDtime_comment"].'</div>
                    </div>
                    </div>
                    <hr>
                    <div class="all_comments--comment">
                        <p>'.$r["comment"].'</p>
                    </div>  
                    </div>  ';}
                        }
                    }
                
                ?>
            
                
            
           
        </div>
            
    </section>
    <section class="footer">
        <div class="footer_logo">
            <a class="logo" href="#" class="icon">
                <img class="logo_footer" src="../Icons/blog(1).png" alt="">
                <h1>WATARI</h1>
            </a> 
            
            <p class="footer_copyR">All Rights Reserved.</p>
        </div>
        <div class="footer_developer">
            <h3 class="footer--h3">Developer:</h3>
            <p><b>Name:</b> Hossein Rahimi</p>
            <P><b>Email:</b> hosseinrahimi@gmail.com</P>
            <P><b>Phone number:</b> 09170656278</P>
        </div>
        <div class="about-us">
            <h3 class="footer--h3">About Us</h3>
            <p>This site is an academic project for a web-based programming course that focuses on the php language.</p>
            <p>And this site is about writing articles and uploading them on the site.</p>
        </div>
    </section>
</body>
</html>
