<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class BaseController extends CI_Controller {
	protected $role = '';
	protected $vendorId = '';
	protected $name = '';
	protected $global = [];

	/**
	 * This function used to check the user is logged in or not
	 */
	function isLoggedIn() {
		$isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		
		if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
			redirect ('login');
		} else {
			$this->role = $this->session->userdata ('role');
			$this->vendorId = $this->session->userdata ('userId');
			$this->name = $this->session->userdata ('name');
			
			$this->global ['name'] = $this->name;
			$this->global ['role'] = $this->role;
		}
	}

	function isAuth(){
		$isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		
		if (isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
			$this->role = $this->session->userdata ('role');
			$this->vendorId = $this->session->userdata ('userId');
			$this->name = $this->session->userdata ('name');
			
			$this->global ['name'] = $this->name;
			$this->global ['role'] = $this->role;
			
			if($this->isAdmin()){
				redirect('admin/dashboard');
			}
	
			if($this->isUser()){
				redirect('user/dashboard');
			}
		}
	}

	function isPermission($role){
		if($this->role != $role){ 
			redirect('errors/notfound');
		}
	}
	
	function isAdmin() {
		if ($this->role == ADMIN) {
			return true;
		} else {
			return false;
		}
	}
	
	function isUser(){
		if ($this->role == USER) {
			return true;
		} else {
			return false;
		}
	}

	function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}

    function loadViews($view_name = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL, $script=NULL){

        $this->load->view('layout/header', $headerInfo);
		$this->load->view($view_name, $pageInfo);
		$this->load->view('layout/footer', $footerInfo);
		if(!empty($script)){
			$this->load->view($script);
		}
		$this->load->view('layout/end');
    }
	
}