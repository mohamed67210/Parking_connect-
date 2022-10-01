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
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body class="page">
 <div class="">
        <div class=""></div>
    </div>
    <center><h1>Votre reservation est Supprimée !</h1></center>
    <form action="checklogin.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id;?>"/>
			<input type="hidden" name="nom" value="<?php echo $nom;?>"/>
			<center><button type="submit" name="login" class="btn btn-success mt-2"><span class="glyphicon glyphicon-home"></span> revenir a la page d'acceuil</button></center>
		</form>
</body>
</html>