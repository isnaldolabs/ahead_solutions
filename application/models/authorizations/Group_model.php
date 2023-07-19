<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_model extends CI_Model {

  protected $main_table = 'auth_groups';
  protected $tab_key  = 'group_id';
  
  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);      
    $this->db->order_by('name');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get($this->main_table)->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5('.$this->tab_key.')', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);      
    return $this->db->count_all_results($this->main_table);
  }

  function get_all_combo($ps_field = '', $ps_ordem = 'asc'){
    $this->db->select('a.group_id, a.name');
    $this->db->from($this->main_table.' a');
    if ($ps_field != ''){
      $this->db->order_by($ps_field, $ps_ordem);
    }
    return $this->db->get()->result();
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5('.$this->tab_key.')', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where($this->tab_key, $poRecord[$this->tab_key]);
    return $this->db->update($this->main_table, $poRecord);
  }

}
