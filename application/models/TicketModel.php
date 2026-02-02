<?php

use PhpParser\Node\Expr\Print_;

class TicketModel extends CI_Model
{
  public function fetchEmail()
  {
    $query = $this->db->select('name,id')
      ->get('users');

    return $query->result();
  }
  public function setTicket($data)
  {
    $query = $this->db->insert('tickets', $data);
  }

  //To display data into table
  public function getTicket($data)
  { //if role=user then only fetch those tickets
    // Print_r($data);
    // exit;
    if ($data['role'] === 'user') {

      $query = $this->db->get_where('tickets', ['user_id' => $data['id']]);
    }
    // return $query->result();
    else {
      $query = $this->db->get('tickets');
      // return $query->result();
    }
    return $query->result();
  }

  public function deleteTicket($id)
  {
    $query = $this->db->delete('tickets', ['id' => $id]);
  }

  //To display data into edit ticket form
  public function fetchTicket($id)
  {
    $query = $this->db->get_where('tickets', ['id' => $id]);
    // ->get('tickets');
    return $query->row();
  }

  public function updateTicket($id, $data)
  {
    // if($this->session->userdata('id')==$data[''])
    $query = $this->db->update('tickets', $data, ['id' => $id]);
    return $query;
  }
}
