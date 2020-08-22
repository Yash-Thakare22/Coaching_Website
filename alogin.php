	<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){ 
	include_once 'db.php';
	$username= $_POST['uname'];
	$password= $_POST['pwd'];

	if(empty($username) || empty($password)){
		echo "Empty credentials!";
	}

//to prevent injection
//$username = stripcslashes($usernam4444444444444444444444444444444444444444444444444444444444444444444444444444444e);
//$password = stripcslashes($password);



//query
$result = mysqli_query($conn,"SELECT * from admin where aname = '$username' and password = '$password'");

$resultcheck=mysqli_num_rows($result);
		  if($resultcheck=1){
		  	
		  	echo'<script >alert("succefully loged in")</script>';
		  	header("Location:wd.html");
		   }
		   else
		   {
		   	echo'<script >alert("Invalid Username")</script>';
		   	header("Location:alogin.html");
		   }
		   /*
		  	if($row =mysqli_fetch_assoc($result)){
		  		//dehashing password
		  		//$hashedpwdcheck=password_verify($password,$row['password']);
		  		if($username == row['aname'] && $password == row['password'])
		  		{
		  			header("Location:wd.html");
		  			
		  		}
		  		else{
		  			echo'<script>alert("Please enter correct password.")</script>';
				exit();
		  			
		  		}
		  	}*/
		  }
	
	else{
		header("Location: ../login.php?login=error3");
		exit();
}
?>