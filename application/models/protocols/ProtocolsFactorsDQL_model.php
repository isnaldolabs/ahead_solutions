<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsFactorsDQL_model extends CI_Model {

  protected $main_table = 'protocols_factors_dql';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('a.factor_id, a.license_id, a.protocol_id,'.
            'a.factor_id_c, b.name factor_c_name,'.
            'a.factor_id_q, c.name factor_q_name');
    $this->db->from($this->main_table.' a');
    $this->db->join('factors_dql b', '(b.license_id=a.license_id and b.factor_id=a.factor_id_c)', 'left');
    $this->db->join('factors_dql c', '(c.license_id=a.license_id and c.factor_id=a.factor_id_q)', 'left');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.protocol_id', $paParams['protocol_id']);
    $this->db->order_by('a.factor_id');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(factor_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    $this->db->where('protocol_id', $paParams['protocol_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function get_list_factors_dql($paParams){
    $this->db->select('a.factor_id column_key, a.name column_name');
    $this->db->from('factors_dql a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('factor_id', $poRecord['factor_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(factor_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
