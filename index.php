<?php 

	$enablecases=0;
	
	if ($enablecases==0) {
		include('./index-nocases.php');
	} else {
		include('./index-withcases.php');
	}


?>