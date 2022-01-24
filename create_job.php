<?php 
	if(isset($_POST['register'])){
		$company = $_POST['company'];
		$location = $_POST['location'];
		$no = $_POST['no'];
		$category = $_POST['category'];

		if(mysqli_query($con,"INSERT INTO jobs (company,category,location,vacancies) VALUES ('$company','$category','$location','$no')")){
			?>
				<script type="text/javascript">
					 alert("Job Registered!");
				</script>
			<?php
		}else{
			?>
				<script type="text/javascript">
					 alert("Job Register Failed");
				</script>
			<?php
		}
	}

 ?>