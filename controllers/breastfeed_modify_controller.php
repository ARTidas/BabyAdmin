<?php
	$do = $do_factory->get(DoFactory::BREASTFEED);

	/* ********************************************************
	 * *** Select *********************************************
	 * ********************************************************/
	if (
		$_SERVER["REQUEST_METHOD"] === "POST" &&
		isset($_POST['select']) &&
		$_POST['select'] === "Select"
	) {
		$do->id = $_POST['id'];
		$do = $bo->get($do);
	}

	/* ********************************************************
	 * *** Modify *********************************************
	 * ********************************************************/
	if (
		$_SERVER["REQUEST_METHOD"] === "POST" &&
		isset($_POST['modify']) &&
		$_POST['modify'] === "Modify"
	) {
		$do->id 			= $_POST['id'];
		$do->breast			= $_POST['breast'];
		$do->feeding_start 	= $_POST['feeding_start'];
		$do->feeding_end 	= $_POST['feeding_end'];
		$do->weight_start 	= $_POST['weight_start'];
		$do->weight_end 	= $_POST['weight_end'];
		$do->is_active		= $_POST['is_active'];

		$bo->modify($do);
	}

	$do_list = $bo->getList();
	
	$view_do = new ViewDo(
		[
			ucfirst(RequestResponseHelper::$actor_name) . " " . 
			ucfirst(RequestResponseHelper::$actor_action)
		],
		[
			RequestResponseHelper::$url_root . "/" . 
			RequestResponseHelper::$method . "/" . 
			RequestResponseHelper::$actor_name . "/" . 
			RequestResponseHelper::$actor_action
		]
	);
	
	(new BreastfeedModifyView($view_do))->displayWeb($do_list, $do);
?>