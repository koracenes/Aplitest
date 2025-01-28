<?php
session_start();
require("config.php");
require('header.php');

$query=" UPDATE profil SET smer='".$_POST['pormSmer']."' 
						WHERE id=". $_POST['id'];
		$result=mysqli_query($con, $query);
	
header("Refresh:0.1;URL= admin_studenti.php");

require('footer.php');
?>