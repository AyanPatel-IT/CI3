<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageController extends CI_Controller
{
    	public function index(){
            echo "i am index method - PageController new"; 
        }
        public function about(){
            echo "about us page"; 
        }

        public function blog($blog_url=''){
            echo "$blog_url"; 
	    $this->load->view('blogview');
        }

        public function demo(){
                // $test['title']='Code Igniter 3';
                $this->load->model('/StudentModel','stud');
                $title=$this->stud->demo();
                $test['title']=$title;
                $test['body']='footer';
              $this->load->view('demopage',$test);
        }
}

