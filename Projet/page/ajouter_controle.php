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
	
	if(!empty($_POST['numéro_contrôle_technique']) AND !empty($_POST['organisme_émetteur']) AND !empty($_POST['date_effet']) AND !empty($_POST['date_fin']) AND !empty($_POST['Observations'])) {
		


        $numéro_contrôle_technique= $_POST['numéro_contrôle_technique'];
		$organisme_émetteur= $_POST['organisme_émetteur'];
		$date_effet = $_POST['date_effet'];
		$date_fin = $_POST['date_fin'];
		$Observations= $_POST['Observations'];
		

        $lengnuméro_contrôle_technique = strlen($numéro_contrôle_technique );
		$lengorganisme_émetteur= strlen($organisme_émetteur);
	

			if($lengnuméro_contrôle_technique <= 64 AND $lengorganisme_émetteur <= 64) {
					
						$requete1= $bdd->prepare("SELECT * FROM controle WHERE numero_controle_technique=?");
						$requete1->execute(array($numéro_contrôle_technique));
                        $existe1 = $requete1->rowCount();


                if($existe1==0 ){ 

				           $requete= $bdd->prepare("INSERT INTO controle (numero_controle_technique,organisme_emetteur,date_effet,date_fin,Observations) VALUES (?,?,?,?,?)");
							$requete->execute(array($numéro_contrôle_technique,$organisme_émetteur,$date_effet,$date_fin,$Observations));
							  header('Location: ../');
						
				}
				else{echo '<script>alert("Attention !! Controle Déjà Existant");</script>';}
		    }
							
	}
	else{echo '<script>alert("Attention !! Champs Mals Saisis");</script>';}
	}


?>
</head>
<body style="background-image:url(n.jpg); ">
<br><br><br>
<div class="container " style="background-image:url(background-site.jpg);">
   <div class="row">
<br><br><br><br><br><br><br><br><br><br>
		<div class="col-sm-2"></div><div class="col-sm-8">


		<h2 class="titre" style="text-align: center;color: white;">AJOUTER CONTROLE TECHNIQUE</h2><hr>

	    <form method="post">
            
             <div class="col-sm-12">
				<input type="text" name="numéro_contrôle_technique" placeholder="Numéro Contrôle Technique" class="form-control">
			</div>
            <div class="col-sm-6">
			 <input type="text" name="organisme_émetteur" placeholder="Organisme émetteur" class="form-control">
			</div>

			<div class="col-sm-6">
				<input type="text" name="date_effet" placeholder="Date Effet" class="form-control"  autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="YYY/MM/DD">
			</div>

			<div class="col-sm-6">
				<input type="text" name="date_fin" placeholder="Date Fin" class="form-control"  autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="YYY/MM/DD">
			</div>

			<div class="col-sm-6">
				<input type="text" name="Observations" placeholder="Observations" class="form-control" autocomplete="off">
			</div>
			<div class="col-sm-6">
				<button type="submit" name="sub" class="btn btn-default valider btn-block "><span class="glyphicon glyphicon-ok"> Ajouter</span></button>
			</div>
             
			<div class="col-sm-6">
             <a href="../" class="btn btn-default btn-block"><span class="glyphicon glyphicon-arrow-left"> Retour</span> </a>

         	</div>

			
			
		</form>
			
	</div>
</div>

</div>

<br><br><br>

</body>
</html>