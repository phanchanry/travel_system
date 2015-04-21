<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Place_Category extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('place_category_model');
         if (!$this->session->userdata('IS_ADMIN_LOGIN')) {
            redirect('/admin/login');
        }
        $this->pageType['pageType'] = "place_category";
    }
    /* index function(when page load)  */
    public function index() {
       $fieldsResult = $this->place_category_model->getPlaceCategoryInfo();
       $this->data['categoryList'] = $fieldsResult;
       $this->admin_render('admin/place_category_view');
    }
    
    /* admin add place category page loading  */
    public function add() {
        $this->admin_render('admin/add_place_category_view');
    }
    /* upload category image on add place  category page */
    public function uploadCategoryImage () {
        $path = $_SERVER['DOCUMENT_ROOT']."/assets/upload/category_image/";
        $frontPath = base_url()."assets/upload/category_image/";
        $result = $this->Upload_Image($path, $frontPath, 'categoryImage','category');
        
        header('Content-Type: application/json');
        echo json_encode($result);
    }
    /* add place category ajax form submit */
    public function addPlaceCategory () {
        $result = $this->place_category_model->savePlaceCategory();
        
        header('Content-Type: application/json');
        echo json_encode($result);
    }
    /* upload marker image on place category page */
    public function uploadMarkerImage () {
        $path = $_SERVER['DOCUMENT_ROOT']."/assets/upload/marker_image/";
        $frontPath = base_url()."assets/upload/marker_image/";
        $result = $this->Upload_Image($path, $frontPath, 'markerImage', 'category');
        
        header('Content-Type: application/json');
        echo json_encode($result);
    }
    /* edit place category page loading */
    public function edit ($id) {
        $fieldsResult = $this->place_category_model->getPlaceCategoryInfo($id);
        $this->data['categoryList'] = $fieldsResult[0];
        $this->admin_render('admin/edit_place_category_view');
    }
    /* remove place category by ids on place category page */
    public function removeCategory () {
        $result = $this->place_category_model->removePlaceCategory();
        
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */