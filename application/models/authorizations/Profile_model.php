<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

  protected $main_table = 'auth_users_params';
  protected $tab_key  = 'user_id';

  public function __construct(){
    parent::__construct();
  }

  function get_by_key($psKey){
    $this->db->where('md5('.$this->tab_key.')', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function upd($poRecord){
    $this->db->where($this->tab_key, $poRecord[$this->tab_key]);
    return $this->db->update($this->main_table, $poRecord);
  }

  function upd_lines_page($poRecord){
    $this->db->set('lines_page', $poRecord['lines_page']);
    $this->db->where('md5('.$this->tab_key.')', $poRecord[$this->tab_key]);
    return $this->db->update($this->main_table);
  }

}
