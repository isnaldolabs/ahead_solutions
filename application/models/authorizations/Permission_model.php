<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission_model extends CI_Model {

  protected $main_table = 'auth_permissions';
  protected $tab_key  = 'permission_id';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('pr.permission_id, pr.license_id, pr.group_id,'.
                      'pr.function_id, fn.name function_name, pr.level,'.
                      'gr.name group_name, gr.is_admin');
    $this->db->from($this->main_table.' pr');
    $this->db->join('auth_groups gr', '(gr.group_id=pr.group_id)');
    $this->db->join('auth_functions fn', '(fn.function_id=pr.function_id)');
    $this->db->where('pr.license_id', $paParams['license_id']);
    $this->db->order_by('pr.group_id, fn.order_by asc');
    return $this->db->get()->result();
  }

  function get_level($piUser, $piFunction){
    $this->db->select('pr.level');
    $this->db->from('auth_permissions pr');
    $this->db->join('auth_users_groups ug', '(ug.group_id=pr.group_id)');
    $this->db->where('pr.license_id', 1);
    $this->db->where('pr.function_id', $piFunction);
    $this->db->where('ug.user_id', $piUser);
    $this->db->limit(1);
    return $this->db->get()->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function upd($psKey, $piLevel){
    $this->db->where('md5(permission_id)', $psKey);
    $this->db->set('level', $piLevel);
    $this->db->update($this->main_table);
    if($this->db->trans_status()==TRUE){
      $this->db->trans_commit();
      return TRUE;
    }else{
      $this->db->trans_rollback();
      return FALSE;
    }
  }

}
