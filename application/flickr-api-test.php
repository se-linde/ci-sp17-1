<?php
/*
flickr-api-test.php

original from: http://lifesforlearning.com/connecting-to-the-flickr-api-with-php/

*/


// This is the Controller, I think. 

$api_key = 'b3461ce8f1ffac4a5a01b321d6729978';
// $tags = 'horses';

$tags = 'boneshillman'; 

// $tag1 = 'Bones';
// $tag2 = 'Hillman';

$perPage = 500; // default value was 50. 
$url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
$url.= '&api_key=' . $api_key;
$url.= '&tags=' . $tags;

// $url.= '&tags=' . $tag1 . $tag2;  // This sort of works. 

$url.= '&per_page=' . $perPage;
$url.= '&format=json';
$url.= '&nojsoncallback=1';
 
// This is the model, I think.  

$response = json_decode(file_get_contents($url));
$pics = $response->photos->photo;
 

/*
echo "<pre>";
echo var_dump($response);
echo "</pre>";
die;
*/ 

/*
echo "<pre>";
echo var_dump(file_get_contents($url));
echo "</pre>";
die;
*/ 
 
// This is the view. 

foreach($pics as $pic){

    $size = 'm';
    $photo_url = '
    http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';

    echo "<img title='" . $pic->title . "' src='" . $photo_url . "' />";
 
}