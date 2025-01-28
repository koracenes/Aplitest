<?php
session_start();
require("config.php");
require("includes/prof_testFunctions.php");
$naslov="apliTest | Testovi";
require("header.php");

$sql="SELECT * FROM predmet where id=".$_SESSION['PREDMET'];
$run=mysqli_query($con, $sql);
while($row=mysqli_fetch_array($run)){
	$naziv=$row['naziv'];
	echo"<h2>$naziv</h2>";
}
?>
<div class="pitanja">
		<?php getTestPitanja();?>

	</div>
	<div class="form_pitanje">
		<form name="dodajPitanje" method="post" action="" >
			<fieldset>
			<legend><b>Dodaj pitanje:</b></legend>
				<table class='testPitanja'>
				<?php addTestPitanja();?>
				</table>
			</fieldset>
		</form>
	</div>




<?php
require("footer.php");

?>