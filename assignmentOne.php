<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Ravis Supermarket</title>
    

   <link rel="stylesheet" href= "style.css">
	<link href="jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">

  <meta name="description" content="">
  <meta name="author" content="Anonymous">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="stylesheet" href="jQueryTheme.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="dynamicTable.js"></script>
    <script src=jQueryTheme.js></script>

    
    
   
<script> 
    
    
$(document).ready(function(){
$(".sidebar").hide();
    var x=0;
    $("#slideLeft").click(function(){
        if(x%2==0){
        $("#slideLeft").attr('src',"slideRight.png");
        }
        else{
                    $("#slideLeft").attr('src',"slideLeft.png");
        }
        $(".sidebar").animate({
            width: 'toggle'
        });
        x++;
    });
});
</script> 
    <script>
        
$(document).ready(function(){
    var x= 1;
    $("#leg1").click(function(){
        x=x+1;
        if(x%2==0){
        $("#sliderMenu1").slideUp();
        }
        else{
                $("#sliderMenu1").slideDown();
        }
    });
   
});
</script>
   
<script src="jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script src="jquery-ui-1.11.4.custom/jquery-ui.js"></script>

<script>
$(document).ready(function(){
    var x= 1;
    $("#leg2").click(function(){
        x=x+1;
        if(x%2==0){
        $("#sliderMenu2").slideUp();
        }
        else{
                $("#sliderMenu2").slideDown();
        }
    });
   
});
</script>
    
    
    
    
</head><header onload="" class="masthead" role="banner">
<img src="RavisSupermarket.png" class="Logo">
   <a href="loginValidation.php"><img src="sout.png" height="50px" width="120px" style= "float:right; margin-top:9px"></a>
        <?php
print  "<p style =\"color:blue;float:right;font-weight:bolder;font-size:200%\">Welcome, $_SESSION[user]</p>";
?>
 



        <div id="navigation">
        <nav id="tabs"role="navigation">
            <ul class="nav-main">
                <li><a href="homePage.php">Home</a></li>
                <li><a href="QueryDatabase.html">Query Database</a></li>
                <li><a href="drawing.html">Shopping Cart</a></li>
            </ul>
          
        </nav>
  </div>
    </header>
<footer>
<div id="myFooter">
         <p>&copy; Copyright  by Anonymous</p>
  <nav>
    <p>Home</p>
      <p>Contact</p>
    </nav>   
    </div>    
</footer>
</html>
