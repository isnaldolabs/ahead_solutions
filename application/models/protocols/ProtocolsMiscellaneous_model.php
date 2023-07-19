<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsMiscellaneous_model extends CI_Model {

  protected $main_table = 'protocols_miscellaneous';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('a.treatment_id, a.protocol_id, a.parcel_id, a.license_id, d.plot_code,'.
                      'a.misc_id, m.name miscellaneous_name,'.
                      'c.dt_planting, c.area, c.parcel_code,'.
                      'e.code farm_code, e.name farm_name');
    $this->db->from($this->main_table.' a');
    $this->db->join('gu_parcels c', '(c.license_id=a.license_id and c.parcel_id=a.parcel_id)', 'left');
    $this->db->join('gu_plots d', '(d.license_id=c.license_id and d.plot_id=c.plot_id)', 'left');
    $this->db->join('gu_farms e', '(e.license_id=d.license_id and e.farm_id=d.farm_id)', 'left');
    $this->db->join('miscellaneous m', '(m.license_id=a.license_id and m.misc_id=a.misc_id)', 'left');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.protocol_id', $paParams['protocol_id']);
    $this->db->order_by('m.name');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(treatment_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);      
    $this->db->where('protocol_id', $paParams['protocol_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function get_list_parcels_misc($paParams){
    $this->db->select('b.parcel_id column_key, c.name column_name');
    $this->db->from('protocols_gu_plots a');
    $this->db->join('gu_parcels b', '(b.license_id=a.license_id and b.plot_id=a.plot_id)');
    $this->db->join('varieties c', '(c.license_id=b.license_id and c.variety_id=b.variety_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.protocol_id', $paParams['protocol_id']);
    $this->db->order_by('c.name', '');
    return $this->db->get()->result();
  }

  function get_list_misc($paParams){
    $this->db->select('a.misc_id column_key, a.name column_name');
    $this->db->from('miscellaneous a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('treatment_id', $poRecord['treatment_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(treatment_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
