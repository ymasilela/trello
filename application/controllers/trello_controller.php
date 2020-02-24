<?php

class trello_controller extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('ProjectManagement');
        
        $this->load->library('session');
    }
    
    public function index()
    {
      
       
        
        $projectName = "StartTuts";
        $projectManagement = new ProjectManagement();
        $statusResult = $projectManagement->getAllStatus();
        
        $this->load->view('index.php', array(
            'statusResult'=>$statusResult,
            'projectName'=>$projectName,
            'projectManagement'=>$projectManagement
        ));
       
    }
    public function trello_add_card($status_d)
    {
       
            
            $card=  $this->input->post ( 'card' );
          
            
    
        // $this->form_validation->set_rules('first_name','First Name','trim|required|alpha|min_length[3|max_length[30]]');
        
        $data = null;
        if ($status_d) {
            $data=$this->ProjectManagement->addToCard($card,$status_d);
            $message = "success";
            $this->session->set_flashdata('success_msg', 'Added');
            
            redirect('trello_controller');
            
        } else {
            $message =  "error";
            $this->session->set_flashdata('error_msg', 'Please check your entry, fields with errors are highlighted in red');
            redirect('trello_controller');
            
        }
        die(json_encode(array('message'=>$message,'user'=>$data)));
        
    }
  
    //delete card
    function delete_user_card($id)
    {
        
        $this->ProjectManagement->delete_user($id);
        $this->session->set_flashdata('success_msg', 'Deleted successfully.');
        redirect('trello_controller');
    }
    
    
}