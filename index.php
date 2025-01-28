<?php
session_start();
//admin@gmail, admin
require("config.php");

if(isset($_SESSION['SESS_LOGGEDIN'])) {
	if($_SESSION['SESS_TIP']=='admin'){
		header("Location: admin_predmeti.php");
	}
	else{
		header("Location: predmeti.php");
	}
}
if(isset($_POST['submit_login'])){
	
	$loginsql = "SELECT * FROM profil WHERE email = '" . $_POST['emailBox']. "' AND lozinka = '" . SHA1($_POST['passBox']) . "'";
	$loginres = mysqli_query($con, $loginsql);
	$numrows = mysqli_num_rows($loginres);
	if($numrows == 1)
	{
		$loginrow = mysqli_fetch_assoc($loginres);

		$_SESSION['SESS_LOGGEDIN'] = 1;
		$_SESSION['SESS_USERID'] = $loginrow['id'];
		$_SESSION['SESS_USERNAME'] = $loginrow['ime'];
		$_SESSION['SESS_LASTNAME'] = $loginrow['prezime'];
		$_SESSION['SESS_INDEX'] = $loginrow['br_indeksa'];
		$_SESSION['SESS_SMER'] = $loginrow['smer'];
		$_SESSION['SESS_EMAIL'] = $loginrow['email'];
		$_SESSION['SESS_TIP'] = $loginrow['tip'];
		$_SESSION['SESS_STATUS'] = $loginrow['status'];
		
		header("Refresh:0.1;URL=index.php");
		
	}
	
	else
	{
		header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
	}
}
else
{
	
$naslov ='apliTest - prijava ili registracija';

?>
<!DOCTYPE html>

<html style="height: 100%;">
<head>
	<title><?php echo $naslov; ?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="height: 100%;">
<div class="container" style="height: 100%; min-width:1300px;">


	<div id="header">
		<h1><?php echo $config_sitename; ?></h1>
	</div>

	<div id="menu">
	
	</div>




	<div id="bar" style="height: 100%;">
		<hr>
		<?php
	//			LOGIN FORM	
		require("register/login.php");
		
		?>			
	</div>
	<div id="main">
	<div style="display:inline-block; border:1px soldi black;">
	<?php
	//			REGISTER FORM
	
		require("register/register.php");
				
	?>
	</div>
	</div>
	<div >
	<img src="tinker.jpg" style="position:absolute; right:350px; top:150px;">
            <h1 id='quoty'style="position: absolute; top:200px; right: 100px; text-align: center; color:gray;z-index: 1;">"You need to learn <br><br>
            <br><br>how to think, <br><br>
            <br><br>not what to think!"</h1>
	</div>

</div>	


		


</body>
</html>
<?php
}
?>