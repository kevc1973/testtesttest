<?php
	session_start();
	if (!isset($_SESSION['auth'])) { $_SESSION['auth']="0"; }
	// sitewide DB access details
    $host = "localhost";        // the host your database server is on, probably localhost
    $username = "umcmfg_umcweb";        // Database Username, if you are doing this locally and haven't set one it will probably be "root"
    $password = "WIy*N)?O_P^B_Nf?9e";            // Database Password, if you are doing this locally and haven't set one it will probably be NULL 
    $database = "umcmfg_umc2011";    // The name of the database you want to use.

    // Try to connect to mysql
    mysql_connect($host, $username, $password) or die ("Could not connect to database");  

    // Try to select the database 
    mysql_select_db($database) or die ("Could not select database");    
    
    // ----------------------------------------------------------------------------------

    
    
    
    
    
    
    $sql="SELECT * FROM mytest;";
	$result=mysql_query($sql);
	$rows = mysql_num_rows($result);
	for ($i = 0; $i < $rows; $i++) {
		$data = mysql_fetch_object($result);
		echo $data->description;
		echo "<br />";
	}	
    
    
    
    
    
    
    
    
    
    
?>