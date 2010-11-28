<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Skin extends Controller {

	public function action_set($dir)
	{
		// TODO: Verify that this isn't subject to parent-file injection
		$session = Session::instance();
		$session->set('preferred_skin', $dir);
	}
}
