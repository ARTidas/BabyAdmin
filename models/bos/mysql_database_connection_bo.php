<?php
	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class MysqlDatabaseConnectionBo {
		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		function getConnection() {
			$host          = 'database.domain.hu';
			$database_name = 'database_name';
			$user_name     = 'user_name'; //TODO: Create a secret retrieval process...
			$user_password = 'user_password'; //TODO: Create a secret retrieval process...

			try {
				$connection = new PDO(
					'mysql:host=' . $host . ';dbname=' . $database_name,
					$user_name,
					$user_password
				);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $exception) {
				throw new Exception('Connection failed: ' . $exception->getMessage());
			}

			return $connection;
		}
	}
?>
