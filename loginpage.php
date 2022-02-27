  <?php 

header("Cache-Control: no-store, no-cache, must-revalidate, pre-check=0, post-check=0, max-age=0, s-maxage=0");
    header("Pragma:no-cache");
    header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log in</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.11.4.custom/jquery-ui.min.css">
        <link rel="stylesheet" href="basestyle.css">
                <style>
            #container{
                width: 600px;
                height: 550px;
                margin: auto;
                margin-top: 100px;
                padding: 25px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                text-align: center;
                background-color: floralwhite;
                font-family: sans-serif;
                color: gray;
            }
            input{
                text-align: center;
                padding: 12px;
                margin: 10px auto;
                width: 450px; 
            }
            button{
                background-color: papayawhip;
                padding: 12px;
                width: 20%;
            }
            label{
                display: block;
            }
            form{
                margin: 10px auto;
            }
            h1{
                font-size: 50px;
            }
            .error{
                color: red;
            }
            #logout{
                background-color: papayawhip;
                width: 20%;
            }
        </style>
    <script src="jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
        
          <script>
  $( function() {
      $("nav").load("navbar.html");
  } );
  </script>

    </head>
    <body>
        <nav class="clearfix"></nav>
     <div id="container">
         <h1>Log In</h1>
         <br>
         <?php
            if($error){
                print "<div class=\"error\"> $error </div>\n";
                echo "<br>";
            }
         ?>
         <form action="login.php" method="post">
             <input type="hidden" name="action" value="do_login">
            <label for="user"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="user" required>
             <br>
             <br>
            <label for="pass"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pass" required>
             <br>
             <br>
            <button type="submit">Log in</button>
        </form>
         <form action="login.php" method="post">
         <input type="hidden" name="action" value="do_logout">
         <button type="submit">Log Out</button>
        </form>
    </div>  
    </body>
</html>