<?php
class News_model extends CI_Model { // extends the previous class. 

    
    // This will always load the database. 
    public function __construct()
    {
            $this->load->database();
    }

    
    
    public function get_news($slug = FALSE)
    {
            if ($slug === FALSE)
            {
                    $query = $this->db->get('sp17_news');
                    return $query->result_array();
            }

            $query = $this->db->get_where('sp17_news', array('slug' => $slug)); 
            // puppies, oils, bones, etc. 
            return $query->row_array();
        
    } // end get_news() method

    
    
    public function set_news()
        {
            $this->load->helper('url');

            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'text' => $this->input->post('text')
            );

            // return $this->db->insert('sp17_news', $data);
        
        
            // If you put in the value, it's assumed to be true. 
            if($this->db->insert('sp17_news', $data)) 
            { // data entered successfully. 
                
            /* 
            // This returns the ID number of the record created. 
            // This is the normal way to pass a newly created ID number back. 
            return $this->db->insert_id(); 
            
            // The slug is used for the view, so pass it back. 
             
                
            */     
                
                return $slug;
                
                
            } else { // trouble! 
                return false; 
                
            }
        
        } // end set_news() method. 
    
} // end news model class. 