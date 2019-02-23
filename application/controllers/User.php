<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('user_model');
        $this->load->library('session');

}

public function index()
{
$this->load->view("login");
}


function login_user(){ 
  $user_login=array(

  'username'=>$this->input->post('username'),
  'user_password'=>md5($this->input->post('user_password'))

    ); 
//$user_login['user_email'],$user_login['user_password']
    $data['users']=$this->user_model->login_user($this->input->post('username'), $this->input->post('user_password'));
    if(sizeof($data['users']) > 0)
        {
		  
        $this->session->set_userdata($data);
        //var_dump($data);
        
        $data_admin = array(
            'user_name' => $data['users'][0]['login'],
            'password' => $data['users'][0]['password'],
            'entity_id' => $data['users'][0]['entity_id'],
            'status' => $data['users'][0]['status'],
            'libelle_role' => $data['users'][0]['libelle_role'],
            'libelle_entity' => $data['users'][0]['libelle'],
            'user_id' => $data['users'][0]['id']
        );

        $this->load->view('SENCRM/home.php',$data_admin);

     }
    else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        $this->load->view("login.php");

        }


}


}

?>
