<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController {
    
    function __construct(){
        parent::__construct();
        $this->isLoggedIn();
        $this->isPermission(ADMIN);
    }

    function index(){
        $this->loadViews('admin/activity/content',null,null,null,'admin/activity/script');
    }

    function create(){
        $this->loadViews('admin/activity/create/content',null,null,null,'admin/activity/create/script');
    }
    
}