<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Season_model extends CI_Model {

  protected $main_table = 'seasons';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    $this->db->order_by('num_year', 'desc');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function get_list_seasons($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    $this->db->where('active', ACTIVE_YES);    
    $this->db->order_by('num_year', 'desc');
    return $this->db->get($this->main_table)->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(season_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_current_season($piLicense){
    $this->db->where('license_id', $piLicense);
    $this->db->where('active', ACTIVE_YES);
    return $this->db->get($this->main_table)->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('season_id', $poRecord['season_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(season_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
