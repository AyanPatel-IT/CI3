<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

  protected $TicketService;
  protected $loginService;

  // public function __construct()
  // {
  //   parent::__construct();

  //   if (!$this->session->userdata('is_logged_in')) {
  //     redirect(base_url('home'));
  //   }
  // }
  public function login()
  {
    if ($this->session->userdata('is_logged_in')) {
      redirect(base_url('homepage'));
    }
    $this->load->view('prjTemplate/header');
    $this->load->view('project/login');
    $this->load->view('prjTemplate/footer');
  }

  public function authenticate()
  {

    // $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('pass', 'password', 'required');

    if (!$this->form_validation->run()) {
      redirect(base_url('login'));
    }
    //---------------------------------------------------------           
    $email = $this->input->post('email');
    $pass = $this->input->post('pass');


    // $this->load->model('LoginModel');
    // $user = $this->LoginModel->getUser($email);

    // if(!$user){
    //     redirect(base_url('login'));
    // }

    try {
      $this->load->library('LoginService');
      // $this->TicketService = new TicketService();

      $user = $this->loginservice->authen($email, $pass);

      $this->session->set_userdata([
        'id' => $user['id'],
        'email' => $user['email'],
        'role' => $user['role'],
        'is_logged_in' => TRUE,
        // 'id'=>$user['id']
      ]);

      // $this->session->set_userdata('email',$user->email);
      // $this->session->set_userdata('role',$user->role);

      // if($pass!=$user->password){
      //     redirect(base_url('login'));
      // }
      redirect(base_url('homepage'));
      exit;
    } catch (Exception $e) {
      // show_error($e->getMessage(),401);
      $this->session->set_flashdata('error', $e->getMessage());
      redirect(base_url('login'));
    }
  }



  public function logout()
  {
    $this->session->unset_userdata(['email', 'role', 'is_logged_in']);
    $this->session->sess_destroy();
    echo "You have been Logged Out!!";
    redirect(base_url('login'));
  }

  //--------------------------------------------TICKETS MODULE----------------------------------------------------------------





  // public function test_cache()
  // {
  //     $this->load->driver('cache', ['adapter' => 'file']);

  // var_dump($this->cache->save('abc', '123', 600));
  // var_dump($this->cache->get('abc'));
  // exit;

  // }

}
