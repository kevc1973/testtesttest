<?php

    include 'inc/db.inc';
    
    $id = $_GET['id']; // ID of entry you wish to view.  To use this enter "view.php?id=x" where x is the entry you wish to view. 
    $type = $_GET['t']; // t=0 means previewpic, 1=productpic
    if ($type==0) {
    	$type="main_image_small";
    } else {
    	$type="main_image_large";
    }
    

    $query = "SELECT ".$type." FROM case_studies WHERE id=$id"; //Find the file, pull the filecontents and the filetype
    $result = MYSQL_QUERY($query);    // run the query

    if($row=mysql_fetch_row($result)) // pull the first row of the result into an array(there will only be one)
    {
        $data = $row[0];    // First bit is the data
        


        
        header( "Content-type: image/jpeg"); // Send the header of the approptiate file type, if it's' a image you want it to show as one :)
        print $data; // Send the data.
    }
    else // the id was invalid
    {
        echo "invalid id";
    }
    
    
?>