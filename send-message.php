<?php 
    session_start();


 include 'database.php';
 
$message = mysqli_real_escape_string($con,$_POST['message']);
$sent = mysqli_real_escape_string($con,$_POST['sent']);
$receive = mysqli_real_escape_string($con,$_POST['receive']);

mysqli_query($con,"INSERT INTO messages (sent,receive,message) VALUES ('$sent','$receive','$message') ");

//
	  	 ?>
		 <script type="text/javascript">
		 	window.location.href ='chat.php?to=<?php echo $receive; ?>#sent';
		 </script>
		<?php



 ?>