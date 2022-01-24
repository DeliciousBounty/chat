

<div class="row">
<?php 

	$posts = mysqli_query($con,"SELECT * FROM feed");

	while($post = mysqli_fetch_assoc($posts)){
		?>
		<div class="col-lg-6 card" style="padding:15px;margin-top: 15px;" >
			<center>
				<?php 	if($post['user']==$_SESSION['logUserId']){ ?>
				<a class="btn btn-sm btn-danger" style="position: absolute;right: 25px" href="remove-feed.php?id=<?php echo $post['id']; ?>">X</a>
				<?php 	} ?>
				<p>
					<i>~ <?php echo $post['title']; ?></i>
				</p>
				<img width="120" height="120" style="border-radius:10px" alt="Post Picture" class="" src="images/post/<?php if($post['image']==''){ echo 'default.jpg'; }else{echo $post['image'];} ; ?>">
				<h5><?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT fullname FROM user WHERE id = '{$post['user']}'"))['fullname']; ?></h5>


			</center>
			
			

		</div>

		<?php
	}





?>

</div>