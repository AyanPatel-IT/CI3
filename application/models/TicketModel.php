<?php

class TicketModel extends CI_Model
{
  public function setTicket($data)
  {
    $query = $this->db->insert('tickets', $data);
  }

  //To display data into table
  public function getTicket()
  {
    $query = $this->db->get('tickets');
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
    $query = $this->db->update('tickets', $data, ['id' => $id]);
    return $query;
  }
}
