<?php
	$host="localhost";
	$dbUsername = "root";
	$dbPassword ="";
	$dbname="carpark";
	
	$uname=$_POST['input1'];
$mnum=$_POST['input2'];
$email=$_POST['input3'];
$mg=$_POST['input4'];

    session_start();


	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
	
    if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());

	}
	else{
		$INSERT = "INSERT INTO feedback(name,mnum,email,msg) values(?,?,?,?)";

			$stmt=$conn->prepare($INSERT);
			$stmt->bind_param("ssss",$uname,$mnum,$email,$mg);
			$stmt->execute();
            $stmt->close();   
            
			}
echo"<script>alert('Your information is sucessfully uploaded'); window.location='./index.html';</script>";	//try not showing an alert box
    $conn->close();
    
	

?>