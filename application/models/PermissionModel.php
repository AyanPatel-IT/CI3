<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PermissionModel extends CI_Model
{
  public function hasPermission($role, $permission)
  {
    $this->db->from('roles r');
    $this->db->join('role_permissions rp', 'r.id = rp.role_id');
    $this->db->join('permissions p', 'p.id = rp.permission_id');
    $this->db->where('r.name', $role);
    $this->db->where('p.name', $permission);
    $this->db->select('rp.role_id');

    return $this->db->get()->num_rows() > 0;
  }





  // public function hasPermissionTest($roles,$permission){
  //     $this->db->from('roles r');
  //     $this->db->join('roles_permission rp','r.id= rp.roles_id');
  //     $this->db->join('permissions p','p.id=rp.permission_id');
  //     $this->db->where('r.name',$roles);
  //     $this->db->where('p.name',$permission);
  //    $this->db->select('rp.roles_id');
  //     return $this->db->get()->num_rows() > 0;

  // }



}
