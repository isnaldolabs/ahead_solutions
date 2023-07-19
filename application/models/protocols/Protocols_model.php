<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Protocols_model extends CI_Model {

  protected $main_table = 'protocols';

  public function __construct(){
    parent::__construct();
  }

  function get_all($paParams){
    $this->db->select('p.protocol_id, p.license_id, p.code, p.title, p.goal,'.
                      'p.dt_start, p.dt_end_planned, p.status, vpa.months_age, vpa.total_area,'.
                      'p.type_id, pt.name type_name, pt.short_name type_short_name, pt.color type_color,'.
                      'p.methodology_id, pm.name methodology_name,'.
                      'p.subline_id, rl.name line_name, rsl.name subline_name,'.
                      'p.repetitions, sm.area_portion,'.
                      'p.test_id, t.name type_test_name,'.
                      'p.designing_id, d.name designing_name,'.
                      'p.scheme_id, ps.name scheme_name,'.
                      'p.applicant_id, a.name applicant_name,'.
                      'p.responsible_id, r.name responsible_name,'.
                      'p.conclusion, p.rating,'.
                      'round((datediff(curdate(), p.dt_start) / datediff(p.dt_end_planned, p.dt_start) * 100) , 0) protocol_progress');
    $this->db->from($this->main_table.' p');
    $this->db->join('protocols_types pt', '(pt.type_id=p.type_id)');
    $this->db->join('protocols_methodologies pm', '(pm.methodology_id=p.methodology_id)');
    $this->db->join('research_sublines rsl', '(rsl.license_id=p.license_id and rsl.subline_id=p.subline_id)');
    $this->db->join('research_lines rl', '(rl.license_id=rsl.license_id and rl.line_id=rsl.line_id)');
    $this->db->join('types_tests t', '(t.license_id=p.license_id and t.test_id=p.test_id)', 'left');
    $this->db->join('designing d', '(d.license_id=p.license_id and d.designing_id=p.designing_id)', 'left');
    $this->db->join('planting_schemes ps', '(ps.license_id=p.license_id and ps.scheme_id=p.scheme_id)', 'left');
    $this->db->join('teams a', '(a.license_id=p.license_id and a.team_id=p.applicant_id)', 'left');
    $this->db->join('teams r', '(r.license_id=p.license_id and r.team_id=p.responsible_id)', 'left');
    $this->db->join('vi_protocols_ages vpa', '(vpa.license_id=p.license_id and vpa.protocol_id=p.protocol_id)', 'left');

    $this->db->join('(select pp.license_id, pp.protocol_id, round(sum(gup.area),3) area_portion'.
		      ' from protocols_varieties pp'.
                     '  join gu_parcels gup on (gup.license_id = pp.license_id and gup.parcel_id = pp.parcel_id)'.
		     ' where pp.license_id = '.$paParams['license_id'].
		     ' group by pp.license_id, pp.protocol_id) sm', '(sm.license_id=p.license_id and sm.protocol_id=p.protocol_id)', 'left');

    $this->db->where('p.license_id', $paParams['license_id']);
    if ($paParams['status']!=0){
        $this->db->where('p.status', $paParams['status']);
    }
    $this->db->order_by('p.protocol_id', 'desc');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_by_key($psKey){
    $this->db->where('md5(protocol_id)', $psKey);
    return $this->db->get($this->main_table)->result();
  }

  function get_count_all($paParams){
    $this->db->from($this->main_table.' p');
    $this->db->join('protocols_types pt', '(pt.type_id=p.type_id)');
    $this->db->join('protocols_methodologies pm', '(pm.methodology_id=p.methodology_id)');
    $this->db->join('research_sublines rsl', '(rsl.license_id=p.license_id and rsl.subline_id=p.subline_id)');
    $this->db->join('research_lines rl', '(rl.license_id=rsl.license_id and rl.line_id=rsl.line_id)');
    $this->db->join('types_tests t', '(t.license_id=p.license_id and t.test_id=p.test_id)', 'left');
    $this->db->join('designing d', '(d.license_id=p.license_id and d.designing_id=p.designing_id)', 'left');
    $this->db->join('planting_schemes ps', '(ps.license_id=p.license_id and ps.scheme_id=p.scheme_id)', 'left');
    $this->db->join('teams a', '(a.license_id=p.license_id and a.team_id=p.applicant_id)', 'left');
    $this->db->join('teams r', '(r.license_id=p.license_id and r.team_id=p.responsible_id)', 'left');
    $this->db->join('vi_protocols_ages vpa', '(vpa.license_id=p.license_id and vpa.protocol_id=p.protocol_id)', 'left');
    $this->db->where('p.license_id', $paParams['license_id']);
    return $this->db->count_all_results();
  }

  function get_list_types(){
    $this->db->select('a.type_id column_key, a.name as column_name');
    $this->db->from('protocols_types a');
    $this->db->where('a.active', ACTIVE_YES);
    $this->db->order_by('a.type_id', '');
    return $this->db->get()->result();
  }

  function get_list_methodologies(){
    $this->db->select('a.methodology_id column_key, a.name as column_name');
    $this->db->from('protocols_methodologies a');
    $this->db->order_by('a.methodology_id', '');
    return $this->db->get()->result();
  }

  function get_list_types_tests($paParams){
    $this->db->select('a.test_id column_key, a.name as column_name');
    $this->db->from('types_tests a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_designing($paParams){
    $this->db->select('a.designing_id column_key, a.name as column_name');
    $this->db->from('designing a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.active', ACTIVE_YES);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_schemes($paParams){
    $this->db->select('a.scheme_id column_key, a.name as column_name');
    $this->db->from('planting_schemes a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_subline($paParams){
    $this->db->select('a.subline_id column_key, concat(b.name," - ",a.name) as column_name');
    $this->db->from('research_sublines a');
    $this->db->join('research_lines b', '(b.license_id=a.license_id and b.line_id=a.line_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('b.name, a.name', '');
    return $this->db->get()->result();
  }

  function get_list_applicant($paParams){
    $this->db->select('a.team_id column_key, a.name column_name');
    $this->db->from('teams a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_responsible($paParams){
    $this->db->select('a.team_id column_key, a.name column_name');
    $this->db->from('teams a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.name', '');
    return $this->db->get()->result();
  }

  function get_list_ratings($paParams){
    $this->db->select('a.rating column_key, a.name column_name');
    $this->db->from('protocols_ratings a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('a.editable', ACTIVE_YES);
    $this->db->order_by('a.rating', '');
    return $this->db->get()->result();
  }

  function add($poRecord){
    $poRecord['rating'] = PROTOCOL_RATING_PROGRESS;
    return $this->db->insert($this->main_table, $poRecord);
  }

  function upd($poRecord){
    $this->db->where('protocol_id', $poRecord['protocol_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function upd_status($psKey, $poStatus){
    $this->db->set('status', $poStatus);
    $this->db->set('dt_end', ($poStatus==PROTOCOL_STATUS_CANCELED?Date('Y-m-d H:i:s'):NULL));
    $this->db->set('rating', PROTOCOL_RATING_PROGRESS);
    $this->db->where('md5(protocol_id)', $psKey);
    $this->db->update('protocols');
    if($this->db->trans_status()==TRUE){
      $this->db->trans_commit();
      return TRUE;
    }else{
      $this->db->trans_rollback();
      return FALSE;
    }
  }

  function upd_close($poRecord){
    $this->db->where('protocol_id', $poRecord['protocol_id']);
    return $this->db->update($this->main_table, $poRecord);
  }

  function delete($psKey=NULL){
    if($psKey){
      $this->db->where('md5(protocol_id)', $psKey);
      return $this->db->delete($this->main_table);
    }
  }

}
