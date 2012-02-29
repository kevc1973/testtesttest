<?php 

	$enablecases=0;
	
	if ($enablecases==0) {
		include('./case-studies-disabled.php');
	} else {
		include('./case-studies-enabled.php');
	}


?>