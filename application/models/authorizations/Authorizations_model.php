<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorizations_model extends CI_Model {

  protected $main_table = 'auth_users';

  public function __construct(){
    parent::__construct();
  }

  function get_by_key($psKey){
    $this->db->select('us.user_id, us.email, us.nick_name, us.full_name, us.active,'.
                      'gr.group_id, gr.name group_name, gr.is_admin');
    $this->db->from($this->main_table.' us');
    $this->db->join('auth_users_licenses ul', '(ul.user_id=us.user_id)');
    $this->db->join('auth_users_groups ug', '(ug.license_id=ul.license_id and ug.user_id=us.user_id)');
    $this->db->join('auth_groups gr', '(gr.group_id=ug.group_id)');
    $this->db->where('md5(us.'.$this->tab_key.')', $psKey);
    return $this->db->get()->result();
  }

  /* Método para validar o acesso do usuário através de email e a senha */
  function getCheckPermission($psEmail, $psPass){
    $this->db->select('us.user_id, us.email, us.nick_name, us.full_name,'.
                      'us.license_id_last, al.license_id, al.name license_name, al.short_name license_short_name,'.
                      'ag.name group_name, ag.is_admin,'.
                      'ul.season_id_last, se.name season_name,'.
                      'ap.lines_page');
    $this->db->from('auth_users us');
    $this->db->join('auth_users_params ap', '(ap.user_id=us.user_id)');
    $this->db->join('auth_users_licenses ul', '(ul.license_id=us.license_id_last and ul.user_id=us.user_id)');
    $this->db->join('auth_users_groups gr', '(gr.license_id=ul.license_id and gr.user_id=us.user_id)');
    $this->db->join('auth_groups ag', '(ag.license_id=gr.license_id and ag.group_id=gr.group_id)');
    $this->db->join('auth_licenses al', '(al.license_id=ul.license_id)');
    $this->db->join('auth_licenses_details ld', '(ld.license_id=al.license_id)');
    $this->db->join('seasons se', '(se.license_id=ul.license_id and se.season_id=ul.season_id_last)', 'left');
    $this->db->where('us.active', ACTIVE_YES);
    $this->db->where('ag.active', ACTIVE_YES);
    $this->db->where('ld.active', ACTIVE_YES);
    $this->db->where('us.email', $psEmail);
    $this->db->where('us.password', md5($psPass));
    return $this->db->get()->result();
  }

  /* Método para validar o email */
  function getUserByEmail($psEmail){
    $this->db->where('email', $psEmail);
    $this->db->where('active', ACTIVE_YES);
    return $this->db->get($this->main_table)->result();
  }


  /* Adiciona um novo registro à tabela de recover. */
  function add_recover($poRecord){
    $poRecord['password_before'] = $poRecord['password_before'];
    $poRecord['recovered_at'] = NULL;
    $poRecord['status'] = RECOVER_STATUS_OPEN;
    return $this->db->insert('auth_users_recover', $poRecord);
  }

  /* Check whether link for resetting of password is valid and it returns TRUE or FALSE. */
  function getResetPasswordValid($psKey, $psCode){
    $this->db->select('rec.status, (timestampdiff(minute, now(), rec.created_at)) minutes_diff');
    $this->db->from('auth_users_recover rec');
    $this->db->where('md5(rec.email)', $psKey);
    $this->db->where('rec.recover_key', $psKey);
    $this->db->where('rec.recover_code', $psCode);
    $this->db->where('rec.status', RECOVER_STATUS_OPEN);
    $loDataSet = $this->db->get()->result();
    if((count($loDataSet)==1) and ($loDataSet[0]->minutes_diff <= 60)){
      $lbValid=TRUE;
    }else{
      $lbValid=FALSE;
    }
    return $lbValid;
  }

  function get_security_valid($psSecurity){
    $this->db->select('count(*) security_ok');
    $this->db->from('auth_security');
    $this->db->where('md5(security)', $psSecurity);
    $loDataSet = $this->db->get()->result();
    if((count($loDataSet)==1) and ($loDataSet[0]->security_ok==1)){
      $lbValid=TRUE;
    }else{
      $lbValid=FALSE;
    }
    return $lbValid;
  }

  function get_email_recover($psKey, $psCode){
    $this->db->select('a.user_id, a.email');
    $this->db->from('auth_users_recover a');
    $this->db->where('md5(a.email)', $psKey);
    $this->db->where('a.recover_key', $psKey);
    $this->db->where('a.recover_code', $psCode);
    $this->db->where('a.status', RECOVER_STATUS_OPEN);
    $this->db->where('a.recovered_at', NULL);
    return $this->db->get()->result();
  }

  function upd_recover_status($psKey, $psCode){
    $this->db->set('status', RECOVER_STATUS_APPLIED);
    $this->db->set('recovered_at', date('Y-m-d H:i:s'));
    $this->db->where('md5(email)', $psKey);
    $this->db->where('status', 1);
    $this->db->where('recover_key', $psKey);
    $this->db->where('recover_code', $psCode);
    $this->db->update('auth_users_recover');
    if($this->db->trans_status()==TRUE){
      $this->db->trans_commit();
      return TRUE;
    }else{
      $this->db->trans_rollback();
      return FALSE;
    }
  }

    function upd_password($psKey, $psPassword){
        $this->db->set('password', md5($psPassword));
        $this->db->where('md5(email)', $psKey);
        $this->db->where('active', ACTIVE_YES);
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
