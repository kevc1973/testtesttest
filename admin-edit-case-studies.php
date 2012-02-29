<?php 
	$title="United Manufacturing | Full Service Metal Stamping & Tooling Facilities | Administration | Create / Edit Case Studies";
	$keywords="keywords, goes, here";
	$description="descripton goes here";
	include './inc/header.inc';
	
	if (isset($_SESSION['auth']) AND $_SESSION['auth']!=0) {
		// we've been authentimicatoloid, dont' shove off to oblivion!
	} else {
			echo '<script type="text/javascript">window.location = "./login.php";</script>';
	}
	
?>

<?php include './inc/adminbar.inc'; ?>




<?php

				$edittxt="Create";
				$case_title="";
				$case_text="";
				$case_category="";
				$case_startdate="";
				$case_enddate="";
				$case_previewtext="";
				$featured="";
				$featuredval=0;
				$active=1;
				$activetxt=" checked ";

	if (isset($_GET['di'])) {
		$id=$_GET['di'];
		$sql="DELETE FROM images WHERE id=".$id;
		$result=mysql_query($sql);
	}
	if (isset($_GET['df'])) {
		$id=$_GET['df'];
		$sql="DELETE FROM downloads WHERE id=".$id;
		$result=mysql_query($sql);
	}
	if (isset($_GET['tf'])) {
		$sql="UPDATE downloads SET isactive = isactive^1 WHERE id=".$_GET['tf'].";";
		$result=mysql_query($sql);
	}
	if (isset($_GET['ti'])) {
		$sql="UPDATE images SET isactive = isactive^1 WHERE id=".$_GET['ti'].";";
		$result=mysql_query($sql);
	}
	
	
				if (isset($_GET['imt'])) {
					$sqli="UPDATE images SET ord=0 WHERE id=".$_GET['imt'].";";
					$renumber=mysql_query($sqli);
					$sqli="SET @ordering_inc=1;";
					$renumber=mysql_query($sqli);
					$sqli="SET @new_ordering=0;";
					$renumber=mysql_query($sqli);
					$sqli="UPDATE images SET ord= (@new_ordering := @new_ordering + @ordering_inc) WHERE isactive=1 AND case_id=".$_GET['id']." ORDER BY ord;";
					$renumber=mysql_query($sqli);	
				}
				if (isset($_GET['imu'])) {		
					$sql="SELECT * FROM images WHERE id=".$_GET['imu'].";";
					$result=mysql_query($sql);
					$data=mysql_fetch_object($result);
					$prev_ord=$data->ord-1;
					$sql2="SELECT id, ord FROM images WHERE ord=".$prev_ord." AND case_id=".$_GET['id'].";";
					$result2=mysql_query($sql2);
					$data2=mysql_fetch_object($result2);
					$sql="UPDATE images SET ord=".$data->ord." WHERE id=".$data2->id.";";
					$result=mysql_query($sql);
					$sql="UPDATE images SET ord=".$data2->ord." WHERE id=".$data->id.";";
					$result=mysql_query($sql);
				}	
				if (isset($_GET['imd'])) {	
					$sql="SELECT * FROM images WHERE id=".$_GET['imd'].";";
					$result=mysql_query($sql);
					$data=mysql_fetch_object($result);
					$prev_ord=$data->ord+1;
					$sql2="SELECT id, ord FROM images WHERE ord=".$prev_ord." AND case_id=".$_GET['id'].";";
					$result2=mysql_query($sql2);
					$data2=mysql_fetch_object($result2);
					$sql="UPDATE images SET ord=".$data->ord." WHERE id=".$data2->id.";";
					$result=mysql_query($sql);
					$sql="UPDATE images SET ord=".$data2->ord." WHERE id=".$data->id.";";
					$result=mysql_query($sql);
				}	
				if (isset($_GET['fmt'])) {
					$sqli="UPDATE downloads SET ord=0 WHERE id=".$_GET['fmt'].";";
					$renumber=mysql_query($sqli);
					$sqli="SET @ordering_inc=1;";
					$renumber=mysql_query($sqli);
					$sqli="SET @new_ordering=0;";
					$renumber=mysql_query($sqli);
					$sqli="UPDATE downloads SET ord= (@new_ordering := @new_ordering + @ordering_inc) WHERE isactive=1 AND case_id=".$_GET['id']." ORDER BY ord;";
					$renumber=mysql_query($sqli);	
				}
				if (isset($_GET['fmu'])) {		
					$sql="SELECT * FROM downloads WHERE id=".$_GET['fmu'].";";
					$result=mysql_query($sql);
					$data=mysql_fetch_object($result);
					$prev_ord=$data->ord-1;
					$sql2="SELECT id, ord FROM downloads WHERE ord=".$prev_ord." AND case_id=".$_GET['id'].";";
					$result2=mysql_query($sql2);
					$data2=mysql_fetch_object($result2);
					$sql="UPDATE downloads SET ord=".$data->ord." WHERE id=".$data2->id.";";
					$result=mysql_query($sql);
					$sql="UPDATE downloads SET ord=".$data2->ord." WHERE id=".$data->id.";";
					$result=mysql_query($sql);
				}	
				if (isset($_GET['fmd'])) {	
					$sql="SELECT * FROM downloads WHERE id=".$_GET['fmd'].";";
					$result=mysql_query($sql);
					$data=mysql_fetch_object($result);
					$prev_ord=$data->ord+1;
					$sql2="SELECT id, ord FROM downloads WHERE ord=".$prev_ord." AND case_id=".$_GET['id'].";";
					$result2=mysql_query($sql2);
					$data2=mysql_fetch_object($result2);
					$sql="UPDATE downloads SET ord=".$data->ord." WHERE id=".$data2->id.";";
					$result=mysql_query($sql);
					$sql="UPDATE downloads SET ord=".$data2->ord." WHERE id=".$data->id.";";
					$result=mysql_query($sql);
				}	
	
	
	
	
