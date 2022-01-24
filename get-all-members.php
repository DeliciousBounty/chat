
<div class="row">

<?php 
if(!isset($_SESSION['friendslogin'])){
	$users = mysqli_query($con,"SELECT * FROM user");

	while($user = mysqli_fetch_assoc($users)){
		?>
		<div class="col-lg-3" style="padding:15px" >
			<center>
				<img width="120" height="120" style="border-radius: 120px" alt="Profile Picture" class="" src="images/users/<?php if($user['image']==''){ echo 'default.png'; }else{echo $user['image'];} ; ?>" />
				<h5><?php echo $user['fullname']; ?></h5>
			</center>
		</div>

		<?php
	}
}else{
	$users = mysqli_query($con,"SELECT * FROM user WHERE id != '{$_SESSION['logUserId']}'");

	while($user = mysqli_fetch_assoc($users)){
		?>
		<div class="col-lg-3" style="padding:15px" >
			<center>
				<img width="120" height="120" style="border-radius: 120px" alt="Profile Picture" class="" src="images/users/<?php if($user['image']==''){ echo 'default.png'; }else{echo $user['image'];} ; ?>" />
				<h5><?php echo $user['fullname']; ?></h5>
				<p>Email : <?php echo $user['email']; ?> </p>


			</center>
			<?php 

			areFriends($user['id'] );

			 ?>

		</div>

		<?php
	}
}


function areFriends($userid){
    include 'database.php';
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM connection WHERE (user1 ='$userid' AND user2 ='{$_SESSION['logUserId']}') OR (user2 ='$userid' AND user1 ='{$_SESSION['logUserId']}')"))!=0){
		?>
			<a href="chat.php?to=<?php echo $userid; ?>#sent" class="btn btn-primary btn-sm" href="">Message</a>

		<a href="add-friend.php?remove=yes&friend=<?php echo $userid; ?>" class="btn btn btn-sm btn-warning" href="">Unfriend</a>

		<?php
	}else{
		?>
			<a href="chat.php?#sent" class="btn btn-disabled btn-sm disabled" href="">Message Not Available</a>

		<a  class="btn btn btn-sm btn-success" href="add-friend.php?add=yes&friend=<?php echo $userid; ?>">Add Friend</a>

		<?php
	}
}

?>

</div>