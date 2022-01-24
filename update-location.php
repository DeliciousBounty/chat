<?php 
    session_start();

$id = $_POST['update-location'];
$lat = $_POST['lat'];
$long = $_POST['long'];


 include 'database.php';
 

	    //inserting query
	    $sql = "UPDATE user SET longitude = '$long', latitude = '$lat' WHERE id = '$id'";

	    // Execute query
	    mysqli_query($con, $sql);
	      
	  
	  	 ?>
		 <script type="text/javascript">
		 	alert('Location Updated!');
		 	window.location.href ='profile.php';
		 </script>
		<?php



 ?>