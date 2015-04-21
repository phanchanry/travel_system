<?php
class Location_model extends CI_Model {

	function __construct() {
		parent::__construct();

		//$this->load->model('common_model');
	}
	/* get all questions on question view page */
	function getLocations ($id = null) {
	    $str_sql = "SELECT * FROM ts_location WHERE ts_location_type = '1'";
	    if ($id != null)
	        $str_sql .= " AND location_id = $id";
	    return $this->db->query($str_sql)->result();
	}
	/* save location information data: form submit */
	function saveLocation () {
	    $locationTitle = $_POST['locationTitle'];
        $locationSubTitle = $_POST['locationSubTitle'];
	    $locationCategory = $_POST['locationCategory'];
	    $locationDescription = $_POST['locationDescription'];
	    $locationImage = $_POST['locationImage'];
	    $locationLat = $_POST['locationLat'];
	    $locationLon = $_POST['locationLon'];
	    
	    $userId = $this->session->userdata('ADMIN_ID');
	    if (isset($_POST['locationId'])){
	        $str_sql = "UPDATE ts_location
	                       SET category_id = ?
	                         , ts_location_title = ?
	                         , ts_location_subtitle = ?
	                         , ts_location_description = ?
	                         , ts_lat = ?
	                         , ts_lon = ?
	                         , ts_location_photo = ?
	                         , ts_updated_time = now()
	                     WHERE location_id = ?";
	        $params = array(
	                        'category_id' => $locationCategory,
	                        'title' => $locationTitle,
                            'subtitle' => $locationSubTitle,
	                        'description' => $locationDescription,
	                        'lat' => $locationLat,
	                        'lon' => $locationLon,
	                        'locationPhoto' => $locationImage,
	                        'location_id' => $_POST['locationId']
	        );
	        $this->db->query($str_sql, $params);
	        $data['result'] = 'success';
	    } else {
	        $str_sql = "SELECT * FROM ts_location WHERE ts_location_title = ?";
	        $params = array('title' => $locationTitle);
	        $result = $this->db->query($str_sql, $params);
	        if ($result->num_rows)
	            $data['result'] = 'exist';
	        else {
	            $str_sql = "INSERT INTO ts_location
    	                    (category_id, ts_location_title, ts_location_subtitle, ts_location_description, ts_lat, ts_lon, ts_location_photo, ts_created_time, ts_updated_time)
    	                      VALUES (?,?,?,?,?,?,?,now(), now())";
	            $params = array(
	                            'category_id' => $locationCategory,
	                            'locationTitle' => $locationTitle,
                                'locationSubTitle' => $locationSubTitle,
	                            'location_description' => $locationDescription,
	                            'lat' => $locationLat,
	                            'lon' => $locationLon,
	                            'location_photo' => $locationImage
	            );
	            $result = $this->db->query($str_sql, $params);
	            $data['result'] = 'success';
	        }
	    }
	    return $data;
	    
	}
    /* quick search location by post data*/
    function searchQuickLocation () {
        $result = "success";
        $keyword = $_POST['keyword'];
        $maxRows = $_POST['maxRows'];
        $sql = "";
        if( isset($_POST['searchAll']) ){
         /*   $item['ua_location'] = -1;
            $item['ua_location_title'] = _lang("Search all for")." '".$keyword."'...";
            $item['ua_location_lat'] = 0;
            $item['ua_location_lon'] = 0;*/

            $sql = "select -1 as ts_location, 'Search all for \'$keyword\'...' as ts_location_title, 0 as ts_lat, 0 as ts_lon
    			 union ";
        }
        $sql.= "select location_id as ts_location, ts_location_title, ts_lat, ts_lon
                 from ts_location
                where ts_location_type = 1
                  and lower(ts_location_title) like concat('%',lower('$keyword'),'%')
                limit $maxRows";
        $location = $this->db->query( $sql )->result();

        $data['location'] = $location;
        $data['result'] = $result;

        return $data;
    }
	/* remove place category by ids */
	function removeLocationByIds() {
	    $ids = $_POST['strIds'];
	    $str_sql = "DELETE FROM ts_location where location_id in ($ids)";
	     
	    $result = $this->db->query($str_sql);
	    if ($result)
	        $data['result'] = 'success';
	    else $data['result'] = 'failed';;
	    return $data;
	}
}

/* End of file user_model.php */
/* Location: ./application/models/admin/user_model.php */