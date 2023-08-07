<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

  protected $main_table = 'products';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('p.product_id, p.license_id, p.name,'.
            ' p.manufacturer_id, m.name manufacture_name,'.
            ' p.group_id, g.name group_name,'.
            ' p.measure_id, mu.name measure_name, mu.short_name measure_short_name');
    $this->db->from($this->main_table.' p');
    $this->db->join('manufacturers m', '(m.license_id=p.license_id and m.manufacturer_id=p.manufacturer_id)', 'left');
    $this->db->join('products_groups g', '(g.license_id=p.license_id and g.group_id=p.group_id)', 'left');
    $this->db->join('measure_units mu', '(mu.license_id=p.license_id and mu.measure_id=p.measure_id)', 'left');
    $this->db->where('p.license_id', $paParams['license_id']);
    $this->db->order_by('m.name, p.name');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(product_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function get_list_manufacturers($paParams){
    $this->db->select('a.manufacturer_id column_key, a.name column_name');
    $this->db->from('manufacturers a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_products_groups($paParams){
    $this->db->select('a.group_id column_key, a.name column_name');
    $this->db->from('products_groups a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_measure_units($paParams){
    $this->db->select('a.measure_id column_key, a.name column_name');
    $this->db->from('measure_units a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('product_id', $poRecord['product_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(product_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

}
