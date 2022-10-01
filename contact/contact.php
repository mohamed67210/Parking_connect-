<?php 
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
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>
<!DOCTYPE html>
<html>
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="../css/styles.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
</head>
<body class="contact">
<center><h1><span class="glyphicon glyphicon-fire"></span>Parking.</h1></center>
<!--Section: Contact v.2-->
<section class="mb-4">
	
    <!--Section heading-->
    <h2 class="h2contact">Contactez-nous</h2>
    <!--Section description-->
    <p class="pcontact">Avez-vous des questions? N'hésitez pas à nous contacter directement. Notre équipe reviendra vers vous dans quelques heures pour vous aider.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="labelcontact">Votre Nom</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="labelcontact">Votre email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="labelcontact">Sujet</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message" class="labelcontact">Votre message</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>

            <div class="text-center text-md-left">
                <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Envoyer</a>
            </div>
			<br>
				<br>
				<form class="form" action="../checklogin.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id;?>"/>
				<input type="hidden" name="nom" value="<?php echo $nom;?>"/>
				<center><button type="submit" name="login" class="btn btn-success mt-2"><span class="glyphicon glyphicon-home"></span> revenir a la page d'acceuil</button></center>
				</form>
            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>STRASBOURG, 67000, FR</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+ 06 55 55 55</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>contact@parking.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->
</body>
</html>
