<?php 

	session_start();
	include 'database.php';

	 mysqli_query($con,"DELETE FROM feed WHERE id = '{$_GET['id']}' ");

	

 ?>

		 <script type="text/javascript">
		 	alert('Image Deleted!');
		 	window.location.href ='feed.php';
		 </script>
	