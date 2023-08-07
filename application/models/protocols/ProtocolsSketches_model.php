<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsSketches_model extends CI_Model {

  protected $main_table = 'protocols_sketches';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('a.sketch_id, a.treatment_id, a.num_block, a.parcel_id,'.
                      'a.type_id, a.plot_id, a.parcel_code, a.variety_id,'.
                      'a.treatment_name, a.num_order,'.
                      ' (select ma.sketch_id'.
                         ' from vi_protocols_sketches ma '.
                        ' where ma.license_id = a.license_id '.
                          ' and ma.protocol_id = a.protocol_id '.
                          ' and ma.num_block = a.num_block '.
                          ' and ma.num_order = (select max(s.num_order) '.
                                                ' from vi_protocols_sketches s '.
                                               ' where s.license_id = a.license_id '.
                                                 ' and s.protocol_id = a.protocol_id '.
                                                 ' and s.num_block = a.num_block '.
                                                 ' and s.num_order < a.num_order)) as before_id, '.
                      ' (select ma.sketch_id '.
                         ' from vi_protocols_sketches ma '.
                        ' where ma.license_id = a.license_id '.
                          ' and ma.protocol_id = a.protocol_id '.
                          ' and ma.num_block = a.num_block '.
                          ' and ma.num_order = (select min(s.num_order) '.
                                                ' from vi_protocols_sketches s '.
                                               ' where s.license_id = a.license_id '.
                                                 ' and s.protocol_id = a.protocol_id '.
                                                 ' and s.num_block = a.num_block '.
                                                 ' and s.num_order > a.num_order)) as next_id');
    $this->db->from('vi_protocols_sketches a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->order_by('a.num_order');
    return $this->db->get()->result();
  }

  function get_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    $this->db->where('md5(protocol_id)', $paParams['protocol_id']);
    return $this->db->count_all_results($this->main_table);
  }

  function get_by_key($psKey){
    $this->db->where('md5(parcel_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_treatments_done($paParams){
    switch ($paParams['type_protocol']){
        case PROTOCOL_TYPE_VARIETY:
            $lsFrom = 'protocols_varieties p'; break;
        case PROTOCOL_TYPE_PRODUCTS:
            $lsFrom = 'protocols_products p'; break;
        case PROTOCOL_TYPE_COMPOSED:
            $lsFrom = 'protocols_prodvar p'; break;
        case PROTOCOL_TYPE_MISC:
            $lsFrom = 'protocols_miscellaneous p'; break;
    }

    $this->db->select('p.license_id, p.protocol_id, count(*) record');
    $this->db->from($lsFrom);
    $this->db->where('p.license_id', $paParams['license_id']);
    $this->db->where('md5(p.protocol_id)', $paParams['protocol_id']);
    $this->db->group_by('p.license_id, p.protocol_id');
    return $this->db->get()->result();
  }

  function get_treatments($paParams){
    switch ($paParams['type_protocol']){
        case PROTOCOL_TYPE_VARIETY:
            $lsJoin = '(select a.license_id, a.protocol_id, count(*) amount from protocols_varieties a group by a.license_id, a.protocol_id) j'; break;
        case PROTOCOL_TYPE_PRODUCTS:
            $lsJoin = '(select a.license_id, a.protocol_id, count(*) amount from protocols_products a group by a.license_id, a.protocol_id) j'; break;
        case PROTOCOL_TYPE_COMPOSED:
            $lsJoin = '(select a.license_id, a.protocol_id, count(*) amount from protocols_prodvar a group by a.license_id, a.protocol_id) j'; break;
        case PROTOCOL_TYPE_MISC:
            $lsJoin = '(select a.license_id, a.protocol_id, count(*) amount from protocols_miscellaneous a group by a.license_id, a.protocol_id) j'; break;
    }

    $this->db->select('p.license_id, p.protocol_id, p.repetitions, j.amount');
    $this->db->from('protocols p');
    $this->db->join($lsJoin, '(j.license_id=p.license_id and j.protocol_id=p.protocol_id)');
    $this->db->where('p.license_id', $paParams['license_id']);
    $this->db->where('md5(p.protocol_id)', $paParams['protocol_id']);
    return $this->db->get()->result();
  }

  function get_treatments_varieties($paParams){
    $this->db->select('a.treatment_id, a.parcel_id');
    $this->db->from('protocols_varieties a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->order_by('a.treatment_id');
    return $this->db->get()->result();
  }

  function get_treatments_products($paParams){
    $this->db->select('a.treatment_id, a.parcel_id');
    $this->db->from('protocols_products a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->order_by('a.treatment_id');
    return $this->db->get()->result();
  }

  function get_treatments_prodvar($paParams){
    $this->db->select('a.treatment_id, a.parcel_id');
    $this->db->from('protocols_prodvar a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->order_by('a.treatment_id');
    return $this->db->get()->result();
  }

  function get_treatments_miscellaneous($paParams){
    $this->db->select('a.treatment_id, a.parcel_id');
    $this->db->from('protocols_miscellaneous a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->order_by('a.treatment_id');
    return $this->db->get()->result();
  }

  function add($poRecord){
    return $this->db->insert($this->main_table, $poRecord);
  }

  function delete($piKey=NULL){
    if($piKey){
      $this->db->where('md5(protocol_id)', $piKey);
      return $this->db->delete($this->main_table);
    }
  }

  function upd($poRecord){
    $this->db->where('parcel_id', $poRecord['parcel_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

    function upd_new_order($poRecord){
        $this->db->trans_start();

//      atualizando o sketch de troca de posição
        $lo_sql1 = 'update protocols_sketches'.
                     ' set num_order = '.$poRecord['order'].
                   ' where license_id = '.$poRecord['license_id'].
                     ' and sketch_id = '.$poRecord['sketch_aux'];
        $this->db->query($lo_sql1);

//      atualizando o sketch corrente
        $lo_sql2 = 'update protocols_sketches'.
                     ' set num_order = '.$poRecord['order_new'].
                   ' where license_id = '.$poRecord['license_id'].
                     ' and sketch_id = '.$poRecord['sketch_main'];
        $this->db->query($lo_sql2);

        $this->db->trans_complete();
        if($this->db->trans_status()==TRUE){
          $this->db->trans_commit();
          return TRUE;
        }else{
          $this->db->trans_rollback();
          return FALSE;
        }
    }

}
