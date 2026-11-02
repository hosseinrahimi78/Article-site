<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Article</title>
    <link rel="icon" type="image/png" href="../Icons/blog(3).png ">
    <link rel="stylesheet" href="../Css/new-article.css">
</head>
<body>
    <section class="main">
       <?php
            if(isset($_GET["error"])){
            echo ' <div class="error">
            '.$_GET["error"].'
            </div>';
            }
            if(isset($_GET["access"])){
            echo ' <div class="access">
            '.$_GET["access"].'
            </div>';
            }
        ?>
        <form action="chek new-article data.php" method="post" enctype="multipart/form-data">
            <div class="style_input-image">
                <P>Upload your paper photo:</P>
                <input   type='file' class="input-image" name="uploadimage" >
            </div>
            <div class="style_input-text">
                <p>What is the subject of this article?</p>
                <input type="text" class="input-text" placeholder="Subject" name="subject_article">
            </div>
            <div class="style_textarea">
                <p>Write the text of your article.</p>
                <textarea name="article_text"  id="" placeholder="Article text"></textarea>
            </div>
            <div class="style-radioButton">
                <P class="text_radioButtons">Which category does ti belong do?</P>
                <div class="radioButtons">
                    <div>
                        <label for="Technology">Technology</label> 
                        <input type="radio" id="Technology" name="fav_language" value="Technology" >
                    </div>
                     <div >
                        <label for="Religious">Religious</label>
                        <input type="radio" id="Religious" name="fav_language" value="Religious">
                     </div>
                     <div > 
                        <label for="historical">historical</label>
                        <input type="radio" id="historical" name="fav_language" value="historical">
                    </div>
                     <div >
                        <label for="Political">Political</label>
                        <input type="radio" id="Political" name="fav_language" value="Political">
                     </div>  
                     <div >
                        <label for="etc">etc</label>
                        <input type="radio" id="etc" name="fav_language" value="etc">
                     </div>  
                </div>
            </div>
            <input type="submit" value="Publishing Article" class="input_submit" >
        </form>
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