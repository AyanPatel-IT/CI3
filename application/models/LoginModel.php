<?php 

class LoginModel extends CI_Model{

    public function getUser($email,$pass){
        
        // $query=$this->db->get('users');
        // $users = $query->result();



        // foreach ($users as $row) {
        //     $row->email;
        //     $row->pass;
        //     $row->role;

        //     // if($email==$dbemail && $pass==$dbpass){
        //     //     redirect(base_url('homepage'));
        //     // }
        // }

       $query = $this->db->get_where('users',['email'=>$email,'password'=>$pass]);
        
       return $query->row();
       
    }

    // public function getRole($role){
    //     $query = $this->db->get_where('users',['role'=>$role]);
    //     return $query->row();
        
    // }
}