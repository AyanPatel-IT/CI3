<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TicketService {

protected $loginModel;
public function __construct(){
    
    $CI = &get_instance();
    $CI->load->model('/LoginModel');
    $this->loginModel = $CI->LoginModel;
}

public function authen($email,$pass){
    $user = $this->loginModel->getUser($email);

    if(!$user){
                    redirect(base_url('login'));
                }


    if($pass!=$user->password){
                    redirect(base_url('login'));
                }


    return[
        'id'=>$user->id,
        'email'=>$user->email,
        'role'=>$user->role
    ];
}



}