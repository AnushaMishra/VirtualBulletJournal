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
        <title>Bullet Journal</title>
 
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.theme.css">
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.theme.min.css">
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.structure.min.css">
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.structure.css">
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.css">
        <link rel="stylesheet" href="basestyle.css">
        <style>
            .sticker{
                font-size: 100px;
            }
            #leftpage, #rightpage{
                position: relative;
                z-index: 0;
                margin-top: 100px;
            }
            #leftpage .sticker, #leftpage p, #rightpage p, #rightpage .sticker{
                position: absolute;
            }
            input, select{
                background-color: ghostwhite;
                padding: 5px;
                margin: 10px auto;
                margin-top: 5px;
            }
            textarea{
                margin-top: 0;
            }
            select{
                margin-top: 10px;
            }
            label{
                margin: 10px auto;
                font-size: 15px;
                font-family: sans-serif;
            }
            .draggable{
                cursor: grab;
            }
            .postit{
                width: 250px;
                height: 250px;
                background-color: rgb(255, 255, 153);
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                float: left;
                cursor: grab;
                margin: 10px auto;
                margin-left: 30px;
                margin-top: 15px;
            }
            #postitcolor{
                width: 270px;
                margin-top: 90px;
            }
            #textsubmit{
                background-color: peachpuff;
            }
            #control p{
                color: firebrick;
            }
            
        </style>
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        
          <script>
  $( function() {
      $("nav").load("navbar.html");
     // $( "span" ).draggable();
      var counter = 0;
      var $text = $('#text');
      var $fontsize = $("#fontsize");
      var $fontcolor = $("#fontcolor");
      var $postitcolor = $("#postitcolor");

       $("#textsubmit").click(function(){
                   var textbox = document.createElement("P");
                    $(textbox).addClass("draggable text");
                    $(textbox).html($($text).val());
                    $(textbox).appendTo("#container");
                    $(textbox).css("font-size", $($fontsize).val()+"px");
                    if($($fontcolor).val()!="choose"){
                        $(textbox).css("color", $($fontcolor).val());
                    }
                    $(textbox).css("font-size", $($fontsize).val()+"px");
                    $(textbox).draggable().resizable();
        });
      $("#colorchange").click(function(){

                    if($($postitcolor).val()!="choose"){
                        $(".paper.postit").css("background-color", $($postitcolor).val());
                    }
                  //  $(".paper").draggable().resizable();
        });
            
      $("#control").on('click', '.draggable', function() {
          var element = $(this).clone();
          element.appendTo("#container");
          element.draggable().resizable();
      });
      
      $("#leftpage, #rightpage, #container").on('dblclick', '.draggable', function() {
                   $(this).remove();
        });
      });
               
  </script>
    </head>
    <body>
        <nav class="clearfix"></nav>
     <div id="container">
          <div id="leftpage" class="clearfix droppable">
                <h1 class="draggable">How was your day?</h1>
            </div>
            <div id="rightpage" class="clearfix droppable">
         </div>
    </div> 
         <div id="control" class="clearfix">
             <div id="spawn" class="clearfix">
                 <span class="draggable sticker">&#9786;</span>
                 <span class="draggable sticker"> &#x2639;</span>
                 <span class="draggable sticker">&#128563;</span>
                 <span class="draggable sticker">&#9825;</span>
                 <span class="draggable sticker">&#9789;</span>
                 <span class='draggable sticker'>&#9813;</span>
                 <span class='draggable sticker'>&#9788;</span>
                 <span class="draggable sticker">&#9835;</span>
                 <span class="draggable sticker">&#9834;</span>
                 <span class="draggable sticker">&#9839;</span>
                 <span class="draggable sticker">&#9840;</span>
                 <span class="draggable sticker">&#9880;</span>
                 <span class='draggable sticker'>&#9925;</span>
                 <span class='draggable sticker'>&#9924;</span>
                 <span class='draggable sticker'>&#9889;</span>
                 <span class='draggable sticker'>&#9734;</span>
                 <span class='draggable sticker'>&#9977;</span>
                 <span class='draggable sticker'>&#128511;</span>
                 <span class='draggable sticker'>&#128507;</span>
                 <span class="draggable sticker">&#9749;</span>
                 <span class="draggable sticker">&#127793;</span>
                 <span class="draggable sticker">&#127804;</span>
                 <span class="draggable sticker">&#128167;</span>
             </div>
             <form class="control">
                 <textarea placeholder="Enter text here.. (limited to 500 characters)" rows="10" cols="30" name="text" id="text" maxlength="500"></textarea>
                 
                 <br>
                 
                 <label for="fontsize">Font Size: </label>
                 <input type="number" id="fontsize" name="fontsize"
       min="10" max="100">
                 <input id="textsubmit" type="button" name="textsubmit" value="Create a Text Box">
                 
                 <br>
                 
                <label for="fontcolor">Font Color: </label>
                 <select name="fontcolor" id="fontcolor">
                     <option value="" disabled>Select a Color</option>
                    <option value="gray">Gray</option>
                    <option value="papayawhip">Papaya Whip</option>
                    <option value="blanchedalmond">Blanched Almond</option>
                    <option value="skyblue">Sky Blue</option>
                </select>
                </form>
             
             <div class="postit paper draggable"></div>
             
             <select name="postitcolor" id="postitcolor">
                     <option value="" disabled>Select a Color</option>
                    <option value="gray">Gray</option>
                    <option value="darkseagreen">Dark Sea Green</option>
                    <option value="pink">Pink</option>
                    <option value="skyblue">Sky Blue</option>
                </select>
             <br>
             <input id="colorchange" type="button" name="colorchange" value="Change Post-It Color">
             <p>click to add an element</p>
             <p>double click to remove an element</p>
         </div>
    </body>
</html>
