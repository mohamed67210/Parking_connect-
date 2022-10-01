<! DOCTYPE html>
<html>
	<head>
	
		<title>Parking.</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- CSS only -->
<link rel="stylesheet" href="css/styles.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	
	
	<body class="index">						
		<br>
        <br>
		<center><h1><span class="glyphicon glyphicon-fire"></span>Parking.</h1></center>
        <br>
        <br>
        <br>
		<div class="container-fluid" >
		<div class="row">
		<div class="col-md-4 col-md-4 col-xs-12"></div>
		<div class="col-md-4 col-md-4 col-xs-12 ">
		<form class="bg" method="POST" action="checklogin.php" >
		  <div class="form-group">
			<label><span class="glyphicon glyphicon-user"></span>   Identifiant</label>
			<input type="password" class="form-control"  name="id"  placeholder="Enter votre numéro de client">
		  </div>
		  <div class="form-group">
			<label><span class="glyphicon glyphicon-user"></span>   Nom</label>
			<input type="text" class="form-control mt-2"  name="nom" placeholder="Entrez votre Nom">
		  </div>
		  <center><button type="submit" name="login" class="btn btn-success mt-2">Se connecter  <span class="glyphicon glyphicon-log-in"></span></button></center>
		</form>
		<br>
		<br>
		<br>
		<center><img src="images/logoparking.jpg" class="rounded-circle" alt="Cinque Terre"></center>
		</div>
		</div>
		</div>
	</body>
</html>