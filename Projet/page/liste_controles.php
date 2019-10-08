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
<div class="container " > <div class="row"><div class="col-sm-3"><br><br><br><br><div class="col-sm-4">
             <a href="../" class="btn btn-default btn-block"><span class="glyphicon glyphicon-home"></span></a>

          </div></div>  <div class="col-sm-7">
  

	 <h2 class="titre" style="text-align: center; color:white; font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace; "> Liste Des Controles</h2><hr>


<?php

                          $requete= $bdd->prepare("SELECT * FROM controle");
                          $requete->execute();
                          $existe= $requete->rowCount();
                          $row = $requete->fetchAll(PDO::FETCH_ASSOC);
                          $i=0;
                          echo "<div class='table-responsive'></div>";
                          echo "<table border='1' class=' table table-bordered table-striped table-hover table-condensed'>";
                          echo "<th class='table warning'> ID </th>"; 
                          echo "<th class='table warning'> Numéro Contrôle Technique </th>"; 
                          echo "<th class='table warning'> Organisme Emetteur </th>"; 
                          echo "<th class='table warning'> Date Effet </th>"; 
                          echo "<th class='table warning'> Date Fin</th>";
                          echo "<th class='table warning'>Observations</th>";
                        
                             while ( $i<$existe) {
                          echo "</tr>";
                          echo "<td class='table warning'>".$row[$i]["idControle"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["numero_controle_technique"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["organisme_emetteur"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["date_effet"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["date_fin"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["Observations"]."</td>"; 
                           
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