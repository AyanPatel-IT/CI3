<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginService
{

  protected $loginModel;
  protected $cache;
  public function __construct()
  {
    $CI = &get_instance();
    $CI->load->model('LoginModel'); //since we are not in a controller, we must use $CI.
    $this->loginModel = $CI->LoginModel;  //Now your service can do: $this->loginModel->getUser($email); Instead of:$CI->LoginModel->getUser($email);

    $CI->load->driver('cache', ['adapter' => 'file']);
    $this->cache = $CI->cache;
  }

  public function authen($email, $pass)
  {

    $user = $this->loginModel->getUser($email);

    if (!$user) {
      // redirect(base_url('login'));
      throw new Exception('User Not Found');
    }


    if ($pass != $user->password) {
      // redirect(base_url('login'));
      throw new Exception('Invalid Password');
    }


    return [
      'id' => $user->id,
      'email' => $user->email,
      'role' => $user->role
    ];
  }


  public function getHomeData($email, $role)
  {
    return [
      'email' => $email,
      'role' => $role,

    ];
  }
}
