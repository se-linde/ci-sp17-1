<?php
//application/views/news/success.php

$this->load->view($this->config->item('theme') . 'header');

?>
<h2><?=$this->config->item('title')?></h2>
<p><b>Yay - you successfully created a news item! </b></p>
<p>Now I suppose you want to see it? </p>

<?php 

$this->load->view($this->config->item('theme') . 'footer');  

?> 