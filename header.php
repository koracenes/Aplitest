<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();

require("config.php");

?>
<!DOCTYPE html>

<html style="height: 100%;">
<head>
	<title><?php echo $naslov; ?></title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/register.css" rel="stylesheet" type="text/css">
	<meta charset="UTF-8">
	</head>
<body style="height: 100%;">

<div id="header">
	<h1><?php echo $config_sitename; ?></h1>
</div>

<div id="menu">
<?php require("includes/menu.php");?>
</div>

<div class="container" style="height: 100%;">

<div id="bar" style="height: 100%;">
	<h2>Vaš profil</h2>
	<hr>
	<br>
<?php
include("includes/profilBar.php");

echo "<br>[<a href='" . $config_basedir. "/logout.php'>logout</a>]";
?>
</div>
<div id="main">