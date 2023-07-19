<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResearchSubLine_model extends CI_Model {

  protected $main_table = 'research_sublines';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('sl.license_id, sl.line_id, sl.subline_id, sl.name, sl.description, ln.name line_name');
    $this->db->from($this->main_table.' sl');
    $this->db->join('research_lines ln', '(ln.license_id=sl.license_id and ln.line_id=sl.line_id)');
    $this->db->where('sl.license_id', $paParams['license_id']);
    $this->db->order_by('ln.name, sl.name');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(subline_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function get_list_lines($paParams){
    $this->db->select('a.line_id column_key, a.name column_name');
    $this->db->from('research_lines a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('subline_id', $poRecord['subline_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(subline_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
