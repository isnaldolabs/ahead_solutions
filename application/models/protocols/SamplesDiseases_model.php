<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SamplesDiseases_model extends CI_Model {

  protected $main_table = 'samples_diseases';
  
  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('a.protocol_id, a.sketch_id, a.num_block,'.
                      'a.treatment_id, a.variety_id, a.treatment_name, a.num_order,'.
                      'a.farm_code, a.farm_name, a.block_code, a.plot_id, a.plot_code,'.
                      'a.parcel_id, a.parcel_code');
    $this->db->from('vi_protocols_sketches a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->order_by('a.num_block, a.num_order');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(sample_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->from('vi_protocols_sketches a');
    $this->db->where('a.license_id', $paParams['license_id']);      
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    return $this->db->count_all_results();
  }

  function get_list_diseases($paParams){
    $this->db->select('a.disease_id column_key, a.name column_name');
    $this->db->from('diseases a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert('samples_diseases', $poRecord);
  }

  function upd($poRecord){
    $this->db->where('sample_id', $poRecord['sample_id']);
    return $this->db->update('samples_diseases', $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(sample_id)', $piKey);
      return $this->db->delete('samples_diseases');
    }
  }

}
