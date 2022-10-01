<?php

    session_start();

    require 'DataBase.php';
 
    if(!empty($_GET['code'])) 
    {
        $code = checkInput($_GET['code']);
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
        $code = checkInput($_POST['code']);
        $db = DataBase::connect();
        $statement = $db->prepare("DELETE FROM occupationparking WHERE CodeReservation = ?");
        $statement->execute(array($code));
        DataBase::disconnect();
        header("Location: page.php"); 
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
        <link rel="stylesheet" href="css/styles.css">
	</head>
    
    
    <body class="pagedeletereservation">
        <center><h1><span class="glyphicon glyphicon-fire"></span>Parking.</h1></center>
         <div class="container">
            <div class="row">
                <br>
                <form class="form" action="<?php echo'deletereservation2.php?id=' . $id .'& nom= '.$nom ;?>" role="form" method="post">
                    <input type="hidden" name="code" value="<?php echo $code;?>"/>
                    <p class="alert alert-warning">Etes vous sur de vouloir annuler ?</p>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-warning">Oui</button>
                    </div>
                </form>
				<br>
				<br>
				<form class="form" action="checklogin.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id;?>"/>
				<input type="hidden" name="nom" value="<?php echo $nom;?>"/>
				<center><button type="submit" name="login" class="btn btn-success mt-2"><span class="glyphicon glyphicon-home"></span> revenir a la page d'acceuil</button></center>
				</form>
            </div>
        </div>   
    </body>
</html>