?>



	
	<div class="clearfix" style="height: 1px;"></div>
	<div id="admin-content">
		<?php include './inc/adminbar-cases.inc'; ?>
		
		<?php
					
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				// lets see if were posting, if so, do something and get the hell out
				// TBD
				
				if (isset($_FILES['new_image']['type']) OR isset($_FILES['new_file']['type']) ) {
					if (isset($_FILES['new_image']['type'])) {
						// were uploading an image
							if ( ($_FILES['new_image']['type'] == "image/gif")  ||
								 ($_FILES['new_image']['type'] == "image/png")  ||
								 ($_FILES['new_image']['type'] == "image/jpg")  ||
					     	     ($_FILES['new_image']['type'] == "image/jpeg")		) 	{ 	        
						        // temp file on server
						        $tempfile = $_FILES['new_image']['tmp_name'] ;
						        $file1data = (fread(fopen($tempfile, "rb"), filesize($tempfile)));
						        $file3data=(addslashes($file1data));
						        $file1type = $_FILES['new_image']['type'];
						        $file1size = $_FILES['new_image']['size'];
						        $file1name = $_FILES['new_image']['name'];
						        $im = imagecreatefromstring($file1data);
						        $im2 = imagecreatefromstring($file1data);
								$x = imagesx($im);
								$y = imagesy($im);
										$square_size=260;  // large image is 260, small is 140
										if($x> $y) {
							                    $width_t=$square_size;
							                    //respect the ratio
							                    $height_t=round(($y/$x)*$square_size);
							                    //set the offset
							                    $off_y=ceil(($width_t-$height_t)/2);
							                    $off_x=0;
							            } elseif($y> $x) {
							                    $height_t=$square_size;
							                    $width_t=round(($x/$y)*$square_size);
							                    $off_x=ceil(($height_t-$width_t)/2);
							                    $off_y=0;
							            }
							            else {
							                    $width_t=$height_t=$square_size;
							                    $off_x=$off_y=0;
							            }
										$new = imagecreatetruecolor($square_size, $square_size);
										ImageFill($new, 0, 0, ImageColorAllocate($im, 9, 37, 74)); 
										imagecopyresampled($new, $im, $off_x, $off_y, 0, 0, $width_t, $height_t, $x, $y);
										imagedestroy($im);
										imagejpeg($new,$tempfile,80);
										$file1data=(addslashes(file_get_contents($tempfile)));
								        // ------------------------------------------------------------------------------------------------------------
								        $square_size=140;  // large image is 260, small is 140
										if($x> $y) {
							                    $width_t=$square_size;
							                    //respect the ratio
							                    $height_t=round(($y/$x)*$square_size);
							                    //set the offset
							                    $off_y=ceil(($width_t-$height_t)/2);
							                    $off_x=0;
							            } elseif($y> $x) {
							                    $height_t=$square_size;
							                    $width_t=round(($x/$y)*$square_size);
							                    $off_x=ceil(($height_t-$width_t)/2);
							                    $off_y=0;
							            }
							            else {
							                    $width_t=$height_t=$square_size;
							                    $off_x=$off_y=0;
							            }
										$new = imagecreatetruecolor($square_size, $square_size);
										ImageFill($new, 0, 0, ImageColorAllocate($im2, 9, 37, 74)); 
										imagecopyresampled($new, $im2, $off_x, $off_y, 0, 0, $width_t, $height_t, $x, $y);
										imagedestroy($im2);
										imagejpeg($new,$tempfile,80);
										$file2data=(addslashes(file_get_contents($tempfile)));
								        $sql="INSERT INTO images (case_id,filedata_large,filedata_small, filedata_actual, filename) VALUES (".$_GET['id'].",'$file1data','$file2data','$file3data', '$file1name');";
								        $result=mysql_query($sql);
						    }
					} else {
						// were uploading a file					
					
						if ( ($_FILES['new_file']['type'] == "application/pdf")  ||
							 ($_FILES['new_file']['type'] == "application/msword")  ||
							 ($_FILES['new_file']['type'] == "application/msexcel")  ||
							 ($_FILES['new_file']['type'] == "image/jpeg")  ||
							 ($_FILES['new_file']['type'] == "image/png")  ||
							 ($_FILES['new_file']['type'] == "image/gif")  ||
				     	     ($_FILES['new_file']['type'] == "application/vnd.ms-excel")  ) {	        
					        // temp file on server
					        $tempfile = $_FILES['new_file']['tmp_name'] ;
					        $filedata = addslashes(fread(fopen($tempfile, "rb"), filesize($tempfile)));
					        $filetype = $_FILES['new_file']['type'];
					        $filesize = $_FILES['new_file']['size'];
					        $filename = $_FILES['new_file']['name'];
							$sql="INSERT INTO downloads (case_id, filedata,filename, filetype) VALUES (".$_GET['id'].",'".$filedata."','".$filename."', '".$filetype."');";
							$result = mysql_query($sql);
						}
					}
				
				} else {
						$case_title=sanitize($_POST['case_title']);
						$case_text=htmlentities($_POST['case_text'], ENT_QUOTES);
						$case_category=sanitize($_POST['case_category']);
						$case_previewtext=sanitize($_POST['case_previewtext']);
						$case_startdate=sanitize($_POST['case_startdate']);
						$case_enddate=sanitize($_POST['case_enddate']);

						
						if (1==1) {
							// deal with images here!
							$file1=0;
							if ( ($_FILES['case_image']['type'] == "image/gif")  ||
								 ($_FILES['case_image']['type'] == "image/png")  ||
								 ($_FILES['case_image']['type'] == "image/jpg")  ||
					     	     ($_FILES['case_image']['type'] == "image/jpeg")		) 	{ 	        
						        // temp file on server
						        $tempfile = $_FILES['case_image']['tmp_name'] ;
						        $file1data = (fread(fopen($tempfile, "rb"), filesize($tempfile)));
						        $file1type = $_FILES['case_image']['type'];
						        $file1size = $_FILES['case_image']['size'];
						        $file1name = $_FILES['case_image']['name'];
						        $im = imagecreatefromstring($file1data);
						        $im2 = imagecreatefromstring($file1data);
								$x = imagesx($im);
								$y = imagesy($im);
								
										$square_size=260;  // large image is 260, small is 140
										if($x> $y) {
							                    $width_t=$square_size;
							                    //respect the ratio
							                    $height_t=round(($y/$x)*$square_size);
							                    //set the offset
							                    $off_y=ceil(($width_t-$height_t)/2);
							                    $off_x=0;
							            } elseif($y> $x) {
							                    $height_t=$square_size;
							                    $width_t=round(($x/$y)*$square_size);
							                    $off_x=ceil(($height_t-$width_t)/2);
							                    $off_y=0;
							            }
							            else {
							                    $width_t=$height_t=$square_size;
							                    $off_x=$off_y=0;
							            }
										$new = imagecreatetruecolor($square_size, $square_size);
										ImageFill($new, 0, 0, ImageColorAllocate($im, 9, 37, 74)); 
										imagecopyresampled($new, $im, $off_x, $off_y, 0, 0, $width_t, $height_t, $x, $y);
										imagedestroy($im);
										imagejpeg($new,$tempfile,80);
										$file1data=(addslashes(file_get_contents($tempfile)));
								        $file1=1;
								        // ------------------------------------------------------------------------------------------------------------
								        $square_size=140;  // large image is 260, small is 140
										if($x> $y) {
							                    $width_t=$square_size;
							                    //respect the ratio
							                    $height_t=round(($y/$x)*$square_size);
							                    //set the offset
							                    $off_y=ceil(($width_t-$height_t)/2);
							                    $off_x=0;
							            } elseif($y> $x) {
							                    $height_t=$square_size;
							                    $width_t=round(($x/$y)*$square_size);
							                    $off_x=ceil(($height_t-$width_t)/2);
							                    $off_y=0;
							            }
							            else {
							                    $width_t=$height_t=$square_size;
							                    $off_x=$off_y=0;
							            }
										$new = imagecreatetruecolor($square_size, $square_size);
										ImageFill($new, 0, 0, ImageColorAllocate($im2, 9, 37, 74)); 
										imagecopyresampled($new, $im2, $off_x, $off_y, 0, 0, $width_t, $height_t, $x, $y);
										imagedestroy($im2);
										imagejpeg($new,$tempfile,80);
										$file2data=(addslashes(file_get_contents($tempfile)));
								        $file1=1;
								        
						    } else {
						    	$file1=2;
						    	$tempfile="./images/default-large.png";
						    	$file1data = addslashes(fread(fopen($tempfile, "rb"), filesize($tempfile)));
						        $file1type = "application/jpeg";
						        $tempfile="./images/default-small.png";
						    	$file2data = addslashes(fread(fopen($tempfile, "rb"), filesize($tempfile)));
						        $file2type = "application/jpeg";
						    }
							
							$errortxt="";
							
							if (strlen($case_startdate)<=5) {
								$errortxt="Please enter a Case Study Start Date.";
							}
							if ($case_category==0) {
								$errortxt="Please enter a Case Study Category.";
							}
							if (strlen($case_title)<=5) {
								$errortxt="Please enter a Case Study Title.";
							}

							if ($errortxt=="") {
								if ($_POST['featured']) {
									$feat=1;
								} else {
									$feat=0;
								}
								if ($_POST['isactive']) {
									$isactive=1;
								} else {
									$isactive=0;
								}
								
							
								if (isset($_GET['id'])) {
									if ($file1==1) {
										$sql="UPDATE case_studies SET title='$case_title', category=$case_category, start_date='$case_startdate', end_date='$case_enddate',  preview_text='$case_previewtext', text='$case_text', main_image_large='$file1data', main_image_small='$file2data', featured=".$feat.", isactive=".$isactive." WHERE id=".$_GET['id'].";";					
									} else {
										$sql="UPDATE case_studies SET title='$case_title', category=$case_category, start_date='$case_startdate', end_date='$case_enddate',   preview_text='$case_previewtext', text='$case_text', featured=".$feat.", isactive=".$isactive." WHERE id=".$_GET['id'].";";
									}
			
									$result=mysql_query($sql);
									echo '<script>window.location="admin-edit-case-studies.php?id='.$_GET['id'].'";</script>';
									
								} else {
									if ($file1!=0) {
										$sql="INSERT INTO case_studies (title, category, start_date, end_date, preview_text, text,main_image_large, main_image_small, featured, isactive) VALUES ('$case_title', $case_category, '$case_startdate', '$case_enddate', '$case_previewtext', '$case_text','$file1data','$file2data',$feat, $isactive);";					
									} else {
										$sql="INSERT INTO case_studies (title, category, start_date, end_date, preview_text, text, featured, isactive) VALUES ('$case_title', $case_category, '$case_startdate', '$case_enddate', '$case_previewtext', '$case_text',$feat, $isactive);";
									}
									
									$result=mysql_query($sql);
									$newid=mysql_insert_id();
									echo '<script>window.location="admin-edit-case-studies.php?id='.$newid.'";</script>';
								}
// echo $sql; exit();
								

							} else {
								
								echo "<h2 style='width: 500px; margin: auto; background: red; border: #ffff00 1px solid; line-height: 28px;margin-bottom: 25px; margin-top: 10px; color: yellow; text-align: center;'>".$errortxt."</h2>";
								
								
								
							}
							
			
						}
				}
				
				
				
			}
		
			$error=0;
			if (isset($_GET['id'])) {
				$editing=1;
				$edittxt="Edit";
				$sql2="SELECT * FROM case_studies WHERE id=".$_GET['id'].";";
				$result2=mysql_query($sql2);
				$data2=mysql_fetch_array($result2);
				$case_title=$data2['title'];
				$case_text=$data2['text'];
				$case_category=$data2['category'];
				$case_previewtext=$data2['preview_text'];
				$case_startdate=$data2['start_date'];
				$case_enddate=$data2['end_date'];
				
				if ($data2['isactive']==1) { 
					$active=1;
					$activetxt=" checked ";
				} else { 
					$active=0; 
					$activetxt="";
				}
				
				if ($data2['featured']==1) {
					$featured=" checked ";
					$featuredval=1;
				} else {
					$featured="";
					$featuredval=0;
				}
				
			} else {
				$editing=0;
				
			}
			
			
		?>
		<div style="clear: both;"></div>
		<form method="post" action="" name="cases" enctype="multipart/form-data" >
		<div class="clearfix" style="height: 10px;"></div>
		<h1 style="color: black; background: #bbbbbb; line-height: 29px; height: 26px;" >
			<img src="./images/icons/icon-header-<?php if ($editing==1) { echo "cases"; } else { echo "create"; } ?>.png" style="clear: both; margin-top: -15px; float: left; margin-left: 25px;" />
			<p style="float: left;" >Case Studies | <?php echo $edittxt; ?></p>
			 <input type="checkbox" id="isactive" name="isactive" <?php echo $activetxt; ?> style="border: 0px; background: transparent; float: left; margin-left: 50px; margin-top: 8px; margin-right: 10px;" > <div style="font-size: 12px; margin-top: -9px;">Active?</div> 
			
		</h1>
		<div class="clearfix" style="height: 10px;"></div>		
		<form method="post" action="" name="cases" enctype="multipart/form-data" >
		
		<div class="label">
			<span style="color: red;">*</span>Case Study Title :
		</div>
		<div class="field">
			<input type="text" name="case_title" id="case_title" style="width: 500px;" value="<?php echo $case_title; ?>" />
		</div>
		
		<div class="clearfix"></div>
		
		<div class="label">
			<span style="color: red;">*</span>Category :
		</div>
		<div class="field">
			
			<select name="case_category" id="case_category"  style="width: 506px;" >
				<option value="0" <?php if ($case_category==0) { echo " selected "; } ?> >Please choose a category.</option>
				<option value="1" <?php if ($case_category==1) { echo " selected "; } ?> >Prototypes</option>
				<option value="2" <?php if ($case_category==2) { echo " selected "; } ?> >Tooling</option>
				<option value="3" <?php if ($case_category==3) { echo " selected "; } ?> >Machining</option>
				<option value="4" <?php if ($case_category==4) { echo " selected "; } ?> >Metal Stamping</option>
				<option value="5" <?php if ($case_category==5) { echo " selected "; } ?> >Progressive Metal Stamping</option>
				<option value="6" <?php if ($case_category==6) { echo " selected "; } ?> >Drawing Deep & Drawing</option>
				<option value="7" <?php if ($case_category==7) { echo " selected "; } ?> >Heavy Gauge Metal Stamping</option>
				<option value="8" <?php if ($case_category==8) { echo " selected "; } ?> >Bend or Multiple Bend</option>
				<option value="9" <?php if ($case_category==9) { echo " selected "; } ?> >Fabrication</option>
				<option value="10" <?php if ($case_category==10) { echo " selected "; } ?> >Secondary Stamping</option>
				<option value="11" <?php if ($case_category==11) { echo " selected "; } ?> >Product Assembly</option>
				<option value="12" <?php if ($case_category==12) { echo " selected "; } ?> >Other</option>
				
			</select>	
		</div>
		
		<div class="clearfix"></div>
		
		
		<script type="text/javascript" src="./js/cal.js"></script>
		<style>
			.datepicker { border-collapse: collapse; border: 2px solid #999; position: absolute; z-index: 9999; color: black; }
			<!---  Had to insert z-indexing on element because other jquery items 'shined' through the calendar - kc  --->
			.datepicker tr.controls th { height: 22px; font-size: 11px; }
			.datepicker select { font-size: 11px; }
			.datepicker tr.days th { height: 18px; }
			.datepicker tfoot td { height: 18px; text-align: center; text-transform: capitalize; }
			.datepicker th, .datepicker tfoot td { background: #eee; font: 10px/18px Verdana, Arial, Helvetica, sans-serif; }
			.datepicker th span, .datepicker tfoot td span { font-weight: bold; }			
			.datepicker tbody td { width: 24px; height: 24px; border: 1px solid #ccc; font: 11px/22px Arial, Helvetica, sans-serif; text-align: center; background: #fff; }
			.datepicker tbody td.date { cursor: pointer; }
			.datepicker tbody td.date.over { background-color: #99ffff; }
			.datepicker tbody td.date.chosen { font-weight: bold; background-color: #ccffcc; }
			.lefttag {clear: both; float: left; padding-top: 2px; margin-right: 10px; margin-top: 8px; width: 220px; text-align: right; color: #888888; }
			.righttag {float: left; margin-top: 8px; width: 420px; text-align: left; color: #888888; }
			.centertagbox {clear: both; padding: 22px; text-align: center;}
			.centertag {clear: both; width: 300px; margin: auto; text-align: center; background-color: #efefdd; border: 1px solid #333333;}
		</style>
							
		<div class="label">
			<span style="color: red;">*</span>Case Study Start Date :
		</div>
		<div class="field">
			<input type="text" name="case_startdate" id="case_startdate" style="width: 500px;" value="<?php echo $case_startdate; ?>" />
		</div>
		<div class="label">
			Case Study End Date :
		</div>
		<div class="field">
			<input type="text" name="case_enddate" id="case_enddate" style="width: 500px;" value="<?php echo $case_enddate; ?>" />
		</div>
		<script>
			$('#case_startdate').simpleDatepicker();
			$('#case_enddate').simpleDatepicker();
		</script>
		
		
		
		<div class="clearfix"></div>
		<div class="label">
			Case Study Image :
		</div>
		<div class="field">
			<div id="realbox" style="position: relative;">
				<input name="case_image" id="case_image" class="realinput" type="file" style="width: 400px;" width="400px" onchange="var i=$('.realinput_image').attr('value'); $('.fakeinput_image').attr('value',i);" >
			</div>
			<div class="fakebox" style="float: left;position: relative; margin-top: -25px; z-index: 99; margin-right: 20px;">
				<input class="fakeinput" type="text" style="width: 443px; height: 20px;" width="443px"><input type="button" class="fakebrowse" value="Browse" width="120px">
			</div>

			<div style="float: right; margin-top: -22px; margin-right: 80px; font-size: 9px; line-height: 10px;">(MAX 2 megabytes jpeg, <br />png or gif)</div>
			<div class="clearfix">&nbsp;</div>
			<div style="width: 500px; text-align: left;"><img src="./getmainimage.php?t=0&id=<?php echo $_GET['id']; ?>" style="width: 100px; margin-auto; margin-top: 6px;" /></div>
			<script>
				$('.fakeinput').click(
					function() {
						$('.realinput').click();
					}
				);
				$('.fakebrowse').click(
					function() {
						$('.realinput').click();
					}
				);
				$('.realinput').change(
					function() {
						var i=$('.realinput').attr('value');
						$('.fakeinput').attr('value',i);
					}
				);
			</script>
		</div>
		
		<div class="clearfix" style="height: 20px;"></div>
		
		<div class="label">
			Preview Text : &nbsp;&nbsp;
						<div id="onefouroh" style="padding:0px;position: absolute; margin-top: -12px;margin-left: -30px; font-size: 11px; text-align: right; width: 223px;">
							(0/460 characters)
						</div>
		</div>
		<div class="field">
			<textarea onkeyup="return ismaxlength(this)" name="case_previewtext" id="case_previewtext" maxlength=460 style="width: 504px;" rows="5" ><?php echo $case_previewtext; ?></textarea>
			<script>
				function ismaxlength(obj){
					var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
					if (obj.getAttribute && obj.value.length>mlength)
					obj.value=obj.value.substring(0,mlength)
					$("#onefouroh").text("("+obj.value.length+"/460 characters)");
				}
			</script>
		</div>
		
		
		
		
		
		
		<div class="clearfix"></div>
		
		<div class="label">
			Case Text :
		</div>
		<div class="field">
			<textarea name="case_text" id="case_text" style="width: 504px;" ><?php echo $case_text; ?></textarea>
		</div>
									<script type="text/javascript" src="./inc/editor/ckeditor.js"></script>
									<script type="text/javascript">
									//<![CDATA[
									// Replace the <textarea id="editor"> with an CKEditor
									// instance, using default configurations.
									CKEDITOR.replace( 'case_text',
										{
										enterMode : CKEDITOR.ENTER_BR,
							            shiftEnterMode: CKEDITOR.ENTER_BR,
							            entities: 'false',
							            entities_additional : '',
							            entities_greek : 'false',
							            entities_latin : 'false',
							            height: '100',
							            resize_enabled : 'false',
							            resize_maxHeight : '300',
							            resize_maxWidth : '948',
							            resize_minHeight: '200',
							            resize_minWidth: '948',
							            toolbar:  
							            [
											['Source','Maximize','-'],
											['Cut','Copy','Paste','PasteText','PasteFromWord'],
											['Undo','Redo','-','Find','Replace','-','TextColor','BGColor'],
											'/',
											['Link','Unlink','Table','HorizontalRule','-','NumberedList','BulletedList','Outdent','Indent'],
											['Bold','Italic','Underline','Strike','-'],
											['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
											'/',
											['Styles','Format','Font','FontSize']
								        ],
						
							            uiColor:  '#333377',
							            width: '507'
										} );
									//]]>
									</script>
		<div class="clearfix"></div>
		
		
		
		<div class="label">
			Featured :
		</div>
		<div class="field">
			<?php
				$sql="SELECT * FROM case_studies WHERE featured=1 and id>99;";
				$resultzz=mysql_query($sql);
				$numrows=mysql_num_rows($resultzz);
				
			
				if ($numrows<2 OR $featured!="") {
					echo '<input type="checkbox" id="featured" name="featured" style="border: 0px; background: transparent; margin-top: 6px; float: left;" '.$featured.' />';
				} else {
					$outstring="Click ";
					for ($i = 0; $i < $numrows; $i++) {
						$dataimg = mysql_fetch_object($resultzz);
						$outstring.="<a href='?id=".$dataimg->id."' style='color: blue; text-decoration: underline; font-weight: 600;' />here</a>, or ";
					}
					$outstring.="xx";
					$outstr=str_replace(", or xx"," to edit the active featured items.",$outstring);
					echo '<div style="line-height: 14px;">Both featured slots are in use, please free up a featured slot to enable this box.<br />'.$outstr."</div>";
				}
			?>
		</div>
		
		<div class="clearfix" style="height: 20px;"></div>
		
		<div style="width: 300px; margin: auto; text-align: center;">
			<input type="submit" name="submit" value="Save Information">
		</div>
		
		</form>
		
		<div class="clearfix" style="height: 20px;"></div>	
		
			<?php
				// THIS block only shows if we are editing (it allows files to be added to a case.
				if (isset($_GET['id'])) {
			?>
			
					<h2 style="font-size: 22px; margin-top: 20px; margin-bottom: 20px; line-height: 30px;">
							<img src="./images/icons/icon-images-l.png" style="float: left; margin-top: -14px; margin-right: 20px;" />
							Images
					</h2>
					<div id="addimages">
						<div class="label">
							Add New Image :
						</div>
						<div class="field">
						  <form method="post" action="" name="cases" enctype="multipart/form-data" >
							<div id="realbox_newimage" style="position: relative;">
								<input name="new_image" id="new_image" class="realinput_image" type="file" style="width: 400px;" width="400px" onchange="var i=$('.realinput_image').attr('value'); $('.fakeinput_image').attr('value',i);">
							</div>
							<div class="fakebox_image" style="float: left;position: relative; margin-top: -25px; z-index: 99;">
								<input class="fakeinput_image" type="text" style="width: 443px; height: 20px;" width="443px"><input type="button" class="fakebrowse_image" value="Browse" width="120px">
								<input type="submit" value="Upload" id="upimage" />
							</div>
							<span style="float: right; margin-top: -22px; margin-right: 30px; margin-top: -22px; font-size: 9px; line-height: 10px;">(MAX 2 megabytes jpeg, <br />png or gif)</span>
						  </form>
							<script>
								$('.fakeinput_image').click(
									function() {
										$('.realinput_image').click();
									}
								);
								$('.fakebrowse_image').click(
									function() {
										$('.realinput_image').click();
									}
								);
								$('.realinput_image').change(
									function() {
										var i=$('.realinput_image').attr('value');
										$('.fakeinput_image').attr('value',i);
									}
								);
							</script>
						</div>
						
						<div class="clearfix" style="height: 30px;"></div>	
						<div style="margin-left: 60px;"><img src="./images/cases-images.png" /></div>

						
						
						<ul class='cases' style="list-style: none; color: #333333; width: 90%; margin: auto; padding-top: 5px; padding-bottom: 20px;">
							<?php
								$sqli="UPDATE images SET ord=99999 WHERE isactive=0;";
								$renumber=mysql_query($sqli);
								$sqli="SET @ordering_inc=1;";
								$renumber=mysql_query($sqli);
								$sqli="SET @new_ordering=0;";
								$renumber=mysql_query($sqli);
								$sqli="UPDATE images SET ord= (@new_ordering := @new_ordering + @ordering_inc) WHERE case_id=".$_GET['id']." AND isactive=1 ORDER BY ord;";
								$renumber=mysql_query($sqli);
								$sql="SELECT MAX(ord) AS new_ord FROM images WHERE case_id=".$_GET['id']." AND ord<=99998;";
								$result=mysql_query($sql);
								$ord=mysql_fetch_object($result);
								$max_ord=$ord->new_ord;
							
							
							
							    $sql="SELECT * FROM images WHERE case_id=".$_GET['id']." ORDER BY ord;";
								$result=mysql_query($sql);
								$rows = mysql_num_rows($result);
								for ($i = 0; $i < $rows; $i++) {
									$dataimg = mysql_fetch_object($result);

									if ($dataimg->isactive==1) {
										$ballcolor="green";
										$powercolor="red";
										$poweractiontxt="Disable";
									} else {
										$ballcolor="red";
										$powercolor="green";
										$poweractiontxt="Enable";
									}
									
									$movement="";
									$moveu='<a href="?imu='.$dataimg->id.'&id='.$_GET["id"].'"><img title="Move Up" src="./images/balls/arrow-up-blue.png" border="0" width="18px" style="margin-bottom: 0px;" /></a>';
									$moved='<a href="?imd='.$dataimg->id.'&id='.$_GET["id"].'"><img title="Move Down" src="./images/balls/arrow-down-yellow.png" border="0" width="18px" style="margin-bottom: 0px;" /></a>';
									$movet='<a href="?imt='.$dataimg->id.'&id='.$_GET["id"].'"><img title="Move Top" src="./images/balls/arrow-orange-top.png" border="0" width="18px" style="margin-bottom: 0px;" /></a>';
									$blank='<img src="./images/balls/spacer.png" border="0" width="18px" style="margin-bottom: 0px;" />';
							
									if ($dataimg->featured==1) { $featuredimg='<img title="This item is Featured" src="./images/balls/featured.png" width=18px style="float: left; margin-right: 50px; margin-top: -4px;" />'; } else { $featuredimg=""; }
							
									if ($dataimg->ord==0) { $moveu=$blank; $moved=$blank; $movet=$blank; } 
									if ($dataimg->ord==1) { $moveu=$blank; $movet=$blank; }
									if ($dataimg->ord==$max_ord) { $moved=$blank; }
									
									$movement="<div style='width: 64px; float: right; margin-top: -4px; margin-right: 20px;' id='movement'>".$moveu.$moved.$movet."</div>";
									
									if ($dataimg->isactive==0) { $movement="<div style='width: 64px; float: right; margin-top: -4px; margin-right: 20px;' id='movement'>&nbsp;</div>"; }
									
									
									
									
									
									echo "<li><img src='./images/balls/".$ballcolor.".png' style='float: left; margin-right: 10px; margin-left: 6px; margin-top: 29px;' /><div class='case-list-box-image'><img src='./getimage.php?id=".$dataimg->id."&t=0' width='80px' /></div><div class='case-list-box-title'>".$dataimg->filename."</div><div class='case-list-box-modifier'><a href='?di=".$dataimg->id."&id=".$_GET['id']."' ><img title='Delete Image' src='./images/icons/icon-delete-s.png' style='margin-left: 25px; float: left; margin-top: -7px;' /></a><a href='?ti=".$dataimg->id."&id=".$_GET['id']."' ><img title='".$poweractiontxt." Case Study' src='./images/balls/".$powercolor."-powerbutton.png' style='margin-right: 20px; margin-left: 25px; float: left; margin-top: -7px;' /></a>$movement</div><div style='clear: both;'></li>";
								}
							?>	
						</ul>
						
						
						
						<div class="clearfix" style="height: 20px;"></div>
					</div>
					
					
					
					
					
					
					
					
					
					
					
					<h2 style="font-size: 22px; margin-top: 20px; margin-bottom: 20px;line-height: 30px;">
							<img src="./images/icons/icon-attachment-l.png" style="float: left; margin-top: -14px; margin-right: 20px;" />Files
					</h2>
					<div id="addimages">
						<div class="label">
							Add New File :
						</div>
						<div class="field">
						  <form method="post" action="" name="cases" enctype="multipart/form-data" >
							<div id="realbox_file" style="position: relative;">
								<input name="new_file" id="new_file" class="realinput_file" type="file" style="width: 400px;" width="400px" onchange="var i=$('.realinput_image').attr('value'); $('.fakeinput_image').attr('value',i);" >
							</div>
							<div class="fakebox_file" style="float: left;position: relative; margin-top: -25px; z-index: 99;">
								<input class="fakeinput_file" type="text" style="width: 443px; height: 20px;" width="443px"><input type="button" class="fakebrowse_file" value="Browse" width="120px">
								<input type="submit" value="Upload" id="upfile" />
							</div>
							<span style="float: right; margin-top: -22px; margin-right: 20px;margin-top: -22px; font-size: 9px; line-height: 10px;">(MAX 10 megabytes Word, <br />Excel or PDF file)</span>
						  </form>
							<script>
								$('.fakeinput_file').click(
									function() {
										$('.realinput_file').click();
									}
								);
								$('.fakebrowse_file').click(
									function() {
										$('.realinput_file').click();
									}
								);
								$('.realinput_file').change(
									function() {
										var i=$('.realinput_file').attr('value');
										$('.fakeinput_file').attr('value',i);
									}
								);
							</script>
						</div>
						
						<div class="clearfix" style="height: 30px;"></div>	
						<div style="margin-left: 60px;"><img src="./images/cases-files.png" /></div>
						
						
						<ul class='cases' style="list-style: none; color: #333333; width: 90%; margin: auto; padding-top: 5px; padding-bottom: 20px;">
							<?php
							    $sqli="UPDATE downloads SET ord=99999 WHERE isactive=0;";
								$renumber=mysql_query($sqli);
								$sqli="SET @ordering_inc=1;";
								$renumber=mysql_query($sqli);
								$sqli="SET @new_ordering=0;";
								$renumber=mysql_query($sqli);
								$sqli="UPDATE downloads SET ord= (@new_ordering := @new_ordering + @ordering_inc) WHERE case_id=".$_GET['id']." AND isactive=1 ORDER BY ord;";
								$renumber=mysql_query($sqli);
								$sql="SELECT MAX(ord) AS new_ord FROM downloads WHERE case_id=".$_GET['id']." AND ord<=99998;";
								$result=mysql_query($sql);
								$ord=mysql_fetch_object($result);
								$max_ord=$ord->new_ord;
							    
							    
							    $sql="SELECT * FROM downloads WHERE case_id=".$_GET['id']." ORDER BY ord;";
								$result=mysql_query($sql);
								$rows = mysql_num_rows($result);
								for ($i = 0; $i < $rows; $i++) {
									$datafile = mysql_fetch_object($result);
									
									if ($datafile->isactive==1) {
										$ballcolor="green";
										$powercolor="red";
										$poweractiontxt="Disable";
									} else {
										$ballcolor="red";
										$powercolor="green";
										$poweractiontxt="Enable";
									}
									
									$movement="";
									$moveu='<a href="?fmu='.$datafile->id.'&id='.$_GET["id"].'"><img title="Move Up" src="./images/balls/arrow-up-blue.png" border="0" width="18px" style="margin-bottom: 0px;" /></a>';
									$moved='<a href="?fmd='.$datafile->id.'&id='.$_GET["id"].'"><img title="Move Down" src="./images/balls/arrow-down-yellow.png" border="0" width="18px" style="margin-bottom: 0px;" /></a>';
									$movet='<a href="?fmt='.$datafile->id.'&id='.$_GET["id"].'"><img title="Move Top" src="./images/balls/arrow-orange-top.png" border="0" width="18px" style="margin-bottom: 0px;" /></a>';
									$blank='<img src="./images/balls/spacer.png" border="0" width="18px" style="margin-bottom: 0px;" />';
							
									if ($datafile->featured==1) { $featuredimg='<img title="This item is Featured" src="./images/balls/featured.png" width=18px style="float: left; margin-right: 50px; margin-top: -4px;" />'; } else { $featuredimg=""; }
							
									if ($datafile->ord==0) { $moveu=$blank; $moved=$blank; $movet=$blank; } 
									if ($datafile->ord==1) { $moveu=$blank; $movet=$blank; }
									if ($datafile->ord==$max_ord) { $moved=$blank; }
									
									$movement="<div style='width: 64px; float: right; margin-top: 0px; margin-right: 20px;' id='movement'>".$moveu.$moved.$movet."</div>";
									
									if ($datafile->isactive==0) { $movement="<div style='width: 64px; float: right; margin-top: -4px; margin-right: 20px;' id='movement'>&nbsp;</div>"; }
									
									
									
									
									
									
									echo "<li><img src='./images/balls/".$ballcolor.".png' style='float: left; margin-right: 10px; margin-left: 6px; margin-top: 1px;' /><div class='case-list-box-title' style='margin-top:5px;height: 21px; line-height: 18px;'>".$datafile->filename."</div><div class='case-list-box-middle' style='margin-top:5px;'>&nbsp;</div><div class='case-list-box-modifier' style='margin-top:5px;'><a href='./getfile.php?id=".$datafile->id."' ><img title='Download File'src='./images/icons/icon-attachment-s.png' style='float: left; margin-top: -3px;margin-right: 17px;' /></a><a href='?df=".$datafile->id."&id=".$_GET['id']."' ><img title='Delete File' src='./images/icons/icon-delete-s.png' style='margin-left: 25px; float: left; margin-top: -3px;' /></a><a href='?tf=".$datafile->id."&id=".$_GET['id']."' ><img title='".$poweractiontxt." Case Study' src='./images/balls/".$powercolor."-powerbutton.png' style='margin-right: 20px; margin-left: 25px; float: left; margin-top: -3px;' /></a>$movement</div><div style='clear: both;'></li>";
								}
							?>	
						</ul>
						
						<div class="clearfix" style="height: 20px;"></div>
					</div>

					
					
			<?php		
				}
			?>
		
		
		
						<script>
							$('.cases li:even').css('background-color','#dddddd');
							$('.cases li:odd').css('background-color','#eeeeee');
						</script>
			
	</div>
	<div class="clearfix" style="height: 20px;"></div>			
	
<?php include './inc/footer.inc'; ?>