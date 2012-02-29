<?php 
	$title="UMC Administration Login";
	include './inc/header.inc';
	
	
	
	$error="";
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$user=sanitize($_POST['username']);
		$pass=sanitize($_POST['password']);
		if ($user=="admin" AND $pass=="@ahola2001") {
			$error="";
			$_SESSION['auth']="1";
			echo '<script type="text/javascript">window.location = "./admin-view-case-studies.php";</script>';
		} else {
			$error="Invalid username or password.";
			$_SESSION['auth']="0";
		}
	}
		
	
?>

	<h1 style="width: 62%; margin: auto; padding: 0px;color: black; padding-top: 20px;">
		<img src="./images/icons/icon-controlpanel.png" style="float: left; margin-top: -10px; margin-right: 10px;" />	
		UMC Administration Login
	</h1>
	<?php 
		if ($error!="") {
			echo '<h2 style="font-size: 14px; width: 80%; background: red; border: yellow 1px solid; color: yellow; margin: auto; text-align: center; padding: 5px; line-height: 28px; margin-top: 20px;">'.$error.'</h2>';
		} 
	?>
	
	<div id="loginbox">
		<form action="" method="post" name="login">
			<div class="clearfix" style="height: 25px"></div>
			<div class="loginbox-label">
				Username : 
			</div>
			<div class="loginbox-field">
				<input type="text" width="40" name="username" id="username" style="width: 300px;"> 
			</div>
			<div class="loginbox-label">
				Password : 
			</div>
			<div class="loginbox-field">
				<input type="password" width="40" name="password" id="password" style="width: 300px;">			
			</div>
			<div class="clearfix" style=""></div>
			<input type="image" value="Login" src="./images/login.png" name="submit" style="float: right; width: 85px; margin: auto; margin-right: 210px; height: 25px; border: #333333 1px solid; margin-top: 25px;" />		
			<div class="clearfix"></div>
		</form>
	</div>
	
	<div class="clearfix">&nbsp;</div>
	<script>
		$('#username').focus();
	</script>
<?php include './inc/footer.inc'; ?>