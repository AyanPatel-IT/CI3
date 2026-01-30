<?php

class LoginModel extends CI_Model
{
  public function getUser($email)
  {


    $query = $this->db->select('id,password,role,email')
      ->where('email', $email)
      ->get('users')
      ->row();

    return $query;
  }
}
