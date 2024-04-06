<?php

	$bo = new TodoBo();

	/* ********************************************************
	 * *** Lets control exectution by actor action... *********
	 * ********************************************************/
	switch (RequestResponseHelper::$actor_action) {
		case '':
			RequestResponseHelper::addToResponse('available_actor_actions', [
			    RequestResponseHelper::$url_root . '/' . RequestResponseHelper::$actor_name . '/create',
                RequestResponseHelper::$url_root . '/' . RequestResponseHelper::$actor_name . '/list'
			]);
			break;
		default:
			require(
				RequestResponseHelper::$root . '/controllers/' .
				RequestResponseHelper::$actor_name . '_' . 
				RequestResponseHelper::$actor_action . '_controller.php'
			);
	}

?>
