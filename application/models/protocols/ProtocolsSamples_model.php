<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsSamples_model extends CI_Model {

  protected $main_table = 'protocols_samples';
  
  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('a.id, a.license_id, a.protocol_id, a.sample_id, b.name sample_name, b.order_by');
    $this->db->from($this->main_table.' a');
    $this->db->join('shared_protocols_samples b', '(b.sample_id=a.sample_id)', 'left');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.protocol_id', $paParams['protocol_id']);
    $this->db->order_by('b.order_by');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();      
  }

  function get_by_key($psKey){
    $this->db->where('md5(id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    $this->db->where('protocol_id', $paParams['protocol_id']);
    return $this->db->count_all_results($this->main_table);
  }
 
  function get_list_samples($paParams){
    $this->db->select('a.sample_id column_key, a.name column_name');
    $this->db->from('shared_protocols_samples a');
    $this->db->where('a.sample_id not in '. 
            '(select ps.sample_id from protocols_samples ps '.
              'where ps.license_id = '.$paParams['license_id'].
               ' and ps.protocol_id = '.$paParams['protocol_id'].')');
    $this->db->order_by('a.order_by', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('id', $poRecord['id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
