
<! DOCTYPE html>
<html>
	<head>
		<title>Parking. </title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
		<!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- CSS only -->
		<link rel="stylesheet" href="css/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	</head>
	 
	<body class="page">
		<div class=""></div>
		<center><h1><span class="glyphicon glyphicon-fire"></span>Parking.</h1></center>
		<br>
		<!-- afficher les donées de table personne dans le tableau -->
		<center><h2><strong>Mes Informations Personnel</strong></h2></center>
		<br>
		<table class="table table-dark">
		  <thead><!-- l'ensemble d'elements qui defenissent l'en tete de tableau informations personnel -->
			<tr>
			  <th scope="col">numero de client</th>
			  <th scope="col">Nom</th>
			   <th scope="col">Prenom</th>
			   <th scope="col">Adresse</th>
			   <th scope="col">abonnement ok ?</th>
			   <th scope="col">Action</th>
			</tr>
			<br>
		  </thead>	
		  <tbody><!-- le corp de tableau information personnel	 -->	
				<?php
						require 'DataBase.php';//require =si le fichier DataBase n'existe pas il arrete tout
						$db = Database::connect();
						$login= $db->prepare("SELECT * FROM personne WHERE ID=:id AND Nom=:nom");
						$login->bindParam("id",$_POST['id']);
						$login->bindParam("nom",$_POST['nom']);
						$login->execute();
						
							while($personne = $login->fetch())//recuperer une ligne a chaque fois
							{
								echo"<tr>";
								echo "<td>" .$personne['ID']."</td>";//concatenation 
								echo "<td>" .$personne['Nom']."</td>";
								echo "<td>" .$personne['Prenom']."</td>";
								echo "<td>" .$personne['Adresse']."</td>";
								if($personne['AbonnementOK']=='1')
								{echo "<td>Vous etes à jour</td>";}else{echo "<td>Vous n'etes pas a jour</td>";}
								echo "<td width=300>";
								if($personne['AbonnementOK']=='1')
								{echo '<a class="btn btn-success" href="admin/insert1.php?idpersonne='.$personne['ID'].'& Nom='.$personne['Nom'].'"><span class="glyphicon glyphicon-plus"></span>  Ajouter Vehicule</a>';
								echo " ";
								echo '<a class="btn btn-warning" href="contact/contact.php?id='.$personne['ID'].'& nom='.$personne['Nom'].'"><span class="glyphicon glyphicon-comment"></span>   Contacter nous</a>';}
								else
								{echo " vous ne pouvez pas ajouter des vehicules veuillez nous contacter merci !";
								echo '<a class="btn btn-warning" href="contact/contact.php?id='.$personne['ID'].'& nom='.$personne['Nom'].'"><span class="glyphicon glyphicon-comment"></span>   Contacter nous</a>';}
								echo " ";								
								echo "</tr>";
							}					
					?>
			</tbody>
		</table>	
		<!-- afficher les donées vehicule dans le tableau -->
		<center><h2><strong>Mes Vehicules</strong></h2></center>
		<br>
		<table class="table table-striped table-dark">
		  <thead>
			<tr>
			  <th scope="col">Categorie de vehivule</th>
			  <th scope="col">Immatriculation</th>
			  <th scope="col">Action</th>
			</tr>
		   </thead>		
		<tbody>
		
			<?php
					$login= $db->prepare("SELECT * FROM personne RIGHT JOIN vehicule ON personne.ID=vehicule.IDPersonne WHERE IDPersonne=:id");					
					$login->bindParam("id",$_POST['id']);
					$login->execute();
					
						while($vehicule = $login->fetch())
						{
							echo"<tr>";
							echo "<td>" .$vehicule['Categorie']."</td>";
							echo "<td>" .$vehicule['Immatriculation']."</td>";
							echo "<td width=300>";
							echo '<a class="btn btn-danger" href="admin/delete.php?immatriculation='.$vehicule['Immatriculation'].' & id='.$vehicule['ID'].' & nom='.$vehicule['Nom'].'"><span class="glyphicon glyphicon-trash"></span>  Supprimer</a>';
							echo ' ';
							if($vehicule['AbonnementOK']=='1')
							{echo '<a class="btn btn-success" href="voirplaces.php?categorie='.$vehicule['Categorie'].'& immatriculation='.$vehicule['Immatriculation'].' & id='.$vehicule['ID'].' & nom='.$vehicule['Nom'].'"><span class="glyphicon glyphicon-eye-open"></span>  Places proposées</a>';}
							else{echo " vous ne pouvez pas Reserver veuillez nous contacter merci ! ";}
							echo "</tr>";
						}			
				?>			
		</tbody>
		</table>
		
		
		<!-- afficher les RESERVATION DE CLIENT -->
		<center><h2><strong>Mes Reservations</strong></h2></center>
		<br>
		<table class="table table-striped table-dark">
		  <thead>
			<tr>
			  <th scope="col">Nom parking</th>
			  <th scope="col">Numero de place</th>
			   <th scope="col">Heure d'entrée</th>
                <th scope="col">Heure de sortie prévue</th>
			   <th scope="col">Code de reservation</th>
			   <th scope="col">action</th>
			</tr>
		 </thead>		
		<tbody>
			<?php			
					$afficher= $db->prepare("SELECT * FROM personne RIGHT JOIN occupationparking ON personne.ID=occupationparking.IDPersonne WHERE IDPersonne=:id");
					$afficher->bindParam("id",$_POST['id']);//Lier un paramètre à un nom de variable
					$afficher->execute();					
						while($reservation = $afficher->fetch())//recuperer les lignes
						{
							echo"<tr>";
							echo "<td>" .$reservation['_NomParking']."</td>";
							echo "<td>" .$reservation['_NumeroPlace']."</td>";
							echo "<td>" .$reservation['HeureEntree']."</td>";
                            echo "<td>" .$reservation['HeureSortiePrevue']."</td>";
							echo "<td>" .$reservation['CodeReservation']."</td>";
							echo "<td width=300>";
							echo '<a class="btn btn-danger" href="deletereservation.php?code='.$reservation['CodeReservation'].'& id=' . $reservation['ID'].' & nom= ' . $reservation['Nom'] .'"><span class="glyphicon glyphicon-trash"></span>  Annuler </a>';
							echo "</tr>";
						}
				?>
            <?php
                $db = DataBase::connect();
                $statement = $db->prepare("DELETE FROM occupationparking WHERE PlaceReserver = 0 ");
                $statement->execute();
                DataBase::disconnect();
            ?>
		</tbody>
		</table>	
		<form action="index.php" method="post">
			<center><button type="submit"class="btn btn-danger" name="vehiculebtn"/>Se deconnecter  <span class="glyphicon glyphicon-log-out"></span></center>
		</form>
	</body>
    <script>
        setTimeout(function()
                    {
                        window.location.reload(1);
                    }, 10000);
    </script>
    <footer>
  <center><h4>Le site s'actualise automatiquement chaque 10 seconde</h4></center>
</footer>
</html>