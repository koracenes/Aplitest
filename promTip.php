<?php
session_start();
require("config.php");
require('header.php');

$query=" UPDATE profil SET tip='".$_POST['tip']."',status='neaktivan' 
						WHERE id=". $_POST['id'];
		$result=mysqli_query($con, $query);

if($_POST['tip']=='student'){
header("Refresh:0.1;URL= admin_profesor.php");
}
elseif($_POST['tip']=='profesor'){
	
header("Refresh:0.0001;URL= admin_studenti.php");
}
elseif($_POST['tip']=='admin'){
	
header("Refresh:0.1;URL= admin_admini.php");
}


require('footer.php');
?>