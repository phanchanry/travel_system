<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('string');
        $this->load->helper('cookie');
    }
    /* login page */
    /* load login modal   */
    public function load_login_modal () {
        $this->load->view('pages/login_modal_view');
    }
    /*  sign up modal  */
    public function load_signup_modal () {
        $this->load->view('pages/signup_modal_view');
    }
    
    /* add user function on register page  */
    public function signupUser () {
        $result = $this->user_model->signupUser ();
        
        header('Content-Type: application/json');
        echo json_encode($result);
    }
    /* login submit on login page */
    public function loginSubmit () {
        $result = $this->user_model->login();
        if ($result)
            $data['result'] = 'success';
        else {
            $data['result'] = 'failed';
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    /* logout function */
    public function logout () {
        $result = $this->user_model->logout();
        redirect(base_url());
    }
    public function logToFile ($filename, $msg) {
		// open file
		$fd = fopen($filename, "a");
		// append date/time to message
		$str = "[" . date("Y/m/d h:i:s", time()) . "] " . $msg;
		// write string
		fwrite($fd, $str . "\n");
		// close file
		fclose($fd);
	}
}
