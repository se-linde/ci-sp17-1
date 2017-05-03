
<?php
class Pics extends CI_Controller {
/*
$api_key = '002e8e42551bffdb1edd2c182a35d936';
$tags = 'bears,polar';
 */  
    public function __construct()
{
        parent::__construct();
        $this->load->model('pics_model');
        $this->load->helper('url_helper');
}
    public function index($param='kittens')
    {
        
if(isset($_POST['submit']))
{
    $param=$_POST['searchword'];
    $data['pics'] = $this->pics_model->get_pics($param);
    $data['title'] = $param;
    $this->load->view('pics/index', $data);
}
else    
{
        $data['pics'] = $this->pics_model->get_pics($param);
        $data['title'] = $param;
        //$this->load->view('templates/header', $data);
        $this->load->view('pics/index', $data);
        //$this->load->view('templates/footer',$data);
}
    
    
    }
}//end of pics controller