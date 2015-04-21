<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Places extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('places_model');
        $this->load->model('location_model');
        $this->load->model('place_category_model');
        $this->load->helper('string');
        $this->load->helper('cookie');
        $this->pageType['pageType'] = 'home';
    }
    /* get location Detail information by id*/
    public function GetLocationDetail () {
        $locationId = $_POST['locationId'];
        $result = $this->location_model->getLocations($locationId);
        $result['location']  = $result[0];
        $result['result'] = 'success';

        header('Content-Type: application/json');
        echo json_encode($result);
    }
    /* load popup container page modal*/
    public function load_popup_container ($id) {
        $result = $this->location_model->getLocations($id);
        $data['location'] = $result[0];
        $this->load->view('pages/popup_container_modal_view', $data);
    }
    /* upload new place modal load*/
    public function load_UNP_modal () {
        $data['categoryList'] = $this->place_category_model->getPlaceCategoryInfo();
        $this->load->view('pages/upload_new_place_modal_view', $data);
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
    public function uploadLocationImage () {
        if (!$this->session->userdata('IS_FRONT_LOGIN'))
            $result['result'] = 'login_failed';
        else {
            $path = $_SERVER['DOCUMENT_ROOT'] . "/assets/upload/location_image/";
            $frontPath = base_url() . "assets/upload/location_image/";
            $result = $this->Upload_Image($path, $frontPath, 'locationImageUpload', 'location');
        }
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
