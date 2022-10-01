<?php
    session_start();
    require 'DataBase.php';
	 if(!empty($_GET['numeroplace'])) 
    {
        $numeroplace = checkInput($_GET['numeroplace']);
    }
	if(!empty($_GET['nomparking'])) 
    {
        $nomparking = checkInput($_GET['nomparking']);
    }
	 if(!empty($_GET['immatriculation'])) 
	{
		$immat = checkInput($_GET['immatriculation']);
	}
	if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }
    if(!empty($_GET['nom'])) 
    {
        $nom = checkInput($_GET['nom']);
    }
	 function checkInput($data) 
    {
      $data = trim($data);//supprimer les espaces
      $data = stripslashes($data);//Supprime les antislashs d'une chaîne
      $data = htmlspecialchars($data);//Convertit les caractères spéciaux en entités HTML
      return $data;
    }
?>

<!DOCTYPE html>
<html>
    <head>
	<title>Parking. </title>
       <link rel="stylesheet" href="css/styles.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    
    <body class="page">
        <div class="container" >
			<div class="row">
			<div class="col-md-4 col-md-4 col-xs-12"></div>
			<div class="col-md-4 col-md-4 col-xs-12">
			<form class="bg" method="POST" action="<?php echo'reserverplace.php?id=' . $id .'& nom= '.$nom ;?>" >
				 <div class="form-group">
					<label >Identifiant:</label>
					<input type="text" class="form-control mt-2"  name="id" value="<?php echo $id;?>" readonly>
				  </div>
				  <div class="form-group">
					<label >Numero place:</label>
					<input type="text" class="form-control"  name="numeroplace" value="<?php echo $numeroplace;?>" readonly>
				  </div>
				  <div class="form-group">
					<label >Nom parking:</label>
					<input type="text" class="form-control"  name="nomparking" value="<?php echo $nomparking;?>" readonly>
				  </div>
				  <div class="form-group">
					<label >Immatriculation :</label>
					<input type="text" class="form-control mt-2"  name="immat" value="<?php echo $immat;?>" readonly>
				  </div>
				  <div class="form-group">
                        <label for="code">Code de reservation:</label>
                        <input type="text" class="form-control" id="code" name="code"  value="<?php echo rand(1111,9999); ?>"readonly>
                    </div>
                    <div class="form-group row">
                      <label for="heure" >Date d'entrée</label>
                      <div class="col-10">
                        <input class="form-control" type="datetime-local" name="heure" id="heure">
                      </div>
                    </div>
				   
					<div class="form-group row">
					  <label for="heures" >Date de sortie prevue:</label>
					  <div class="col-10">
						<input class="form-control" type="datetime-local"  id="heures" name="heuresp" >
					  </div>
					</div>
					<!-- mettre un 0 dans le champs PlaceOccupee? -->
					<div class="form-group">
					<input type="hidden" name="reserver" value="1"/>
					</div>
				  <center><button type="submit" name="valider" class="btn btn-success mt-2">Reserver maintenant</button></center>
			</form>
			</div>
			</div>
			</div>
			
    </body>
</html>

