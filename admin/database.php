<?php 


	
	class Database
	{
		private static $dbhost = "localhost";
		private static $dbname = "computer_shop";
		private static $dbUser = "root";
		private static $dbUserPassword = "";

		private static $connection = null;


		public static function connect()
		{
			try {
				self::$connection = new PDO("mysql:host=" . self::$dbhost . ";dbname=" . self::$dbname, self::$dbUser, self::$dbUserPassword);
			} catch (PDOException $e) {
				die($e->getMessage());
			}
			return self::$connection;
		}

		public static function disconnect()
		{
			self::$connection = null;
		}


		
	}



?>