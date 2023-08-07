<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TypesTests_model extends CI_Model {

  protected $main_table = 'types_tests';
  
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
    $this->db->where('md5(test_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    return $this->db->count_all_results($this->main_table);
  }
 
  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('test_id', $poRecord['test_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(test_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
