<?php 
	// case-studies.php
	$title="United Manufacturing | Full Service Metal Stamping & Tooling Facilities | Case Studies";
	$keywords="bending metal, prototype stampings, prototype metal stamping, progressive die drawing, aluminum stampings, sheet metal stamping, tool & die, metal forming, high speed metal stamping, sheet metal prototypes, metal stamping industry, stamping, sheet metal, metal fabricating, metal working, bending metal, manufacturing services, custom metal fabrication, stamping company, tooling and die, United manufacturing, United mfg";
	$description="UMC is a full service machining, metal stamping operation and complete in-house tooling facility. UMC can do any project from start (prototype) to finish (product assembly) or any point in-between.";
	
	include './inc/header.inc';
?>
	<h2 style="padding-top:10px;">Case Studies</h2>

	<div class="clearfix" style="height:10px;"></div>
	

<?php

    $sql="SELECT * FROM case_studies WHERE id>99 AND isactive=1 ORDER BY ord;";
	$result=mysql_query($sql);
	$rows = mysql_num_rows($result);
	for ($i = 0; $i < $rows; $i++) {
		$data = mysql_fetch_object($result);

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
							$categorytxt="<span style='color: #0A4AE2' >Category: Other</span>";
						break;
					}
			?>
	
	
	
	
	
	
	<a href="./case-study-expanded.php?id=<?php echo $data->id; ?>" style="color: white; border: 0;">
			<div class="smallStudy">
			<div class="smallStudyImage" style="float: left; border: 0;">
				<img src="./getmainimage.php?id=<?php echo $data->id; ?>&t=0" style="width:150px; height:150px; border: 0;" border="0" />
			</div>
			<div style="float: right; width: 790px;">
				<h3 class="studyHeading" style="float: left;">
					<?php echo $data->title; ?>
				</h3>
				<div style="clear: both; float: left; color: black;" >
					<?php echo $categorytxt; ?><br />
					Project Started: <?php echo $data->start_date; ?><?php if ($data->end_date!="") { echo ", Completed: ".$data->end_date; } ?>
				</div>
				<br/>
				<div style="clear: both; float: left; color: #111133; margin-top: 10px; height: 60px; width: 780px; overflow: hidden; font-size: 14px; "  >
					<a href="./case-study-expanded.php?id=<?php echo $data->id; ?>" style="color: black;">
					<?php echo $data->preview_text; ?>
					</a>
				</div>
			</div>
			<a href="./case-study-expanded.php?id=<?php echo $data->id; ?>" style="color: white;">
				<img src="images/learn.png" style="float:right; margin-right: 8px;margin-top: 5px;"/>		
			</a>
		</div>	
	</a>
	
	<div class="clearfix" style="height: 15px;"></div>


<?php 
	}
?>	
	
	
	
	
<?php include './inc/footer.inc'; ?>