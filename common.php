<?php 
	if(isset($_GET['logout'])){
		session_destroy();

		?>
		 <script type="text/javascript">
		 	
		 	window.location.href ='index.php';
		 </script>
		<?php
	}


 ?>