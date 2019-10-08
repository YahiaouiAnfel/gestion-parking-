<?php ob_start(); ?>
<?php

$requete = $bdd->prepare("SELECT * FROM profil WHERE id = ?");
$requete->execute(array($_SESSION['id']));
$info = $requete->fetch();

?>

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

$bdd = new PDO('mysql:host=localhost;dbname='.$bdname, $user, $pass);


if(isset($_POST['sub1'])) {
	
	
		    
$requete7= $bdd->prepare("DELETE FROM assurance WHERE date_expiration=CURDATE()");
	                       $requete7->execute(array());
	                       
            
                            
                       
}
if(isset($_POST['sub2'])) {
	

$requete9= $bdd->prepare("DELETE FROM controle WHERE date_fin=CURDATE()");
	                       $requete9->execute(array());
}

?>



</head>
<body  style="background-image:url(background-site.jpg);-webkit-background-size: cover;" >
 
    <div class="container ">
         <h1 style=" background-image:url(titre.jpg); color: #FCFAE1; text-align:left;"><img src="logo.jpg" width="80px" height="80px" >    Gestionnaire De Parc Automobile</h1>

<div class="row">
     

	
	<div class="col-sm-2"> 
			<div class="dropdown">
    	      <button  type="button" class="btn  dropdown-toggle" style="background-image:url(titre.jpg) ; color: white;" data-toggle="dropdown" ><span class="glyphicon glyphicon-menu-hamburger "></span> Conducteur <span class="caret"></span></button>
		       <ul class="dropdown-menu">
                  <li><a href="page/liste_conducteurs.php">Liste Des Conducteurs</a></li>
                   <li class="diviser"></li>
                    <li class="dropdown-header">MODIFICATION</li>
                  <li><a href="page/ajouter_conducteur.php">Ajouter </a></li>
                  <li><a href="page/modifier_conducteur.php">Modifier </a></li>
                  <li><a href="page/supprimer_conducteur.php">Supprimer </a></li>
               </ul>
			
            </div>
     </div>

     <div class="col-sm-2"> 
			<div class="dropdown">
    	      <button  type="button" class="btn  dropdown-toggle" style="background-image:url(titre.jpg) ; color: white;" data-toggle="dropdown"> <span class="glyphicon glyphicon-menu-hamburger"></span> Voitures <span class="caret"></span></button>
		       <ul class="dropdown-menu">
                  <li><a href="page/liste_voitures.php">Liste Des Voitures</a></li>
                   <li class="diviser"></li>
                    <li class="dropdown-header">MODIFICATION</li>
                  <li><a href="page/ajouter_voiture.php">Ajouter</a></li>
                  <li><a href="page/modifier_voiture.php">Modifier </a></li>
                  <li><a href="page/supprimer_voiture.php">Supprimer </a></li>
               </ul>
			
			    </div>
            </div>

      <div class="col-sm-2">     
            <div class="dropdown">
    	      <button  type="button" class="btn  dropdown-toggle" data-toggle="dropdown" style="background-image:url(titre.jpg); color: white;"> <span class="glyphicon glyphicon-menu-hamburger"></span> Assurance <span class="caret"></span></button>
		       <ul class="dropdown-menu">
                  <li><a href="page/liste_assurances.php">Liste Des Assurances</a></li>
                   <li class="diviser"></li>
                   <li class="dropdown-header">MODIFICATION</li>
                  <li><a href="page/ajouter_assurance.php">Ajouter </a></li>
                
                 
               </ul>
			
	   </div>	
    </div> 
 
    <div class="col-sm-2"> 
			<div class="dropdown">
    	      <button  type="button" class="btn  dropdown-toggle" style="background-image:url(titre.jpg) ; color: white;" data-toggle="dropdown"> <span class="glyphicon glyphicon-menu-hamburger"></span> Controle Technique <span class="caret"></span></button>
		       <ul class="dropdown-menu">
                  <li><a href="page/liste_controles.php">Liste Des Controles</a></li>
                   <li class="diviser"></li>
                    <li class="dropdown-header">MODIFICATION</li>
                  <li><a href="page/ajouter_controle.php">Ajouter </a></li>
                
               </ul>
			
           </div>
     </div>
      <div class="col-sm-2"> 
			<div class="dropdown">
    	      <button  type="button" class="btn  dropdown-toggle" style="background-image:url(titre.jpg) ; color: white;" data-toggle="dropdown"> <span class="glyphicon glyphicon-wrench"></span> Options Avancees <span class="caret"></span></button>
		       <ul class="dropdown-menu">
                 
                    <li class="dropdown-header">Voiture-conducteur </li>
                  <li><a href="page/voiture_en_service.php">Affecter</a></li>
                  <li><a href="page/supprimer_voiture_en_service.php">Desaffecter</a></li>
                   <li class="diviser"></li>
                    <li class="dropdown-header">Voiture-Controle </li>
                    <li class="diviser"></li>
                  <li><a href="page/ajouter_voiture_controle.php">Ajouter</a></li>
                  <li><a href="page/modifier_voiture_controle.php">Modifier</a></li>
                   <li class="diviser"></li>
                    <li class="dropdown-header">Voiture-Assurance </li>
                  <li><a href="page/ajouter_voiture_assurance.php">Ajouter</a></li>
                  <li><a href="page/modifier_voiture_assurance.php">Modifier</a></li>
                  <li class="diviser"></li>
                    <li class="dropdown-header">Voiture </li> 
                    <li><a href="page/liste_incident_depense.php">Liste Incidents/Dépenses</a></li>
                    <li><a href="page/incident_depense.php">Incidents et Dépenses</a></li>

               </ul>
			
           </div>
     </div><div class="col-sm-2"> 
			 <li><a href="page/index.php" class="btn " style="background-image:url(titre.jpg); color: white;" data-toggle="tooltip" data-placement="bottom" title="Au revoir!"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
    	     
     </div>

     
     <br>
   

