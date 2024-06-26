<?php

	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class DaoFactory {
		const BREASTFEED 	= "BreastFeed";
		const TODO 			= "TODO";
		
		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		public function get(string $class_name) {
			$class_name .= "Dao";
			
			return new $class_name(new MysqlDatabaseConnectionBo());
		}
	}

?>