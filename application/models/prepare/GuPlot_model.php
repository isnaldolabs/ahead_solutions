<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuPlot_model extends CI_Model {

  protected $main_table = 'gu_plots';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('gp.plot_id, gp.license_id, gp.season_id,'.
        'gp.farm_id, gf.farm_id farm_code, gf.name farm_name,'.
        'gp.block_code, gp.plot_code, gp.region_id, gr.name region_name,'.
        'gp.variety_id, v.variety_id variety_code, v.name variety_name, v.maturity_id, m.name maturity_name,'.
        'gp.cutting_id, c.name cutting_name,'.
        'gp.soil_id, s.name soil_name,'.
        'gp.environment_id, e.name environment_name,'.
        'gp.spacing_id, sp.name spacing_name,'.
        'gp.distance, gp.total_area, gp.production_area, gp.tons, gp.cut_tons,'.
        'gp.dt_planting, gp.dt_cutting,'.
        'sm.season_dist, sm.season_area, sm.season_tons');
    $this->db->from('gu_plots gp');
    $this->db->join('(select sm.license_id, sm.season_id, sm.farm_id,'.
                           ' round(avg(sm.distance),3) season_dist,'.
       			   ' round(sum(sm.total_area),3) season_area,'.
       			   ' round(sum(sm.tons),3) season_tons'.
		      ' from gu_plots sm'.
		     ' where sm.license_id = '.$paParams['license_id'].
                     '   and sm.season_id = '.$paParams['season_id'].
                     '   and sm.farm_id = '.$paParams['farm_id'].
		     ' group by sm.license_id, sm.season_id, sm.farm_id) sm', '(sm.license_id=gp.license_id and sm.season_id=gp.season_id and sm.farm_id=gp.farm_id)');
    $this->db->join('gu_farms gf', '(gf.license_id=gp.license_id and gf.farm_id=gp.farm_id)');
    $this->db->join('gu_regions gr', '(gr.license_id=gp.license_id and gr.region_id=gp.region_id)', 'left');
    $this->db->join('varieties v', '(v.license_id=gp.license_id and v.variety_id=gp.variety_id)');
    $this->db->join('maturation m', '(m.maturity_id=v.maturity_id)');
    $this->db->join('cuttings c', '(c.license_id=gp.license_id and c.cutting_id=gp.cutting_id)');
    $this->db->join('soils s', '(s.license_id=gp.license_id and s.soil_id=gp.soil_id)');
    $this->db->join('environments e', '(e.license_id=gp.license_id and e.environment_id=gp.environment_id)', 'left');
    $this->db->join('spacing sp', '(sp.license_id=gp.license_id and sp.spacing_id=gp.spacing_id)', 'left');
    $this->db->where('gp.license_id', $paParams['license_id']);
    $this->db->where('gp.farm_id', $paParams['farm_id']);
    $this->db->where('gp.season_id', $paParams['season_id']);
    $this->db->order_by('gp.farm_id, gp.block_code, gp.plot_code');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(plot_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_by_farm($piFarm){
    $this->db->select('gp.plot_id, gp.license_id, gp.season_id,'.
        'gp.farm_id, gf.code farm_code, gf.name farm_name,'.
        'gp.block_code, gp.plot_code, gp.region_id, gr.name region_name,'.
        'gp.variety_id, v.code variety_code, v.name variety_name, v.maturity_id, m.name maturity_name,'.
        'gp.cutting_id, c.name cutting_name,'.
        'gp.soil_id, s.name soil_name,'.
        'gp.environment_id, e.name environment_name,'.
        'gp.spacing_id, sp.name spacing_name,'.
        'gp.distance, gp.total_area, gp.production_area, gp.tons, gp.cut_tons,'.
        'gp.planting, gp.cutting');
    $this->db->from('gu_plots gp');
    $this->db->join('gu_farms gf', '(gf.license_id=gp.license_id and gf.farm_id=gp.farm_id)');
    $this->db->join('gu_regions gr', '(gr.license_id=gp.license_id and gr.region_id=gp.region_id)', 'left');
    $this->db->join('varieties v', '(v.license_id=gp.license_id and v.variety_id=gp.variety_id)');
    $this->db->join('maturation m', '(m.maturity_id=v.maturity_id)');
    $this->db->join('cuttings c', '(c.license_id=gp.license_id and c.cutting_id=gp.cutting_id)');
    $this->db->join('soils s', '(s.license_id=gp.license_id and s.soil_id=gp.soil_id)');
    $this->db->join('environments e', '(e.license_id=gp.license_id and e.environment_id=gp.environment_id)', 'left');
    $this->db->join('spacing sp', '(sp.license_id=gp.license_id and sp.spacing_id=gp.spacing_id)', 'left');
    $this->db->where('gp.farm_id', $piFarm);
    $this->db->order_by('gp.farm_id, gp.block_code, gp.plot_code');
    return $this->db->get()->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    $this->db->where('farm_id', $paParams['farm_id']);
    $this->db->where('season_id', $paParams['season_id']);
    return $this->db->count_all_results($this->main_table);
  }
 
  function get_list_variety($paParams){
    $this->db->select('a.variety_id column_key, a.name column_name');
    $this->db->from('varieties a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_cutting($paParams){
    $this->db->select('a.cutting_id column_key, a.name column_name');
    $this->db->from('cuttings a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_gu_regions($paParams){
    $this->db->select('a.region_id column_key, a.name column_name');
    $this->db->from('gu_regions a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_soil($paParams){
    $this->db->select('a.soil_id column_key, a.name column_name');
    $this->db->from('soils a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_environment($paParams){
    $this->db->select('a.environment_id column_key, a.name column_name');
    $this->db->from('environments a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_spacing($paParams){
    $this->db->select('a.spacing_id column_key, a.name column_name');
    $this->db->from('spacing a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('plot_id', $poRecord['plot_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(plot_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
