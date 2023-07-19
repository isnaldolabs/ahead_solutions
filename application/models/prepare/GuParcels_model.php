<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuParcels_model extends CI_Model {

  protected $main_table = 'gu_parcels';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('gp.parcel_id, gp.parcel_code, gp.plot_id, gp.license_id, gp.area, gp.dt_planting,'.
        'gf.farm_id, gf.farm_id farm_code, gf.name farm_name,'.
        'gt.block_code, gt.plot_code, sm.plot_area,'.
        'gp.variety_id, v.variety_id variety_code, v.name variety_name, v.maturity_id, m.name maturity_name');
    $this->db->from('gu_parcels gp');
    $this->db->join('gu_plots gt', '(gt.license_id=gp.license_id and gt.plot_id=gp.plot_id)');
    $this->db->join('(select sm.license_id, sm.plot_id, round(sum(sm.area),3) plot_area'.
		      ' from gu_parcels sm'.
		     ' where sm.license_id = '.$paParams['license_id'].
                     '   and sm.plot_id = '.$paParams['plot_id'].
		     ' group by sm.license_id, sm.plot_id) sm', '(sm.license_id=gp.license_id and sm.plot_id=gp.plot_id)');
    $this->db->join('gu_farms gf', '(gf.license_id=gt.license_id and gf.farm_id=gt.farm_id)');
    $this->db->join('varieties v', '(v.license_id=gp.license_id and v.variety_id=gp.variety_id)');
    $this->db->join('maturation m', '(m.maturity_id=v.maturity_id)');
    $this->db->where('gp.license_id', $paParams['license_id']);
    $this->db->where('gp.plot_id', $paParams['plot_id']);
    $this->db->order_by('gp.plot_id, gp.parcel_code');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(parcel_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    $this->db->where('plot_id', $paParams['plot_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function get_list_variety($paParams){
    $this->db->select('a.variety_id column_key, a.name column_name');
    $this->db->from('varieties a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('parcel_id', $poRecord['parcel_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(parcel_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
