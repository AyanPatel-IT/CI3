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
  {
    // if ($data['role'] === 'user'){
    //   $this->db->where('user_id', $data['id']);
    //   if (!empty($data['filterStatus'])) {
    //     $this->db->where('status', $data['filterStatus']);
    //   }
    //   $query = $this->db->get('tickets');
    //   return $query->result();
    // } else if ($data['role'] === 'admin') {
    //   if (!empty($data['filterStatus'])) {
    //     $this->db->where('status', $data['filterStatus']);
    //   }
    //   $query = $this->db->get('tickets');
    //   return $query->result();
    // }

    if ($data['role'] !== 'admin') {
      $this->db->where('user_id', $data['id']);
    }
    if (!empty($data['filterStatus'])) {
      $this->db->where('status', $data['filterStatus']);
    }
    if (!empty($data['filterPriority'])) {
      $this->db->where('priority', $data['filterPriority']);
    }
    if (!empty($data['searchbar'])) {
      $this->db->like('title', $data['searchbar'])
        ->or_like('comments', $data['searchbar'])
        ->or_like('description', $data['searchbar']);
    }
    $query = $this->db->get('tickets');
    return $query->result();
  }

  public function deleteTicket($id)
  {
    $this->db->delete('tickets', ['id' => $id]);
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
