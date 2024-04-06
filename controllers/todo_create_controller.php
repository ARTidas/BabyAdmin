<?php
	$do = $do_factory->get(DoFactory::TODO);

	if (
		$_SERVER["REQUEST_METHOD"] === "POST" &&
		isset($_POST['create']) &&
		$_POST['create'] === "Create"
	) {
		$do->deadline_at	= $_POST['deadline_at'];
		$do->description    = $_POST['description'];
		$do->location 	    = $_POST['location'];
		$do->status 	    = $_POST['status'];
		$bo->create($do);
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
	
	(new TodoCreateView($view_do))->displayWeb($do);
?>