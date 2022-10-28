
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Be_model extends CI_Model
{
    //Count table rows

    public function record($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function get_univ_list($where = null)
    {
      $this->db->select('table.*');
      $this->db->select('user.*');
      $this->db->select('uni.*');
      $this->db->from('tbl_data_univ table');
      $this->db->join('tbl_users user', 'user.id_user = table.user', 'LEFT');
      $this->db->join('tbl_universities uni', 'uni.id_university = table.university', 'LEFT');
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
      return $this->db->get()->result();
    }
  
    public function get_brit_list($where = null)
    {
      $this->db->select('table.*');
      $this->db->select('user.*');
      $this->db->from('tbl_data_britanico table');
      $this->db->join('tbl_users user', 'user.id_user = table.user', 'LEFT');
      return $this->db->get()->result();
    }
    public function list_dace($where = null)
    {
      $this->db->select('*');
      $this->db->from('tbl_form_dace');
      return $this->db->get()->result();
      
    }
}
