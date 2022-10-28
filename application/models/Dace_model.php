
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dace_model extends CI_Model
{
  function __construct()
	{
		parent::__construct();
	}

  // check if the user exists

  public function get_ranges($where)
  {
    $this->db->select('*');
    $this->db->from('tbl_ranges');
    $this->db->where($where);
    return $this->db->get()->result_array();
  }

  public function insert($data, $table)
  {
    $this->db->insert($table, $data);
    return $this->db->insert_id();
  }

  public function update($action, $id, $table)
  {
    $this->db->where('id_user', $id);
    $this->db->update($table, $action);
    $updatedId = $this->db->get($table)->row()->id;
    return $updatedId;
  }

  public function validate($table,$where)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($where);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return $query->num_rows();
    } else {
      return false;
    }
  }

  public function get_data($table,$where)
  {
    if ($where != NULL) {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($where);
      return $this->db->get()->result();
    }

  }

  public function auth_row($table , $where)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($where);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function list_dace($where)
  {
    $this->db->select('*');
    $this->db->from('tbl_form_dace');
    $this->db->where($where);
    return $this->db->get()->result();
    
  }

}
