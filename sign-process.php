
<?php 
	session_start();
	include 'database.php';
	$name = $_POST['fname'].' '.$_POST['lname'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$enc = sha1($password);

	
	$ext = findexts ($_FILES['image']['name']) ; 
	$ran = time();

    $ran2 = $ran.".";   

    //$target = $target . $ran2.$ext; 

	//store image
		$filename =  $ran2.$ext;
	    $tempname = $_FILES["image"]["tmp_name"];    
	    $folder = "images/users/".$filename;
		move_uploaded_file($tempname, $folder);

	//check existing users
	if(mysqli_num_rows(mysqli_query($con,"SELECT id FROM user WHERE username = '$username' OR email ='$email' "))==0){
		if(mysqli_query($con,"INSERT INTO user (fullname,address,email,username,password,image) VALUES ('$name','$address','$email','$username','$enc','$filename')")){
		$_SESSION['alert'] = 'Registration Success';

		?>
		 <script type="text/javascript">
		 	window.location.href ='index.php';
		 </script>
		<?php


		}else{

		$_SESSION['alert'] = 'Something Went Wrong';
		?>
		 <script type="text/javascript">
		 	window.location.href ='registration.php';
		 </script>
		<?php
		}
	}else{
		?>
		 <script type="text/javascript">
		 	alert("Username/Email Already Exist. Registration Failed!");
		 	window.location.href ='registration.php';
		 </script>
		<?php
	}

	function findexts ($filename) 
     { 
         $filename = strtolower($filename) ; 
         $exts = explode("[/\\.]", $filename) ; 
         $n = count($exts)-1; 
         $exts = $exts[$n]; 
         return $exts; 
     } 

 ?>
