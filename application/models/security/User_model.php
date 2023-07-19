<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  protected $main_table = 'auth_users';

  public function __construct(){
    parent::__construct();
  }

  function get_all($pi_limit = 0, $pi_offset = 0){
    $this->db->order_by('full_name');
    if ($pi_limit > 0){
      $this->db->limit($pi_limit, $pi_offset);
    }
    return $this->db->get($this->main_table)->result();
  }

  function get_by_key($psKey){
    $this->db->select('us.user_id, us.email, us.nick_name, us.full_name, us.active');
    $this->db->from($this->main_table.' us');
    $this->db->where('md5(us.user_id)', $psKey);
    return $this->db->get()->result();
  }

  function get_count_all(){
    return $this->db->count_all_results($this->main_table);
  }

  function add($poRecord){
    $lsCryptPass = md5($poRecord['nick_name']);
    $poRecord['password'] = $lsCryptPass;
    $poRecord['active'] = ACTIVE_YES;
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('user_id', $poRecord['user_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function del($piKey=NULL){
    if($piKey){
      $this->db->where('md5(user_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

  function upd_user_season($piLicense, $piUser, $piSeason){
    $this->db->set('season_id_last', $piSeason);
    $this->db->where('license_id', $piLicense);
    $this->db->where('user_id', $piUser);
    $this->db->update('auth_users_licenses');
    if($this->db->trans_status()==TRUE){
      $this->db->trans_commit();
      return TRUE;
    }else{
      $this->db->trans_rollback();
      return FALSE;
    }
  }

    function upd_user_license($piUser, $piLicense){
        $this->db->set('license_id_last', $piLicense);
        $this->db->where('user_id', $piUser);
        $this->db->update('auth_users');
        if($this->db->trans_status()==TRUE){
            $this->db->trans_commit();
            return TRUE;
        }else{
            $this->db->trans_rollback();
            return FALSE;
        }
    }

}
