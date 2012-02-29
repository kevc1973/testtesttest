<?php 
	$title="United Manufacturing | Full Service Metal Stamping & Tooling Facilities | Administration | View Case Studies";
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
	if (isset($_GET['dcs'])) {
		$id=$_GET['dcs'];
		$sql="DELETE FROM case_studies WHERE id=".$id;
		$result=mysql_query($sql);
		$sql="DELETE FROM images WHERE case_id=".$id;
		$result=mysql_query($sql);
		$sql="DELETE FROM downloads WHERE case_id=".$id;
		$result=mysql_query($sql);
		$sqli="SET @ordering_inc=1;";
		$renumber=mysql_query($sqli);
		$sqli="SET @new_ordering=0;";
		$renumber=mysql_query($sqli);
		$sqli="UPDATE case_studies SET ord= (@new_ordering := @new_ordering + @ordering_inc) WHERE isactive=1 AND id>99 ORDER BY ord;";
		$renumber=mysql_query($sqli);
	}
	if (isset($_GET['tcs'])) {
		$sql="UPDATE case_studies SET isactive = isactive^1 WHERE id=".$_GET['tcs'].";";
		$result=mysql_query($sql);
		$sqli="SET @ordering_inc=1;";
		$renumber=mysql_query($sqli);
		$sqli="SET @new_ordering=0;";
		$renumber=mysql_query($sqli);
		$sqli="UPDATE case_studies SET ord= (@new_ordering := @new_ordering + @ordering_inc) WHERE isactive=1 AND id>99 ORDER BY ord;";
		$renumber=mysql_query($sqli);
		
	}
	if (isset($_GET['mt'])) {
		$sqli="UPDATE case_studies SET ord=0 WHERE id=".$_GET['mt'].";";
		$renumber=mysql_query($sqli);
		$sqli="SET @ordering_inc=1;";
		$renumber=mysql_query($sqli);
		$sqli="SET @new_ordering=0;";
		$renumber=mysql_query($sqli);
		$sqli="UPDATE case_studies SET ord= (@new_ordering := @new_ordering + @ordering_inc) WHERE isactive=1 AND id>99 ORDER BY ord;";
		$renumber=mysql_query($sqli);	
	}
	
	
	
	if (isset($_GET['mu'])) {	
		$sql="SELECT * FROM case_studies WHERE id=".$_GET['mu'].";";
		$result=mysql_query($sql);
		$data=mysql_fetch_object($result);
		$prev_ord=$data->ord-1;
		$sql2="SELECT id, ord FROM case_studies WHERE ord=".$prev_ord.";";
		$result2=mysql_query($sql2);
		$data2=mysql_fetch_object($result2);
		$sql="UPDATE case_studies SET ord=".$data->ord." WHERE id=".$data2->id.";";
		$result=mysql_query($sql);
		$sql="UPDATE case_studies SET ord=".$data2->ord." WHERE id=".$data->id.";";
		$result=mysql_query($sql);
	}	
	if (isset($_GET['md'])) {	
		$sql="SELECT * FROM case_studies WHERE id=".$_GET['md'].";";
		$result=mysql_query($sql);
		$data=mysql_fetch_object($result);
		$prev_ord=$data->ord+1;
		$sql2="SELECT id, ord FROM case_studies WHERE ord=".$prev_ord.";";
		$result2=mysql_query($sql2);
		$data2=mysql_fetch_object($result2);
		$sql="UPDATE case_studies SET ord=".$data->ord." WHERE id=".$data2->id.";";
		$result=mysql_query($sql);
		$sql="UPDATE case_studies SET ord=".$data2->ord." WHERE id=".$data->id.";";
		$result=mysql_query($sql);
	}	
	
	
?>
	
	<div class="clearfix" style="height: 1px;"></div>
	<div id="admin-content">
		<?php include './inc/adminbar-cases.inc'; ?>
		<div class="clearfix" style="height: 10px;"></div>
		<h1 style="color: black; background: #bbbbbb; line-height: 29px; height: 25px;" >
			<img src="./images/icons/icon-header-cases.png" style="clear: both; margin-top: -15px; float: left; margin-left: 25px;" />
			Case Studies | View
		</h1>
		<div class="clearfix" style="height: 10px;"></div>	
		<div style="margin-left: 55px;"><img src="./images/cases-list-title.png" /></div>
		<ul class='cases' style="list-style: none; color: #333333; width: 90%; margin: auto; padding-top: 20px; padding-bottom: 20px;">
