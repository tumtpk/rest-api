<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController {
    
    function __construct(){
        parent::__construct();
        $this->isLoggedIn();
        $this->isPermission(USER);
    }

    function index(){
        $this->loadViews('user/dashbroad');
    }
    
}