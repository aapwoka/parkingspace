 <?php
session_start();
?>
<html>
<head>
    <title> Parking </title>
    <link rel="stylesheet" href="style2.css">
    <body>  
         
    <div class="mp">
            
    <video autoplay muted loop>
        <source src="parking.mp4.mp4" type="video/mp4"></div>
    </video> 
        <div class="txt20">
            
   
         <?php 
echo "Hello " . $_SESSION["varname"] .  " your car is paking wait for few seconds. :D ";
            
?>
            
           <button type="button" class="btn btn1" onclick="window.location.href ='index.html'; ">ENTER</button>

        </div>
    </body>
    <html>
    