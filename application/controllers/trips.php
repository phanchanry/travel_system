<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trips extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('trips_model');
        $this->load->model('place_category_model');
        $this->load->helper('string');
        $this->load->helper('cookie');
        $this->pageType['pageType'] = 'home';
    }
    /* get trip location information */
    public function searchLocationOnGoogleMap () {
        $result = "success";
        $error = "";
        $data = array();
        
        $keyword = $_POST['keyword'];
        
        $url = "https://maps.googleapis.com/maps/api/place/autocomplete/json?";
        $url.= "input=".urlencode($keyword);
        $url.= "&sensor=false";
        $url.= "&key=".GOOGLE_API_KEY;
        
        
        
        $json = file_get_contents( $url );
        $location = json_decode( $json, true );
        $location = $location['predictions'];
        
        $data['location'] = $location;
        $data['result'] = $result;
        $data['error'] = $error;
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    /* get map location information */
    public function getLocationInfoByReference () {
        $result = "success";
        $error = "";
        $data = array();
        
        $reference = $_POST['reference'];
        
        
        $url = "https://maps.googleapis.com/maps/api/place/details/json?";
        $url.= "reference=".$reference;
        $url.= "&sensor=false";
        $url.= "&key=".GOOGLE_API_KEY;
        
        $json = file_get_contents( $url );
        $locationInfo = json_decode( $json, true );
        
        $data['locationInfo'] = $locationInfo;
        $data['result'] = $result;
        $data['error'] = $error;
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    /* add new trip location */
    public function addNewTripLocation () {
    	/* if ($this->session->userdata('IS_FRONT_LOGIN'))
    		$data['result'] = 'login_failed';
    	else { */
    		$data = $this->trips_model->saveNewTripLocation(); 
    	/*  } */
    	header('Content-Type: application/json');
    	echo json_encode($data);
    }
    //get trip location by trip keys
    public function getTripLocationByKey () {
    	$result = $this->trips_model->getTripLocationByKey ();
    	
    	header('Content-Type: application/json');
    	echo json_encode($result);
    }
    /* get trip location direction between two location */
    public function getDistanceDuration () {
    	$result = "success";
    	$error = "";
    	$data = array();
    	
    	$departure = $_POST['departure'];
    	$destination = $_POST['destination'];
    	
    	$url = "http://maps.googleapis.com/maps/api/distancematrix/json?";
    	$url.= "origins=".$departure;
    	$url.= "&destinations=".$destination;
    	$url.= "&mode=driving";
    	$url.= "&sensor=false";
    	
    	$json = file_get_contents( $url );
    	$info = json_decode( $json, true );
    	
    	$data['info'] = $info;
    	$data['result'] = $result;
    	$data['error'] = $error;
    	header('Content-Type: application/json');
    	echo json_encode($data);
    }
    /* save plan trip data ajax: title,name,description. */
    public function savePlanTrip () {
    	if (!$this->session->userdata('IS_FRONT_LOGIN'))
    		$data['result'] = 'login_failed';
    	else {
    		$data = $this->trips_model->savePlanTrip();
        }
    	
    	header('Content-Type: application/json');
    	echo json_encode($data);
    }
    /* remove location by name */
    public function removeLocationById () {
    	$result = $this->trips_model->removeLocationById();
    	header('Content-Type: application/json');
    	echo json_encode($result);
    }
    /* load saved trips model */
    public function load_saved_trips_modal () {
    	if (!$this->session->userdata('IS_FRONT_LOGIN'))
    		$data['result'] = 'login_failed';
    	else {
    		$data['savedTrips'] = $this->trips_model->getSavedTrips();
    		$this->load->view('pages/saved_trips_modal_view', $data);
    	}
    }
    /* get location by category name*/
    public function get_location_by_category_name () {
        $result = $this->trips_model->getLocationByCategoryName();

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
