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
	
<?php

$bdname = "id4037200_projett";
$user = "id4037200_hanfell";
$pass = "hanaminou";

session_start();
$bdd = new PDO('mysql:host=localhost;dbname='.$bdname, $user, $pass);

if(isset($_POST['sub'])) {
	
	if(!empty($_POST['numéro_police_assurance']) AND !empty($_POST['date_effet']) AND !empty($_POST['date_expiration']) AND !empty($_POST['nom_compagnie_assurance']) AND !empty($_POST['prix_assurance'])) {

        $numéro_police_assurance= $_POST['numéro_police_assurance'];
		$date_effet = $_POST['date_effet'];
		$date_expiration = $_POST['date_expiration'];
		$nom_compagnie_assurance = $_POST['nom_compagnie_assurance'];
		$prix_assurance= $_POST['prix_assurance'];
		$type_assurance = $_POST['type_assurance'];		
        

        $lengnuméro_police_assurance = strlen($numéro_police_assurance );
		$lengnom_compagnie_assurance= strlen($nom_compagnie_assurance);
		$lengprix_assurance = strlen($prix_assurance);
		

			if( $lengnuméro_police_assurance<= 11 AND $lengnom_compagnie_assurance<= 64 AND $lengprix_assurance<=11  ) {
					
						
		       if( $type_assurance== "au_tiers" OR $type_assurance=="tous_riques" OR $type_assurance=="garanties_complémentaires" OR $type_assurance=="autre" ) {

		       	            $requete1= $bdd->prepare("SELECT * FROM assurance WHERE numero_police_assurance=?");
							$requete1->execute(array($numéro_police_assurance));
						    $existe= $requete1->rowCount();
                                if($existe==0){
				                     $requete= $bdd->prepare("INSERT INTO assurance (numero_police_assurance,date_effet,date_expiration,nom_compagnie_assurance,type_assurance,prix_assurance) VALUES (?,?,?,?,?,?)");
		                              $requete->execute(array($numéro_police_assurance,$date_effet,$date_expiration,$nom_compagnie_assurance,$type_assurance,$prix_assurance));
		                                
        header('Location: ../');
							     }   
							     else{

							         echo '<script>alert("Attention !! Assurance Déjà Existante");</script>';
						          }
							
				}
			}


}else{echo '<script>alert("Attention !! Champs Mals Saisis");</script>';}
}
			
?>

</head>
<body style="background-image:url(n.jpg); " >
<br><br><br>
<div class="container " >

<div class="row">
<br><br><br><br><br><br><br><br><br><br>
		<div class="col-sm-2"></div><div class="col-sm-8">

		<h2 class="titre" style="text-align: center;color: white;">AJOUTER ASSURANCE</h2><hr>

		<form method="post">
            <div class="col-sm-6">
				<input type="text" name="numéro_police_assurance" placeholder="Numéro Police Assurance" class="form-control">
			</div>

			<div class="col-sm-6">
				<input type="text" name="date_effet" placeholder="Date Effet" class="form-control"  autocomplete="off">
			</div>

			<div class="col-sm-6">
				<input type="text" name="date_expiration" placeholder="Date Expiration" class="form-control"  autocomplete="off">
			</div>

			<div class="col-sm-6">
				<input type="text" name="nom_compagnie_assurance" placeholder="Nom Compagnie Assurance" class="form-control" autocomplete="off">
			</div>
            <div class="col-sm-6">
				<input type="text" name="prix_assurance" placeholder="Prix Assurance" class="form-control">
			</div>
            <div class="col-sm-6">
				<select name="type_assurance" name="type_assurance" class="form-control">
					<option disabled selected>Type Assurance</option>
					<option value="au_tiers">Au Tiers</option>
					<option value="tous_riques">Tous Riques</option>
					<option value="garanties_complémentaires">Garanties Complémentaires</option>
					<option value="autre">Autre</option>
				</select>
			</div>
			
            <div class="col-sm-6">
				<button type="submit" name="sub" class="btn btn-default valider  btn-block"><span class="glyphicon glyphicon-ok"></span> Ajouter</button>
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