<hr style="border : 2px solid black;">
	<div class="col-sm-12">
	</div>
	<br>
	<div class="col-sm-2">
	
            <div class="col-sm-12"></div>
            	<h3  class="titre" style="color:#B9121B; font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace; "> <span class="glyphicon glyphicon-warning-sign"></span> <br> DATE D'EXPIRATION</h3><hr>
            <div class="col-sm-12">

       

                             <h3 style=" background-image:url(titre.jpg); color: #FCFAE1; text-align:center;font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace;">Assurances</h3>

<?php

                         $requete= $bdd->prepare("SELECT * FROM assurance WHERE date_expiration=CURDATE() ");
                         $requete->execute();
                         $existe= $requete->rowCount();
                         $row = $requete->fetchAll(PDO::FETCH_ASSOC);
                         $i=0;
                         echo "<div class='table-responsive'></div>";
                         echo "<table border='1' class=' table table-bordered table-striped table-hover table-condensed' title='Pour Les Supprimer Cliquez Sur Assurance Puis Supprimer Dans Le MenuBar'>";
                         echo "<th class='table warning'> Assurance</th>"; 
                              while ( $i<$existe) {
                         echo "</tr>";
                         echo "<td class='table warning'>".$row[$i]["numero_police_assurance"]."</td>"; 
                         echo "</tr>";
                         $i++;
                             }

                         echo "</table>";

?>
<form method="post">
<button type="submit" name="sub1" class="btn btn-default valider"><span class="glyphicon glyphicon-remove"></span> Supprimer</button></form>
</div>

	<div class="col-sm-12"></div>
             <div class="col-sm-12">
                 <h3 style=" background-image:url(titre.jpg); color: #FCFAE1; text-align:center;font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace;">Controles Techniques </h3>
                

<?php

                          $requete= $bdd->prepare("SELECT * FROM controle WHERE date_fin=CURDATE() ");
                          $requete->execute();
                          $existe= $requete->rowCount();
                          $row = $requete->fetchAll(PDO::FETCH_ASSOC);
                          $i=0;
                          echo "<div class='table-responsive'></div>";
                          echo "<table border='1' class=' table table-bordered table-striped table-hover table-condensed'title='Pour Les Supprimer Cliquez Sur Controle Technique Puis Supprimer Dans Le MenuBar'>";
                          echo "<th class='table warning'> Controle</th>"; 
                             while ( $i<$existe) {
                          echo "</tr>";
                          echo "<td class='table warning'>".$row[$i]["numero_controle_technique"]."</td>"; 
                          echo "</tr>";
                          $i++;
                             }

                          echo "</table>";

?><form method="post">
<button type="submit" name="sub2" class="btn btn-default valider"><span class="glyphicon glyphicon-remove"></span> Supprimer</button></form>
<br>


	</div>

  

</div>



<div class="col-sm-8">

<div class="col-sm-4">
  
   <h2 class="titre" style="text-align: center; color:black;font-size: 20px; font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace; "> Voitures En service</h2><hr>


<?php
 
                          $requete= $bdd->prepare("SELECT * FROM vehicule_en_service");
                        

                          $requete->execute();
                          $existe= $requete->rowCount();
                          $row = $requete->fetchAll(PDO::FETCH_ASSOC);
                          $i=0;
                          echo "<div class='table-responsive'></div>";
                          echo "<table border='1' class=' table table-bordered table-striped table-hover table-condensed'>";
                          echo "<th class='table warning'> Voiture </th>"; 
                          echo "<th class='table warning'>  Conducteur </th>"; 
                        
                          
                          
                            
                             while ( $i<$existe) {
                          echo "<tr>";
                          echo "<td class='table warning'>".$row[$i]["numero_sequence_matricule"]."</td>"; 
                          echo "<td class='table warning'>".$row[$i]["num_permis_conduire"]."</td>"; 
                      
                          
                           echo "</tr>";
                        $i++;
                           }

                        echo "</table>";

?>




</div>


<div class="col-sm-4">
  
   <h2 class="titre" style="text-align: center; color:black;font-size: 20px; font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace; ">Voitures-Assurances</h2><hr>


