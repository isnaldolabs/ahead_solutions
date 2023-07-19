<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupConfig_model extends CI_Model {

  protected $main_table = 'auth_users_groups';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('usg.user_group_id, usg.user_id, us.full_name, us.email, us.nick_name, us.active,'.
                      'usg.group_id, gr.name group_name, gr.is_admin');
    $this->db->from($this->main_table.' usg');
    $this->db->join('auth_users us', '(us.user_id=usg.user_id)');
    $this->db->join('auth_groups gr', '(gr.license_id=usg.license_id and gr.group_id=usg.group_id)');
    $this->db->where('usg.license_id', $paParams['license_id']);
    $this->db->order_by('us.full_name');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_count_all($paParams){
    $this->db->from($this->main_table.' usg');
    $this->db->join('auth_groups gr', '(gr.license_id=usg.license_id and gr.group_id=usg.group_id)', 'left');
    $this->db->join('auth_users us', '(us.user_id=usg.user_id)');
    $this->db->where('usg.license_id', $paParams['license_id']);
    return $this->db->count_all_results();
  }

  function get_list_groups($paParams){
    $this->db->select('a.group_id column_key, a.name column_name');
    $this->db->from('auth_groups a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function upd($key, $piGroup){
    $this->db->set('group_id', $piGroup);
    $this->db->where('md5(user_group_id)', $key);
    return $this->db->update($this->main_table);
  }

}
