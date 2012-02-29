<?php 
	// stamping.php
	$title="United Manufacturing | Full Service Metal Stamping & Tooling Facilities | Metal Stamping";
	$keywords="Precision metal stamping, Metal stamping, Metal fabrication manufacturing, Custom manufacturing, Metal, Stamping, Machining, CNC machining, Tooling, Tool & die, Assembly, Welding, Steel, Manufacturing, Production, Quality, Metal forming, Steel stamping, Progressive metal, Deep drawing, Heavy gauge metal stamping, Fabrication, Secondary Stamping, Stamping companies, Custom stamping, United manufacturing, United mfg";
	$description="At UMC our machine shop offers clients progressive metal stamping, drawing & deep drawing, heavy gauge metal stamping, bend or multiple bend, stamping fabrication, and secondary stamping.";
	
	include './inc/header.inc';
?>
	<h2 style="padding-top:10px;">Metal Stamping</h2>
	<div class="clearfix"></div>
	<div style="padding-top:10px;padding-bottom:20px;"class="structure">
		<p class="text" style="padding-top:5px;">
		At UMC our well-equipped machine shop offer's clients the assurance that the work can
		be done competently and promptly.  We have modern computerized CNC machines as well
		as conventional machinery and are able to manufacture a wide variety of materials, in both small 
		quantities or large production runs, jigs, fixtures and prototype quality precision machined
		products delivered on-time at fair competitive prices.
		<div class="clearfix" style="height: 15px;"></div>
		</p>
		<p class="text">
		Our press Room is well equipped with an assortment of presses ranging from 40 ton - 300 ton capacity.
		Automatic feed lines ranging from .015" - .250" thickness, de-coilers up to 6000lbs and widths from 
		3/8" to 24".  UMC is capable of running strips (up to 3/8"thick) for low volumes or coils for high 
		volume production as well as stamp a variety of metals such as galvanized, 
		cold roll steel, hot roll steel, stainless, and aluminum.
		</p>
		<div class="clearfix" style="height: 15px;"></div>
		<p class="text">
		We also build tooling for stamping copper parts, brass, bronze or other exotic metals.
		</p>
		<div class="clearfix" style="height: 15px;"></div>
		<p class="text" style="height:75px;">
		UMC repairs and maintains all customer dies at no cost to the customer while 
		tooling is in UMC's possession.  We have toolmakers that understand the pressroom that enable us 
		to make fast tool modifications to accommodate engineering changes.  
		Our primary markets include: Heating, Electrical, Lighting, Office, and Appliances<br/>
		</p>

		<div style="text-decoration:none;margin-left:97.5px;margin-right:292.5px;" class="toolList">
			<ul style="padding-bottom:10px;padding-top:0px;">
				<li><a href="./stamping-progressive.php">Progressive Metal Stamping</a></li>
				<li><a href="./stamping-deep-drawing.php">Drawing Deep &amp; Drawing</a></li>
				<li><a href="./stamping-heavy-gauge.php">Heavy Gauge Metal Stamping</a></li>
				<li><a href="./stamping-precision-bends.php">Bend or Multiple Bend</a></li>
				<li><a href="./stamping-fabrication.php">Fabrication</a></li>
				<li><a href="./stamping-secondary.php">Secondary Stamping</a></li>
			</ul>
		</div>
		<div class="clearfix" style="height: 15px;"></div>
		<p class="text">
			For a detailed quotation, or inquires please email  <a href="mailto:info@umcmfg.com?subject=Website Inquiry: Metal Stamping" class="popLink">info@umcmfg.com</a> or fax a drawing to 519-622-1152.
		</p>
		<div class="clearfix" style="height: 15px;"></div>
		
		<a href="mailto:info@umcmfg.com?subject=Website Inquiry: Metal Stamping" ><img src="images/ask.png" class="askButton" style=""/>	</a><br /><br />
	</div>
 
		<div style="background: #122743 url('images/gallery.png') no-repeat; margin-top:-20px;" class="gallery">
		<h2 class="galleryTitle">Gallery</h2>

			<div style="height: 310px; overflow: hidden; margin-top: 10px;">
			
					<div id='gallerybox' style="height: 297px;">
						<?php
							$count=1;
							$pageitems=0;
							$sql="SELECT * FROM images WHERE case_id=5 AND isactive=1 ORDER BY filename;";
							$result=mysql_query($sql);
							$rows = mysql_num_rows($result);
							for ($i = 0; $i < $rows; $i++) {
								$dataimg = mysql_fetch_object($result);
								
								$pageitems++;
								if ($pageitems==10) {
									$pageitems=1;
									echo "<span style='float: right; margin-right: 10px; cursor: pointer;' class='more'>more</span><br />";
									echo "<span style='float: right; margin-right: 10px; cursor: pointer;' class='back'>back</span>";
								}
								
								if ($count==1) {
									$style="margin-left: 9px;";
								} else {
									$style="";
				
								}
								echo '<div class="galleryImage" style="'.$style.'"><img class="showpic" alt="'.$dataimg->id.'" src="./getimage.php?t=0&id='.$dataimg->id.'" width="84px" style="cursor: pointer;" ></div>';				
								$count++;
								if ($count==4) { $count=1; echo '<div class="clearfix" style="height: 0px;"></div>'; }
								
							}
						?>
						<script>
							$('.more').click(function() {
 								 var rrrr=1;
 								 $('#gallerybox').animate({marginTop: "-=310px"}, 200 );
							});
							$('.back').click(function() {
 								 var rrrr=1;
 								 $('#gallerybox').animate({marginTop: "+=310px"}, 200 );
							});
						</script>
				
				</div>
		
				
				
				<div class="clearfix" style="height: 1px;"></div>
			</div>		
		<div class="clearfix" style="height: 1px;"></div>
		<div id="photoboxcontainer" style="position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; background: #111122; background: rgba(11,11,22,0.9); display: none;">
			<div style="width: 640px; margin: auto;">
			<div id="photobox" style="position: fixed; margin: auto; top: 20px; width: 640px; border: #000000 1px solid; -webkit-box-shadow: 0px 0px 20px #7777ff; -moz-box-shadow: 0px 0px 20px #7777ff; box-shadow: 0px 0px 20px #7777ff;">
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
		

		
		<h2 class="galleryTitle" style="margin-top:-17px;">Downloads<h2>
		<div class="galleryDownloads">
			
			
			
			<?php
				$sql="SELECT * FROM downloads WHERE case_id=5 AND isactive=1 ORDER BY filename;";
				$result=mysql_query($sql);
				$rows = mysql_num_rows($result);
				for ($i = 0; $i < $rows; $i++) {
					$datafile = mysql_fetch_object($result);
					switch ($datafile->filetype) {
						case "application/pdf":
							$icon="pdf";
						break;
						case "application/msword":
							$icon="word";
						break;
						case "application/msexcel":
							$icon="excel";
						break;
						case "application/vnd.ms-excel":
							$icon="excel";
						break;
						case "image/jpeg":
							$icon="img";
						break;
						case "image/png":
							$icon="img";
						break;
						case "image/gif":
							$icon="img";
						break;
					}
					
			echo '<a href="./getfile.php?id='.$datafile->id.'" target="_blank"><div class="galleryDoc"><img src="images/icons/file-icon-'.$icon.'.png"  class="docImage"/>'.$datafile->filename.'</div></a>';
			
				}
			?>
		
		
		
		
			<div class="clearfix" style="height: 10px;"></div>
			
		</div>
		<div class="clearfix" style="height: 30px;"></div>
	</div>
	<div class="clearfix" style="height: 10px;"></div>
<?php include './inc/footer.inc'; ?>