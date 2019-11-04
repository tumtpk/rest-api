<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Main extends BaseController {
	function __construct()
    {
		parent::__construct();
		$this->isAuth();
	}
	public function index()
	{
		$this->load->view('login');
	}
}