<?php
 
                          $requete= $bdd->prepare("SELECT * FROM voiture_assurance ");
                        

                          $requete->execute();
                          $existe= $requete->rowCount();
                          $row = $requete->fetchAll(PDO::FETCH_ASSOC);
                          $i=0;
                          echo "<div class='table-responsive'></div>";
                          echo "<table border='1' class=' table table-bordered table-striped table-hover table-condensed'>";
                          echo "<th class='table warning'> Voiture </th>"; 
                         
                          echo "<th class='table warning'> Asuurance </th>"; 
                          
                          
                            
                             while ( $i<$existe) {
                          echo "<tr>";
                          echo "<td class='table warning'>".$row[$i]["numero_sequence_matricule"]."</td>"; 
                        
                         echo "<td class='table warning'>".$row[$i]["numero_police_assurance"]."</td>"; 
                          
                          
                           echo "</tr>";
                        $i++;
                           }

                        echo "</table>";

?>



</div>

<div class="col-sm-4">
      

   <h2 class="titre" style="text-align: center; color:black;font-size: 20px; font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace; ">Voitures-Controles</h2><hr>


<?php
 
                          $requete= $bdd->prepare("SELECT * FROM voiture_controle ");
                        

                          $requete->execute();
                          $existe= $requete->rowCount();
                          $row = $requete->fetchAll(PDO::FETCH_ASSOC);
                          $i=0;
                          echo "<div class='table-responsive'></div>";
                          echo "<table border='1' class=' table table-bordered table-striped table-hover table-condensed'>";
                          echo "<th class='table warning'> Voiture </th>"; 
                           
                          echo "<th class='table warning'> Controle </th>"; 
                         
                          
                          
                            
                             while ( $i<$existe) {
                          echo "<tr>";
                          echo "<td class='table warning'>".$row[$i]["numero_sequence_matricule"]."</td>"; 
                      
                         echo "<td class='table warning'>".$row[$i]["numero_controle_technique"]."</td>"; 
                      
                          
                          
                           echo "</tr>";
                        $i++;
                           }

                        echo "</table>";

?>
<br>



</div>

</div>

<div class="col-sm-2">



	<h3  class="titre" style="color:#B9121B; font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace; "> <span class="glyphicon glyphicon-warning-sign"></span><br> Renouveler  </h3><hr>



                             <h3 style=" background-image:url(titre.jpg); color: #FCFAE1; text-align:center;font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace;">Assurances</h3>

<?php
 
            


			
		 $requete = $bdd->prepare("SELECT * FROM assurance ");
		 $requete->execute(array());
		 $existe = $requete->rowCount();
		$row = $requete->fetchAll(PDO::FETCH_ASSOC);
		$i=0;$j=0;$trouve=0;
		  if($existe>=1 )
		      {
		
		 echo "<div class='table-responsive'></div>";
                          echo "<table border='1' class=' table table-bordered table-striped table-hover table-condensed'>";
                          echo "<th class='table warning'> Voiture </th>"; 
        
		    while (( $i<$existe) AND ($trouve==0)){
                          $res=$row[$i]["numero_police_assurance"] ;
                                $requete3= $bdd->prepare("SELECT * FROM voiture_assurance WHERE numero_police_assurance = ? ");
                                $requete3->execute(array($res)); $existe2 = $requete3->rowCount();
                                if($existe2==1){
                                    $trouve=1;
                                  
                                }}
                                   if($trouve==0){
                                $row3 = $requete3->fetchAll(PDO::FETCH_ASSOC);
                         if($existe2==0)
                          {echo "<tr>";
                          echo "<td class='table warning'>".$row3[0]["numero_sequence_matricule"]."</td>"; 
                          echo "</tr>";}
                    $i++;
                           
					}
				
                           } 
                          echo "</table>";
 


?>
<br>

                             <h3 style=" background-image:url(titre.jpg); color: #FCFAE1; text-align:center;font-family: Monaco, 'DejaVu Sans Mono', 'Lucida Console, 'Andale Mono', monospace;">Controles</h3>

<?php
 
            	 $requete = $bdd->prepare("SELECT * FROM controle WHERE date_fin=CURDATE()");
		 $requete->execute(array());
		 $existe = $requete->rowCount();
		$row = $requete->fetchAll(PDO::FETCH_ASSOC);
		$i=0;$j=0;
		  if($existe>=1 )
		      {
		
		 echo "<div class='table-responsive'></div>";
                          echo "<table border='1' class=' table table-bordered table-striped table-hover table-condensed'>";
                          echo "<th class='table warning'> Voiture </th>"; 
        
		    while ( $i<$existe) {
                          $res=$row[$i]["numero_controle_technique"] ;
                                $requete3= $bdd->prepare("SELECT * FROM voiture_controle WHERE numero_controle_technique= ? ");
                                $requete3->execute(array($res)); $existe2 = $requete3->rowCount();
                                $row3 = $requete3->fetchAll(PDO::FETCH_ASSOC);
                         if($existe2==1)
                          {echo "<tr>";
                          echo "<td class='table warning'>".$row3[0]["numero_sequence_matricule"]."</td>"; 
                          echo "</tr>";}
                    $i++;
                          

					
                           } 
                          echo "</table>";}

?>



</div>
 </div>
</div>
</body>
</html>