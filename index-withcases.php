<?php 
	// index.php
	$title="United Manufacturing | Full Service Metal Stamping & Tooling Facilities | Main";
	$keywords="precision metal stamping, metal stamping, metal fabrication, custom manufacturing, metal, stamping, stamping on, machining, cnc machining, tooling, tool & die, assembly, welding, steel, manufacturing, production, quality, sheet metal, metal fabricators, steel fabrication, Ontario, United manufacturing, United mfg";
	$description="UMC is a full service machining, metal stamping operation and complete in-house tooling facility. UMC can do any project from start (prototype) to finish (product assembly) or any point in-between.";
	
	include './inc/header.inc';
	
?>

	
	<div  usemap="#locationMap" >
		<image src="images/map-bar.png" class="map" usemap="#locationMap" border="0px" />

		<div class="location">
			110 Werlich Drive<br/>
			Cambridge, Ontario<br/>
			Canada, N1T 1N6
		</div>
		<div class="phone">
			<span class="boldTitle">Phone:</span> 519-622-1711<br/>
			<span class="boldTitle">Fax:</span> 519-622-1152
		</div>
		<div class="link">
			<a href="" style="color:white" target="_blank" >
				Link with us!
			</a>
		</div>
	
	</div>
	
	<map name="locationMap"  >
		<area shape="rect" coords="0,0,400,70" href="http://maps.google.com/maps/ms?ie=UTF&msa=0&msid=206077483851051062057.0004a41a150541da0bd2f" alt="Map" style="border: 0px; z-index:20;"  target="_blank" />
		<area shape="circle" coords="930,40,20" href="http://ca.linkedin.com/pub/grace-lisi/25/ab7/b58" alt="Linked In!" style="border: 0px; z-index:20;" target="_blank"  />
	</map>
			<div class="clearfix"></div>
			
			<span class="uppertext" style="font-size: 14px;">
				
				United Manufacturing Corporation (UMC) is a full service <a href="./machining.php">machining</a>, <a href="./stamping.php">metal stamping</a> operation and complete in-house <a href="./tooling.php">tooling</a> facility. UMC can do any project from start (<a href="./prototype.php">prototype</a>) to finish (<a href="./product-assembly.php">product assembly</a>) or any point in-between. UMC even offers product storage for valued customers.<br />
				<br />
				UMC offers two up to date, modern, safe facilities totalling 25,000 sq ft. One facility accommodates the <a href="./stamping.php">metal stamping</a> operation while the second facility, is utilized for our <a href="./machining.php">machining</a> and <a href="./tooling.php">tool and die</a> division. Our reputation for cost competitiveness, project problem solving, reliable goal driven time management and attention to detail, leading to a high quality end product and customer satisfaction is industry renowned.<br />
				<br />
				UMC consider our staff and long term client satisfaction, the foundation for our success and take great pride in the knowledge that our years of experience and knowledge within the industry allows us the flexibility to adapt to a large variety of potential situations.<br />
				<br />
				For a detailed quotation, or inquiries please <a href="./contact.php">contact us</a> by phone, email or fax.<br />
			</span>
			
		<div style="margin-top: 8px; float: right;" >
			<?php
				$sql="SELECT * FROM case_studies WHERE id>99 AND isactive=1 AND featured=1 ORDER BY ord;";
				$result=mysql_query($sql);
				$rows = mysql_num_rows($result);
				for ($i = 0; $i < $rows; $i++) {
					$data = mysql_fetch_object($result);
					switch ($data->category) {
						case 1:
							$categorytxt="<a href='./prototype.php' style='color: black' >Category: Prototypes</a>";
						break;
						case 2:
							$categorytxt="<a href='./tooling.php' style='color: black' >Category: Tooling</a>";
						break;
						case 3:
							$categorytxt="<a href='./machining.php' style='color: black' >Category: Machining</a>";
						break;
						case 4:
							$categorytxt="<a href='./stamping.php' style='color: black' >Category: Metal Stamping</a>";
						break;
						case 5:
							$categorytxt="<a href='./stamping-progressive.php' style='color: black' >Category: Progressive Metal Stamping</a>";
						break;
						case 6:
							$categorytxt="<a href='./stamping-deep-drawing.php' style='color: black' >Category: Drawing Deep & Drawing</a>";
						break;
						case 7:
							$categorytxt="<a href='./stamping-heavy-gauge.php' style='color: black' >Category: Heavy Gauge Metal Stamping</a>";
						break;
						case 8:
							$categorytxt="<a href='./stamping-precision-bends.php' style='color: black' >Category: Bend or Multiple Bend</a>";
						break;
						case 9:
							$categorytxt="<a href='./stamping-fabrication.php' style='color: black' >Category: Fabrication</a>";
						break;
						case 10:
							$categorytxt="<a href='./stamping-secondary.php' style='color: black' >Category: Secondary Stamping</a>";
						break;
						case 11:
							$categorytxt="<a href='./product-assembly.php' style='color: black' >Category: Product Assembly</a>";
						break;
						case 12:
							$categorytxt="<div style='color: black' >Category: Other</div>";
						break;
					}
					
					?>
						<a href="./case-study-expanded.php?id=<?php echo $data->id; ?>" style="color: white;">
							<div class="picturebox" style="background: #09254A;">
								<div style="float: left;">
									<img src="./getmainimage.php?id=<?php echo $data->id; ?>&t=0" style="margin-top: 2px; border: 0;" />
								</div>
								<div class="featured-text" style="width: 295px;" >
									<h2 class="boxTitle" style="width: 200px; margin-left: 0px; text-align: left; color: #666666; font-size: 9px;">
										Featured case study:
									</h2>
									<div style="font-size: 14px; font-weight: 600; color: white;"><?php echo $data->title; ?></div>
									<div style="font-size: 9px; overflow: hidden; color: #dedede; height: 90px; margin-top: 7px; width: 290px;"><?php echo $data->preview_text; ?></div>
									
								</div>
							</div>
						</a>
						<div class="clearfix" style="height: 20px;"></div>
					<?php
				}		
			?>
		</div>
			
		
		
	
			
			
