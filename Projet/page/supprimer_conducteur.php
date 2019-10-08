<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	   <meta charset="utf-8">  
	   	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
       <link rel="stylesheet" type="text/css" href="design/style.css">
	 <link rel="stylesheet" type="text/css" href="Design/text.css">
       <script src="script/script.js"></script>
     
	
	<title>Projet</title>

<?php

$bdname = "id4037200_projett";
$user = "id4037200_hanfell";
$pass = "hanaminou";

session_start();
$bdd = new PDO('mysql:host=localhost;dbname='.$bdname, $user, $pass);

	


if(isset($_POST['sub'])) {
	if(!empty($_POST['num_permis_conduire']) ) {
       $num_permis_conduire = $_POST['num_permis_conduire'];
		$lengnum_permis_conduire= strlen($num_permis_conduire);
		

			if( $lengnum_permis_conduire<= 11 ) {
					
		       $requete1 = $bdd->prepare("SELECT * FROM conducteur WHERE num_permis_conduire = ?");
		       $requete1->execute(array($num_permis_conduire));
		       $existe1 = $requete1->rowCount();
		
		        if( $existe1>=1 )
		         {
				     $requete2= $bdd->prepare("DELETE FROM conducteur WHERE num_permis_conduire = ? ");
				     $requete2->execute(array($num_permis_conduire));
							  header('Location: ../');
				}
                else
		        {
                     echo '<script>alert("Attention !! Champs Mals Saisis");</script>';
				}

			}
	}  else
		        {
                     echo '<script>alert("Attention !! Champs Mals Saisis");</script>';
				}
}
			
		
	


?>


</head>
<body style="background-image:url(n.jpg); ">






<br><br><br>
<div class="container ">
<div class="row">
	<br><br><br><br><br><br><br><br><br><br>
		<div class="col-sm-2"></div><div class="col-sm-8">

    <h2 class="titre" style="text-align: center;color: white;"> SUPPRIMER CONDUCTEUR </h2><hr>

		

		<form method="post">
			<div class="col-sm-12">
				<input type="text" name="num_permis_conduire" placeholder="numéro du permis de conduire" class="form-control"  autocomplete="off">
			</div>

			
            <div class="col-sm-6">
				<button type="submit" name="sub" class="btn btn-default valider btn-block"><span class="glyphicon glyphicon-remove"></span> Supprimer</button>
			</div>
			<div class="col-sm-6">
             <a href="../" class="btn btn-default btn-block"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>

         	</div>
        </form>

	</div>
</div>
</div>

<br><br><br>

</body>
</html>