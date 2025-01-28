<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
require("includes/stud_testFunctions.php");
require("config.php");

if(count($_POST)>0) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
			echo"<script>alert(\"Sva polja moraju biti ispunjena! \")</script>";
			break;
		}
	}
}

$naslov="apliTest | Testovi";

require("header.php");


?>
<div class="spisak_pitanja">
			
			<div class="pitanja" style='width:100%;'>
				<?php uradiTest();?>
			</div>
<?php
require("footer.php");
?>