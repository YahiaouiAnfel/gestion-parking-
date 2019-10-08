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
     
	<title></title>



<?php

$bdname = "id4037200_projett";
$user = "id4037200_hanfell";
$pass = "hanaminou";

session_start();
$bdd = new PDO('mysql:host=localhost;dbname='.$bdname, $user, $pass);

if(isset($_POST['sub'])) {
	
	if(!empty($_POST['num_permis_conduire']) AND !empty($_POST['nom']) AND !empty($_POST['prenom'])  AND !empty($_POST['adresse']) ) {

        $num_permis_conduire = $_POST['num_permis_conduire'];
        $nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$adresse = $_POST['adresse'];
        $situation_familiale = $_POST['situation_familiale'];
        

        $lengnom = strlen($nom );
		$lengprenom= strlen($prenom);
		$lengadresse = strlen($adresse);
		$lengsituation_familiale = strlen($situation_familiale);
	
        if($lengnom <= 64 AND $lengprenom <= 64 AND $lengadresse<=64  AND $lengsituation_familiale <= 30 ) {
							
		$requete1 = $bdd->prepare("SELECT * FROM conducteur WHERE num_permis_conduire = ?");
		$requete1->execute(array($num_permis_conduire));
		$existe1 = $requete1->rowCount();
		
		if( $existe1>=1 )
		{
			$requete2= $bdd->prepare("UPDATE conducteur SET nom=?,prenom=?,adresse=?, situation_familiale =? WHERE num_permis_conduire=?");
		    $requete2->execute(array($nom,$prenom,$adresse,$situation_familiale,$num_permis_conduire));
							  header('Location: ../');
							

		}
		else
		{echo '<script>alert("Attention !! Conducteur N Existe Pas");</script>';
							
							
						
		}
						
		}
	}else
		{echo '<script>alert("Attention !! Champs Mals Saisis");</script>';
							
							
						
		}
}
	
?>

</head>
<body style="background-image:url(n.jpg); ">
<div class="row">
	<br><br><br><br><br><br><br><br><br><br><br><br>
		<div class="col-sm-2"></div><div class="col-sm-8">

		<h2 class="titre" style="text-align: center;color: white;">MODIFIER CONDUCTEUR</h2><hr>

		<form method="post">
			<div class="col-sm-12">
				<input type="text" name="num_permis_conduire" placeholder="numéro du permisde conduire" class="form-control"  autocomplete="off">
			</div>
            
            <div class="col-sm-6">
				<input type="text" name="nom" placeholder="Nom" class="form-control">
			</div>

			<div class="col-sm-6">
				<input type="text" name="prenom" placeholder="Prénom" class="form-control"  autocomplete="off">
			</div>


			<div class="col-sm-6">
				<input type="text" name="adresse" placeholder="Adresse" class="form-control" autocomplete="off">
			</div>
           
           <div class="col-sm-6">
				<select name="situation_familiale" name="situation_familiale" class="form-control">
					<option disabled selected>Situation Familiale</option>
					<option value="marié">Marié/e</option>
					<option value="divorcé">Divorcé/e</option>
					<option value="celibataire">Celibataire</option>
					<option value="veuf">Veuf/ve</option>
				</select>
			</div>
			

			<div class="col-sm-6">
				<button type="submit" name="sub" class="btn btn-default valider btn-block"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
			</div>
            <div class="col-sm-6">
             <a href="../" class="btn btn-default btn-block"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>

         	</div>
			

		</form>

	</div>
</div>

<br><br><br>
</body>
</html>