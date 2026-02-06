<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TicketController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('is_logged_in')) {
      redirect(base_url('login'));
    }
  }

  public function home()
  {
    // $data=[
    //     'email'=>$this->session->userdata('email'),
    //     'role'=>$this->session->userdata('role'),
    // ];

    //--
    $email = $this->session->userdata('email');
    $role = $this->session->userdata('role');

    $this->load->library('LoginService');
    $data = $this->loginservice->getHomeData($email, $role);
    //--
    $this->load->view('prjTemplate/header');
    $this->load->view('project/homepage', $data);
    $this->load->view('prjTemplate/footer');
  }
  public function raiseTicket()
  {
    $this->load->library('AuthService');

    // if(!$this->authservice->can('ticket.delete')){
    //     show_error('Access Denied',403);
    // }

    if (!$this->authservice->can('ticket.view')) {
      $data['msg'] = 'You dont have permission to access this page.';
      $this->output->set_status_header(403);
      $this->load->view('errors/AccessDenied', $data);
      return;
      // show_error('Access Denied', 403);
    }
    $this->load->view('prjTemplate/header');
    $this->load->view('project/raiseTicket');
    $this->load->view('prjTemplate/footer');
  }
  public function tickets()
  {
    $this->load->library('AuthService');

    if (!$this->authservice->can('ticket.view')) {
      $data['msg'] = 'You dont have permission to access this page.';
      $this->output->set_status_header(403);
      $this->load->view('errors/AccessDenied', $data);
      return;
    }
    $this->load->library('TicketService');

    // $data['role'] =$this->session->userdata('role');
    // $this->load->model('/LoginModel');
    // $data['tickets']=$this->LoginModel->getTicket();

    // $data=array_merge($data,$roleSession); not needed
    //--
    $data['id'] = $this->session->userdata('id');
    $data['role'] = $this->session->userdata('role');
    $data['email'] = $this->session->userdata('email');
    $data['fetchName'] = $this->ticketservice->fetchEmail();
    $data['filterStatus'] = $this->input->get('filterStatus');
    $data['filterPriority'] = $this->input->get('filterPriority');
    $data['searchbar'] = $this->input->get('searchbar');




    if($data['filterStatus']){
      $this->session->set_userdata('filterStatus',$data['filterStatus']);
    }
    $data['status']=$this->session->userdata('filterStatus');
    
    if($data['filterPriority']){
      $this->session->set_userdata('filterPriority',$data['filterPriority']);
    }
    $data['priority']= $this->session->userdata('filterPriority');

    $tickets = $this->ticketservice->getTicketData($data);
    $data['tickets'] = $tickets;
    //--
    $this->load->view('prjTemplate/header');
    $this->load->view('project/ticketModule', $data);
    $this->load->view('prjTemplate/footer');
  }

  public function resetFilters(){
    $this->session->unset_userdata('filterStatus');
    $this->session->unset_userdata('filterPriority');

    redirect(base_url('tickets'));
  }

  public function createTicket()
  {
    $this->load->library('AuthService');

    if (!$this->authservice->can('ticket.create')) {
      $data['msg'] = 'You dont have permission to access this page.';
      $this->output->set_status_header(403);
      $this->load->view('errors/AccessDenied', $data);
      return;
    }
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required|min_length[20]');

    if (!$this->form_validation->run()) {
      return $this->raiseTicket();
    }

    // $this->load->library('AuthService');

    // if(!$this->authservice->can('ticket.create')){
    //     show_error('Access Denied',403);
    // }

    // $data=[
    //     'title'=>$this->input->post('title'),
    //     'description'=>$this->input->post('description'),
    //     'priority'=>'Medium',  //Default values taken as - Medium,Open
    //     'status'=>'Open'

    // ];

    // $this->load->model('/LoginModel');
    // $this->LoginModel->setTicket($data);
    //--
    $title = $this->input->post('title');
    $description = $this->input->post('description');

    $this->ticketservice->createTicket($title, $description);
    //--
    redirect(base_url('tickets'));
  }




  public function deleteTicket($id)
  {
    $this->load->library('AuthService');

    if (!$this->authservice->can('ticket.delete')) {
      $data['msg'] = 'You dont have permission to access this page.';
      $this->output->set_status_header(403);
      $this->load->view('errors/AccessDenied', $data);
      return;
      // show_error('Access Denied', 403);
    }
    //--
    $this->ticketservice->delTicket($id);
    //--

    // $this->load->model('/LoginModel');
    // $this->LoginModel->deleteTicket($id);

    redirect(base_url('tickets'));
  }

  public function editTicket($id)
  {
    $this->load->library('AuthService');

    if (!$this->authservice->can('ticket.update')) {
      $data['msg'] = 'You dont have permission to access this page.';
      $this->output->set_status_header(403);
      $this->load->view('errors/AccessDenied', $data);
      return;
    }
    $this->load->view('prjTemplate/header');

    //  $this->load->model('/LoginModel');
    //  $data['ticket']=$this->LoginModel->fetchTicket($id);
    //--
    $data['ticket'] = $this->ticketservice->editTicket($id);

    $data['assign'] = $this->ticketservice->fetchEmail();

    //--
    $this->load->view('project/editTicket', $data);
    $this->load->view('prjTemplate/footer');
  }


  public function updateTicket($id)
  {
    $this->load->library('AuthService');

    if (!$this->authservice->can('ticket.update')) {
      $data['msg'] = 'You dont have permission to access this page.';
      $this->output->set_status_header(403);
      $this->load->view('errors/AccessDenied', $data);
      return;
    }

    $data = [
      'comments' => $this->input->post('comments'),
      'priority' => $this->input->post('priority'),
      'status' => $this->input->post('status'),
      'user_id' => $this->input->post('assign'),
      // 'user_id' => 
    ];

    $this->ticketservice->updateTicket($id, $data);

    // $this->load->model('/LoginModel');
    // $this->LoginModel->updateTicket($id,$data);
    redirect(base_url('tickets'));
  }

  // public function statusFilter()
  // {
  //   $status = $this->input->get('filterStatus');
  //   $this->ticketservice->statusFilter($status);
  // }
}
