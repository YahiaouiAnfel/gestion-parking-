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
	
	if(!empty($_POST['num_permis_conduire']) AND !empty($_POST['numero_sequence_matricule'])) {
		
        $num_permis_conduire= $_POST['num_permis_conduire'];
		$numero_sequence_matricule = $_POST['numero_sequence_matricule'];
        $lengnum_permis_conduire = strlen($num_permis_conduire);
		$lengnumero_sequence_matricule= strlen($numero_sequence_matricule);
		

		if( $lengnum_permis_conduire<= 11 AND $lengnumero_sequence_matricule<= 11 ) {
				
						
		
		$requete = $bdd->prepare("SELECT * FROM conducteur WHERE num_permis_conduire = ?");
		$requete->execute(array($num_permis_conduire));
		$existe = $requete->rowCount();
		echo $existe;
		$requete1 = $bdd->prepare("SELECT * FROM voiture WHERE numero_sequence_matricule = ?");
		$requete1->execute(array($numero_sequence_matricule));
		$existe1 = $requete1->rowCount();echo $existe1;
		$requete3 = $bdd->prepare("SELECT * FROM vehicule_en_service WHERE numero_sequence_matricule = ? AND num_permis_conduire=?");
		$requete3->execute(array($numero_sequence_matricule,$num_permis_conduire));
		$existe3 = $requete3->rowCount();
	
		if($existe==1 AND $existe1==1 AND $existe3==0)
		{
				$requete2= $bdd->prepare("INSERT INTO vehicule_en_service (num_permis_conduire,numero_sequence_matricule) VALUES (?,?)");
		        $requete2->execute(array($num_permis_conduire,$numero_sequence_matricule));
					  header('Location: ../');		
							
						}
		else
		{
			echo '<script>alert("Attention !! Champs Mals Saisis1");</script>';
							
						}
					}
					}
else
		{
			echo '<script>alert("Attention !! Champs Mals Saisis");</script>';
							
						}
				}
			
		
	


?>
</head>
<body style="background-image:url(n.jpg); ">
<br><br><br>
<div class="container">

<div class="row">
	<br><br><br><br><br><br><br><br><br><br>
		<div class="col-sm-2"></div><div class="col-sm-8">

		<h2 class="titre" style="text-align: center;color: white;">AFFECTER CONDUCTEUR A VOITURE </h2><hr>

		<form method="post">
          <div class="col-sm-6"><input type="text" name="num_permis_conduire" placeholder="numéro du permis de conduire" class="form-control" autocomplete="off"></div>
          <div class="col-sm-6"><input type="text" name="numero_sequence_matricule" placeholder="numero de sequence du matricule" class="form-control"  autocomplete="off"></div>
           <div class="col-sm-6"><button type="submit" name="sub" class="btn btn-default valider btn-block"><span class="glyphicon glyphicon-ok"></span> Ajouter</button></div>
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