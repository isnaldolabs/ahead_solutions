<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weathers_model extends CI_Model {

  protected $main_table = 'weathers';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    $this->db->order_by('dt_weather desc');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get($this->main_table)->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(weather_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function get_list_station($paParams){
    $this->db->select('a.station_id column_key, a.name column_name');
    $this->db->from('weathers_station a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('weather_id', $poRecord['weather_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(weather_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
