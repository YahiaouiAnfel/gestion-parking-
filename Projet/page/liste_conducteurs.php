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
   <div class="row">
    <div class="col-sm-1"><br><br><br><div class="col-sm-12">
             <a href="../" class="btn btn-default btn-block"><span class="glyphicon glyphicon-home"></span></a>

          </div></div>  <div class="col-sm-10">
  
      

	 <h2 class="titre" style="text-align: center; color:white; font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace; "> Liste Des Conducteurs</h2><hr>


<?php

                          $requete= $bdd->prepare("SELECT * FROM conducteur");
                          $requete->execute();
                          $existe= $requete->rowCount();
                          $row = $requete->fetchAll(PDO::FETCH_ASSOC);
                          $i=0;
                          echo "<div class='table-responsive'></div>";
                          echo "<table border='1' class=' table table-bordered table-striped table-hover table-condensed'>";
                          echo "<th class='table warning'> ID </th>"; 
                          echo "<th class='table warning'> Nom </th>"; 
                          echo "<th class='table warning'> Prénom </th>"; 
                          echo "<th class='table warning'> Date De Naissance </th>"; 
                          echo "<th class='table warning'> Adresse</th>";
                          echo "<th class='table warning'> Situation Familiale</th>";
                          echo "<th class='table warning'> Genre</th>"; 
                          echo "<th class='table warning'> Num Permis Conduire</th>"; 
                          echo "<th class='table warning'> Année Obtention</th>"; 
                           echo "<th class='table warning'> Wilaya Obtention</th>";
                            
                             while ( $i<$existe) {
                          echo "</tr>";
                          echo "<td class='table warning'>".$row[$i]["idC"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["nom"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["prenom"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["Date_naissance"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["adresse"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["situation_familiale"]."</td>"; 
                           echo "<td class='table warning'>".$row[$i]["genre"]."</td>"; 
                           echo "<td class='table warning'>".$row[$i]["num_permis_conduire"]."</td>"; 
                           echo "<td class='table warning'>".$row[$i]["anneeobtention"]."</td>"; 
                           echo "<td class='table warning'>".$row[$i]["wilayaobtention"]."</td>";
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