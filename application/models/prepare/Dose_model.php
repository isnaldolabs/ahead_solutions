<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dose_model extends CI_Model {

  protected $main_table = 'doses';
  
  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('d.dose_id, d.license_id, d.measure_id, d.dose, m.name measure_name');
    $this->db->from($this->main_table.' d');
    $this->db->join('measure_units m', '(m.license_id=d.license_id and m.measure_id=d.measure_id)');
    $this->db->where('d.license_id', $paParams['license_id']);
    $this->db->order_by('d.dose_id');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(dose_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    return $this->db->count_all_results($this->main_table);
  }
 
  function get_list_measure_units($paParams){
    $this->db->select('a.measure_id column_key, a.name column_name');
    $this->db->from('measure_units a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('dose_id', $poRecord['dose_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(dose_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
