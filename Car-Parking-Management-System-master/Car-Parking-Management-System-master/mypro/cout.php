 <?php
session_start();
$host="localhost";
	$dbUsername = "root";
	$dbPassword ="";
	$dbname="carpark";
    $regid=$_SESSION["id"];
    $uid=$_SESSION["uid"];

$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);

        if(isset($_POST['del']))
        
{
 $impact=mysqli_query($conn,"Delete from user where id='".$uid."'");
    if($impact)
    {
        echo"<script>alert('Your information is sucessfully deleted'); window.location='./index.html';</script>";
    }
}
?>


<html>
<head>
    <title> Parking </title>
    <link rel="stylesheet" href="style11.css">
    <body>  
         
    <div class="mp">
            
    <video autoplay muted loop>
        <source src="screen.mp4" type="video/mp4"></div>
    </video> 
        <div class="txt20">
            
   
         <?php 
echo "Hello ".$_SESSION["varname"]." your car is retrieving,HAVE A SAFE JOURNEY:) ";
?>
            
            <form method="POST">
            
              <button type="submit" name="del">DELETE-MY-DATA</button>
                
            </form>
        </div>
    </body>
    <html>
    