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

	if(!empty($_POST['numero_sequence_matricule']) AND !empty($_POST['incident']) AND !empty($_POST['depense']) ) {
		


        $numero_sequence_matricule = $_POST['numero_sequence_matricule'];
		$incident = $_POST['incident'];
		$depense = $_POST['depense'];
		
		

        $lengnumero_sequence_matricule= strlen($numero_sequence_matricule);
		$lengincident= strlen($incident);
		$lengdepense = strlen($depense);
		
		
			if($lengnumero_sequence_matricule <= 11 AND $lengdepense <= 11) {

						    $requete1= $bdd->prepare("SELECT * FROM voiture WHERE numero_sequence_matricule=?");
							$requete1->execute(array($numero_sequence_matricule));
						    $existe= $requete1->rowCount();
						
						if($existe==1){
							$requete= $bdd->prepare("INSERT INTO incident_depense (incident,depense,numero_sequence_matricule) VALUES (?,?,?)");
							$requete->execute(array($incident,$depense,$numero_sequence_matricule));
							  header('Location: ../');
						}else{

							echo '<script>alert("Attention !! Voiture Introuvable");</script>';
						}
				}
				else{

							echo '<script>alert("Attention !! Champs Mals Saisis");</script>';
						}			

				
				}else{echo '<script>alert("Attention !! Champs Mals Saisis");</script>';}
				}
			
	


?>
</head>
<body style="background-image:url(n.jpg); ">
<br><br><br>
<div class="container " >

<div class="row">
	<br><br><br><br><br><br><br><br><br><br>
		<div class="col-sm-2"></div><div class="col-sm-8">

		<h2 class="titre" style="text-align: center;color: white;">INCIDENTS ET DEPENSES</h2><hr>

		<form method="post">
            <div class="col-sm-12">
				<input type="text" name="numero_sequence_matricule" placeholder="numero de sequence du matricule" class="form-control">
			</div>

			<div class="col-sm-6">
				<input type="text" name="incident" placeholder="Incident" class="form-control"  autocomplete="off">
			</div>

			<div class="col-sm-6">
				<input type="text" name="depense" placeholder="Dépense" class="form-control"  autocomplete="off">
			</div>

			<div class="col-sm-6">
				<button type="submit" name="sub" class="btn btn-default valider btn-block"><span class="glyphicon glyphicon-ok"></span> Ajouter</button>
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