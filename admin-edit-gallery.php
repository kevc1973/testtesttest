<?php 
	$title="United Manufacturing | Full Service Metal Stamping & Tooling Facilities | Administration | View Edit Gallery";
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
?>




	
	<div class="clearfix" style="height: 0px;"></div>
	<div id="admin-content">
		
		
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
										// ------------------------------------------------------------------------------------------------------------
										
										
								        $sql="INSERT INTO images (case_id,filedata_large,filedata_small,filedata_actual, filename) VALUES (".$_GET['id'].",'$file1data','$file2data','$file3data', '$file1name');";
								        $result=mysql_query($sql);
						    }
					} else {
						// were uploading an file					
					
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
				
				}
				
				
				
			}
		

			
			
		?>
		
		

			<?php
				// THIS block only shows if we are editing (it allows files to be added to a case.
				if (isset($_GET['id'])) {
					$sql2="SELECT * FROM case_studies WHERE id=".$_GET['id'].";";
					$result2=mysql_query($sql2);
					$data2=mysql_fetch_array($result2);
					$case_title=$data2['title'];
				
			?>
			
			
			
			
					<?php
						include './inc/adminbar-galleries.inc';	
					?>
					
					
					<div class="clearfix" style="height: 18px;"></div>
					<h1 style="color: black; background: #bbbbbb; line-height: 29px; height: 25px;" >
						<img src="./images/icons/icon-header-gallery.png" style="clear: both; margin-top: -15px; float: left; margin-left: 25px;" />
						<p>Gallery Editor | <?php echo $case_title; ?></p>
					</h1>
					<div class="clearfix" style="height: 10px;"></div>
					
					<div id="addimages">
						<div class="label">
							Add New Image :
						</div>
						<div class="field">
						  <form method="post" action="" name="cases" enctype="multipart/form-data" >
							<div id="realbox_newimage" style="position: relative;">
								<input name="new_image" id="new_image" class="realinput_image" type="file" style="width: 400px;" width="400px" onchange="var i=$('.realinput_image').attr('value'); $('.fakeinput_image').attr('value',i); alert($('.realinput_image').attr('value'));" >
							</div>
							<div class="fakebox_image" style="float: left;position: relative; margin-top: -25px; z-index: 99;">
								<input class="fakeinput_image" type="text" style="width: 443px; height: 20px;" width="443px"><input type="button" class="fakebrowse_image" value="Browse" width="120px">
								<input type="submit" value="Upload" id="upimage" />
								<span style="float: right; margin-top: 4px; margin-left: 10px; font-size: 9px; line-height: 10px;">(MAX 2 megabytes jpeg, <br />png or gif)</span>
							</div>
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
						<div style="margin-left: 60px;"><img src="./images/gallery-images.png" /></div>
						
						
						<ul class='cases' style="list-style: none; color: #333333; width: 90%; margin: auto; padding-top: 5px; padding-bottom: 20px;">
							<?php
							    $sql="SELECT * FROM images WHERE case_id=".$_GET['id']." ORDER BY isactive DESC;";
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
									echo "<li><img src='./images/balls/".$ballcolor.".png' style='float: left; margin-right: 10px; margin-left: 6px; margin-top: 29px;' /><div class='case-list-box-image'><img src='./getimage.php?id=".$dataimg->id."&t=0' width='80px' /></div><div class='case-list-box-title'>".$dataimg->filename."</div><div class='case-list-box-middle'>&nbsp;</div><div class='case-list-box-modifier'><a href='?di=".$dataimg->id."&id=".$_GET['id']."' ><img title='Delete Image' src='./images/icons/icon-delete-s.png' style='margin-left: 25px; float: left; margin-top: -7px;' /></a><a href='?ti=".$dataimg->id."&id=".$_GET['id']."' ><img title='".$poweractiontxt." Case Study' src='./images/balls/".$powercolor."-powerbutton.png' style='margin-right: 20px; margin-left: 25px; float: left; margin-top: -7px;' /></a></div><div style='clear: both;'></li>";
								}
							?>	
						</ul>
						
						
						
						<div class="clearfix" style="height: 20px;"></div>
					</div>
					
					
					
					
					
					
					
					
					
					
					
					<h2 style="font-size: 22px; margin-top: 20px; margin-bottom: 20px;">
							<img src="./images/icons/icon-attachment-l.png" style="float: left; margin-top: -15px; margin-right: 20px;" />Files
					</h2>
					<div id="addimages">
						<div class="label">
							Add New File :
						</div>
						<div class="field">
						  <form method="post" action="" name="cases" enctype="multipart/form-data" >
							<div id="realbox_file" style="position: relative;">
								<input name="new_file" id="new_file" class="realinput_file" type="file" style="width: 400px;" width="400px">
							</div>
							<div class="fakebox_file" style="float: left;position: relative; margin-top: -25px; z-index: 99;">
								<input class="fakeinput_file" type="text" style="width: 443px; height: 20px;" width="443px"><input type="button" class="fakebrowse_file" value="Browse" width="120px">
								<input type="submit" value="Upload" id="upfile" />
								<span style="float: right; margin-top: 5px; margin-left: 10px; font-size: 9px; line-height: 10px;">(MAX 10 megabytes Word, <br />Excel or PDF file)</span>
							</div>
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
						<div style="margin-left: 60px;"><img src="./images/gallery-files.png" /></div>
						
						
						<ul class='cases' style="list-style: none; color: #333333; width: 90%; margin: auto; padding-top: 5px; padding-bottom: 20px;">
							<?php
							    $sql="SELECT * FROM downloads WHERE case_id=".$_GET['id']." ORDER BY isactive DESC, filename;";
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
									echo "<li><img src='./images/balls/".$ballcolor.".png' style='float: left; margin-right: 10px; margin-left: 6px; margin-top: 1px;' /><div class='case-list-box-title' style='margin-top:5px;'>".$datafile->filename."</div><div class='case-list-box-middle' style='margin-top:5px;'>&nbsp;</div><div class='case-list-box-modifier' style='margin-top:5px;'><a href='./getfile.php?id=".$datafile->id."' target='_blank'><img title='Download File'src='./images/icons/icon-attachment-s.png' style='float: left; margin-top: -7px;' /></a><a href='?df=".$datafile->id."&id=".$_GET['id']."' ><img title='Delete File' src='./images/icons/icon-delete-s.png' style='margin-left: 25px; float: left; margin-top: -7px;' /></a><a href='?tf=".$datafile->id."&id=".$_GET['id']."' ><img title='".$poweractiontxt." Case Study' src='./images/balls/".$powercolor."-powerbutton.png' style='margin-right: 20px; margin-left: 25px; float: left; margin-top: -6px;' /></a></div><div style='clear: both;'></li>";
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