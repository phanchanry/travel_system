<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('place_category_model');
        $this->load->helper('string');
        $this->load->helper('cookie');
        $this->pageType['pageType'] = 'home';
    }
    /* index function(when page load)  */
    public function index() {
        $this->data['categoryLists'] = $this->place_category_model->getPlaceCategoryInfo();
        $this->front_render('pages/index_view'); 
    }
    public function checkUserLogIn () {
    	if ($this->session->userdata('IS_FRONT_LOGIN'))
    		$data['isLogin'] = 'Y';
    	else $data['isLogin'] = 'N';	
    	$data['result'] = 'success';
    	
    	header('Content-Type: application/json');
    	echo json_encode($result);
    }
    /* quick search location*/
    public function searchLocation () {
        $this->load->model('location_model');
        $result =$this->location_model->searchQuickLocation();

        header('Content-Type: application/json');
        echo json_encode($result);
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
