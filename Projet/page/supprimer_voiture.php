<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>	  

      <meta name="viewport" content="width=device-width, initial-scale=1">
	   <meta charset="utf-8">  
	   	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
       <script src="script/script.js"></script>
     
	<title></title>

<?php

$bdname = "id4037200_projett";
$user = "id4037200_hanfell";
$pass = "hanaminou";

session_start();
$bdd = new PDO('mysql:host=localhost;dbname='.$bdname, $user, $pass);
if(isset($_POST['sub'])) {
	
	if(!empty($_POST['numero_sequence_matricule']) ) {
		


        $numero_sequence_matricule= $_POST['numero_sequence_matricule'];
        $lengnumero_sequence_matricule= strlen($numero_sequence_matricule);
		

		if($lengnumero_sequence_matricule<= 11 ) {
			
		 $requete = $bdd->prepare("SELECT * FROM voiture WHERE numero_sequence_matricule = ?");
		 $requete->execute(array($numero_sequence_matricule));
		 $existe = $requete->rowCount();
		
		
		  if($existe>=1 )
		      {
				$requete2= $bdd->prepare("DELETE FROM voiture WHERE numero_sequence_matricule = ? ");
	            $requete2->execute(array($numero_sequence_matricule));
							  header('Location: ../');
			  }

		   else
		        {
                     echo '<script>alert("Attention !! Champs Mals Saisis");</script>';
				}
        }
	} else
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


		<h2 class="titre" style="text-align: center;color: white;"> SUPPRIMER VOITURE </h2><hr>

		<form method="post">
             <div class="col-sm-12">
				<input type="text" name="numero_sequence_matricule" placeholder="numéro de sequence du matricule" class="form-control">
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