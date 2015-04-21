<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Location extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('location_model');
        $this->load->model('place_category_model');
         if (!$this->session->userdata('IS_ADMIN_LOGIN')) {
            redirect(base_url().'admin/login');
        }
        $this->pageType['pageType'] = "location";
    }
   public function index () {
       $result = $this->location_model->getLocations();
       $this->data['locationLists'] = $result;
       
       $this->admin_render('admin/location_management_view');
   }
    /* question management add question page loading */
   public function add () {
       $fieldsResult = $this->place_category_model->getPlaceCategoryInfo();
       $this->data['categoryLists'] = $fieldsResult;
       $this->admin_render('admin/add_location_view');
   }
   /* get location position from address */
   public function getLocationInfoFromAddress () {
       $result = "success";
       $error = "";
       $data = array();
       
       $address = $_POST['address'];
       
       $url = "http://maps.googleapis.com/maps/api/geocode/json?";
       $url.= "address=".urlencode($address);
       $url.= "&sensor=false";
       
       $json = file_get_contents( $url );
       $location = json_decode( $json, true );
       
       if( $location['status'] == "OK")
           $location = $location['results'];
       else{
           $result = "failed";
       }
       
       $data['location'] = $location;
       $data['result'] = $result;
       $data['error'] = $error;
       header('Content-Type: application/json');
       echo json_encode($data);
   }
   /* upload location image */
   public function uploadLocationImage () {
       $path = $_SERVER['DOCUMENT_ROOT']."/assets/upload/location_image/";
       $frontPath = base_url()."assets/upload/location_image/";
       $result = $this->Upload_Image($path, $frontPath, 'locationImageUpload', 'location');
       
       header('Content-Type: application/json');
       echo json_encode($result);
   }
   /* save location */
   public function saveLocation () {
       $result = $this->location_model->saveLocation();
       
       header('Content-Type: application/json');
       echo json_encode($result);
   }
   /* edit location page loading */
   public function edit ($id) {
       $fieldsResult = $this->place_category_model->getPlaceCategoryInfo();
       $this->data['categoryLists'] = $fieldsResult;
       
       $result = $this->location_model->getLocations($id);
       $this->data['location'] = $result[0];
       $this->admin_render('admin/edit_location_view');
   }
   /* remove location by location ids */
   public function removeLocation () {
       $result = $this->location_model->removeLocationByIds();
        
       header('Content-Type: application/json');
       echo json_encode($result);
   }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */