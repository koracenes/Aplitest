<?php
session_start();
require("config.php");
require('header.php');

$query=" UPDATE profil SET status='".$_POST['status']."' 
						WHERE id=". $_POST['ids'];
		$result=mysqli_query($con, $query);
	
header("Refresh:0.0001;URL= admin_profesor.php");

require('footer.php');
?>