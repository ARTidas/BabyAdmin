<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class BreastfeedDao {
		protected $database_connection_bo;
		protected $do_factory;

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		function __construct($database_connection_bo) {
			$this->database_connection_bo = $database_connection_bo;
			$this->do_factory = new DoFactory();
		}

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		function get(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				SELECT
					MAIN.id AS id,
					MAIN.breast AS breast,
					MAIN.feeding_start AS feeding_start,
                    MAIN.feeding_end AS feeding_end,
                    MAIN.weight_start AS weight_start,
                    MAIN.weight_end AS weight_end,
                    MAIN.is_active AS is_active,
                    MAIN.created_at AS created_at,
                    MAIN.updated_at AS updated_at
				FROM
                    baby_breastfeed MAIN
				WHERE
					MAIN.id = ?
				LIMIT 1
			";

			try {
				$handler = ($this->database_connection_bo)->getConnection();
				$statement = $handler->prepare($query_string);
				$statement->execute(
					(
						array_map(
							function($value) {
								return $value === '' ? NULL : $value;
							},
							$parameters
						)
					)
				);

				return ($statement->fetch());
			}
			catch(Exception $exception) {
				RequestResponseHelper::addToResponse('errors', $exception->getMessage());

				return false;
			}
		}

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		function getList() {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				SELECT
					MAIN.id AS id,
					MAIN.breast AS breast,
					MAIN.feeding_start AS feeding_start,
                    MAIN.feeding_end AS feeding_end,
                    MAIN.weight_start AS weight_start,
                    MAIN.weight_end AS weight_end,
                    MAIN.is_active AS is_active,
                    MAIN.created_at AS created_at,
                    MAIN.updated_at AS updated_at
				FROM
                    baby_breastfeed MAIN
				WHERE
					MAIN.is_active = 1
				ORDER BY
					MAIN.feeding_start DESC
			";

			try {
				$handler = ($this->database_connection_bo)->getConnection();
				$statement = $handler->prepare($query_string);
				$statement->execute();
				
				return $statement->fetchAll();
			}
			catch(Exception $exception) {
				RequestResponseHelper::addToResponse('errors', $exception->getMessage());

				return false;
			}
		}

        /* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		function getLastRecord() {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				SELECT
					MAIN.id AS id,
					MAIN.breast AS breast,
					MAIN.feeding_start AS feeding_start,
                    MAIN.feeding_end AS feeding_end,
                    MAIN.weight_start AS weight_start,
                    MAIN.weight_end AS weight_end,
                    MAIN.is_active AS is_active,
                    MAIN.created_at AS created_at,
                    MAIN.updated_at AS updated_at
				FROM
                    baby_breastfeed MAIN
				WHERE
					MAIN.is_active = 1
				ORDER BY
					MAIN.feeding_start DESC
                LIMIT 1
			";

			try {
				$handler = ($this->database_connection_bo)->getConnection();
				$statement = $handler->prepare($query_string);
				$statement->execute();
				
				return $statement->fetchAll()[0];
			}
			catch(Exception $exception) {
				RequestResponseHelper::addToResponse('errors', $exception->getMessage());

				return false;
			}
		}

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		function create(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				INSERT INTO
                    baby_breastfeed
				SET
                    breast        = ?,
					feeding_start = ?,
					feeding_end   = ?,
					weight_start  = ?,
					weight_end    = ?,
					is_active     = 1,
					created_at    = NOW(),
					updated_at    = NOW()
			";

			try {
				$database_connection = ($this->database_connection_bo)->getConnection();

				$database_connection
					->prepare($query_string)
					->execute(
						(
							array_map(
								function($value) {
									return $value === '' ? NULL : $value;
								},
								$parameters
							)
						)
					)
				;

				return($database_connection->lastInsertId());
			}
			catch(Exception $exception) {
				RequestResponseHelper::addToResponse('errors', $exception->getMessage());
                print_r($exception->getMessage());
				return false;
			}
		}

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		function modify(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				UPDATE
                    baby_breastfeed
				SET
					breast 			= ?,
					feeding_start 	= ?,
					feeding_end 	= ?,
					weight_start 	= ?,
					weight_end 		= ?,
					is_active  		= ?,
					updated_at 		= NOW()
				WHERE
					id 				= ?
			";

			try {
				$database_connection = ($this->database_connection_bo)->getConnection();

				$database_connection
					->prepare($query_string)
					->execute(
						(
							array_map(
								function($value) {
									return $value === '' ? NULL : $value;
								},
								$parameters
							)
						)
					)
				;

				return($database_connection->lastInsertId());
			}
			catch(Exception $exception) {
				RequestResponseHelper::addToResponse('errors', $exception->getMessage());
                print_r($exception->getMessage());
				return false;
			}
		}

	}
?>
