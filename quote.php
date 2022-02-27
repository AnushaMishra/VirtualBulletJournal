  <?php 

    $username = empty($_COOKIE['username']) ? '' : $_COOKIE['username'];
    if(!$username){
        header("Location: loginpage.php");
        exit;
    }
    
header("Cache-Control: no-store, no-cache, must-revalidate, pre-check=0, post-check=0, max-age=0, s-maxage=0");
    header("Pragma:no-cache");
    header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Journal Quote</title>
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="basestyle.css">
        
        <style>
            body{
                text-align: center;
                padding-top: 50px;
                padding-bottom: 0;
                font-family: sans-serif;
                /* beginning of code based on w3schools: https://www.w3schools.com/howto/howto_css_full_page.asp*/
                /*
                 background-image: url("chinesefood.jpg");

                height: 100%;

                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;*/
                /* end of code based on w3schools: https://www.w3schools.com/howto/howto_css_full_page.asp*/
                background-color: rgb(255, 196,0)
            }
            #container{
                padding-left: 0;
                width: 620px;
                height: 350px;
                margin: 10px auto;
                margin-top: 100px;
                padding: 25px;
                padding-top: 100px;
                padding-bottom: 90px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                background-color: floralwhite;
                font-family: sans-serif;
                color: gray;
                position: relative;
            }
            input{
                background-color: papayawhip;
                padding: 12px;
                width: 20%;
                margin: 10px auto;
                margin-bottom: 250px;
            }
            #fortune{
                overflow: auto;
                white-space: nowrap;
                width: 280px;
                height: 40px;
                cursor: all-scroll;
                position: absolute;
                left: 210px;
                top: 230px;
            }
            img{
                position: absolute;
                margin: 10px auto;
                margin-top: 60px;
                width: 550px;
                left: 50px;
            }
            h1{
                color: floralwhite;
                text-shadow: 5px 5px 5px black;
            }
        </style>
        <script>
        $( function() {
            $("nav").load("navbar.html");
        } );
  </script>
    </head>
    <body onload="loadcontent()">
        <nav class="clearfix"></nav>
        <h1>Start Your Day With Some Wise Words</h1>
        <div id="container">
            <!--fortune cookie image from: https://www.pngaaa.com/detail/998046-->
           <img src="cookie.png" alt="fortunecookie">
            <div id="fortune"></div>
        </div>
        <input type="button" value="Get a Kanye Quote" class="button" onclick="newquote()">
        <input type="button" value="Get a Fortune" class="button" onclick="newadvice()">
        <br>
        <?php
            if($username){
                echo "<div >"."Logged in as: " . $username . "</div>\n";
                echo "<br>";
            }
        ?>
        <a href="loginpage.php">Log out?</a>
        <a href='https://www.freepik.com/photos/background'>Background photo created by freepik - www.freepik.com</a>
        
        <script>
            var quoteobject;
            var adviceobject;
            //advice slip api from: https://api.adviceslip.com/
            var adviceurl = "https://api.adviceslip.com/advice";
            //kanye quote api from: https://kanye.rest/
            var quoteurl = "https://api.kanye.rest";
            
            function loadcontent(){
                loadquote();
                loadadvice();
            }
        function loadquote(){
            var quotereq = new XMLHttpRequest();
            var url = "https://api.kanye.rest";
            quotereq.onload = function(){
                if(quotereq.status ==200){
                quoteobject = quotereq.responseText;
                quoteobject = JSON.parse(quoteobject);
                }
            };
            quotereq.open("GET", url);
            quotereq.send();
        }
            
            function loadadvice(){
            var quotereq = new XMLHttpRequest();
            var url = "https://api.adviceslip.com/advice";
            quotereq.onload = function(){
                if(quotereq.status ==200){
                adviceobject = quotereq.responseText;
                adviceobject = JSON.parse(adviceobject);
                }
            };
            quotereq.open("GET", url);
            quotereq.send();
        }
            
            function displayquote(){
                var displaydiv = document.getElementById("fortune");
                displaydiv.innerHTML = quoteobject.quote;
            }
            function displayadvice(){
                var displaydiv = document.getElementById("fortune");
                displaydiv.innerHTML = adviceobject.slip.advice;
            }
            function newquote(){
                loadquote();
                displayquote();
            }
            function newadvice(){
                loadadvice();
                displayadvice();
            }
        </script>
    </body>
</html>
