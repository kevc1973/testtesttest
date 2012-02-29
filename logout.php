<?php 
			session_start();
			$_SESSION['auth']="0";
			echo '<script type="text/javascript">window.location = "./index.php";</script>';	
?>
