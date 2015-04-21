<?php

class Trips_model extends CI_Model {

	function __construct() {
		parent::__construct();

		//$this->load->model('common_model');
	}
	function saveNewTripLocation () {
		$userId = $this->session->userdata("USER_ID");
		$lat = $_POST['lat'];
		$lon = $_POST['lon'];
		$locationType = $_POST['locationType'];
		$tripKey = $_POST['tripKey'];
		$title = $_POST['title'];
		
		$sql = "insert into ts_location( ts_location_title, ts_lat, ts_lon, ts_trip_key, ts_location_type, ts_created_time, ts_updated_time)
				 value( ?, ?, ?, ?, ?, now(), now() )";
		$params = array(
			'location_title' => $title,
			'lat' => $lat,
			'lon' => $lon,
			'trip_key' => $tripKey,
			'location_type' => $locationType
		);
		$result = $this->db->query($sql, $params);
		if ($result) {
			$locationId = $this->db->insert_id();
			
			$data['result'] = 'success';
			$data['locationId'] = $locationId;
			$data['tripKey'] = $tripKey;
		} else $data['result'] = 'failed';
		return $data;
	}
	/* get trip location information by trip key */
	function getTripLocationByKey () {
		$tripKey = $_POST['currentKey'];
		$locationType = $_POST['locationType'];
		$str_sql = "SELECT * FROM ts_location WHERE ts_trip_key = ? and ts_location_type = ?";
		$params = array (
			'trip_key' => $tripKey,
			'location_type' => $locationType
		);
		$result = $this->db->query($str_sql, $params)->result_array();
		if ($result != null) {
			$data['result'] = 'success';
			$data['tripLocations'] = $result;
		} else $data['result'] = 'failed';
		return $data;
	}
	/* save plan trips */
	function savePlanTrip () {
		$tripKey = $_POST['tripKey'];
		$userId = $this->session->userdata('USER_ID');
		$planTripTitle = $_POST['planTripTitle'];
		$planTripDescription = $_POST['planTripDescription'];
		$planTripPageTitle = addslashes($_POST['planTripPageTitle']);
		
		$sql = "insert into ts_user_trip( user_id, trip_key, ts_trip_title, ts_page_title, ts_description, ts_created_time, ts_updated_time)
				values( ?,?,?,?,?, now(), now())";
		$params = array(
			'user_id' => $userId, 
			'trip_key' => $tripKey,
			'trip_title' => addslashes($planTripTitle),
			'page_title' => $planTripPageTitle,
			'description' => addslashes($planTripDescription)
		);
		$result = $this->db->query($sql, $params);
		if ($result)
			$data['result'] = 'success';
		else $data['result'] = 'failed';
		return $data;
		//$planTripId = $db->getPrevInsertId();
		
	}
	/* remove location by name */
	function removeLocationById () {
		$locationId = $_POST['locationId'];
		$tripKey = $_POST['Trips_key'];
		$str_sql = "DELETE FROM ts_location WHERE location_id = ? AND ts_trip_key = ?";
		$params = array($locationId, $tripKey);
		$result = $this->db->query($str_sql, $params);
		if ($result)
			$data['result'] = 'success';
		else $data['result'] = 'failed';
		return $data;
	}
	/* get user saved trips */
	function getSavedTrips () {
		$userId = $this->session->userdata('USER_ID');
		$str_sql = "SELECT * FROM ts_user_trip WHERE user_id = '$userId'";
		$result = $this->db->query($str_sql)->result();
		return $result;
	}
    /* get user saved trip detail*/
    function getUserTripDetail ($tripKey) {
        $str_sql = "SELECT * FROM ts_location where ts_trip_key = ?";
        $params = array($tripKey);
        $result = $this->db->query($str_sql, $params)->result();
        return $result;
    }
    /* get location name by category Name post data: category name*/
    function getLocationByCategoryName () {
        $categoryName = trim($_POST['categoryName']);
        $str_sql = "SELECT * FROM ts_place_category where ts_category_title = ? LIMIT 1";
        $params = array($categoryName);
        $result = $this->db->query($str_sql, $params)->result_array();
        if ($result == null)
            $categoryId = '-1';
        else {
        	$categoryId = $result[0]['category_id'];
        	$data['categoryInfo'] = $result;
        }

        $str_sql = "SELECT * FROM ts_location WHERE category_id = '$categoryId'";
        $locationInfo = $this->db->query($str_sql)->result_array();
        $data['result'] = 'success';
        $data['tripLocationInfo'] = $locationInfo;
        return $data;

    }
}

/* End of file user_model.php */
/* Location: ./application/models/admin/user_model.php */