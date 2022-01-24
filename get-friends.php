<div class="row">
<?php 

	$users = mysqli_query($con,"SELECT * FROM user WHERE id != '{$_SESSION['logUserId']}'");

	while($user = mysqli_fetch_assoc($users)){
		if(areFriends($user['id'] )==false){ continue;}
		?>
		<div class="col-lg-3 card" style="padding:15px" >
			<center>
				<img width="120" height="120" style="border-radius: 120px" alt="Profile Picture" class="" src="images/users/<?php if($user['image']==''){ echo 'default.png'; }else{echo $user['image'];} ; ?>">
				<h5><?php echo $user['fullname']; ?></h5>
				<p>Email : <?php echo $user['email']; ?> </p>


			</center>
			<a href="chat.php?to=<?php echo $user['id']; ?>#sent" class="btn btn-primary btn-sm" href="">Message</a>
			<button onclick="alert('<?php echo $user['fullname'].' Location : '.$user['latitude'].'|'.$user['longitude'];  ?>');" class="btn btn-primary btn-sm" href="">Find Location</button>
			<a href="remove-friend.php?remove=yes&friend=<?php echo $user['id']; ?>" class="btn btn btn-sm btn-warning" href="">Unfriend</a>
			

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

</div>

