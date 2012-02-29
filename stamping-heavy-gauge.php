<?php 
	// Heavy Gauge Metal Stamping
	$title="United Manufacturing | Full Service Metal Stamping & Tooling Facilities | Heavy Gauge Metal Stamping";
	$keywords="Metal gauge, Steel gauge, Custom stamps, Gauge thickness, Cnc machine, Gauge thickness, Progressive stamping, Metal stamping, Gauge, Stamping, Sheet metal, United mfg, Roll forming, Shearing, Punching, Drawing, Stretching, Bending, Ontario, Heavy gauge stamping";
	$description="United Mfg has the capabilities and the equipment to produce heavy gauge stamping using processes such as shearing, punching, drawing, stretching, bending and coining.";
	
	include './inc/header.inc';
?>
	<h2 style="padding-top:10px;">Heavy Gauge Metal Stamping</h2>
	<div class="clearfix"></div>
	<div style="padding-top:10px;"class="structure">
		<p class="text" style="padding-top:5px;height: 90px;">
		United Mfg has the capabilities and the equipment to produce heavy gauge stamping.  We are able to stamp, materials up to &frac12;" in thickness, using processes such as shearing, punching, drawing, stretching, bending and coining.  Our maximum press tonnage is 300 tons with the ability to progressively stamp up to 300 tons allowing us to produce parts in both high &amp;  low volume.  Our bed sizes run up to 108" in length and 58" in width.
		</p>
		<div class="clearfix" style="height: 15px;"></div>
		<p class="text">
			For a detailed quotation, or inquires please email  <a href="mailto:info@umcmfg.com?subject=Website Inquiry: Heavy Gauge Metal Stamping" target="_blank"class="popLink">info@umcmfg.com</a> or fax a drawing to 519-622-1152.
		</p>
		<div class="clearfix" style="height: 15px;"></div>
		
		<a href="mailto:info@umcmfg.com?subject=Website Inquiry: Heavy Gauge Metal Stamping" target="_blank" ><img src="images/ask.png" class="askButton" style="padding-bottom:3px;"/>	</a>

		<div class="clearfix" style="height:20px;"></div>
		<img src="images/gauge1.png" style="border: 1px solid black; margin-left:175px; margin-right:170px;height:240;width:310px;"/>
			<div class="clearfix" style="height:5px;"></div>
			<a href="./stamping.php" style="font-size:14px;width:80px;margin-left:250px;margin-right:250px;height:30px;">
			Return to Metal Stamping</a>
		
	</div>


	<div style="background: #122743 url('images/gallery.png') no-repeat; margin-top:-20px;" class="gallery">
		<h2 class="galleryTitle">Gallery</h2>

			<div style="height: 310px; overflow: hidden; margin-top: 10px;">
			
					<div id='gallerybox' style="height: 297px;">
						<?php
							$count=1;
							$pageitems=0;
							$sql="SELECT * FROM images WHERE case_id=5  AND isactive=1 ORDER BY filename;";
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
		<div class="clearfix" style="height: 10px;"></div>
	</div>
	<div class="clearfix" style="height: 10px;"></div>
		
	<div class="clearfix"></div>
	<br/>
<?php include './inc/footer.inc'; ?>