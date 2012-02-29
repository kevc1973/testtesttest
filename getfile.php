<?php

    include './inc/db.inc';
    
    $id = $_GET['id']; // ID of entry you wish to view.  To use this enter "view.php?id=x" where x is the entry you wish to view. 

    $query = "SELECT filedata, filetype, filename FROM downloads WHERE id=$id"; //Find the file, pull the filecontents and the filetype
    $result = MYSQL_QUERY($query);    // run the query


    if($row=mysql_fetch_row($result)) // pull the first row of the result into an array(there will only be one)
    {
        $data = $row[0];    // First bit is the data
        
        $type = $row[1];    // second is the filename
        $filen = $row[2];

//        echo $row[3].":".$row[2].":".$row[1].":".strlen($data);
//        exit();


        
        header( "Content-type: $type"); // Send the header of the approptiate file type, if it's' a image you want it to show as one :)

			switch ($type)	 {
				case "application/pdf":
					header('Content-disposition: attachment; filename="'.$filen.'"');				
					break;
				case "application/msword":
					header('Content-disposition: attachment; filename="'.$filen.'"');				
					break;	
				case "application/msexcel":
					header('Content-disposition: attachment; filename="'.$filen.'"');		
					break;
				case "application/vnd.ms-excel":
					header('Content-disposition: attachment; filename="'.$filen.'"');		
					break;
			}



        //if ($type=="application/pdf") { header('Content-disposition: attachment; filename="'.$filen.'"');}
        // header('Content-disposition: attachment; filename="'.$filen.'"');
        print $data; // Send the data.
    }
    else // the id was invalid
    {
        echo "invalid id";
    }
    
    
?>

