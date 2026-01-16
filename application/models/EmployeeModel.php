<?php 

class EmployeeModel extends CI_Model{


    public function fetchEmp(){
        // $query= $this->db->query('SELECT id,fname,lname,phone,email FROM Emp');

        // foreach ($query->result_array() as $row) {
            
        //     echo $row['id'];            
        //     echo $row['fname'];
        //     echo $row['lname'];
        //     echo $row['phone'];
        //     echo $row['email'];

        // }

        $query=$this->db->get('Emp');
        return $query->result();

    }
    public function insertEmployee($data){

      return $this->db->insert('Emp',$data);
    }

    public function editEmp($id){

      $query=$this->db->get_where('Emp',['id'=>$id]);
      return $query->row();
    }

     public function update($data,$id){

    return $query=$this->db->update('Emp',$data,['id'=>$id]);

    }


    public function deleteEmp($id)  {
      
     return $this->db->delete('Emp',['id'=>$id]);
     
    }

  }