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
?>
</head>
<body  style="background-image:url(a.jpg);">
<br><br><br>
<div class="container ">
   <div class="row"><div class="col-sm-3"><br><br><br><div class="col-sm-4">
             <a href="../" class="btn btn-default btn-block"><span class="glyphicon glyphicon-home"></span></a>

          </div></div>  <div class="col-sm-7">
  
      

	 <h2 class="titre" style="text-align: center; color:white; font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace; "> Liste Des Voitures</h2><hr>


<?php

                          $requete= $bdd->prepare("SELECT * FROM voiture");
                          $requete->execute();
                          $existe= $requete->rowCount();
                          $row = $requete->fetchAll(PDO::FETCH_ASSOC);
                          $i=0;
                          echo "<div class='table-responsive'></div>";
                          echo "<table border='1' class=' table table-bordered table-striped table-hover table-condensed'>";
                          echo "<th class='table warning'> ID </th>"; 
                          echo "<th class='table warning'> Num Matricule </th>"; 
                          echo "<th class='table warning'> Wilaya D'Immatriculation</th>"; 
                          echo "<th class='table warning'> Année 1er Circulation </th>"; 
                          echo "<th class='table warning'> Marque</th>";
                          echo "<th class='table warning'> Modèle</th>";
                          echo "<th class='table warning'> Couleur</th>"; 
                          
                            
                             while ( $i<$existe) {
                          echo "</tr>";
                          echo "<td class='table warning'>".$row[$i]["idV"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["numero_sequence_matricule"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["WilayaImmatriculation"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["AnneeCirculation"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["Marque"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["Modele"]."</td>"; 
                           echo "<td class='table warning'>".$row[$i]["Couleur"]."</td>"; 
                          
                           echo "</tr>";
                        $i++;
                           }

                        echo "</table>";

?>
<br>



</div>



<div class="col-sm-3"></div>











</div>

</div>

<br><br><br>

</body>
</html>