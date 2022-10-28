
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Das_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  // check if the user exists
  public function relation()
  {
    $this->db->select('*');
    $this->db->from('tbl_relationship');
    return $this->db->get()->result();
  }
  public function get_universities()
  {
    $this->db->select('*');
    $this->db->from('tbl_universities');
    return $this->db->get()->result();
  }
  public function get_institutes()
  {
    $this->db->select('*');
    $this->db->from('tbl_institute');
    $this->db->where('cat_institute = 1');

    return $this->db->get()->result();
  }

  public function get_academies()
  {
    $this->db->select('*');
    $this->db->from('tbl_institute');
    $this->db->where('cat_institute = 2');

    return $this->db->get()->result();
  }

  public function insert($data, $table)
  {
    $this->db->insert($table, $data);
    return $this->db->insert_id();
  }

  public function update($action, $id, $table, $cols)
  {
    $this->db->where($cols, $id);
    $this->db->update($table, $action);
    $updatedId = $this->db->get($table)->row()->id;
    return $updatedId;
  }

  public function validate($table, $where)
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

  public function get_data($where = null)
  {

    if ($where) {
      $this->db->select('table.*');
      $this->db->select('user.*');
      $this->db->select('rg.*');
      $this->db->select('uni.*');
      $this->db->from('tbl_data_univ table');
      $this->db->join('tbl_users user', 'user.id_user = table.user', 'LEFT');
      $this->db->join('tbl_universities uni', 'uni.id_university = table.university', 'LEFT');
      $this->db->join('tbl_ranges rg', 'rg.id_range = table.grado', 'LEFT');;
      $this->db->where($where);
      $query = $this->db->get();
      return $query->row();
    }
  }

  public function get_data_institute($where = null)
  {
    if ($where != "") {
      $this->db->select('table.*');
      $this->db->select('user.*');
      $this->db->select('rg.*');
      $this->db->select('ins.*');
      $this->db->from('tbl_data_institute table');
      $this->db->join('tbl_users user', 'user.id_user = table.user', 'LEFT');
      $this->db->join('tbl_institute ins', 'ins.id_institute = table.institute', 'LEFT');
      $this->db->join('tbl_ranges rg', 'rg.id_range = table.ins_grade', 'LEFT');

      $this->db->where($where);
      $query = $this->db->get();
      return $query->row();
    }
  }

  public function get_data_britanico($where = null)
  {
    if ($where != "") {
      $this->db->select('table.*');
      $this->db->select('user.*');
      $this->db->select('rg.*');
      $this->db->from('tbl_data_britanico table');
      $this->db->join('tbl_users user', 'user.id_user = table.user', 'LEFT');
      $this->db->join('tbl_ranges rg', 'rg.id_range = table.bri_grade', 'LEFT');
      $this->db->where($where);
      $query = $this->db->get();
      return $query->row();
    }
  }

  public function auth_row($table, $where)
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

  public function auth_range($where = null)
  {
    $this->db->select('table.*');
    $this->db->select('user.*');
    $this->db->from('tbl_users table');
    $this->db->join('tbl_ranges r', ' r.id_range = table.range_user', 'LEFT');
    $this->db->where($where);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_univ_list($where = null)
  {
    $this->db->select('table.*');
    $this->db->select('user.*');
    $this->db->select('uni.*');
    $this->db->from('tbl_data_univ table');
    $this->db->join('tbl_users user', 'user.id_user = table.user', 'LEFT');
    $this->db->join('tbl_universities uni', 'uni.id_university = table.university', 'LEFT');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_inst_list($where = null)
  {
    $this->db->select('table.*');
    $this->db->select('user.*');
    $this->db->select('ins.*');
    $this->db->from('tbl_data_institute table');
    $this->db->join('tbl_users user', 'user.id_user = table.user', 'LEFT');
    $this->db->join('tbl_institute ins', 'ins.id_institute = table.institute', 'LEFT');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_brit_list($where = null)
  {
    $this->db->select('table.*');
    $this->db->select('user.*');
    $this->db->from('tbl_data_britanico table');
    $this->db->join('tbl_users user', 'user.id_user = table.user', 'LEFT');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function delete($table, $id, $colum)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($colum, $id);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {

      $this->db->where($colum, $id);
      $this->db->delete($table);
      return true;
    } else {
      return false;
    }
  }
}
