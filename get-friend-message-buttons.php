<?php 

	$users = mysqli_query($con,"SELECT * FROM user WHERE id != '{$_SESSION['logUserId']}'");

	while($user = mysqli_fetch_assoc($users)){
		if(areFriends($user['id'] )==false){ continue;}
		?>
		<div class=" col-lg-12" class="btn btn-lg"  style="border: solid 1px #3344;padding: 5px;">
				
				<h5><?php echo $user['fullname']; ?></h5>


			<a href="chat.php?to=<?php echo $user['id']; ?>#sent" class="btn btn-primary btn-sm" href="">Message</a>
			

		</div>

		<?php
	}



function areFriends($userid){
    include 'database.php';
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM connection WHERE (user1 ='$userid' AND user2 ='{$_SESSION['logUserId']}') OR (user2 ='$userid' AND user1 ='{$_SESSION['logUserId']}')"))==0){
		return false;
	}else{
		return true;
	}
}

?>

