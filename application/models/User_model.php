<?php
class User_model extends CI_model{
 
 
 
public function register_user($user){
 
 
$this->db->insert('user', $user);
 
}
 
public function login_user($login, $password){
  
  $this->db->select('*'); 
  $this->db->from('ADMIN'); 
  $this->db->join('REF_ROLE', 'ADMIN.role_id = REF_ROLE.id');
  $this->db->join('ENTITY', 'ADMIN.entity_id = ENTITY.id'); 
  $this->db->where('login', $login);
  $this->db->where('password', $password); 
 //$email,$pass
  //$this->db->select('select rr.libelle AS lib1, en.libelle AS lib2, ad.* from ADMIN ad join REF_ROLE rr ON ad.role_id = rr.id');
  //$this->db->from('ADMIN');
 // $this->db->where('user_email',$email);
 // $this->db->where('user_password',$pass);
 
  if($query=$this->db->get())
  {
      return $query->result_array();
  }
  else{
    return false;
  }
 
 
}
public function username_check($username){
 
  $this->db->select('*');
  $this->db->from('ADMIN');
  $this->db->where('login',$username);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return true;
  }else{
    return false;
  }
 
}
 
 
}
 
 
?>