<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller{

        protected $TicketService;   
//     public function __construct(){
//         parent::__construct();
            
//         $allowed = ['logout', 'login']; // functions that don't need login

//     // Protect all other functions
//        if (!in_array($this->router->fetch_method(), $allowed)) {
//         if(!$this->session->userdata('email')){
//             redirect(base_url('login'));
//         }
//     }
// }

    public function index(){

        
        $this->load->view('prjTemplate/header');
        $this->load->view('project/login');
        $this->load->view('prjTemplate/footer');

    }

        public function authenticate(){

            // $this->load->library('form_validation');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('pass','password','required');

            if(!$this->form_validation->run()){
                return $this->index();
            }
 //---------------------------------------------------------           
                $email=$this->input->post('email');
                $pass=$this->input->post('pass');


                // $this->load->model('LoginModel');
                // $user = $this->LoginModel->getUser($email);
                
                // if(!$user){
                //     redirect(base_url('login'));
                // }
                
                 try{
                    
                    $this->load->library('TicketService');
                    // $this->TicketService = new TicketService();

                    $user = $this->ticketservice->authen($email,$pass);

                    $this->session->set_userdata([
                        'email'=>$user['email'],
                        'role'=>$user['role'],
                    ]);

                // $this->session->set_userdata('email',$user->email);
                // $this->session->set_userdata('role',$user->role);

                // if($pass!=$user->password){
                //     redirect(base_url('login'));
                // }



                redirect(base_url('homepage'));
                exit;
                 }catch(Exception $e){
                    // show_error($e->getMessage(),401);
                    $this->session->set_flashdata('error', $e->getMessage());
                    redirect(base_url('login'));
                 }
              
           
    }

    public function home(){
        // $data=[
        //     'email'=>$this->session->userdata('email'),
        //     'role'=>$this->session->userdata('role'),
        // ];

        //--
          $email=$this->session->userdata('email');
          $role=$this->session->userdata('role');

          $this->load->library('TicketService');
          $data = $this->ticketservice->getHomeData($email,$role);
        //--
        $this->load->view('prjTemplate/header');
        $this->load->view('project/homepage',$data);
        $this->load->view('prjTemplate/footer');
    }
//--------------------------------------------TICKETS MODULE----------------------------------------------------------------
    public function tickets(){
    
        // $data['role'] =$this->session->userdata('role');
        // $this->load->model('/LoginModel');
        // $data['tickets']=$this->LoginModel->getTicket();

        // $data=array_merge($data,$roleSession); not needed
        //--
        $data['role'] = $this->session->userdata('role');
        
        $tickets = $this->ticketservice->getTicketData();
        $data['tickets']=$tickets;
        //--
        $this->load->view('prjTemplate/header');
        $this->load->view('project/TicketModule',$data);
        $this->load->view('prjTemplate/footer');        
    }

        public function raise_ticket(){
        $this->load->view('prjTemplate/header');
        $this->load->view('project/RaiseTicket');
        $this->load->view('prjTemplate/footer');        
    }


        public function create_ticket(){
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('description','Description','required|min_length[20]');

            if(!$this->form_validation->run()){
                return $this->raise_ticket();}

                // $data=[
                //     'title'=>$this->input->post('title'),
                //     'description'=>$this->input->post('description'),
                //     'priority'=>'Medium',  //Default values taken as - Medium,Open
                //     'status'=>'Open'

                // ];

                // $this->load->model('/LoginModel');
                // $this->LoginModel->setTicket($data);
                //--
                $title= $this->input->post('title');
                $description=$this->input->post('description');

                $this->ticketservice->createTicket($title,$description);
                //--
                redirect(base_url('tickets'));
       
}

public function delete_ticket($id){
    //--
    $this->ticketservice->delTicket($id);
    //--
    
    // $this->load->model('/LoginModel');
    // $this->LoginModel->deleteTicket($id);

    redirect(base_url('tickets'));
}

public function edit_ticket($id){
    
         $this->load->view('prjTemplate/header');

        //  $this->load->model('/LoginModel');
        //  $data['ticket']=$this->LoginModel->fetchTicket($id);
        //--
         $data['ticket'] = $this->ticketservice->editTicket($id);
        //--
         $this->load->view('project/EditTicket',$data);
         $this->load->view('prjTemplate/footer'); 

}


public function update_ticket($id){
        
        $data=[
            'comments'=>$this->input->post('comments'),
            'priority' => $this->input->post('priority'),
            'status' => $this->input->post('status')
        ];

        $this->ticketservice->updateTicket($id,$data);

        // $this->load->model('/LoginModel');
        // $this->LoginModel->updateTicket($id,$data);
        redirect(base_url('tickets'));

}

public function logout(){
    $this->session->sess_destroy();
    echo "You have been Logged Out!!";
    redirect(base_url('login'));
}

// public function test_cache()
// {
//     $this->load->driver('cache', ['adapter' => 'file']);

// var_dump($this->cache->save('abc', '123', 600));
// var_dump($this->cache->get('abc'));
// exit;

// }

}

