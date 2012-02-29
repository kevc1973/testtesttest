<?php 
	//$title="title of page goes here!";
	//$keywords="keywords, goes, here";
	//$description="descripton goes here";
	
	include './inc/header.inc';
?>
<form action="test.php" method="get">
	<br/>
	<h2>Case Studies</h2>
	<br/>
	<div class="clearfix"></div>
	
	<div class="study">
		<div class="studyImage">
			<img src="images/can.png"/>
		</div>
		<h3 class="heading" style="color:rgb(10,36,71);" name="caseTitle">
			<input type="text"/>Case Study Name<br/>
		</h3>
		<br/>
		<br/>
		<br/>
		<div style="float:left; ">
			<h3 style="margin-left:0px;color:white;">Metal Stamping</h3>
		</div>
		<br/>
		<div style="padding-top:20px; ">
		<?php
			$sql="SELECT * FROM mytest;";
			$result=mysql_query($sql);
			$rows = mysql_num_rows($result);
			for ($i = 0; $i < $rows; $i++) {
				$data = mysql_fetch_object($result);
				echo $data->description;
				echo "<br />";
			}	
		?>
		</div>
		<br/>
		<div class="clearfix" style="height: 0px; padding-top: -200px;float:left;"></div>
		<div style="background-image: url('images/vertical.png');" class="verticalGallery">
			<div class="photo1" style="margin-left:10px;"></div>
			<div class="photo1"></div>
			<div class="photo1"></div>
			<div class="photo1"></div>
			<div class="photo1"></div>
		</div>
		<div class="clearfix"></div>
		<div style=""class="downloads">
			<img src="images/floppy.png" style="float:left;margin-top:10px;"/>
			<h2 style="float:left; margin-top:15px;margin-left:5px;">
				Downloads:
			</h2>
		</div>
		<div class="downloadItems" style="width:652px;height:100px;float:left; margin-top:15px;">
		
				<img src="images/file2.png" style="float:left"/>
					<span class="item" style="">
				document 01
			</span>
			<img src="images/file2.png" style="float:left"/>
					<span class="item" style="color:black;font-size:12px; margin-left: 5px; margin-top: 5px;float:left; ">
				document 01
			</span>
			<img src="images/file2.png" style="float:left"/>
					<span class="item" style="color:black;font-size:12px; margin-left: 5px; margin-top: 5px;float:left; ">
				document 01
			</span>
			<img src="images/infoButton.png" style="float:right;"/>
			<div class="clearfix" style="height: 10px;"></div>
			<img src="images/file2.png" style="float:left"/>
					<span class="item" style="color:black;font-size:12px; margin-left: 5px; margin-top: 5px;float:left; ">
				document 01
			</span>
			<img src="images/file2.png" style="float:left"/>
					<span class="item" style="color:black;font-size:12px; margin-left: 5px; margin-top: 5px;float:left; ">
				document 01
			</span>
			<img src="images/file2.png" style="float:left"/>
					<span class="item" style="color:black;font-size:12px; margin-left: 5px; margin-top: 5px;float:left; ">
				document 01
			</span>
			<img src="images/back.png" style="float:right;"/>
			
		</div>
		<div class="clearfix"></div>
	</div>
	<br/>
	<div class="clearfix"></div>
	<br/>
</form>
<?php include './inc/footer.inc'; ?>