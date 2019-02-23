<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Entity extends CI_Controller {

    public function __construct(){
    
            parent::__construct();
      			$this->load->helper('url');
      	 		//$this->load->model('user_model');
                $this->load->library('session');
    
    }
    
    public function add_entity()
    {
        $this->load->view("SENCRM/pages/forms/add_entity");
    }



}

?>
