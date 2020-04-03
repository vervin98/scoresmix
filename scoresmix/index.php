<!DOCTYPE html>
<html>
<!--Készítette: Varga Ervin-->
<?php
//include-oljuk ami kell az oldal működéséhez és kapcsolódunk az adatbázishoz
ob_start();
	session_start();
	require_once("data.php");
	require_once("functions.php");
	require_once("database.php");
	$db = new db($dbhost, $dbuser, $dbpass, $dbname);
?>
	<head>
		<!-- Style-ok beolvasása -->
		<title>ScoresMix</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="css/stilus.css">
	</head>
	<body>
		<!-- Menü létrehozása -->
		<?php include("menu.php"); ?>
		<!-- Header -->
		<div id="content" class="col-xs-12">
				<?php include "contentloader.php"; ?>
		</div>
		<!-- Footer -->
		<div class="footer">
		<br>
		ScoresMix <i class="fab fa-phoenix-framework"></i>	
		</div>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script  src="js/script.js"></script>
		<script  src="js/myscripts.js"></script>
		<script  src="js/video.js"></script>
		</body>
</html>