<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data extends CI_Controller {

    public $status;
    public $roles;

    function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user_model', TRUE);
        $this->load->model('Data_model', 'data_model', TRUE);
    //    $this->load->model('File', 'file', TRUE);
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->status = $this->config->item('status');
        $this->roles = $this->config->item('roles');
        $this->load->library('userlevel');
    }

    public function lists($rowno=0)
    {
        $data = $this->session->userdata;
        $data['title'] = "Found Items List";
        

        //check user level
        if(empty($data['role'])){
            redirect(site_url().'main/login/');
        }
        $dataLevel = $this->userlevel->checkLevel($data['role']);
        //check user level

        //check is admin or not
        if($dataLevel == "is_admin" || $dataLevel == "is_user"){
            
            $search_text = "";
		if($this->input->post('submit') != NULL ){
			$search_text = $this->input->post('search');
			$this->session->set_userdata(array("search"=>$search_text));
		}else{
			if($this->session->userdata('search') != NULL){
				$search_text = $this->session->userdata('search');
			}
		}
		
		// Row per page
		$rowperpage = 15;
     
		// Row position
		if($rowno != 0){
			$rowno = ($rowno-1) * $rowperpage;
		}
		$allcount = $this->data_model->countItemData($search_text);
		//$users_record = 
		
		$data['groups'] = $this->data_model->getItems($rowno,$rowperpage,$search_text);
		// Pagination Configuration
      	$config['base_url'] = base_url().'index.php/Data/lists';
      	$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;

		// Initialize
		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $data['groups'];
		$data['row'] = $rowno;
		$data['search'] = $search_text;
            $this->load->view('header', $data);
            $this->load->view('navbar', $data);
            $this->load->view('container');
            $this->load->view('data/list', $data);
            $this->load->view('footer');
        }else{
            $this->session->set_flashdata('flash_message', 'You have no permission to access the Moule');
            redirect(site_url().'main/');
        }
    }
   //edit user
   public function changeuser() 
   {
     $data = $this->session->userdata;
       if(empty($data['role'])){
           redirect(site_url().'main/login/');
       }

       $dataLevel = $this->userlevel->checkLevel($data['role']);
       //check user level

       //check is admin or not
       if($dataLevel == "is_admin"){
       $data['title'] = "Edit Item";
       $this->form_validation->set_rules('name', 'Item Name', 'required');
       $this->form_validation->set_rules('place', 'Place', 'required');
       $this->form_validation->set_rules('id', 'Student ', 'required');
       $this->form_validation->set_rules('item_details', 'Desrciption', 'required');
       //$data['classes']= $this->data_model->clas();
       $data['groups'] = $this->data_model->getItemInfo($this->uri->segment(3));

       if ($this->form_validation->run() == FALSE) {
           $this->load->view('header', $data);
           $this->load->view('navbar', $data);
           $this->load->view('container');
           $this->load->view('data/edit', $data);
           $this->load->view('footer');
       }else{
           $post = $this->input->post(NULL, TRUE);
           $cleanPost = $this->security->xss_clean($post);
           $cleanPost['id'] = $this->input->post('id');
           $cleanPost['name'] = $this->input->post('name');
           $cleanPost['place'] = $this->input->post('place');
           $cleanPost['place_detail'] = $this->input->post('place_detail');
           $cleanPost['item_details'] = $this->input->post('item_details');
           $cleanPost['pub_date'] = $this->input->post('pub_date');
           $cleanPost['contact'] = $this->input->post('contact');
           $cleanPost['pic_related'] = $this->input->post('pic_related');
           //print_r($cleanPost);exit;
           $r = $this->data_model->updatefound($cleanPost);

           if(!$r){
               $this->session->set_flashdata('flash_message', 'There was a problem updating your Found item');
               redirect(site_url().'data/changeuser/'.$cleanPost['id']);
           }else{
               $this->session->set_flashdata('success_message', 'Found item has been updated.');
               redirect(site_url().'data/lists');
           }
           
       }
   }
   }

   public function deleteitem($id) {
    $data = $this->session->userdata;
    if(empty($data['role'])){
    redirect(site_url().'main/login/');
}
$dataLevel = $this->userlevel->checkLevel($data['role']);
//check user level

//check is admin or not
if($dataLevel == "is_admin"){
    
    $this->data_model->deleteItem($id);
    if($this->data_model->deleteItem($id) == FALSE )
    {
        $this->session->set_flashdata('flash_message', 'Error, cant delete the Found Item!');
    }
    else
    {
        $this->session->set_flashdata('success_message', 'Found Item Deleted.');
    }
    redirect(site_url().'data/lists');
}else{
    redirect(site_url().'main/');
}
}

public function add()
{
    $data = $this->session->userdata;
    if(empty($data['role'])){
        redirect(site_url().'main/login/');
    }

    //check user level
    if(empty($data['role'])){
        redirect(site_url().'main/login/');
    }
    $dataLevel = $this->userlevel->checkLevel($data['role']);
    //check user level

    //check is admin or not
    if($dataLevel == "is_admin" || $dataLevel == "is_user")
{
        $this->form_validation->set_rules('name', 'Item Name', 'required');
        $this->form_validation->set_rules('place', 'Place name', 'required');
        $this->form_validation->set_rules('place_detail', 'Place details', 'required');
        $this->form_validation->set_rules('item_details', 'Item description', 'required');
        $this->form_validation->set_rules('pub_date', 'Published Date', 'required');
       // $this->form_validation->set_rules('gender', 'Gender Confirmation', 'required');
        $data['classes'] = $this->data_model->item();
        $data['title'] = "Add Found items";
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('navbar');
            $this->load->view('container');
            $this->load->view('data/add', $data);
            $this->load->view('footer');
        }else{
            if($this->data_model->isDuplicate($this->input->post('email'))){
                $this->session->set_flashdata('flash_message', 'User email already exists');
                redirect(site_url().'data/add');
            }else{
                $this->load->library('password');
                $post = $this->input->post(NULL, TRUE);
                $cleanPost = $this->security->xss_clean($post);
                //$hashed = $this->password->create_hash($cleanPost['password']);
                $cleanPost['name'] = $this->input->post('name');
                $cleanPost['place'] = $this->input->post('place');
                $cleanPost['place_detail'] = $this->input->post('place_detail');
                $cleanPost['item_details'] = $this->input->post('item_details');
                $cleanPost['pic_related'] = $this->input->post('pic_related');
                $cleanPost['pub_date'] = $this->input->post('pub_date');
                $cleanPost['contact'] = $this->input->post('contact');
                $cleanPost['user_id'] = $this->input->post('user_id');
                //$cleanPost['banned_users'] = 'unban';
               
                //unset($cleanPost['passconf']);

                //insert to database
                if(!$this->data_model->addfound($cleanPost)){
                    $this->session->set_flashdata('flash_message', 'There was a problem add new found item');
                }else{
                    $this->session->set_flashdata('success_message', 'New Found item has been added.');
                }
                redirect(site_url().'data/lists');
            };
        }
    }else{
        redirect(site_url().'data/lists');
    }
}



protected function _islocal(){
    return strpos($_SERVER['HTTP_HOST'], 'local');
}


}
?>