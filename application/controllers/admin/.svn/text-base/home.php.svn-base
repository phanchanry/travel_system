<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
         if (!$this->session->userdata('IS_ADMIN_LOGIN')) {
            redirect(base_url().'admin/login');
        }
        $this->pageType['pageType'] = "home";
    }
    /* index function(when page load)  */
    public function index() {
        $result = $this->user_model->GetUserList(null);
        if ($result != '-1')
            $this->data['userList'] = $result;
        else  $this->data['userList'] = null;
        $this->admin_render('admin/user_management_view'); 
    }
    /* admin logout  */
    public function logout() {
        $this->user_model->adminLogout();
        redirect("/admin/home");
    }
    
    /* add user form view  */
    public function add_user() {
        $this->admin_render('admin/add_user_view');
    }
    
    /* add user function (form submit)  */
    public function addUser () {
        $result = $this->user_model->adminSaveUser();
        
        header('Content-Type: application/json');
        echo json_encode($result);
    }
    
    /* admin edit user  */
    public function edit_user ($id) {
        $result = $this->user_model->GetUserList($id);
        if ($result != '-1')
            $this->data['userInfo'] = $result;
        else $this->data['userInfo'] = null;
        $this->admin_render('admin/edit_user_view');
    }
    
    public function editUser() {
        $result = $this->user_model->adminSaveUser();
        
        header('Content-Type: application/json');
        echo json_encode($result);
    }
    /* admin delete user */
    public function deleteUser() {
        $result = $this->user_model->removeUserByIds();
        
        header('Content-Type: application/json');
        echo json_encode($result);
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */