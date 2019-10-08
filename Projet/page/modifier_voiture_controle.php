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
	
	if(!empty($_POST['numero_sequence_matricule']) AND !empty($_POST['numero_controle_technique'])) {
		


        $numero_sequence_matricule= $_POST['numero_sequence_matricule'];
		$numero_controle_technique = $_POST['numero_controle_technique'];
	
				
        

        $lengnumero_sequence_matricule= strlen($numero_sequence_matricule);
		$lengnumero_controle_technique= strlen($numero_controle_technique);
		

			if( $lengnumero_controle_technique<= 11 AND $lengnumero_sequence_matricule<= 11 ) {
					
						
		
		$requete = $bdd->prepare("SELECT * FROM voiture_controle WHERE numero_sequence_matricule = ?");
		$requete->execute(array($numero_sequence_matricule));
		$existe = $requete->rowCount();
		$requete1= $bdd->prepare("SELECT * FROM controle WHERE numero_controle_technique = ?");
		$requete1->execute(array($numero_controle_technique));
		$existe1 = $requete1->rowCount();
		$requete3= $bdd->prepare("SELECT * FROM voiture_controle WHERE numero_controle_technique = ?");
		$requete3->execute(array($numero_controle_technique));
		$existe3 = $requete3->rowCount();
		if($existe>=1 AND $existe1>=1 AND $existe3==0 )
		{
				$requete2= $bdd->prepare("UPDATE voiture_controle SET numero_controle_technique=? WHERE numero_sequence_matricule = ? ");
		
							$requete2->execute(array($numero_controle_technique,$numero_sequence_matricule));
							  header('Location: ../');
							
						}else{echo '<script>alert("Attention !! Champs Mals Saisis");</script>';}}
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


		<h2 class="titre" style="text-align: center;color: white;"> MODIFIER CONTROLE DE VOITURE </h2><hr>

		<form method="post">
            <div class="col-sm-6">
				<input type="text" name="numero_sequence_matricule" placeholder="numero de sequence du matricule" class="form-control">
			</div>

			<div class="col-sm-6">
				<input type="text" name="numero_controle_technique" placeholder="Nouveau numéro de controle technique" class="form-control"  autocomplete="off">
			</div>

			
           <div class="col-sm-6">
				<button type="submit" name="sub" class="btn btn-default valider  btn-block"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
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