<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lost_model extends CI_Model {

public $status;
public $roles;


function __construct(){
// Call the Model constructor
parent::__construct();
$this->status = $this->config->item('status');
$this->roles = $this->config->item('roles');
$this->banned_users = $this->config->item('banned_users');


}

//insert lost item into database
public function addlost($d)
{
$string = array(
'name'=>$d['name'],
'place'=>$d['place'],
'place_details'=>$d['place_details'],
'item_details'=>$d['item_details'],
'contact'=>$d['contact'],
'lost_date'=>$d['lost_date'],
'image'=>$d['image'],
'user_id' => $d['user_id'],
);
$q = $this->db->insert_string('lost',$string);
$this->db->query($q);
return $this->db->insert_id();
}

    //get user info
    public function getItemInfo($id)
    {
        $q = $this->db->get_where('lost', array('id' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            //print_r($row);exit;
            return $row;
        }else{
            error_log('no item Lost getItemInfo('.$id.')');
            return false;
        }
    }
    
    //getUserName
    public function getItemAllData($id)
    {
        $this->db->select('*');
        $this->db->from('lost');
        $this->db->where('id', $id );
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->row_array();
            return $row;
        }
        else
        {
            error_log('no user lost getItemAllData('.$id.')');
            return false;
        }
    }
      //update data user
      public function updatelost($post)
      {
          $data = array(
                 'name' => $post['name'],
                 'place' => $post['place'] ,
                 'place_details' => $post['place_details'],
                 'item_details' => $post['item_details'], 
                 'contact' => $post['contact'],
                 'lost_date' => $post['lost_date'],
                 'image' => $post['image'], 
                 //'status' => 'active',
                
              );
              //print_r($data);exit;
          $this->db->where('id', $post['id']);
          $this->db->update('lost', $data); 
          $success = $this->db->affected_rows(); 
          
          if(!$success){
              error_log('Unable to updateItemsInfo('.$post['id'].')');
              return false;
          }
          
          $item_info = $this->getItemInfo($post['id']); 
          return $item_info; 
      }
         //get lost
    public function countItemData($search = '')
    {   
        $data = $this->session->userdata;
        $dataLevel = $data['role'];
        if($dataLevel == "1" || $dataLevel == "2"){

    	$this->db->select('count(*) as allcount');
      	$this->db->from('lost');
      
      	if($search != ''){
       		$this->db->like('item_details', $search);
			$this->db->or_like('name', $search);
			$this->db->or_like('lost_date', $search);
      	}

      	$query = $this->db->get();
      	$result = $query->result_array();
      
      	return $result[0]['allcount'];

            }
       
    }
    //get lost
    public function searchByPlaceSection($cl)
    {   
    
            $rows =array(); 
            $this->db->select( '*' )
                 ->where('id',$cl)
                 ->from('lost')
                 ->group_by('place');
            $query = $this->db->get();
            if($query->result()){
                $rows = $query->result();           
                $query->free_result();
            }
            //print_r($rows);exit;
            return $rows;

    }
    
    
 
    public function getItems()
    {   

$data = $this->session->userdata;
        $dataLevel = $data['role'];
        if($dataLevel == 1){
         //$session= $this->session->userdata('id');
            $rows =array(); 
            $this->db->select( '*' )
                 ->from('lost');
                 $this->db->order_by("id", "desc");
            $query = $this->db->get();
            if($query->result()){
                $rows = $query->result();           
                $query->free_result();
            }
            return $rows;
        }else{
            $id= $this->session->userdata('id');
            $rows =array(); 
            $this->db->select( '*' )
                 ->where('user_id',$id)
                 ->from('lost');
                 $this->db->order_by("id", "desc");
          $query = $this->db->get();
            if($query->result()){
                $rows = $query->result();           
                $query->free_result();
            }
            //print_r($rows);exit;
            return $rows;

        }
       
       
    } 
      //delete lost
      public function deleteItem($id)
    {   
        $this->db->where('id', $id);
        $this->db->delete('lost');
        
        if ($this->db->affected_rows() == '1') {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
     //check is duplicate
     public function isDuplicate($email)
     {     
         $this->db->get_where('users', array('email' => $email), 1);
         return $this->db->affected_rows() > 0 ? TRUE : FALSE;         
     }

    public function item()
    {   
            $rows =array(); 
            $this->db->select( '*' )
                 ->from('lost');
           $query = $this->db->get();
            if($query->result()){
                $rows = $query->result();           
                $query->free_result();
            }
            return $rows;
    }

}
?>