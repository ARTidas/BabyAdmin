<?php
	$do = $do_factory->get(DoFactory::BREASTFEED);

	if (
		$_SERVER["REQUEST_METHOD"] === "POST" &&
		isset($_POST['create']) &&
		$_POST['create'] === "Create"
	) {
		$do->breast			= $_POST['breast'];
		$do->feeding_start 	= $_POST['feeding_start'];
		$do->feeding_end 	= $_POST['feeding_end'];
		$do->weight_start 	= $_POST['weight_start'];
		$do->weight_end 	= $_POST['weight_end'];
		
		$bo->create($do);
	}
	else {
		$do = $bo->getLastRecord();
	}
	
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
	
	(new BreastfeedCreateView($view_do))->displayWeb($do);
?>