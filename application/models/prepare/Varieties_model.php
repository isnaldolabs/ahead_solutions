<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Varieties_model extends CI_Model {

  protected $main_table = 'varieties';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('vr.variety_id, vr.license_id, vr.name,'.
                      'vr.maturity_id, mt.name maturation_name,'.
                      'vr.licensor_id, l.name licensor_name,'.
                      'vr.protection_term, vr.royalties');
    $this->db->from($this->main_table.' vr');
    $this->db->join('maturation mt', '(mt.license_id=vr.license_id and mt.maturity_id=vr.maturity_id)', 'left');
    $this->db->join('varieties_licensors l', '(l.license_id=vr.license_id and l.licensor_id=vr.licensor_id)', 'left');
    $this->db->where('vr.license_id', $paParams['license_id']);
    $this->db->order_by('name');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(variety_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function get_list_maturation($paParams){
    $this->db->select('a.maturity_id column_key, a.name column_name');
    $this->db->from('maturation a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_licensors($paParams){
    $this->db->select('a.licensor_id column_key, a.name column_name');
    $this->db->from('varieties_licensors a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('variety_id', $poRecord['variety_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(variety_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
