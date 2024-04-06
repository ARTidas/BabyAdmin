<?php
	$do = $do_factory->get(DoFactory::BREASTFEED);

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
	
	(new BreastfeedListView($view_do))->displayWeb($do_list);
?>