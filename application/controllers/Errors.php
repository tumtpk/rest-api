<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Errors extends BaseController {
	function __construct()
    {
        parent::__construct();
       	$this->isLoggedIn();
	}
	
	public function notfound()
	{
		$this->loadViews('errors/notfound');
	}

}