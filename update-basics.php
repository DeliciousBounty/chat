<?php 
    session_start();

$name = $_POST['fname'].' '.$_POST['lname'];
$address = $_POST['address'];
$email = $_POST['email'];
$username = $_POST['username'];
$id = $_POST['update-basics'];

 include 'database.php';

 mysqli_query($con,"UPDATE user SET fullname = '$name',
 									address = '$address',
 									email = '$email',
 									username = '$username' WHERE id = '$id'



 	");
 $_SESSION['alert']= 'Details Updated!';
 ?>
		 <script type="text/javascript">
		 	alert("Basic Details Updated!");
		 	window.location.href ='profile.php';
		 </script>
		<?php


 ?>