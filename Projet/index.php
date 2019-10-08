<?php ob_start(); ?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
      
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Design/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Design/style.css">
	 <link rel="stylesheet" type="text/css" href="Design/text.css">
	
       
	<title>Projet</title>

<?php

$bdname = "id4037200_projett";
$user = "id4037200_hanfell";
$pass = "hanaminou";
session_start();
$bdd = new PDO('mysql:host=localhost;dbname='.$bdname, $user, $pass);


?>

</head>
<body style="background-image:url(background-site.jpg);-webkit-background-size: cover;">
 
<div class="container">
	
<?php
if(isset($_SESSION['id'])) {
	if(isset($_GET['page'])) {

		switch ($_GET['page']) {

			default:
				include 'page/introuvable.php';
				break;

		}

	} else {

		include 'page/acceuil.php';

	}

} else if(isset($_GET['page'])) {

	switch($_GET['page']) {

		case 'inscription':
		    echo"<div class='row'>";
echo"<div class='col-sm-2'><br>
<br><br><br><br><br><br><br>
<img src='logo.jpg' width='200%'></img></div>";
echo"<div class='col-sm-10'>";
			include 'page/inscription.php';
			echo"</div>";
echo"</div>";
			break;

		default:
			include 'page/introuvable.php';
			break;

	}

} else {
echo"<div class='row'>";
echo"<div class='col-sm-2'><br>
<br><br><br><br><br><br><br>
<img src='logo.jpg' width='200%'></img></div>";
echo"<div class='col-sm-10'>";
	include 'page/connexion.php';
echo"</div>";
echo"</div>";
}

?>
	
</div>

</body>
</html>