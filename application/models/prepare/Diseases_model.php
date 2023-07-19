<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diseases_model extends CI_Model {

  protected $main_table = 'diseases';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('d.disease_id, d.license_id, d.name, d.short_name, d.agent, d.group_id, g.name group_name');
    $this->db->from($this->main_table.' d');
    $this->db->join('diseases_groups g', '(g.license_id=d.license_id and g.group_id=d.group_id)', 'left');
    $this->db->where('d.license_id', $paParams['license_id']);
    $this->db->order_by('d.name');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(disease_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function get_list_diseases_groups($paParams){
    $this->db->select('a.group_id column_key, a.name column_name');
    $this->db->from('diseases_groups a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('disease_id', $poRecord['disease_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(disease_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
