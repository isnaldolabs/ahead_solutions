<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsStationWeathers_model extends CI_Model {

  protected $main_table = 'protocols_station_weathers';
  
  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('a.id, a.license_id, a.protocol_id, a.station_id, b.name station_name');
    $this->db->from($this->main_table.' a');
    $this->db->join('weathers_station b', '(b.license_id=a.license_id and b.station_id=a.station_id)', 'left');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.protocol_id', $paParams['protocol_id']);
    $this->db->order_by('b.name');
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
 
  function get_list_station($paParams){
    $this->db->select('a.station_id column_key, a.name column_name');
    $this->db->from('weathers_station a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
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
