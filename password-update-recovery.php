<?php 
    include 'database.php';

	if($_POST['password1'] == $_POST['password2']){
		$enc = sha1($_POST['password1']);
		mysqli_query($con,"UPDATE user SET password = '$enc' WHERE username = '{$_POST['username']}'" );
		?>
        <script type="text/javascript">
            alert('Paswords Updated');
            window.location.href = 'index.php';
        </script>
        <?php
	}else{
		?>
        <script type="text/javascript">
            alert('Paswords Did not Match');
            window.location.href = 'forgot.php';
        </script>
        <?php
	}


 ?>