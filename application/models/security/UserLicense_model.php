<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserLicense_model extends CI_Model {

  protected $main_table = 'auth_users_licenses';
  
  public function __construct(){
    parent::__construct();
  }

  function get_all($piLimit = 0, $piStart = 0){
    $this->db->select('aul.user_license_id,'.
                      'aul.license_id, al.name license_name, al.short_name license_short_name,'.
                      'aul.user_id, au.full_name, au.nick_name, au.email, au.active');
    $this->db->from('auth_users_licenses aul');
    $this->db->join('auth_users au', '(au.user_id=aul.user_id)');
    $this->db->join('auth_licenses al', '(al.license_id=aul.license_id)');
    $this->db->order_by('al.name, au.full_name');
    if ($piLimit > 0){
      $this->db->limit($piLimit, $piStart);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(user_license_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all(){
    return $this->db->count_all_results($this->main_table);
  }

  function get_list_licenses(){
    $this->db->select('a.license_id column_key, a.name column_name');
    $this->db->from('auth_licenses a');
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_users(){
    $this->db->select('a.user_id column_key, a.full_name column_name');
    $this->db->from('auth_users a');
    $this->db->order_by('a.full_name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    $this->db->insert($this->main_table, $poRecord);
    return $this->db->error();
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(user_license_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
