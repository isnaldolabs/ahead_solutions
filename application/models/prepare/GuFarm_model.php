<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuFarm_model extends CI_Model {

  protected $main_table = 'gu_farms';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('gf.license_id, gf.farm_id, gf.code, gf.name,'.
                      'gp.distance, gp.total_area, gp.tons,'.
                      'sm.season_dist, sm.season_area, sm.season_tons');
    $this->db->from('gu_farms gf');
    $this->db->join('(select gp.license_id, gp.season_id, gp.farm_id,'.
                           ' round(avg(gp.distance),3) distance,'.
       			   ' round(sum(gp.total_area),3) total_area,'.
       			   ' round(sum(gp.tons),3) tons'.
		      ' from gu_plots gp'.
		     ' where gp.license_id = '.$paParams['license_id'].
                     '   and gp.season_id = '.$paParams['season_id'].
		     ' group by gp.license_id, gp.season_id, gp.farm_id) gp', '(gp.license_id=gf.license_id and gp.farm_id=gf.farm_id)', 'left');
    $this->db->join('(select sm.license_id, sm.season_id,'.
                           ' round(avg(sm.distance),3) season_dist,'.
       			   ' round(sum(sm.total_area),3) season_area,'.
       			   ' round(sum(sm.tons),3) season_tons'.
		      ' from gu_plots sm'.
		     ' where sm.license_id = '.$paParams['license_id'].
                     '   and sm.season_id = '.$paParams['season_id'].
		     ' group by sm.license_id, sm.season_id) sm', '(sm.license_id=gf.license_id)', 'left');
    $this->db->where('gf.license_id', $paParams['license_id']);
    $this->db->order_by('gf.name');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(farm_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function get_list_business_units($paParams){
    $this->db->select('a.unit_id column_key, a.name column_name');
    $this->db->from('business_units a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('farm_id', $poRecord['farm_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey){
    if($piKey){
      $this->db->where('md5(farm_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
