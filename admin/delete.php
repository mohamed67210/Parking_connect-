<?php

    session_start();

    require 'DataBase.php';
 
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

    if(!empty($_POST)) 
    {
        $immatriculation = checkInput($_POST['immatriculation']);
        $db = DataBase::connect();
        $statement = $db->prepare("DELETE FROM vehicule WHERE Immatriculation = ?");
        $statement->execute(array($immatriculation));
        DataBase::disconnect();
        header("Location: ../page.php"); 
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
        <title>Parking.</title>
       <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body class="pagesupprimervehicule">
        
        <center><h1><span class="glyphicon glyphicon-fire"></span>Parking.</h1></center>
         <div class="container admin">
            <div class="row">
                <br>
                <form class="form" action="<?php echo'deletedata.php?id=' . $id .'& nom= '.$nom ;?>" role="form" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nom;?>"/>
                    <input type="hidden" name="immatriculation" value="<?php echo $immatriculation;?>"/>
                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-warning">Oui</button>
                      
                    </div>
                </form>
				<br>
				<br>
				<form class="form" action="../checklogin.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id;?>"/>
				<input type="hidden" name="nom" value="<?php echo $nom;?>"/>
				<center><button type="submit" name="login" class="btn btn-success mt-2"><span class="glyphicon glyphicon-home"></span> revenir a la page d'acceuil</button></center>
				</form>
            </div>
        </div>   
    </body>
</html>

