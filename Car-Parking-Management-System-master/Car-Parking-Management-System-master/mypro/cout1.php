<?php
	$host="localhost";
	$dbUsername = "root";
	$dbPassword ="";
	$dbname="carpark";
	
	$name=$_POST['input1'];
    $regid=$_POST['input2'];
    session_start();


	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());

	}
	else{
        
          $time=date("h:i:s");
        $date=date("Y-m-d");
        $time1=date("00:00:00");
        $date1=date("0000-00-00");
    

         $SELECT =mysqli_query ($conn,"SELECT fname,prikey From user where fname = '".$name."' and prikey='".$regid."'");
            $SELECT =mysqli_query ($conn,"SELECT id From user where prikey='".$regid."'");
            $res=mysqli_fetch_row($SELECT);
            $uid=implode($res);
        if($SELECT->num_rows>0)
        {
              $INSERT1 = "INSERT Into time(un,enttime,entdate,exitime,exidate) values(?,?,?,?,?)";

      $stmt=$conn->prepare($INSERT1);
			$stmt->bind_param("issss",$uid,$time1,$date1,$time,$date);
			$stmt->execute();
                    $stmt->close();
            $_SESSION["varname"] = $name;
             $_SESSION["id"] = $regid;
            $_SESSION["uid"] =$uid;
            
			header("Location: cout.php");
			
		}
        else{
            echo "The Name or Register-Id did not match";
        }
    }
        
		$conn->close();
		die();

     
	

?>