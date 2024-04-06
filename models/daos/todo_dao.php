<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class TodoDao {
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
		function getList() {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				SELECT
					MAIN.id AS id,
                    MAIN.deadline_at AS deadline_at,
					MAIN.description AS description,
					MAIN.location AS location,
                    MAIN.status AS status,
                    MAIN.is_active AS is_active,
                    MAIN.created_at AS created_at,
                    MAIN.updated_at AS updated_at
				FROM
                    baby_todo MAIN
				WHERE
					MAIN.is_active = 1
				ORDER BY
					MAIN.deadline_at DESC
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
		function create(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				INSERT INTO
                    baby_todo
				SET
                    deadline_at   = ?,
					description   = ?,
					location      = ?,
					status	      = ?,
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

				return(
					$database_connection->lastInsertId()
				);
			}
			catch(Exception $exception) {
				RequestResponseHelper::addToResponse('errors', $exception->getMessage());
                print_r($exception->getMessage());
				return false;
			}
		}
	}
?>
