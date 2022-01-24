<?php 
    session_start();
	
    include 'database.php';
    if(isset($_GET['add'])){
	    $friend = $_GET['friend'];

	    mysqli_query($con,"INSERT INTO connection (user1,user2) VALUES ('$friend','{$_SESSION['logUserId']}')");
	    ?>
		 <script type="text/javascript">
		 	alert("User Added to the friend list.");
		 	window.location.href ='members.php';
		 </script>
		<?php

    }else{
    	 $friend = $_GET['friend'];

	    mysqli_query($con,"DELETE FROM connection WHERE (user1 = '$friend' AND user2 ='{$_SESSION['logUserId']}') OR (user2 = '$friend' AND user1 ='{$_SESSION['logUserId']}') ");
	    ?>
		 <script type="text/javascript">
		 	alert("User Removed from the friend list.");
		 	window.location.href ='members.php';
		 </script>
		<?php
    }

 ?>