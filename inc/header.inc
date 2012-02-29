<?php include './inc/db.inc'; ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php
		if (!isset($title)) {		$title			=	"default page title"		;}
		if (!isset($description)) {	$description	=	"default page description"		;}		
		if (!isset($keywords)) {	$keywords		=	"default, page, keywords"		;}
		
	?>
	<title>
		<?php echo $title; ?>
	</title>
	
	

	<meta name="description" content="<?php echo $description; ?>" />
	<meta name="keywords" content="<?php echo $keywords; ?>" />
	
	<link href="css/umc.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
	<LINK href="favicon.ico" type=image/x-icon rel="SHORTCUT ICON">
	<script type="text/javascript" src="js/browserDetect-min.js"></script>	
</head>
<body>

	<div id="header-container">
		<div id="header-content">
			
			
			<div id="header-preheader">
				<span style="color: #cccccc;">TOLL FREE: </span>1-866-886-2221
			</div>
			<div id="header-logobox">
				<div id="header-logobox-inner">
					<img style="float: left; margin-top: 25px; margin-left: 7px;" src="./images/header-logo-2.png" />
					<img style="position: absolute; float: left; margin-top: -32px; margin-left: -40px;" src="./images/header-machine.png" />
				</div>
			</div>
			<div id="header-menu">
				<div id="nav">
					<ul>
						<a href="./index.php" style="margin-left: 2px;"><li>main</li></a>
						<a href="./profile.php"><li>profile</li></a>
						<a href="./case-studies.php"><li>case studies</li></a>
						<a href="./prototype.php"><li>prototypes</li></a>
						<a href="./tooling.php"><li>tooling</li></a>
						<a href="./machining.php"><li>machining</li></a>
						<a href="./stamping.php"><li>metal stamping</li></a>
						<a href="./product-assembly.php"><li>product assembly</li></a>
						<a href="./contact.php" style=""><li>contact</li></a>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<div id="upper-content-container">
		<div id="upper-content-content">

			<!-- end header.inc -->