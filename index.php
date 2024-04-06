<?php
	header("Cache-Control: no-cache, no-store, must-revalidate");
	header("Pragma: no-cache");
	header("Expires: 0");
    header('Content-Type: text/html; charset=utf-8');

	error_reporting(E_ALL & ~E_NOTICE);
	ini_set('display_errors', 1);
	
	require(dirname(__FILE__) . '/models/helpers/request_response_helper.php');
	
	RequestResponseHelper::$root         = dirname(__FILE__);
	RequestResponseHelper::$path         = trim($_SERVER['REQUEST_URI'], '/');
	if ($_SERVER['DOCUMENT_ROOT'] === "C:/wamp64/www/baby") {
		RequestResponseHelper::$url_root = "https://baby.localhost";
	}
	else {
		RequestResponseHelper::$url_root = "https://baby.artidas.hu";
	}
	
	require(RequestResponseHelper::$root . '/models/dos/abstract_do.php');
    require(RequestResponseHelper::$root . '/require.php');

	/* ********************************************************
	 * *** Here is the main controlling logic... **************
	 * ********************************************************/
	RequestResponseHelper::$request = empty(explode('/', RequestResponseHelper::$path)[0]) ?
		[0 => 'index', 1 => 'index'] :
		explode('/', RequestResponseHelper::$path)
	;
	RequestResponseHelper::$actor_name   = RequestResponseHelper::$request[0];
	RequestResponseHelper::$actor_action = RequestResponseHelper::$request[1];

	/* ********************************************************
	 * *** Lets require files by request... *******************
	 * ********************************************************/
	$do_factory  = new DoFactory();
	$bo_factory  = new BoFactory();
    $dao_factory = new DaoFactory();
	require(
		RequestResponseHelper::$root . '/controllers/' . 
		RequestResponseHelper::$actor_name . '_controller.php'
	);
?>
