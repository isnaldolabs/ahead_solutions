<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  /* == Checks Status ======================================================= */
  function get_dashboard_checks_status($paParams){
    $this->db->select('v.check_status, v.check_status_name, count(*) amount,'.
                      'round(case when (t.total > 0) then ((count(*) / t.total) * 100) else 0.0 end, 2) perc');
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

  /* == Protocols Status ==================================================== */
  function get_dashboard_protocols_status($paParams){
    $this->db->select('p.license_id, p.protocol_id, p.title, p.dt_start, p.dt_end_planned,'.
                      'p.type_id, pt.name type_name, pt.short_name type_short_name, pt.color type_color,'.
                      'datediff(p.dt_end_planned, p.dt_start) days_total,'.
                      'datediff(curdate(), p.dt_start) days_open,'.
                      'round((datediff(curdate(), p.dt_start) / datediff(p.dt_end_planned, p.dt_start) * 100) , 0) protocol_progress,'.
                      'c.checks_total, c.checks_done, c.checks_perc');
    $this->db->from('protocols p');
    $this->db->join('protocols_types pt', '(pt.type_id=p.type_id)');
    $this->db->join('vi_protocols_checks_stats c', '(c.license_id=p.license_id and c.protocol_id=p.protocol_id)', 'left');
    $this->db->where('p.license_id', $paParams['license_id']);
    $this->db->where('p.status', $paParams['protocol_status']);
    $this->db->order_by('p.license_id, p.protocol_id desc');
    return $this->db->get()->result();
  }

  /* == Currencies ========================================================== */
  function get_currencies($paParams){
    $this->db->select('c.license_id, c.currency_id, c.name currency_name');
    $this->db->from('currencies_rates r');
    $this->db->join('currencies c', '(c.license_id=r.license_id and c.currency_id=r.currency_id)');
    $this->db->where('c.license_id', $paParams['license_id']);
    $this->db->where('year(r.dt_rate)', Date('Y'));
    $this->db->group_by('c.license_id, c.currency_id, c.name');
    $this->db->order_by('c.name');
    return $this->db->get()->result();
  }

  function get_currencies_rates($paParams){
    $this->db->select('c.license_id, c.currency_id, c.name currency_name, r.dt_rate, r.rate');
    $this->db->from('currencies_rates r');
    $this->db->join('currencies c', '(c.license_id=r.license_id and c.currency_id=r.currency_id)');
    $this->db->where('c.license_id', $paParams['license_id']);
    $this->db->where('year(r.dt_rate)', Date('Y'));
    $this->db->order_by('c.name, r.dt_rate');
    return $this->db->get()->result();
  }

}
