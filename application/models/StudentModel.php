<?php

class StudentModel extends CI_Model{
  public function student_data(){
    $student_class= $this->student_class();
    return $stud_name="Test" ."Class: ".$student_class;
  }  

   private function student_class(){
      return $stud_class="IT";
   }

   public function student_shows($id){
    if($id == '1'){
        return $result ='User 1';
    }elseif($id == '2'){
        return $result ='User 2';
    }

   }



   public function demo(){
    return $title = 'Code Igniter 3.Inside model';
   }
}

?>