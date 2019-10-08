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
   <div class="row"><div class="col-sm-2"><br><br><br><div class="col-sm-7">
             <a href="../" class="btn btn-default btn-block"><span class="glyphicon glyphicon-home"></span></a>

          </div></div>  <div class="col-sm-3">
  <br><br>
      

	 <h2 class="titre" style="text-align: center; color:white; font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace; "> Voitures En service</h2><hr>


<?php
 
                          $requete= $bdd->prepare("SELECT * FROM vehicule_en_service");
                        

                          $requete->execute();
                          $existe= $requete->rowCount();
                          $row = $requete->fetchAll(PDO::FETCH_ASSOC);
                          $i=0;
                          echo "<div class='table-responsive'></div>";
                          echo "<table border='1' class=' table table-bordered table-striped table-hover table-condensed'>";
                          echo "<th class='table warning'> ID Voiture </th>"; 
                          echo "<th class='table warning'>  ID Conducteur </th>"; 
                        
                          
                          
                            
                             while ( $i<$existe) {
                          echo "<tr>";
                          echo "<td class='table warning'>".$row[$i]["idV"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["idC"]."</td>"; 
                      
                          
                           echo "</tr>";
                        $i++;
                           }

                        echo "</table>";

?>
<br>



</div>

<div class="col-sm-3">
  
   <h2 class="titre" style="text-align: center; color:white; font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace; ">Voitures-Assurances</h2><hr>


<?php
 
                          $requete= $bdd->prepare("SELECT * FROM voiture_assurance ");
                        

                          $requete->execute();
                          $existe= $requete->rowCount();
                          $row = $requete->fetchAll(PDO::FETCH_ASSOC);
                          $i=0;
                          echo "<div class='table-responsive'></div>";
                          echo "<table border='1' class=' table table-bordered table-striped table-hover table-condensed'>";
                          echo "<th class='table warning'> ID Voiture </th>"; 
                         
                          echo "<th class='table warning'> ID Asuurance </th>"; 
                          
                          
                            
                             while ( $i<$existe) {
                          echo "<tr>";
                          echo "<td class='table warning'>".$row[$i]["idV"]."</td>"; 
                        
                         echo "<td class='table warning'>".$row[$i]["idA"]."</td>"; 
                          
                          
                           echo "</tr>";
                        $i++;
                           }

                        echo "</table>";

?>
<br>



</div>

<div class="col-sm-3">
  <br><br>
      

   <h2 class="titre" style="text-align: center; color:white; font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace; ">Voitures-Controles</h2><hr>


<?php
 
                          $requete= $bdd->prepare("SELECT * FROM voiture_controle ");
                        

                          $requete->execute();
                          $existe= $requete->rowCount();
                          $row = $requete->fetchAll(PDO::FETCH_ASSOC);
                          $i=0;
                          echo "<div class='table-responsive'></div>";
                          echo "<table border='1' class=' table table-bordered table-striped table-hover table-condensed'>";
                          echo "<th class='table warning'> ID Voiture </th>"; 
                           
                          echo "<th class='table warning'> ID Controle </th>"; 
                         
                          
                          
                            
                             while ( $i<$existe) {
                          echo "<tr>";
                          echo "<td class='table warning'>".$row[$i]["idV"]."</td>"; 
                      
                         echo "<td class='table warning'>".$row[$i]["idControle"]."</td>"; 
                      
                          
                          
                           echo "</tr>";
                        $i++;
                           }

                        echo "</table>";

?>
<br>



</div>









</div>

</div>

<br><br><br>

</body>
</html>