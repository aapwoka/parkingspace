<?php
	$host="localhost";
	$dbUsername = "root";
	$dbPassword ="";
	$dbname="carpark";
	
	$uname=$_POST['Fname'];
	$ulname=$_POST['lname'];
    $ccode=$_POST['ccode'];
$mnum=$_POST['MNum'];
$email=$_POST['email'];
$address=$_POST['address'];
$vname=$_POST['name'];
$vnum=$_POST['vnum'];


    session_start();


	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());

	}
	else{
           $rand=rand(999,999999); 

         $SELECT = "SELECT email From user where email = ? Limit 1 ";
		$INSERT = "INSERT Into user(fname,lname,code,mnum,email,address,vname,vnum,prikey) values(?,?,?,?,?,?,?,?,?)";
        
        $time=date("h:i:s");
        $date=date("Y-m-d");
        $time1=date("00:00:00");
        $date1=date("0000-00-00");
        
        
       
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if($rnum==0){
    
			$stmt->close();
          
            
            $stmt=$conn->prepare($INSERT);
            $stmt->bind_param("ssssssssi",$uname,$ulname,$ccode,$mnum,$email,$address,$vname,$vnum,$rand);
			$stmt->execute();
            $stmt->close();
            
            $INSERT1 = "INSERT Into time(un,enttime,entdate,exitime,exidate) values(?,?,?,?,?)";

             $q1=mysqli_query($conn,"SELECT id From user where email = '".$email."' ");
           $res=mysqli_fetch_row($q1);
          $uid=implode($res);
            
            $stmt=$conn->prepare($INSERT1);
			$stmt->bind_param("issss",$uid,$time,$date,$time1,$date1);
			$stmt->execute();
            
            
            $_SESSION["varname"] = $rand;
            
			header("Location: submit1.php");
			
		}else{
  			echo 'Email Already Exist';		//try not showing an alert box.
		}
        $stmt->close();
		$conn->close();
		die();

    } 
	

?>