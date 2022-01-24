<?php 
    session_start();

$old = $_POST['old'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$id = $_POST['update-passwords'];

 include 'database.php';
 $prev =  mysqli_fetch_assoc(mysqli_query($con,"SELECT password FROM user WHERE id = '$id'"))['password'];
 if(sha1($old) !=  $prev){
 	 $_SESSION['alert']= 'Old Password Mismatched. Update Failed';
 ?>
		 <script type="text/javascript">
		 	alert("Old Password Mismatched. Update Failed");
		 	window.location.href ='profile.php';
		 </script>
		<?php


 }else if($password!= $password2){
 	 $_SESSION['alert']= 'Confirm Password Mismatched. Update Failed';
 ?>
		 <script type="text/javascript">
		 	alert("Confirm Password Mismatched. Update Failed");
		 	window.location.href ='profile.php';
		 </script>
		<?php
 }

 else{
 	$enc = sha1($password);
	 mysqli_query($con,"UPDATE user SET password = '$enc'
	 									WHERE id = '$id'



	 	");

	  $_SESSION['alert']= 'Password Updated';
 ?>
		 <script type="text/javascript">
		 	alert("Password Updated");
		 	window.location.href ='profile.php';
		 </script>
		<?php
 }



 ?>