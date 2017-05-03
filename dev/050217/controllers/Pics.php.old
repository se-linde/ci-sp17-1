<?php
class Pics extends CI_Controller {
   
// $api_key = 'b3461ce8f1ffac4a5a01b321d6729978';
    
    
public function __construct()
    {
                parent::__construct();
                // $this->load->model('news_model');
                $this->load->model('pics_model');
                $this->load->helper('url_helper');
               
    } // end of constructor.

    
// This method is mandatory.     
// public function index($param='bunnies')
    
public function index($param = 'PHP')    
        {   
    
    
            // $param = NULL; 
            $data['pics'] = $this->pics_model->get_pics($param);
            $data['title'] = $param;

                // $this->load->view('templates/header', $data);
            $this->load->view('pics/index', $data);
                // $this->load->view('templates/footer', $data);
        } // end of index method.   

}
?>