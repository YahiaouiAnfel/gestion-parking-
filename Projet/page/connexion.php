<?php ob_start(); ?>
<?php

if(isset($_POST['sub'])) {
	if(!empty($_POST['email']) AND !empty($_POST['mot_de_passe'])) {
		$email = $_POST['email'];
		$mot_de_passe = sha1($_POST['mot_de_passe']);

		$requete = $bdd->prepare("SELECT * FROM profil WHERE email = ?");
		$requete->execute(array($email));
		$existe = $requete->rowCount();

		if($existe == 1) {
			$info = $requete->fetch();
			if($mot_de_passe == $info['mot_de_passe']) {
				$_SESSION['id'] = $info['id'];
				header("Location: ./");
			}
		}
	}
}

?>

<br><br><br>
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">

		<h2 class="titre" align="center">CONNEXION</h2><hr>

		<form method="post">

			<div class="col-sm-12">
				<input type="email" name="email" placeholder="Adresse electronique" class="form-control">
			</div>

			<div class="col-sm-12">
				<input type="password" name="mot_de_passe" placeholder="Mot de passe" class="form-control">
			</div>

			<div class="col-sm-12"></div><br>
			<div class="col-sm-12">
				<button type="submit" name="sub" class="btn btn-default valider btn-block"> <span class="glyphicon glyphicon-log-in"></span> Connexion</button>
			</div>
			<div class="col-sm-3"></div>

		</form>

	</div>
</div>

<br><br><br>

<div class="col-sm-3">

</div>
	<p >    Vous n'êtes pas encore inscrit ? <a href="./?page=inscription">s'inscrire</a></p>
<br>