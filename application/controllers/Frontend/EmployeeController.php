<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeController extends CI_Controller{

    public function index(){
        $this->load->view('templates/header');
        $this->load->model('/EmployeeModel');
        // $data['employee']=$this->EmployeeModel->fetchEmp();
        $employee=$this->EmployeeModel->fetchEmp();
        $this->load->view('Frontend/employee',['employee'=>$employee]);
        $this->load->view('templates/footer');

    }

    public function create(){
        $this->load->view('templates/header');
        $this->load->view('Frontend/create');
        $this->load->view('templates/footer');
    }

      public function store(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('fname','First Name','required');
        $this->form_validation->set_rules('lname','Last Name','required');
        $this->form_validation->set_rules('phone','phone','required|numeric');
        $this->form_validation->set_rules('email','email','required|valid_email');

        if($this->form_validation->run() == FALSE ){
            $this->create();
        }else{
       $data=[

        'fname'=>$this->input->post('fname'),
        'lname'=>$this->input->post('lname'),
        'phone'=>$this->input->post('phone'),
        'email'=>$this->input->post('email'),

       ];
       $this->load->model('EmployeeModel','emp');
       $this->emp->insertEmployee($data);
       $this->index();
    }
}
}