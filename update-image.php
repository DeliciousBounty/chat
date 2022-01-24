<?php 
    session_start();

$id = $_POST['update-image'];

 include 'database.php';
 
//store image
		$filename = $_FILES["image"]["name"];
	    $tempname = $_FILES["image"]["tmp_name"];

	        $folder = "images/users/".$filename;

	    //inserting query
	    $sql = "UPDATE user SET image = '$filename' WHERE id = '$id'";

	    // Execute query
	    mysqli_query($con, $sql);
	      
	    // Now let's move the uploaded image into the folder: image
	    if (move_uploaded_file($tempname, $folder))  {
	       $_SESSION['alert'] =  "Album uploaded successfully";
	    }else{
	        $_SESSION['alert'] =  "Failed to upload Album";
	  	}
	  	 ?>
		 <script type="text/javascript">
		 	window.location.href ='profile.php';
		 </script>
		<?php



 ?>