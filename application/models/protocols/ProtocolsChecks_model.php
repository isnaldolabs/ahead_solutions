<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsChecks_model extends CI_Model {

  protected $main_table = 'protocols_checks';
  
  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('a.check_id, a.license_id, a.protocol_id,'.
                      'p.dt_start, a.dt_planned, a.dt_applied, a.notes,'.
                      'case a.status'.
                      ' when 2 then datediff(current_date(), a.dt_planned)'.    /* CHECK_STATUS_UPCOMING */
                      ' when 3 then datediff(current_date(), a.dt_planned)'.    /* CHECK_STATUS_DELAYED */
                      ' when 4 then datediff(a.dt_applied, current_date())'.    /* CHECK_STATUS_PROGRESS */
                      ' when 5 then null '.                                     /* CHECK_STATUS_CLOSED */
                      ' when 9 then null '.                                     /* CHECK_STATUS_CANCELED */
                      'else '.
                      ' datediff(current_date(), p.dt_start) '.                 /* 1_CHECK_STATUS_OPENED */
                      'end duration,'.
                      'a.description_id, b.name description_name,'.
                      'a.method_id, m.name method_name, a.status');
    $this->db->from($this->main_table.' a');
    $this->db->join('protocols p', '(p.license_id=a.license_id and p.protocol_id=a.protocol_id)');
    $this->db->join('checks_descriptions b', '(b.license_id=a.license_id and b.description_id=a.description_id)');
    $this->db->join('checks_methods m', '(m.license_id=a.license_id and m.method_id=a.method_id)', 'left');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.protocol_id', $paParams['protocol_id']);
    $this->db->order_by('a.dt_planned');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(check_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->from($this->main_table.' a');
    $this->db->join('protocols p', '(p.license_id=a.license_id and p.protocol_id=a.protocol_id)');
    $this->db->join('checks_descriptions b', '(b.license_id=a.license_id and b.description_id=a.description_id)');
    $this->db->join('checks_methods m', '(m.license_id=a.license_id and m.method_id=a.method_id)', 'left');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.protocol_id', $paParams['protocol_id']);
    return $this->db->count_all_results();
  }

  function get_list_descriptions($paParams){
    $this->db->select('a.description_id column_key, a.name column_name');
    $this->db->from('checks_descriptions a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_methods($paParams){
    $this->db->select('a.method_id column_key, a.name column_name');
    $this->db->from('checks_methods a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_protocols_teams($paParams){
    $this->db->select('a.team_type, a.team_id, a.name, a.email');
    $this->db->from('vi_protocols_teams a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.protocol_id', $paParams['protocol_id']);
    $this->db->where('a.email is not null');
    $this->db->order_by('a.team_type, a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    $poRecord['status'] = CHECK_STATUS_OPENED;
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('check_id', $poRecord['check_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(check_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
