<?php defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Auth extends BD_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function login_post(){
        $username = $this->post('username');
        $password = $this->post('password');

        // login
        $kunci = $this->config->item('thekey');
        $val = $this->user_model->getBy(['username'=>$username]);
        
        if(empty($val)){
            $output['status'] = false;
            $output['message'] = 'ไม่พบผู้ใช้งาน';
            $this->response($output, REST_Controller::HTTP_OK);
        }

        $match = $val->password;   //Get password for user from database
        if(password_verify($password, $match)){  //Condition if password matched
        	$token['id'] = $val->user_id;  //From here
            $token['username'] = $username;
            $date = new DateTime();
            $token['iat'] = $date->getTimestamp();
            $token['exp'] = $date->getTimestamp() + 60*60*5; //To here is to generate token
            $output['token'] = JWT::encode($token,$kunci); //This is the output token

            $sess_array = array(
                'id' => $val->user_id,
                'username' => $val->username,
                'role' => (int)$val->role,
                'name' => $val->name,
                'isLoggedIn' => TRUE
            );
           
            $this->session->set_userdata($sess_array);

            $output['status'] = true;
            $this->response($output, REST_Controller::HTTP_OK); //This is the respon if success
        }
        else {
            $output['status'] = false;
            $output['message'] = 'รหัสผ่านไม่ถูกต้อง';
            $this->response($output, REST_Controller::HTTP_OK); //This is the respon if failed
        }
    }

}