<?php

					$sqli="UPDATE case_studies SET ord=99999 WHERE isactive=0;";
					$renumber=mysql_query($sqli);
					$sqli="SET @ordering_inc=1;";
					$renumber=mysql_query($sqli);
					$sqli="SET @new_ordering=0;";
					$renumber=mysql_query($sqli);
					$sqli="UPDATE case_studies SET ord= (@new_ordering := @new_ordering + @ordering_inc) WHERE isactive=1 AND id>99 ORDER BY ord;";
					$renumber=mysql_query($sqli);
					$sql="SELECT MAX(ord) AS new_ord FROM case_studies WHERE ord<=99998;";
					$result=mysql_query($sql);
					$ord=mysql_fetch_object($result);
					$max_ord=$ord->new_ord;

    $sql="SELECT * FROM case_studies WHERE id>99 AND ord<=99999 ORDER BY ord;";
	$result=mysql_query($sql);
	$rows = mysql_num_rows($result);
	for ($i = 0; $i < $rows; $i++) {
		$data = mysql_fetch_object($result);
					switch ($data->category) {
						case 1:
							$categorytxt="<a href='./prototype.php' style='color: black' >Prototypes</a>";
						break;
						case 2:
							$categorytxt="<a href='./tooling.php' style='color: black' >Tooling</a>";
						break;
						case 3:
							$categorytxt="<a href='./machining.php' style='color: black' >Machining</a>";
						break;
						case 4:
							$categorytxt="<a href='./stamping.php' style='color: black' >Metal Stamping</a>";
						break;
						case 5:
							$categorytxt="<a href='./stamping-progressive.php' style='color: black' >Progressive Metal Stamping</a>";
						break;
						case 6:
							$categorytxt="<a href='./stamping-deep-drawing.php' style='color: black' >Drawing Deep & Drawing</a>";
						break;
						case 7:
							$categorytxt="<a href='./stamping-heavy-gauge.php' style='color: black' >Heavy Gauge Metal Stamping</a>";
						break;
						case 8:
							$categorytxt="<a href='./stamping-precision-bends.php' style='color: black' >Bend or Multiple Bend</a>";
						break;
						case 9:
							$categorytxt="<a href='./stamping-fabrication.php' style='color: black' >Fabrication</a>";
						break;
						case 10:
							$categorytxt="<a href='./stamping-secondary.php' style='color: black' >Secondary Stamping</a>";
						break;
						case 11:
							$categorytxt="<a href='./product-assembly.php' style='color: black' >Product Assembly</a>";
						break;
						case 12:
							$categorytxt="<div style='color: black' >Other</div>";
						break;
					}
		
		
		if ($data->isactive==1) {
			$ballcolor="green";
			$powercolor="red";
			$poweractiontxt="Disable";
		} else {
			$ballcolor="red";
			$powercolor="green";
			$poweractiontxt="Enable";
		}
		
		
		$movement="";
		$moveu='<a href="?mu='.$data->id.'" ><img title="Move Up" src="./images/balls/arrow-up-blue.png" border="0" width="18px" style="margin-bottom: 0px;" /></a>';
		$moved='<a href="?md='.$data->id.'" ><img title="Move Down" src="./images/balls/arrow-down-yellow.png" border="0" width="18px" style="margin-bottom: 0px;" /></a>';
		$movet='<a href="?mt='.$data->id.'" ><img title="Move Top" src="./images/balls/arrow-orange-top.png" border="0" width="18px" style="margin-bottom: 0px;" /></a>';
		$blank='<img src="./images/balls/spacer.png" border="0" width="18px" style="margin-bottom: 0px;" />';

		if ($data->featured==1) { $featuredimg='<img title="This item is Featured" src="./images/balls/featured.png" width=18px style="float: left; margin-right: 50px; margin-top: -4px;" />'; } else { $featuredimg=""; }

		if ($data->ord==0) { $moveu=$blank; $moved=$blank; $movet=$blank; } 
		if ($data->ord==1) { $moveu=$blank; $movet=$blank; }
		if ($data->ord==$max_ord) { $moved=$blank; }
		
		$movement="<div style='width: 64px; float: right; margin-top: -4px; margin-right: 20px;' id='movement'>".$moveu.$moved.$movet."</div>";
		
		if ($data->isactive==0) { $movement="<div style='width: 64px; float: right; margin-top: -4px; margin-right: 20px;' id='movement'>&nbsp;</div>"; }
		
		
		// <img src='./images/balls/".$ballcolor.".png' style='float: left; margin-right: 10px; margin-left: 6px; margin-top: 29px;' />
		echo "<li><img src='./images/balls/".$ballcolor.".png' style='float: left; margin-right: 10px; margin-left: 6px; margin-top: 29px;' />&nbsp;&nbsp;<div class='case-list-box-image'><img src='./getmainimage.php?id=".$data->id."&t=0' width='80px' /></div><div class='case-list-box-title' style='width: 250px; overflow: hidden;' >".$data->title."</div><div style='width: 150px; float: left; margin-top: 35px;'>".$categorytxt."</div><div class='case-list-box-modifier'>$featuredimg<a href='./admin-edit-case-studies.php?id=".$data->id."' ><img title='Edit Case Study'src='./images/icons/icon-edit-s.png' style='float: left; margin-top: -7px;' /></a><a href='?dcs=".$data->id."' ><img title='Delete Case Study' src='./images/icons/icon-delete-s.png' style='margin-left: 25px; float: left; margin-top: -7px;' /></a><a href='?tcs=".$data->id."' ><img title='".$poweractiontxt." Case Study' src='./images/balls/".$powercolor."-powerbutton.png' style='margin-right: 20px; margin-left: 25px; float: left; margin-top: -7px;' /></a>$movement</div><div style='clear: both;'></li>";


//
//	<a href='?tcs=".$data->id."' ><img title='".$poweractiontxt." Case Study' src='./images/balls/".$powercolor."-powerbutton.png' style='margin-right: 20px; margin-left: 25px; float: left; margin-top: -7px;' /></a>


//			$powercolor="green";
//			$poweractiontxt="Enable";
//			$powercolor="red";
//			$poweractiontxt="Disable";

	}
?>	
		
		
		</ul>
		<script>
			$('.cases li:even').css('background-color','#dddddd');
			$('.cases li:odd').css('background-color','#eeeeee');

			
			
		</script>
	</div>
	
<div style="height: 20px;"></div>	
<?php include './inc/footer.inc'; ?>