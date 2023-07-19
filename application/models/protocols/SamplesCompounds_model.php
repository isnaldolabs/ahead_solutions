<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SamplesCompounds_model extends CI_Model {

  protected $main_table = 'samples_compounds';
  
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
    $this->db->select('s.license_id, s.protocol_id, s.sample_id, s.sketch_id,'.
                      's.compound_id, cp.name compound_name,'.
                      's.dt_sample, s.spot_id, s.num_compound');
    $this->db->from('samples_compounds s');
    $this->db->join('compounds cp', '(cp.license_id=s.license_id and cp.compound_id=s.compound_id)');
    $this->db->where('md5(s.sample_id)', $psKey);
    return $this->db->get()->result();
  }

  function get_count_all($paParams){
    $this->db->from('vi_protocols_sketches a');
    $this->db->where('a.license_id', $paParams['license_id']);      
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    return $this->db->count_all_results();
  }

  function get_list_compounds($paParams){
    $this->db->select('ppc.compound_id column_key, cp.name column_name');
    $this->db->from('protocols_products_compounds ppc');
    $this->db->join('compounds cp', '(cp.license_id=ppc.license_id and cp.compound_id=ppc.compound_id)');
    $this->db->where('ppc.license_id', $paParams['license_id']);
    $this->db->where('ppc.protocol_id', $paParams['protocol_id']);
    $this->db->where('ppc.treatment_id', $paParams['treatment_id']);
    $this->db->order_by('ppc.compound_id');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('sample_id', $poRecord['sample_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(sample_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
