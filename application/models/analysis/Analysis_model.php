<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analysis_model extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  /* == Research Lines ====================================================== */
  function get_research_status($paParams){
    $this->db->select('v.status, v.status_name, sum(v.amount) amount');
    $this->db->from('vi_research_lines v');
    $this->db->where('v.license_id', $paParams['license_id']);
    $this->db->group_by('v.status, v.status_name');
    return $this->db->get()->result();
  }

  function get_research_lines($paParams){
    $this->db->select('v.line_id, v.line_name, sum(v.amount) amount');
    $this->db->from('vi_research_lines v');
    $this->db->where('v.license_id', $paParams['license_id']);
    $this->db->group_by('v.line_id, v.line_name');
    return $this->db->get()->result();
  }

  function get_research_sublines($paParams){
    $this->db->select('v.subline_id, v.subline_name, sum(v.amount) amount');
    $this->db->from('vi_research_lines v');
    $this->db->where('v.license_id', $paParams['license_id']);
    $this->db->group_by('v.subline_id, v.subline_name');
    return $this->db->get()->result();
  }

  function get_research_list($paParams){
    $this->db->select('v.license_id, v.status, v.status_name, v.line_name, v.subline_name, v.amount, s.total_lines,'.
                      '(case when s.total_lines > 0 then round((v.amount/s.total_lines)*100,2) else 0 end) as line_perc');
    $this->db->from('vi_research_lines v');
    $this->db->join('(select s.license_id, count(*) total_lines from vi_research_lines s group by s.license_id) s', '(s.license_id=v.license_id)', 'left');
    $this->db->where('v.license_id', $paParams['license_id']);
    $this->db->order_by('v.status, v.status_name, v.line_name, v.subline_name, v.amount');
    return $this->db->get()->result();
  }

  /* == Weather ============================================================= */
  function get_weather_chart($paParams){
    $this->db->select('w.weather_id, w.license_id, w.dt_weather,'.
                      'round(w.pluviometry,1) pluviometry,'.
                      'round(w.temperature,1) temperature,'.
                      'round(w.temperature_min,1) temperature_min,'.
                      'round(w.temperature_max,1) temperature_max');
    $this->db->from('weathers w');
    $this->db->where('w.license_id', $paParams['license_id']);
    $this->db->order_by('w.dt_weather');
    return $this->db->get()->result();
  }

  function get_weather_table($paParams){
    $this->db->select('w.weather_id, w.license_id, w.dt_weather,'.
                      'round(w.pluviometry,1) pluviometry,'.
                      'round(w.temperature,1) temperature,'.
                      'round(w.temperature_min,1) temperature_min,'.
                      'round(w.temperature_max,1) temperature_max');
    $this->db->from('weathers w');
    $this->db->where('w.license_id', $paParams['license_id']);
    $this->db->order_by('w.dt_weather');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_weather_count_all($paParams){
    $this->db->from('weathers w');
    $this->db->where('w.license_id', $paParams['license_id']);
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->count_all_results();
  }

  function get_weather_monthly($paParams){
    $this->db->select('date_format(w.dt_weather, "%Y-%m") period,'.
                      'year(w.dt_weather) num_year,'.
                      'month(w.dt_weather) num_month,'.
                      'round(sum(w.pluviometry),1) pluviometry,'.
                      'round(avg(w.temperature),1) temperature,'.
                      'round(avg(w.temperature_min),1) temperature_min,'.
                      'round(avg(w.temperature_max),1) temperature_max');
    $this->db->from('weathers w');
    $this->db->where('w.license_id', $paParams['license_id']);
    $this->db->group_by('date_format(w.dt_weather, "%Y-%m"), year(w.dt_weather), month(w.dt_weather)');
    $this->db->order_by('date_format(w.dt_weather, "%Y-%m")');
    return $this->db->get()->result();
  }

  /* == Checks Status ======================================================= */
  function get_checks_status($paParams){
    $this->db->select('v.check_status, v.check_status_name, count(*) amount, t.total');
    $this->db->from('vi_checks_status v');
    $this->db->join('(select t.license_id, count(*) total'.
                    '   from vi_checks_status t'.
                    '  where t.license_id='.$paParams['license_id'].
                    '    and t.protocol_status='.$paParams['protocol_status'].
                    '  group by t.license_id) t', '(t.license_id=v.license_id)');
    $this->db->where('v.license_id', $paParams['license_id']);
    $this->db->where('v.protocol_status', $paParams['protocol_status']);
    $this->db->group_by('v.check_status, v.check_status_name');
    return $this->db->get()->result();
  }

  function get_checks_status_list($paParams){
    $this->db->select('v.protocol_id, v.title, v.protocol_status,'.
                      'v.check_status, v.check_status_name,'.
                      'v.dt_planned, v.dt_applied,'.
                      'v.description_name, v.method_name');
    $this->db->from('vi_checks_status v');
    $this->db->where('v.license_id', $paParams['license_id']);
    $this->db->where('v.protocol_status', $paParams['protocol_status']);
    $this->db->order_by('v.dt_planned');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_checks_status_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    $this->db->where('protocol_status', $paParams['protocol_status']);
    return $this->db->count_all_results('vi_checks_status');
  }

  /* == Protocols Alerts ==================================================== */
  function get_protocols_alerts($paParams){
    $this->db->select('a.alert_id, a.license_id, a.protocol_id,'.
                      'a.alert_at, a.name alert_name,'.
                      'a.is_read, a.aware_by, u.nick_name aware_name, a.aware_at');
    $this->db->from('protocols_alerts a');
    $this->db->join('auth_users u', '(u.user_id=a.aware_by)', 'left');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->order_by('a.alert_at, a.alert_id', 'desc');
    if ($paParams['limit'] > 0){
      $this->db->limit($paParams['limit'], $paParams['start']);
    }
    return $this->db->get()->result();
  }

  function get_protocols_alerts_count_all($paParams){
    $this->db->where('license_id', $paParams['license_id']);
    return $this->db->count_all_results('protocols_alerts');
  }

  function upd_aware($paParams){
    $this->db->set('is_read', ACTIVE_YES);
    $this->db->set('aware_at', $paParams['aware_at']);
    $this->db->set('aware_by', $paParams['aware_by']);
    $this->db->where('md5(alert_id)', $paParams['alert_id']);
    $this->db->update('protocols_alerts');
    if($this->db->trans_status()==TRUE){
      $this->db->trans_commit();
      return TRUE;
    }else{
      $this->db->trans_rollback();
      return FALSE;
    }
  }

  /* == Applied Products ==================================================== */
  function get_applied_products($paParams){
    $this->db->select('vt.treatment_id, vps.treatment_name,'.
            'round(min(vsa.num_tph),3) min_tph,'.
            'round(max(vsa.num_tph),3) max_tph,'.
            'round(avg(vsa.num_tph),3) avg_tph');
    $this->db->from('vi_protocols vp');
    $this->db->join('vi_treatments vt', '(vt.license_id=vp.license_id and vt.protocol_id=vp.protocol_id)');
    $this->db->join('vi_protocols_sketches vps', '(vps.license_id=vt.license_id and vps.protocol_id=vt.protocol_id and vps.treatment_id=vt.treatment_id)');
    $this->db->join('vi_samples_analyze vsa', '(vsa.license_id=vps.license_id and vsa.protocol_id=vps.protocol_id and vsa.sketch_id=vps.sketch_id)');
    $this->db->where('vp.license_id', $paParams['license_id']);
    $this->db->where('vp.type_id', $paParams['type_id']);
    $this->db->group_by('vt.treatment_id, vps.treatment_name');
    return $this->db->get()->result();
  }

  function get_applied_products_groups($paParams){
    $this->db->select('vsa.license_id, p.group_id, pg.name group_name,'.
            'round(min(vsa.num_tph),3) min_tph,'.
            'round(max(vsa.num_tph),3) max_tph,'.
            'round(avg(vsa.num_tph),3) avg_tph');
    $this->db->from('vi_samples_analyze vsa');
    $this->db->join('vi_protocols_sketches vps', '(vps.license_id=vsa.license_id and vps.protocol_id=vsa.protocol_id and vps.sketch_id=vsa.sketch_id)');
    $this->db->join('vi_treatments vt', '(vt.license_id=vps.license_id and vt.protocol_id=vps.protocol_id and vt.treatment_id=vps.treatment_id)');
    $this->db->join('protocols_products pp', '(pp.license_id=vt.license_id and pp.protocol_id=vt.protocol_id and pp.treatment_id=vt.treatment_id)');
    $this->db->join('products p', '(p.license_id=pp.license_id and p.product_id=pp.product_id)');
    $this->db->join('products_groups pg', '(pg.license_id=p.license_id and pg.group_id=p.group_id)');
    $this->db->where('vsa.license_id', $paParams['license_id']);
    $this->db->where('vps.type_id', $paParams['type_id']);
    $this->db->group_by('vsa.license_id, p.group_id, pg.name');
    return $this->db->get()->result();
  }

  function get_applied_products_count_all($paParams){
    $this->db->select('vt.treatment_id, vps.treatment_name,'.
            'round(avg(vsa.num_tph),3) num_tph,'.
            'round(min(vsa.num_tph),3) min_tph,'.
            'round(max(vsa.num_tph),3) max_tph');
    $this->db->from('vi_protocols vp');
    $this->db->join('vi_treatments vt', '(vt.license_id=vp.license_id and vt.protocol_id=vp.protocol_id)');
    $this->db->join('vi_protocols_sketches vps', '(vps.license_id=vt.license_id and vps.protocol_id=vt.protocol_id and vps.treatment_id=vt.treatment_id)');
    $this->db->join('vi_samples_analyze vsa', '(vsa.license_id=vps.license_id and vsa.protocol_id=vps.protocol_id and vsa.sketch_id=vps.sketch_id)');
    $this->db->where('vp.license_id', $paParams['license_id']);
    $this->db->where('vp.type_id', $paParams['type_id']);
    $this->db->group_by('vt.treatment_id, vps.treatment_name');
    return $this->db->count_all_results();
  }

  /* == Varieties Royalties ================================================= */
  function get_varieties_royalties($paParams){
    $this->db->select('vsa.license_id, v.variety_id, v.name variety_name,'.
	    'round(avg(vsa.num_weight),3) avg_weight,'.
	    'round(avg(v.royalties),3) royalties,'.
            'round(min(vsa.num_tph),3) min_tph,'.
            'round(max(vsa.num_tph),3) max_tph,'.
            'round(avg(vsa.num_tph),3) avg_tph,'.
	    'round((avg(vsa.num_tph) / avg(v.royalties))*100,2) viability');
    $this->db->from('vi_samples_analyze vsa');
    $this->db->join('vi_protocols_sketches vps', '(vps.license_id=vsa.license_id and vps.protocol_id=vsa.protocol_id and vps.sketch_id=vsa.sketch_id)');
    $this->db->join('varieties v', '(v.license_id=vps.license_id and v.variety_id=vps.variety_id)');
    $this->db->join('varieties_licensors vl', '(vl.license_id=v.license_id and vl.licensor_id=v.licensor_id)');
    $this->db->where('vsa.license_id', $paParams['license_id']);
    $this->db->where('vps.type_id', $paParams['type_id']);
    $this->db->group_by('vsa.license_id, v.variety_id, v.name');
    return $this->db->get()->result();
  }

  function get_varieties_royalties_licensors($paParams){
    $this->db->select('vsa.license_id, v.licensor_id, vl.name licensor_name,'.
	    'round(avg(vsa.num_weight),3) avg_weight,'.
            'round(avg(v.royalties),3) royalties,'.
            'round(min(vsa.num_tph),3) min_tph,'.
            'round(max(vsa.num_tph),3) max_tph,'.
            'round(avg(vsa.num_tph),3) avg_tph,'.
            'round((avg(vsa.num_tph) / avg(v.royalties))*100,2) viability');
    $this->db->from('vi_samples_analyze vsa');
    $this->db->join('vi_protocols_sketches vps', '(vps.license_id=vsa.license_id and vps.protocol_id=vsa.protocol_id and vps.sketch_id=vsa.sketch_id)');
    $this->db->join('varieties v', '(v.license_id=vps.license_id and v.variety_id=vps.variety_id)');
    $this->db->join('varieties_licensors vl', '(vl.license_id=v.license_id and vl.licensor_id=v.licensor_id)');
    $this->db->where('vsa.license_id', $paParams['license_id']);
    $this->db->where('vps.type_id', $paParams['type_id']);
    $this->db->group_by('vsa.license_id, v.licensor_id, vl.name');
    return $this->db->get()->result();
  }

  function get_varieties_royalties_count_all($paParams){
    $this->db->select('vsa.license_id, v.variety_id, v.name variety_name,'.
	    'round(avg(vsa.num_weight),3) avg_weight,'.
	    'round(avg(v.royalties),3) royalties,'.
            'round(min(vsa.num_tph),3) min_tph,'.
            'round(max(vsa.num_tph),3) max_tph,'.
            'round(avg(vsa.num_tph),3) avg_tph,'.
	    'round((avg(vsa.num_tph) / avg(v.royalties))*100,2) viability');
    $this->db->from('vi_samples_analyze vsa');
    $this->db->join('vi_protocols_sketches vps', '(vps.license_id=vsa.license_id and vps.protocol_id=vsa.protocol_id and vps.sketch_id=vsa.sketch_id)');
    $this->db->join('varieties v', '(v.license_id=vps.license_id and v.variety_id=vps.variety_id)');
    $this->db->join('varieties_licensors vl', '(vl.license_id=v.license_id and vl.licensor_id=v.licensor_id)');
    $this->db->where('vsa.license_id', $paParams['license_id']);
    $this->db->where('vps.type_id', $paParams['type_id']);
    $this->db->group_by('vsa.license_id, v.variety_id, v.name');
    return $this->db->count_all_results();
  }

}
