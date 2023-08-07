<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MathAnovaRatings_model extends CI_Model {

  protected $main_table = 'math_anova_ratings';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    $this->db->where('editable', ACTIVE_YES);
    $this->db->order_by('min_value');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get($this->main_table)->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(rating_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function upd($poRecord){
    $this->db->where('rating_id', $poRecord['rating_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

}
