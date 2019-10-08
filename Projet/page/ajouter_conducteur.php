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
	
	if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['Date_naissance']) AND !empty($_POST['adresse']) AND !empty($_POST['num_permis_conduire']) AND !empty($_POST['anneeobtention']) AND !empty($_POST['wilayaobtention'])) {
		


        $nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$Date_naissance = $_POST['Date_naissance'];
		$adresse = $_POST['adresse'];
		$num_permis_conduire= $_POST['num_permis_conduire'];
		$anneeobtention = $_POST['anneeobtention'];		
        $wilayaobtention = $_POST['wilayaobtention'];
        $situation_familiale = $_POST['situation_familiale'];
        $genre= $_POST['genre'];

        $lengnom = strlen($nom );
		$lengprenom= strlen($prenom);
		$lengadresse = strlen($adresse);
		$lengnum_permis_conduire = strlen($num_permis_conduire);
		$lenganneeobtention = strlen($anneeobtention);
	$lengwilayaobtention = strlen($wilayaobtention);
		$lengsituation_familiale = strlen($situation_familiale);
	$lenggenre = strlen($genre);


			if($lengnom <= 64 AND $lengprenom <= 64 AND $lengadresse<=64  AND $lengnum_permis_conduire<= 11 AND $lenganneeobtention <=4 AND $lengwilayaobtention <= 64 AND $lengsituation_familiale <= 30 AND $lenggenre <= 5) {
					
						$requete1= $bdd->prepare("SELECT * FROM conducteur WHERE num_permis_conduire=?");
							$requete1->execute(array($num_permis_conduire));
                            	$existe1 = $requete1->rowCount();

                            	if($existe1==0 ){ 

				$requete= $bdd->prepare("INSERT INTO conducteur (nom,prenom,Date_naissance,adresse,situation_familiale,genre,num_permis_conduire,	anneeobtention,wilayaobtention) VALUES (?,?,?,?,?,?,?,?,?)");
							$requete->execute(array($nom,$prenom,$Date_naissance,$adresse,$situation_familiale,$genre,$num_permis_conduire,$anneeobtention,$wilayaobtention));
							  header('Location: ../');
							}else{echo '<script>alert("Attention !! Conducteur Déjà Existant");</script>';}
							}
							
						
					}
					else{echo '<script>alert("Attention !! Champs Mals Saisis");</script>';}
				}


?>
</head>
<body style="background-image:url(n.jpg); ">

<br><br><br>
<div class="container ">
   <div class="row">
<br><br><br><br><br><br><br><br><br><br>
		<div class="col-sm-2"></div><div class="col-sm-8">


		<h2 class="titre" style="text-align: center;color: white;">AJOUTER CONDUCTEUR</h2><hr>

	    <form method="post">
            
             <div class="col-sm-12">
				<input type="text" name="num_permis_conduire" placeholder="Numro Du Permis De Conduire" class="form-control">
			</div>
            <div class="col-sm-6">
			 <input type="text" name="nom" placeholder="Nom" class="form-control">
			</div>

			<div class="col-sm-6">
				<input type="text" name="prenom" placeholder="Prénom" class="form-control"  autocomplete="off">
			</div>

			<div class="col-sm-6">
				<input type="text" name="Date_naissance" placeholder="Date De Naissance" class="form-control"  autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="YYY/MM/DD">
			</div>

			<div class="col-sm-6">
				<input type="text" name="adresse" placeholder="Adresse" class="form-control" autocomplete="off">
			</div>
			<div class="col-sm-6">
				<input type="text" name="anneeobtention" placeholder="Année Obtention" class="form-control">
			</div>

			<div class="col-sm-6">
				<input type="text" name="wilayaobtention" placeholder="Wilaya Obtention" class="form-control">
			</div>

            <div class="col-sm-6">
				<select name="situation_familiale" name="situation_familiale" class="form-control">
					<option disabled selected>Situation Familiale</option>
					<option value="Homme">Marié/e</option>
					<option value="Femme">Divorcé/e</option>
					<option value="Homme">Celibataire</option>
					<option value="Femme">Veuf/ve</option>
				</select>
			</div>
			
			<div class="col-sm-6">
				<select name="genre" name="genre" class="form-control">
					<option disabled selected>Genre</option>
					<option value="Homme">Homme</option>
					<option value="Femme">Femme</option>
				</select>
			</div>
		
			<div class="col-sm-6">
				<button type="submit" name="sub" class="btn btn-default valider btn-block "><span class="glyphicon glyphicon-ok"></span> Ajouter</button>
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