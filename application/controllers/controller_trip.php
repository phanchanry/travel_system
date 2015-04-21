<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_trip extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('trips_model');
        $this->load->model('place_category_model');
        $this->load->helper('string');
        $this->load->helper('cookie');
        $this->pageType['pageType'] = 'home';
    }
   public function display_user ($trip_key) {
   		$result = $this->trips_model->getUserTripDetail($trip_key);
        $this->data['tripLocation'] = $result;
   		$this->data['categoryLists'] = $this->place_category_model->getPlaceCategoryInfo();
   		$this->data['userTripKey'] = $trip_key;
   		$this->front_render('pages/index_view');
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
