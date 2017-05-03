<?php

// This is the model, I think.  

// This has to connect to the server instead of a database. 

class Pics_model extends CI_Model { // extends the previous class. 
    
    public function get_pics($param)
    {
        
        $api_key = 'b3461ce8f1ffac4a5a01b321d6729978';
  
        $perPage = 10; // default value was 50. 
        $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
        $url.= '&api_key=' . $api_key;
        $url.= '&tags=' . $param;
        $url.= '&per_page=' . $perPage;
        $url.= '&format=json';
        $url.= '&nojsoncallback=1';
 
// This is the model, I think.  
        
        $response = json_decode(file_get_contents($url));
        $pics = $response->photos->photo;
         
        return $pics; 
        
    } // end get_pics() method

} // end pics model class. 