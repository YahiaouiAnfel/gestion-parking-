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
	
	if(!empty($_POST['numero_sequence_matricule']) AND !empty($_POST['WilayaImmatriculation'])  AND !empty($_POST['Couleur'])) {
		


        $numero_sequence_matricule = $_POST['numero_sequence_matricule'];
		$WilayaImmatriculation = $_POST['WilayaImmatriculation'];
		$idV= $_POST['idV'];
		$Couleur = $_POST['Couleur'];
		

        $lengnumero_sequence_matricule= strlen($numero_sequence_matricule);
		$lengWilayaImmatriculation= strlen($WilayaImmatriculation);
        $lengCouleur = strlen($Couleur);
		
			if($lengnumero_sequence_matricule <= 11 AND $lengWilayaImmatriculation <= 11 AND $lengCouleur <= 64) {	
				$requete1 = $bdd->prepare("SELECT * FROM voiture WHERE numero_sequence_matricule = ?");
		        $requete1->execute(array($numero_sequence_matricule));
		        $existe1 = $requete1->rowCount();

		          if( $existe1>=1 )
		          {
				     $requete2= $bdd->prepare("UPDATE  voiture SET WilayaImmatriculation=?,Couleur=? WHERE numero_sequence_matricule=?");
		             $requete2->execute(array($WilayaImmatriculation,$Couleur,$numero_sequence_matricule));	
		               header('Location: ../');
				  }	
				  else
		          {
				     echo '<script>alert("Attention !! Voiture N Existe Pas");</script>';
				  }		
			}
}else{
echo '<script>alert("Attention !! Champs Mals Saisis");</script>';}
}
		
	


?>
</head>
<body style="background-image:url(n.jpg); ">
<br><br><br>
<div class="container ">
<div class="row">
	<br><br><br><br><br><br><br><br><br><br>
		<div class="col-sm-2"></div><div class="col-sm-8">

		<h2 class="titre" style="text-align: center;color: white;">MODIFIER VOITURE</h2><hr>

    <form method="post">

        <div class="col-sm-12">
			<input type="text" name="numero_sequence_matricule" placeholder="Numéro De Séquence Du Matricule" class="form-control">
		</div>

		<div class="col-sm-6">
			<input type="text" name="WilayaImmatriculation" placeholder="Wilaya d'immatriculation" class="form-control"  autocomplete="off">
		</div>


		<div class="col-sm-6">
			<input type="text" name="Couleur" placeholder="Couleur" class="form-control">
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

</div>

<br><br><br>

</body>
</html>