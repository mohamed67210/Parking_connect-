<?php
		//$database= new PDO('mysql:host=localhost;dbname=Parking;charset=utf8','root','');
		//$results = $database -> query('SELECT Nom,Prenom,Adresse FROM Personne INNER JOIN abonnée ON Personne.ID = abonnée.IDPersonne');
		
	
	class Database
	{
		private static $dbHost = "localhost";
		private static $dbName ="parking";
		private static $dbUser ="root";
		private static $connectionPassword ="";
		private static $connection = null;
		
		//connexion a la base de donnée 
		public static function connect()
		{
				self::$connection =  new PDO("mysql:host=" . self::$dbHost . ";dbname=".self::$dbName , self::$dbUser, self::$connectionPassword);
				
			return self::$connection;
		}
		//deconnexion de la base de donnée 
		public static function disconnect()
		{
			self::$connection=null;
		}
	}
	?>