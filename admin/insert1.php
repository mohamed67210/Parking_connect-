<?php
    session_start();//reprendre une session existante

    require 'DataBase.php';
	 if(!empty($_GET['idpersonne'])) 
    {
        $idpersonne = checkInput($_GET['idpersonne']);
    }
	if(!empty($_GET['Nom'])) 
    {
        $nom = checkInput($_GET['Nom']);
    }
	 function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!DOCTYPE html>
<html>
    <head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

       <link rel="stylesheet" href="../css/styles.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    
    <body class="pageajoutervehicule">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container-fluid " >
			<div class="row">
			<div class="col-md-4 col-md-4 col-xs-12"></div>
			<div class="col-md-4 col-md-4 col-xs-12">
			<form class="bg" method="POST" action="<?php echo'insertiondata.php?id=' . $idpersonne .'& nom= '.$nom ;?>" >
				  <div class="form-group">
					<label >ID client:</label>
					<input type="text" class="form-control"  name="id" value="<?php echo $idpersonne;?>" readonly>
					<small id="emailHelp" class="form-text text-muted">Exemple:124.</small>
				  </div>
				  <div class="form-group">
					<label >Immatriculation :</label>
					<input type="text" class="form-control mt-2"  name="immat" placeholder="Entrez votre immatriculation">
					<small id="emailHelp" class="form-text text-muted">Exemple: KK25EE.</small>
				  </div>
				   <label>Categorie vehicule :</label>
						  <select class="form-control form-control-lg" name="categorie">
							  <option>selectionner categorie :</option>
							  <option> categorie A </option>
							  <option>categorie B </option>
							  <option>categorie C </option>
						  </select>
					
				  <center><button type="submit" name="valider" class="btn btn-success mt-2"><span class="glyphicon glyphicon-plus"></span>  Ajouter</button></center>
			</form>
				<br>
				<br>
				<form class="form" action="../checklogin.php" method="post">
				<input type="hidden" name="id" value="<?php echo $idpersonne;?>"/>
				<input type="hidden" name="nom" value="<?php echo $nom;?>"/>
				<center><button type="submit" name="login" class="btn btn-success mt-2"><span class="glyphicon glyphicon-home"></span> revenir a la page d'acceuil</button></center>
				</form>
				
			</div>
			</div>
			</div>
			
		
       
    </body>
</html>
