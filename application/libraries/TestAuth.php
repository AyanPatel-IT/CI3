<?php

use PhpParser\Node\UseItem;

defined('BASEPATH') or exit('No direct script access allowed');

class TestAuth
{
  protected $CI;
  public function __construct()
  {
    $CI = &get_instance();
    $CI->load->config('role_permission');
    $this->rolePermission = $CI->config->item('permissions');
  }
  public function can($permission)
  {
    $CI = &get_instance();
    $role = $CI->session->userdata('role');

    if(!$role || !isset($this->rolePermission[$role])) {
      return false;
    }

    return in_array($permission, $this->rolePermission[$role]);
  }
}
