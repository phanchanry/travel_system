<?php
class Place_Category_Model extends CI_Model {

	function __construct() {
		parent::__construct();

		//$this->load->model('common_model');
	}
	/* add sheet field */
	function getPlaceCategoryInfo ($id = null) {
	    $str_sql = "SELECT * FROM ts_place_category";
	   if ($id != null)
	       $str_sql .= " WHERE category_id = $id";
	    $result = $this->db->query($str_sql)->result();
	    return $result;
	}
	/* add place category  */
	function savePlaceCategory ($id = null) {
	    $categoryTitle = $_POST['categoryTitle'];
	    $categoryImage = $_POST['categoryImagePath'];
	    $markerImage = $_POST['markerImagePath'];
	    
	    $userId = $this->session->userdata('ADMIN_ID');
	    if (isset($_POST['categoryId'])){
	        $str_sql = "UPDATE ts_place_category
	                       SET ts_category_title = ?
	                         , ts_category_image = ?
	                         , ts_category_marker = ?
	                         , user_id = ?
	                         , ts_updated_time = now()
	                     WHERE category_id = ?"; 
	        $params = array(
	                        'category_title' => $categoryTitle,
	                        'category_image' => $categoryImage,
	                        'category_marker' => $markerImage,
	                        'user_id' => $userId,
	                        'category_id' => $_POST['categoryId']
	                        );
	        $this->db->query($str_sql, $params);
	        $data['result'] = 'success';
	    } else {
    	    $str_sql = "SELECT * FROM ts_place_category WHERE ts_category_title = ?";
    	    $params = array('title' => $categoryTitle);
    	    $result = $this->db->query($str_sql, $params);
    	    if ($result->num_rows)
    	        $data['result'] = 'exist';
    	    else {
    	        $str_sql = "INSERT INTO ts_place_category
    	                    (user_id, ts_category_title, ts_category_marker, ts_category_image, ts_created_time, ts_updated_time)
    	                      VALUES (?,?,?,?,now(), now())";
    	        $params = array(
    	                      'user_id' => $userId,
    	                      'category_title' => $categoryTitle,
    	                      'category_marker' => $categoryImage,
    	                      'category_image' => $markerImage
    	                  );
    	        $result = $this->db->query($str_sql, $params);
    	        $data['result'] = 'success';
    	    }
	    }
	    return $data;
	    
	}
	
	/* remove place category by ids */
	function removePlaceCategory() {
	    $ids = $_POST['strIds'];
	    $str_sql = "DELETE FROM ts_place_category where category_id in ($ids)";
	    
	    $result = $this->db->query($str_sql);
	    if ($result)
	        $data['result'] = 'success';
	    else $data['result'] = 'failed';;
	    return $data;
	}
	/* get all pages with user list  */
	function getAllPages () {
	    $candidateId = $this->GetCandidateId();
	     $str_sql = "SELECT * FROM pv_user pu LEFT JOIN pv_assigned_sheets pas ON pu.user_id = pas.pv_user_id AND pu.candidate_id = ?";
	     $result = $this->db->query($str_sql, array('candidate_id' => $candidateId))->result();
	     return $result;
	}
	
}

/* End of file user_model.php */
/* Location: ./application/models/admin/user_model.php */