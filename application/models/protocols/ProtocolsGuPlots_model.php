<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsGuPlots_model extends CI_Model {

  protected $main_table = 'protocols_gu_plots';
  
  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('a.id, a.protocol_id, a.plot_id, a.license_id,'.
                      'b.block_code, b.plot_code, b.variety_id, b.total_area,'.
                      'b.dt_planting, b.dt_cutting,'.
                      'c.name variety_name,'.
                      'e.name environment_name,'.
                      'd.code farm_code, d.name farm_name');
    $this->db->from($this->main_table.' a');
    $this->db->join('gu_plots b', '(b.license_id=a.license_id and b.plot_id=a.plot_id)');
    $this->db->join('varieties c', '(c.license_id=b.license_id and c.variety_id=b.variety_id)', 'left');
    $this->db->join('environments e', '(e.license_id=b.license_id and e.environment_id=b.environment_id)', 'left');
    $this->db->join('gu_farms d', '(d.license_id=b.license_id and d.farm_id=b.farm_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.protocol_id', $paParams['protocol_id']);
    $this->db->where('b.season_id', $paParams['season_id']);    
    $this->db->order_by('d.name, b.block_code, b.plot_code');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    $this->db->where('protocol_id', $paParams['protocol_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function get_list_gu_plots($paParams){
    $this->db->select('a.plot_id column_key, concat(b.name," - ",b.code," - ",a.block_code," - ",a.plot_code) as column_name');
    $this->db->distinct('a.plot_id');
    $this->db->from('gu_plots a');
    $this->db->join('gu_parcels c', '(c.license_id=a.license_id and c.plot_id=a.plot_id)');
    $this->db->join('gu_farms b', '(b.license_id=a.license_id and b.farm_id=a.farm_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.season_id', $paParams['season_id']);
    $this->db->order_by('b.name, a.block_code, a.plot_code', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('id', $poRecord['id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
