<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsNotes_model extends CI_Model {

  protected $main_table = 'protocols_notes';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('a.note_id, a.license_id, a.protocol_id,'.
                      'a.note_at, a.notes,'.
                      'a.user_id, u.full_name user_name');
    $this->db->from($this->main_table.' a');
    $this->db->join('protocols p', '(p.license_id=a.license_id and p.protocol_id=a.protocol_id)');
    $this->db->join('auth_users u', '(u.user_id=a.user_id)', 'left');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.protocol_id', $paParams['protocol_id']);
    $this->db->order_by('a.note_at');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(note_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->from($this->main_table.' a');
    $this->db->join('protocols p', '(p.license_id=a.license_id and p.protocol_id=a.protocol_id)');
    $this->db->join('auth_users u', '(u.user_id=a.user_id)', 'left');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.protocol_id', $paParams['protocol_id']);
    return $this->db->count_all_results();
  }

  function add($poRecord){
    $poRecord['license_id']     = fi_get_license();
    $poRecord['protocol_id']    = fi_get_protocol();
    $poRecord['user_id']        = fi_get_user();
    if ($poRecord['note_at']==NULL){
        $poRecord['note_at']    = Date("Y-m-d");
    }
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('note_id', $poRecord['note_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(note_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
