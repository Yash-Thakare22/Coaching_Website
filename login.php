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
$username = stripcslashes($username);
$password = stripcslashes($password);



//query
$result = mysqli_query($conn,"SELECT * from users where username='$username' and password ='$password'");

$resultcheck=mysqli_num_rows($result);
		  if($resultcheck<1){
		  	echo'<script >alert("Invalid Username and Password")</script>';
		    header("Location:wd.html");
		  }else{
		  	if($row =mysqli_fetch_assoc($result)){
		  		//dehashing password
		  		$hashedpwdcheck=password_verify($password,$row['user_pwd']);
		  		if($hashedpwdcheck== false)
		  		{
		  			echo'<script>alert("Please enter correct password.")</script>';
				exit();
		  		}
		  		elseif($hashedpwdcheck == true){
		  			header("Location:wd.html");
		  			
		  		}
		  	}
		  }
	}
	else{
		header("Location: ../login.php?login=error3");
		exit();
}
?>