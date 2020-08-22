<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// REGISTER USER
if (isset($_POST['reg_user'])) {
 include_once 'db.php';
  // receive all input values from the form
  $studname = mysqli_real_escape_string($db, $_POST['sname']);
  $fathname = mysqli_real_escape_string($db, $_POST['fname']);
  $address = mysqli_real_escape_string($db, $_POST['Add']);
  $gender = mysqli_real_escape_string($db, $_POST['gen']);
  $course = mysqli_real_escape_string($db, $_POST['cou']);
  $program = mysqli_real_escape_string($db, $_POST['ip']);
  $smobile = mysqli_real_escape_string($db, $_POST['mob']);
  $fmobile = mysqli_real_escape_string($db, $_POST['fmob']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $username = mysqli_real_escape_string($db, $_POST['uname']);
  $password_1 = mysqli_real_escape_string($db, $_POST['pwd']);
  $password_2 = mysqli_real_escape_string($db, $_POST['cpwd']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($studname)) { array_push($errors, "Student name is required"); }
  if (empty($fathname)) { array_push($errors, "Father name is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($smobile)) { array_push($errors, "Student Mobile no is required"); }
  if (empty($fmobile)) { array_push($errors, "Father Mobile no is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($password_2)) { array_push($errors, "Confirm Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  
  $query1 = "INSERT INTO admission (stud_name ,fath_name ,address ,gender ,course ,program ,stud_mob ,fath_mob ,email) 
          VALUES('$studname', '$fathname', '$address' ,'$gender' ,'$course' ,'$program' ,'$smobile' ,'$fmobile' ,'$email' )";
             mysqli_query($db, $query1);

 $query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location:wd.html ');
}
?>