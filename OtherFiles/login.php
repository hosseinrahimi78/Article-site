

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link rel="stylesheet" href="../Css/login.css" />
    <link rel="icon" type="image/png" href="../Icons/blog(3).png ">
  </head>
  <body>
    <section class="wrapper">
      <div class="form signup">
        <header>Sign In</header>
        <form action="chek sing in data.php" method="post">
          <input type="text" placeholder="Email address" required name="email"/>
          <input type="password" placeholder="Password" required name="password"/>
          <!-- <a class="text-fp" href="#">Forgot password?</a> -->
          <br>
          <input  type="submit" value="Sign In" />
        </form>
        <?php

          if(isset($_GET["error"])){
            echo ' <div class="error">
            '.$_GET["error"].'
            </div>';
          }
  
        ?>
      </div>
      <div class="form login">
        <header class="name-header">Sign Up</header>
        <form class="form-signUp" action="chek Sign Up data.php" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="User name" required name="username"/>
            <input type="email" placeholder="Email address" required name="Emailaddress"/>
            <input type="password" placeholder="Password" required name="password" />
            <input type="password" placeholder="Confirm Password" required name="repassword"/>
            <input type="file" name="uploadimage" >
            <div class="style-checkbox">
              <pre>Do you want to be an writer user?      </pre>
              <input type="checkbox" value="writer" name="usertype" id="checkbox">
            </div>
            <input type="submit" value="Sign Up" />
        </form>
      </div>
      <script>
        const wrapper = document.querySelector(".wrapper"),
          signupHeader = document.querySelector(".signup header"),
          loginHeader = document.querySelector(".login header");

        loginHeader.addEventListener("click", () => {
          wrapper.classList.add("active");
        });
        signupHeader.addEventListener("click", () => {
          wrapper.classList.remove("active");
        });
      </script>
    </section>
    <section class="footer">

        <div class="footer_logo">
            <a class="logo" href="../index.php" class="icon">
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