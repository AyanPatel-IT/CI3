<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller{

    public function index(){
        $this->load->view('prjTemplate/header');
        $this->load->view('project/login');
        $this->load->view('prjTemplate/footer');

    }

        public function authenticate(){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('pass','password','required');

            if($this->form_validation->run()){
 //---------------------------------------------------------           
                $email=$this->input->post('email');
                $pass=$this->input->post('pass');


                $this->load->model('LoginModel');
                $user = $this->LoginModel->getUser($email,$pass);
                
                if($user){
                    redirect(base_url('homepage'));

                }else{
                    redirect(base_url('login'));
                }
//------------------------------------------------------------
            }
            else{
                $this->index();
            }

    }

    public function home(){
        
        //   $this->load->model('LoginModel');
        //   $user = $this->LoginModel->getUser($email,$pass,$role);;

        $this->load->view('project/homepage');
    }

}


