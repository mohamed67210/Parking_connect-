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
					$data=trim($data);
					$data=stripcslashes($data);
					$data=htmlspecialchars($data);
					return $data;
				}
if(isset($_POST['valider']))
					{
						require 'DataBase.php';
						$db = Database::connect();
						$valider= $db->prepare("INSERT  INTO occupationparking(IDPersonne,_NomParking,_NumeroPlace,ImmatriculationVehicule,HeureEntree,HeureSortiePrevue,CodeReservation,PlaceReserver) VALUES(:id,:nom,:num,:immat,:heure,:heurestest,:code,:reserver) ");
						$valider->bindParam("id",$_POST['id'],PDO::PARAM_STR);
						$valider->bindParam("num",$_POST['numeroplace'],PDO::PARAM_STR);
						$valider->bindParam("nom",$_POST['nomparking'],PDO::PARAM_STR);
						$valider->bindParam("immat",$_POST['immat'],PDO::PARAM_STR);
						$valider->bindParam("heure",$_POST['heure'],PDO::PARAM_STR);
						$valider->bindParam("heurestest",$_POST['heuresp'],PDO::PARAM_STR);
						$valider->bindParam("code",$_POST['code'],PDO::PARAM_STR);
						$valider->bindParam("reserver",$_POST['reserver'],PDO::PARAM_STR);
						$valider->execute();
						//header("Location: ../index.php");
					}
?>
<!DOCTYPE html>
<html>
<head>
<title>Parking.</title>
<link rel="stylesheet" href="css/styles.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body class="page">

    <center><h1>Votre reservation est validé !</h1></center>
    <br>
    <br>
    <div>
    <form method="post">
                        <input type="hidden"  id="code" name="heure" value="<?php echo ($_POST['heure']);?>">
                        <input type="hidden" name="code" value="<?php echo ($_POST['code']);?>"/>
                        <center><button type="submit" class="btn btn-warning mt-2" name="validercode">Valider votre code de reservation</button></center>
                <?php
                    $host = "127.0.0.1";
                    $port = 23;
                    
                    if(isset($_POST['validercode']))
                    {
                        $txt =' **code:**';
                        $msg = $_REQUEST['code'];//recuperer le code et le mettre dans le variable msg
                        $espace = '**';
                        $txt2 ="**heure dentree:**";    
                        $msg2 = $_REQUEST['heure'];
                        $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
                        socket_connect($sock, $host, $port);
                        socket_write($sock, $txt, strlen($txt));
                        socket_write($sock, $msg, strlen($msg));
                        socket_write($sock, $espace, strlen($espace));
                        socket_write($sock, $txt2, strlen($txt2));
                        socket_write($sock, $msg2, strlen($msg2));
                            
                    }                  
                ?>
        </form>
    <form action="checklogin.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id;?>"/>
			<input type="hidden" name="nom" value="<?php echo $nom;?>"/>
			<center><button type="submit" name="login" class="btn btn-success mt-2"><span class="glyphicon glyphicon-home"></span> revenir a la page d'acceuil</button></center>
    </form>
        </div>
</body>
</html>