<div class="clearfix" style="height: 1px;"></div>			
<?php include './inc/lower-middle.inc'; ?>


	<div class="box" style="background-image:url('images/can.png');">
		<h2 class="boxTitle">
			Points of separation<br/> From overseas production
		</h2>
		<div class="clearfix"></div>
		<ul>
			<li>Cost Comparative</li>
			<li>JIT (Just in Time) delivery</li>
			<li>Local and international delivery</li>
			<li>Customer quantities</li>
			<li>Easy communication</li>
			<li>Onsite engineering assistance</li>
			<li>Wealth of manufacturing knowledge in the metal industry</li>
			<li>15-20 years dedicated and knowledgeable employees</li>
			<li>Safe work environment</li>
		</ul>
	</div>
	<div class="box" style="background-image:url('images/flow.png'); width: 304px;margin-left: 27px;">
		<h2 class="boxTitle">
			Workflow<br/>Breakdown
		</h2>
		<div class="clearfix"></div>
		<ul>
			<li>Process development</li>
			<li>Prototypes</li>
			<li>Develop a process to make an economical<br/>
			product (build tooling or fixtures etc.)</li>
			<li>Purchasing (materials to build tooling and to produce part)</li>
			<li>Stamping</li>
			<li>Machining</li>
			<li>Welding</li>
			<li>Assembly</li>
			<li>Subcontracting</li>
			<li>
				Packaging, storage and shipping:<br/>
				UMC uses a visual inventory management system.  
				Since goods are always stored in the same<br/>
				physical location, audits are easy and reliable.
			</li>
		</ul>
	</div>
	<div class="box" style="background-image:url('images/disc.png'); float: right;">
		<h2 class="boxTitle">
			Industries<br/>Serviced
		</h2>
		<div class="clearfix"></div>
		<ul>
			<li>Lighting</li>
			<li>Electrical</li>
			<li>Fiber optics</li>
			<li>Solar</li>
			<li>Electric heaters</li>
			<li>Energy sector</li>
			<li>Renewable energy sector</li>
			<li>Office equipment</li>
			<li>Retail display racks</li>
			<li>Filtration</li>
			<li>Communication</li>
			<li>Refrigeration</li>
			<li>Automotive</li>
		</ul>
	</div>
	
	
<div class="clearfix" style="height: 10px;"></div>


<?php include './inc/footer.inc'; ?>