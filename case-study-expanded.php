<?php 
    // Case Study Expanded
	$title="United Manufacturing | Full Service Metal Stamping & Tooling Facilities | Case Study Detail";
	$keywords="Full service, prototype stampings, prototype metal stamping, progressive die drawing, aluminum stampings, sheet metal stamping, tool & die, metal forming, high speed metal stamping, sheet metal prototypes, metal stamping industry, process manufacturing, stamping, sheet metal, metal fabricating, metal working, manufacturing companies, manufacturing services, custom metal fabrication, stamping company, tooling and die, United manufacturing, United mfg";
	$description="UMC is a full service machining, metal stamping operation and complete in-house tooling facility. UMC can do any project from start (prototype) to finish (product assembly) or any point in-between.";
	
	include './inc/header.inc';
	
	
?>
	<br/>
	<h2>Case Studies</h2>
	<br/>
	<div class="clearfix"></div>
<?php

    $sql="SELECT * FROM case_studies WHERE id=".$_GET['id'].";";
	$result=mysql_query($sql);
	$data=mysql_fetch_object($result);
	$thetitle=$data->title;
	
	switch ($data->category) {
						case 1:
							$categorytxt="<a href='./prototype.php' style='color: #0A4AE2' >Category: Prototypes</a>";
						break;
						case 2:
							$categorytxt="<a href='./tooling.php' style='color: #0A4AE2' >Category: Tooling</a>";
						break;
						case 3:
							$categorytxt="<a href='./machining.php' style='color: #0A4AE2' >Category: Machining</a>";
						break;
						case 4:
							$categorytxt="<a href='./stamping.php' style='color: #0A4AE2' >Category: Metal Stamping</a>";
						break;
						case 5:
							$categorytxt="<a href='./stamping-progressive.php' style='color: #0A4AE2' >Category: Progressive Metal Stamping</a>";
						break;
						case 6:
							$categorytxt="<a href='./stamping-deep-drawing.php' style='color: #0A4AE2' >Category: Drawing Deep & Drawing</a>";
						break;
						case 7:
							$categorytxt="<a href='./stamping-heavy-gauge.php' style='color: #0A4AE2' >Category: Heavy Gauge Metal Stamping</a>";
						break;
						case 8:
							$categorytxt="<a href='./stamping-precision-bends.php' style='color: #0A4AE2' >Category: Bend or Multiple Bend</a>";
						break;
						case 9:
							$categorytxt="<a href='./stamping-fabrication.php' style='color: #0A4AE2' >Category: Fabrication</a>";
						break;
						case 10:
							$categorytxt="<a href='./stamping-secondary.php' style='color: #0A4AE2' >Category: Secondary Stamping</a>";
						break;
						case 11:
							$categorytxt="<a href='./product-assembly.php' style='color: #0A4AE2' >Category: Product Assembly</a>";
						break;
						case 12:
							$categorytxt="<span style='color: #0A4AE2;' >Category: Other</span>";
						break;
					}
	
	

?>	
	<div class="study">
		<div class="studyImage">
			<img src="./getmainimage.php?id=<?php echo $data->id; ?>&t=1"/>
		</div>
		<h3 class="heading" style="color:rgb(10,36,71); ">
			<?php echo $data->title; ?>
		</h3>
		<br /><br /><br />
		<div style="float:left; ">
			<h3 style="margin-left:0px;color:black; text-align: left;">
				<?php echo $categorytxt; ?><br />
				<?php 
					echo "<div style='float: left; font-weight: 100; margin: 0px; font-size: 11px; color: black; margin-top: 3px; font-variant: normal; text-transform: none;'>Project Started: ".$data->start_date;
					if ($data->end_date!="") { echo ",   Completed: ".$data->end_date."</div>"; }
				
				
				?>
		</h3>
		</div>
		<br />
		<div style="padding: 20px; padding-top:33px; font-size: 14px; color: #111133; min-height: 198px;">
			<?php echo htmlspecialchars_decode($data->text); ?>
			<div class="clearfix">&nbsp;</div>
		</div>
		<div class="clearfix" style="height: 0px; padding-top: -200px;float:left;">&nbsp;</div>
		<div style="background: #09254a;" class="verticalGallery">
			<?php
				$sql="SELECT * FROM images WHERE case_id=".$_GET['id']." AND isactive=1 ORDER BY ord;";
				$result=mysql_query($sql);
				$rows = mysql_num_rows($result);
				for ($i = 0; $i < $rows; $i++) {
					$data = mysql_fetch_object($result);
			?>
					<div class="photo1" style="margin-left:10px;">
						<img class="showpic" alt="<?php echo $data->id; ?>" src="./getimage.php?id=<?php echo $data->id; ?>&t=0" width="60px" style="margin-top: -1px; cursor: pointer;" />
					</div>
			<?php
				}
			?>
		</div>
		
		
		<div id="photoboxcontainer" style="position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; background: #111122; background: rgba(11,11,22,0.9); display: none;">
			<div style="width: 640px; margin: auto;">
			<div id="photobox" style="position: absolute; margin: auto; top: 20px; width: 640px; border: #000000 1px solid; -webkit-box-shadow: 0px 0px 20px #ccccff; -moz-box-shadow: 0px 0px 20px #ccccff; box-shadow: 0px 0px 20px #ccccff;">
				asdf
			</div>
			</div>
		</div>
		<script>
			$('.showpic').click(function() {
  				var mine=$(this).attr('alt');
  				var out='<img src="./getimage.php?t=2&id='+ mine +'" width="640px" />';
  				$('#photobox').html(out);
				$('#photoboxcontainer').fadeIn(200);	
  			});
  			$('#photoboxcontainer').click(function() {
  				$('#photobox').html('');
				$('#photoboxcontainer').fadeOut(300);	
  			});
		</script>
		
		<div class="clearfix"></div>
		
		<div style=" width: 180px;" class="downloads">
			<img src="images/floppy.png" style="float:left;margin-top:10px;"/>
			<h2 style="float:left; margin-top:15px;margin-left:5px;">
				Downloads:
			</h2>
		</div>
		<div class="downloadItems" style="width:752px;min-height:10px;float:left; margin-top:15px;">
			<div style="float: left; width: 600px;">
				<?php
					$sql="SELECT * FROM downloads WHERE case_id=".$_GET['id']." AND isactive=1 ORDER BY ord;";
					$result=mysql_query($sql);
					$rows = mysql_num_rows($result);
					$currow=1;
					for ($i = 0; $i < $rows; $i++) {
						$data = mysql_fetch_object($result);
				?>
						<a href="./getfile.php?id=<?php echo $data->id; ?>" target="_blank">
							<img src="images/file2.png" style="float:left"/>
							<span class="item" style="width: 190px; float: left;">
								<?php echo $data->filename; ?>
							</span>
						</a>
				<?php
						$currow++;
						if ($currow==3) {
							$currow=1;
							echo "<div style='clear: both; height: 5px;'></div>";
						}

					}
				?>
			</div>
			
			<a href="mailto: info@umcmfg.com?subject=Case Study Info Request: <?php echo $thetitle; ?>"><img src="images/infoButton.png" style="float:right; margin-right: 19px;"/></a>
			<a href="./case-studies.php"><img src="images/back.png" style="float:right; margin-top: 5px; margin-right: 19px;"/></a>
			
		</div>
		<div class="clearfix" style="height: 15px;"></div>
	</div>
	<div class="clearfix" style="height: 15px;"></div>


<?php include './inc/footer.inc'; ?>