<?php ob_start(); ?>
<?php

function secure($info) {
	$info = trim($info);
	$info = stripslashes($info);
	$info = strip_tags($info);
	$info = htmlspecialchars($info);
	return $info;
}

if(isset($_POST['sub'])) {
	if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['mot_de_passe']) AND !empty($_POST['genre'])) {
		$nom = secure($_POST['nom']);
		$prenom = secure($_POST['prenom']);
		$email = secure($_POST['email']);
		$mot_de_passe = secure($_POST['mot_de_passe']);
		$genre = $_POST['genre'];

		$lengnom = strlen($nom);
		$lengprenom = strlen($prenom);
		$lengemail = strlen($email);
		$lengmdp = strlen($mot_de_passe);

		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
		    if($lengmdp > 32 AND $lengmdp < 8){  echo '<script>alert("Attention !! le mot de passe doit se composer au minimum de 8 caracteres entre autre un chiffre");</script>';  }
		elseif($lengnom <= 64 AND $lengprenom <= 64 AND $lengemail <= 256 AND $lengmdp <= 32 AND $lengmdp >= 8) {
				if($genre == 'Homme' OR $genre == 'Femme') {
					if($mot_de_passe == $_POST['re_passe']) {
						$mot_de_passe = sha1($mot_de_passe);

						$requete = $bdd->prepare("SELECT * FROM profil WHERE email = ?");
						$requete->execute(array($email));
						$existe = $requete->rowCount();

						if($existe == 0) {
							$insert = $bdd->prepare("INSERT INTO profil (nom, prenom, email, mot_de_passe, genre) VALUES (?, ?, ?, ?, ?)");
							$insert->execute(array($nom, $prenom, $email, $mot_de_passe, $genre));
							header("Location: ./");
						}
					}
				}
			}
		}
	}
}

?>

<br><br><br>

<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">

		<h2 class="titre" align="center">INSCRIPTION</h2><hr>

		<form method="post">

			<div class="col-sm-6">
				<input type="text" name="nom" placeholder="Nom" class="form-control"  autocomplete="off">
			</div>

			<div class="col-sm-6">
				<input type="text" name="prenom" placeholder="Prenom" class="form-control"  autocomplete="off">
			</div>

			<div class="col-sm-12">
				<input type="email" name="email" placeholder="Adresse electronique" class="form-control" autocomplete="off">
			</div>

			<div class="col-sm-12">
				<input type="password" name="mot_de_passe" placeholder="Mot de passe" class="form-control">
			</div>

			<div class="col-sm-12">
				<input type="password" name="re_passe" placeholder="Confirmer" class="form-control">
			</div>

			<div class="col-sm-12">
				<select name="genre" name="genre" class="form-control">
					<option disabled selected>Genre</option>
					<option value="Homme">Homme</option>
					<option value="Femme">Femme</option>
				</select>
			</div>

			<div class="col-sm-12"></div>
			<div class="col-sm-12">
				<button type="submit" name="sub" class="btn btn-default valider btn-block"><span class="glyphicon glyphicon-ok"></span> Valider</button>
			</div>

			

		</form>

	</div>
</div>

<br><br><br>

<div class="col-sm-3">

</div>
	<p >   Vous êtes déjà inscrit ? <a href="./">se connecter</a></p>

<br>