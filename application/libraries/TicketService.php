<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TicketService {

protected $loginModel;
protected $cache;
public function __construct(){
    
    $CI = &get_instance();
    $CI->load->model('LoginModel'); //since we are not in a controller, we must use $CI.
    $this->loginModel = $CI->LoginModel;  //Now your service can do: $this->loginModel->getUser($email); Instead of:$CI->LoginModel->getUser($email);

    $CI->load->driver('cache',['adapter'=>'file']);
    $this->cache =$CI->cache;
}

public function authen($email,$pass){


    
    $user = $this->loginModel->getUser($email);

    if(!$user){
                    // redirect(base_url('login'));
                    throw new Exception('User Not Found');
                }


    if($pass!=$user->password){
                    // redirect(base_url('login'));
                    throw new Exception('Invalid Password');

                }


    return[
        'id'=>$user->id,
        'email'=>$user->email,
        'role'=>$user->role
    ];

    
}


public function getHomeData($email,$role){
    return [
        'email'=>$email,
        'role'=>$role,

    ];
}

public function getTicketData(){

    $ticketCache = $this->cache->get('tickets_list');

    if($ticketCache!==FALSE){
        log_message('error','Ticket from Cache');
        return $ticketCache;
    }
        log_message('error','Ticket from DB');

    $ticketCache = $this->loginModel->getTicket();

    $this->cache->save('tickets_list',$ticketCache,600);

    return $ticketCache;
}

public function createTicket($title,$description){

    $data=[
    'title'=>$title,
    'description'=>$description,
    'priority'=>'Medium',
    'status'=>'Open'
    ];

    $this->loginModel->setTicket($data);
            log_message('error','Ticket created - cache cleaned');

    $this->cache->delete('tickets_list');
}


public function delTicket($id){
                log_message('error','Ticket deleted - cache cleaned');

    $this->loginModel->deleteTicket($id);
    $this->cache->delete('tickets_list');

}

public function editTicket($id){
   return $this->loginModel->fetchTicket($id);
}

public function updateTicket($id,$data){
                log_message('error','Ticket updated - cache cleaned');

    $this->cache->delete('tickets_list');
   return $this->loginModel->updateTicket($id,$data);
    

}
}