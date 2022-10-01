
			<center><h1><span class="glyphicon glyphicon-fire"></span>Parking.</h1></center>
		<!-- afficher les donées dans le tableau -->
		<center><table class="table table-dark">
		  <thead>
			<tr>
			  <th scope="col">Nom de parking</th>
			  <th scope="col">Numero de place</th>
			   <th scope="col">Categorie</th>
			   <th scope="col">option</th>
			</tr>
		  </thead>
	<tbody><!-- l'element de corp du tableau -->
		<?php
			require 'DataBase.php';
			if(!empty($_GET['categorie'])) //si le variable n'est pas vide 
			{
				$categorie = checkInput($_GET['categorie']);//$categorie = variable http categorie 
			}
				if(!empty($_GET['immatriculation'])) 
			{
				$immatriculation = checkInput($_GET['immatriculation']);
			}
			if(!empty($_GET['nom'])) 
			{
				$nom = checkInput($_GET['nom']);
			}
			if(!empty($_GET['id'])) 
			{
				$id = checkInput($_GET['id']);
			}
			function checkInput($data)
			{
				$data=trim($data);
				$data=stripcslashes($data);
				$data=htmlspecialchars($data);
				return $data;
			}
			$db = Database::connect();//connexion avec la BDD
			$statement = $db->prepare("SELECT * FROM placedeparking LEFT JOIN occupationparking ON placedeparking.NumeroPlace=occupationparking._NumeroPlace WHERE CategorieVehicule=?  ");
			$statement->execute(array($categorie));
			while($vehicule = $statement->fetch())//fetch:recuperer les lignes suivante
			{
				echo"<tr>";
				echo "<td>" .$vehicule['NomParking']."</td>";
				echo "<td>" .$vehicule['NumeroPlace']."</td>";
				echo "<td>" .$vehicule['CategorieVehicule']."</td>";							
				echo "<td width=300>";
				if($vehicule['PlaceReserver']==0)//si le cahmp PlaceReserver=0 la place est libre
				{echo '<a class="btn btn-success" href="reserver2.php?numeroplace='.$vehicule['NumeroPlace'].'& nomparking='.$vehicule['NomParking'].'& categorie='.$vehicule['CategorieVehicule'].'& immatriculation='.$immatriculation.' & id='.$id.'& nom='.$nom.'">reserver </a>';}
				else
				{echo "cette place est indisponible";}
				echo "</tr>";
			}
			Database::disconnect();	
		?>
	</tbody>
		</table></center>
		<form action="checklogin.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id;?>"/>
			<input type="hidden" name="nom" value="<?php echo $nom;?>"/>
			<center><button type="submit" name="login" class="btn btn-success mt-2"><span class="glyphicon glyphicon-home"></span> revenir a la page d'acceuil</button></center>
		</form>
		<center><p>* Categorie A : deux-roues <br> Categorie B : Voiture particulier <br> Categorie C : Camionette </p></center>