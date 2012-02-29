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
    
    function sanitize($string){
	//		$res= preg_replace('/[^a-zA-Z0-9\ss+\.\:\-\/%+\(\)\*\&\$\#\!\@\"\';\n\t\r]/', '', $string);   // this is the old string
			$res= preg_replace('/[^a-zA-Z0-9\ss+\.\:\-\/%+\(\)\*\&\$\#\'\"\Í\_\!\@;\n\t\r]/', '', $string);
			$res= str_replace('"', '\'', $res);
			$res= str_replace("'", '\'', $res);
			$res= str_replace("Í", '\'', $res);
		return mysql_real_escape_string($res);
	}
	
	function isEmail($emailvalidate) {
		if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $emailvalidate)) {
			return $emailvalidate;
		} else { 
			return "";
		}
	}
       
?>