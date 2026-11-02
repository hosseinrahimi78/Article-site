<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>weblog</title>
    <link rel="stylesheet" href="../Css/index.css">
    <link rel="icon" type="image/png" href="../Icons/blog(3).png ">
</head>
<body>
    <section  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300" class="header">
        <div class="container">
            <div class="header-content">
                <div class="main-nav">
                    <a class="logo" href="../index.php">
                        <img src="../Icons/blog(1).png" alt="">
                        <h1>WEBLOG</h1>
                    </a>
                    <ul>
                        <li>
                            <a href="../index.php">HOME</a>
                        </li>
                        <li class="dropdown page-on">ARTICLE
                            <div class="dropdown_items">
                                <div class="dropdown_item"><a href="Technology.php">Technology</a></div>
                                <div class="line-bottom"></div>
                                <div class="dropdown_item"><a href="Religious.php">Religious </a></div>
                                <div class="line-bottom"></div>
                                <div class="dropdown_item"><a href="historical.php">historical</a></div>
                                <div class="line-bottom"></div>
                                <div class="dropdown_item"><a href="Political.php">Political </a></div>
                                <div class="line-bottom"></div>
                                <div class="dropdown_item"><a href="etc.php">etc</a></div>
                            </div> 
                        </li>
                        <li>
                            <a href="AboutUs.php">ABOUT US</a>
                        </li>
                        <li>
                            <a href="ContactUs.php">CONTACT US</a>
                        </li>
                    </ul>
                </div>
                <?php
                 include('CtoDB.php');
                  session_start();
                  if(isset($_SESSION['login']) && $_SESSION['login'] == true){
                    echo'<a href="Logout.php"><button class="button-login">Log Out</button></a>';
                  }else{
                    echo'<a href="login.php"><button class="button-login">Login</button></a>';
                  }
                ?>
            </div>
        </div>
    </section>
    <section class="main">
    <?php
        if(isset($_SESSION['login']) && $_SESSION['login'] == true){
         $IDuser=$_SESSION['IDuser'];
         $sql="SELECT * FROM `User` WHERE `Id_User` = $IDuser";
         $qr=mysqli_query($con,$sql);
         if(mysqli_num_rows($qr)>0){
           $r=mysqli_fetch_array($qr);
           if($r["address_image"]!=''){
             
        echo '<div data-aos="fade-right" class="main_information">';
            echo '<div class="user">';
                echo '<div class="user_photo">';
                echo '<img user_photo--img" src="apload image file/'.$r["address_image"].'" alt="">';
                    
                              }else{
                                // echo ' <img user_photo--img" src="../Icons/person.png" alt="">';
                              }
                           }else{
                            // echo ' <img user_photo--img" src="../Icons/person.png" alt="">';
                           }
                        }else{
                            // echo ' <img user_photo--img" src="../Icons/person.png" alt="">';
                        }
                        ?>
                    </div>
                <?php

                     if(isset($_SESSION['login']) && $_SESSION['login'] == true){
                          if($r["User_type"]=="writer"){
                            echo'
                            <table >
                                <tr class="text-style informatin_name">
                                    <th>User name:</th>
                                    <td>'.$r["Username"].'</td>
                                </tr>
                                <tr class="text-style informatin_type">
                                    <th>User type: </th>
                                    <td>'.$r["User_type"].'</td>
                                </tr>
                                <tr class="text-style informatin_membership">
                                    <th>Date of membership: </th>
                                    <td>'.$r["Date_of_membership"].'</td>
                                </tr>
                                <tr class="text-style informatin_number">
                                    <th> Number of articles: </th>
                                    <td> '.$r["Number_of_articles"].'</td>
                                </tr>
                            </table>
                            ';
                            echo'<div class="user_new">
                            <a href="new-article.php"><button class="user_new--btn">New Article</button></a>
                          </div>';
                          }else{
                            echo'
                            <table>
                                <tr class="text-style informatin_name">
                                    <th>User name:</th>
                                    <td>'.$r["Username"].'</td>
                                </tr>
                                <tr class="text-style informatin_type">
                                    <th>User type: </th>
                                    <td>'.$r["User_type"].'</td>
                                </tr>
                                <tr class="text-style informatin_membership">
                                    <th>Date of membership: </th>
                                    <td>'.$r["Date_of_membership"].'</td>
                                </tr>
                            </table>
                            ';
                          }
                        }
                ?>
            </div>
        </div>
        <div class="main_articles">
            <?php
                $sql="SELECT * FROM `article` WHERE `article_category` = 'etc'";
                $qr=mysqli_query($con,$sql);
                if($qr){
                    while($r=mysqli_fetch_array($qr)){
                        $sqlyser='SELECT * FROM `user` WHERE `Id_User`= '.$r["user_ID_article"].'';
                        $qruser=mysqli_query($con,$sqlyser);
                        if($qruser){
                            $ruser=mysqli_fetch_array($qruser);
                            echo' <a data-aos="fade-right" class="link-article" href="article.php?id='.$r["id_article"].'">
                            <div class="article">';
                            if($r["file_article"]!=''){
                                    echo'<div class="article_photo">
                                    <img class="article_image--img" src="File article/'.$r["file_article"].'" alt="">
                                    </div>';
                                }else{
                                    echo'<div class="article_photo">
                                    <img class="article_image--img" src="../Icons/icons8-img-100.png" alt="">
                                    </div>';
                                }
                                echo'<pre class="article_sbject"><b> Subject:</b>'.$r["subject _article"].'</pre>
                                <div class="summery_dot">
                                    <p class="article_summary"><b>Summery:</b> '.$r["article_text"].'.</p>
                                    <p class="dot3">...</p>
                                </div>
                                <div class="article_Date">
                                    <p class="Date-of-Release"><b>Date of Release: </b>'.$r["Date_of_Release"].' </p>
                                </div>
                                <pre class="article_writer"><b>the Writer: </b> '.$ruser["Username"].'</pre>
                            </div>
                           </a>';
                        }
                    }
                }
            ?>

        </div>
    </section>
    <section class="footer">
        <div class="footer_logo">
            <a class="logo" href="#" class="icon">
                <img class="logo_footer" src="../Icons/blog(1).png" alt="">
                <h1>WEBLOG</h1>
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