<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentController extends CI_Controller{
    public function index(){
        $this->load->model('/StudentModel','stud');
    //    $student = new StudentModel;
    //   echo "Name : ". $student->student_data();
        $student= $this->stud->student_data();
        // $student_class= $this->stud->student_class();
        echo "Name: ".$student;
        // echo "Class: ".$student_class;
    }
    public function show($id){
        // echo $id;
        $this->load->model('/StudentModel','stud');
        $stud_show=$this->stud->student_shows($id);
        echo $stud_show;
    }

    
}
?>