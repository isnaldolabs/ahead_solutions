<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class License_model extends CI_Model {

  protected $main_table = 'auth_licenses';
  
  public function __construct(){
    parent::__construct();
  }

  function get_all($piLimit = 0, $piStart = 0){
    $this->db->order_by('name, license_id asc');
    if ($piLimit > 0){
      $this->db->limit($piLimit, $piStart);
    }
    return $this->db->get($this->main_table)->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(license_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all(){
    return $this->db->count_all_results($this->main_table);
  }
 
  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('license_id', $poRecord['license_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(license_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
