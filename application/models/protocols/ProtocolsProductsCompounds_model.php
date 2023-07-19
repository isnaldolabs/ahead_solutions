<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsProductsCompounds_model extends CI_Model {

  protected $main_table = 'protocols_products_compounds';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('a.treatment_id, a.protocol_id, pp.parcel_id, a.license_id, d.plot_code,'.
                      'a.product_id, p.name product_name, m.name manufacturer_name,'.
                      'a.purchase_dt, a.dose, a.dose_cost,'.
                      'c.dt_planting, c.area, c.parcel_code,'.
                      'e.code farm_code, e.name farm_name');
    $this->db->from($this->main_table.' a');
    $this->db->join('protocols_products pp', '(pp.license_id=a.license_id and pp.protocol_id=a.protocol_id and pp.treatment_id=a.treatment_id)', 'left');
    $this->db->join('gu_parcels c', '(c.license_id=pp.license_id and c.parcel_id=pp.parcel_id)', 'left');
    $this->db->join('gu_plots d', '(d.license_id=c.license_id and d.plot_id=c.plot_id)', 'left');
    $this->db->join('gu_farms e', '(e.license_id=d.license_id and e.farm_id=d.farm_id)', 'left');
    $this->db->join('products p', '(p.license_id=a.license_id and p.product_id=a.product_id)', 'left');
    $this->db->join('manufacturers m', 'm.license_id=p.license_id and m.manufacturer_id=p.manufacturer_id', 'left');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.protocol_id', $paParams['protocol_id']);
    $this->db->where('a.treatment_id', $paParams['treatment_id']);
    $this->db->order_by('p.name');
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(setting_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);      
    $this->db->where('protocol_id', $paParams['protocol_id']);
    $this->db->where('treatment_id', $paParams['treatment_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function get_list_compounds($paParams){
    $this->db->select('a.compound_id column_key, a.name column_name');
    $this->db->from('compounds a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('setting_id', $poRecord['setting_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(setting_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
