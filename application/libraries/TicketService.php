<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TicketService
{

  // protected $loginModel;
  protected $ticketModel;

  protected $cache;
  public function __construct()
  {

    $CI = &get_instance();
    $CI->load->model('TicketModel'); //since we are not in a controller, we must use $CI.
    $this->ticketModel = $CI->TicketModel;  //Now your service can do: $this->loginModel->getUser($email); Instead of:$CI->LoginModel->getUser($email);

    $CI->load->library('AuthService');
    $this->auth = $CI->authservice;

    $CI->load->driver('cache', ['adapter' => 'file']);
    $this->cache = $CI->cache;
  }


  public function getTicketData($data)
  {
    // if(!$this->auth->can('ticket.view')){
    //     throw new Exception('Unauthorized Action');
    // }
    $ticketCache = $this->cache->get('tickets_list');

    if ($ticketCache !== FALSE) {
      log_message('error', 'Ticket from Cache');
      return $ticketCache;
    }
    log_message('error', 'Ticket from DB');

    $ticketCache = $this->ticketModel->getTicket($data);

    $this->cache->save('tickets_list_' . $data['id'], $ticketCache, 600);

    return $ticketCache;
  }

  public function createTicket($title, $description)
  {
    // if(!$this->auth->can('ticket.create')){
    //     throw new Exception('Unauthorized Action');
    // }
    $data = [
      'title' => $title,
      'description' => $description,
      'priority' => 'Medium',
      'status' => 'Open'
    ];

    $this->ticketModel->setTicket($data);
    log_message('error', 'Ticket created - cache cleaned');

    $this->cache->delete('tickets_list');
  }


  public function delTicket($id)
  {
    log_message('error', 'Ticket deleted - cache cleaned');

    // if(!$this->auth->can('ticket.delete')){
    //     throw new Exception('Unauthorized Action');
    // }

    $this->ticketModel->deleteTicket($id);
    $this->cache->delete('tickets_list');
  }

  public function editTicket($id)
  {
    //  if(!$this->auth->can('ticket.update')){
    //     throw new Exception('Unauthorized Action');
    // }
    return $this->ticketModel->fetchTicket($id);
  }

  public function updateTicket($id, $data)
  {
    // if(!$this->auth->can('ticket.update')){
    //     throw new Exception('Unauthorized Action');
    // }
    log_message('error', 'Ticket updated - cache cleaned');

    $this->cache->delete('tickets_list');
    return $this->ticketModel->updateTicket($id, $data);
  }

  public function fetchEmail()
  {
    return $this->ticketModel->fetchEmail();
  }
}
