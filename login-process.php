<?php 

	session_start();
	include 'database.php';
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);

	$enc = sha1($password);

	//user select
	$users = mysqli_query($con,"SELECT * FROM user WHERE username = '$username' AND password = '$enc'");

	//user available or not
	if(mysqli_num_rows($users)==0){
		$_SESSION['alert'] = 'Please Check the Credentials';

		?>
		 <script type="text/javascript">
		 	window.location.href ='index.php';
		 </script>
		<?php
	}else{
		//User found
		$user = mysqli_fetch_assoc($users);
		$_SESSION['friendslogin'] = true;
		$_SESSION['logUserId'] = $user['id'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['name'] = $user['fullname'];

		$_SESSION['alert'] = 'Login Success!';

		?>
		 <script type="text/javascript">
		 	window.location.href ='index.php';
		 </script>
		<?php
	}

 ?>