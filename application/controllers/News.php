<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
        } // end of constructor.

        /* public function index() // default 
        {
                $data['news'] = $this->news_model->get_news();
        }*/ 
    
        public function index()
            {   
                $data['news'] = $this->news_model->get_news();
                $data['title'] = 'News archive';

                $this->load->view('templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer', $data);
            } // end of index method. 

        /* public function view($slug = NULL) // default
        {
                $data['news_item'] = $this->news_model->get_news($slug);
        }*/ 
    
        public function view($slug = NULL)
        {
            $data['news_item'] = $this->news_model->get_news($slug);

            if (empty($data['news_item']))
                {
                    show_404();
                }

            $data['title'] = $data['news_item']['title'];

            $this->load->view('templates/header', $data);
            $this->load->view('news/view', $data);
            $this->load->view('templates/footer', $data);
        } // end of view method. 

    
    
            public function create()
        {
            $this->load->helper('form'); // helpers are functions.
            $this->load->library('form_validation'); // libraries are classes. 

            $data['title'] = 'Create a news item';

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'Text', 'required');

            if ($this->form_validation->run() === FALSE)
                // '===' matches both value and datatype. 
            { // Show form. 
                $this->load->view('templates/header', $data);
                $this->load->view('news/create', $data);
                $this->load->view('templates/footer', $data);

            }
            else
            { // say thanks for entering the data! 
                $this->news_model->set_news();
                
                $this->load->view('templates/header', $data);
                $this->load->view('news/create', $data);
                $this->load->view('templates/footer', $data);
                
                // $this->load->view('news/success'); <-- this here by default. 
            }
        } // end of the create method.
    
} // end of news controller. 