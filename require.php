<?php
	/*******************************
	 *************VIEWS*************
	 ******************************/
	require(RequestResponseHelper::$root . '/views/abstract_view.php');

	require(RequestResponseHelper::$root . '/views/breastfeed_create_view.php');
	require(RequestResponseHelper::$root . '/views/breastfeed_list_view.php');
	require(RequestResponseHelper::$root . '/views/breastfeed_modify_view.php');

	require(RequestResponseHelper::$root . '/views/todo_create_view.php');
	require(RequestResponseHelper::$root . '/views/todo_list_view.php');
	
	 /*******************************
	 *************MODELS*************
	 *******************************/
	 
		/****************************
		*************BOS*************
		****************************/
		require(RequestResponseHelper::$root . '/models/bos/mysql_database_connection_bo.php');
		require(RequestResponseHelper::$root . '/models/bos/breastfeed_bo.php');
		require(RequestResponseHelper::$root . '/models/bos/todo_bo.php');
		
		/*****************************
		*************DAOS*************
		*****************************/
		require(RequestResponseHelper::$root . '/models/daos/breastfeed_dao.php');
		require(RequestResponseHelper::$root . '/models/daos/todo_dao.php');
		
		/*****************************
		*************DOS**************
		*****************************/
		require(RequestResponseHelper::$root . '/models/dos/view_do.php');
		require(RequestResponseHelper::$root . '/models/dos/breastfeed_do.php');
		require(RequestResponseHelper::$root . '/models/dos/todo_do.php');

		
		/********************************
		*************HELPERS*************
		********************************/
		/*require(RequestResponseHelper::$root . '/models/helpers/string_helper.php');*/
		
		/**********************************
		*************FACTORIES*************
		**********************************/
		require(RequestResponseHelper::$root . '/models/factories/do_factory.php');
		require(RequestResponseHelper::$root . '/models/factories/bo_factory.php');
		require(RequestResponseHelper::$root . '/models/factories/dao_factory.php');
?>