<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CurrencyRate_model extends CI_Model {

  protected $main_table = 'currencies_rates';
  
  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('c.rate_id, c.license_id, c.currency_id, c.dt_rate, c.rate, cr.name currency_name');
    $this->db->from($this->main_table.' c');
    $this->db->join('currencies cr', '(cr.license_id=c.license_id and cr.currency_id=c.currency_id)');
    $this->db->where('c.license_id', $paParams['license_id']);
    $this->db->order_by('c.dt_rate desc, c.currency_id');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(rate_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function get_list_currencies($paParams){
    $this->db->select('a.currency_id column_key, a.name column_name');
    $this->db->from('currencies a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('rate_id', $poRecord['rate_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(rate_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
