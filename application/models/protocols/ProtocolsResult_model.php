<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsResult_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    function get_protocol($paParams){
        $this->db->select('a.protocol_id, a.code, a.test_name, a.type_id,'.
                          'a.type_name, a.methodology_name, a.status,'.
                          'a.title, a.goal, a.conclusion,'.
                          'a.dt_start, a.dt_end, a.dt_end_planned,'.
                          'a.applicant_name, a.responsible_name,'.
                          'a.line_name, a.subline_name,'.
                          'a.scheme_name, a.designing_name,'.
                          'a.repetitions, a.conclusion,'.
                          'a.rating, a.rating_name,'.
                          'a.anova_ftb, a.anova_ftb_cv, a.anova_rat_values,'.
                          'a.anova_rat_sort, a.anova_rat_color, a.anova_rat_accuracy');
        $this->db->from('vi_protocols a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        $this->db->limit(1);
        return $this->db->get()->result();
    }

    function get_protocol_idealizers($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.idealizer_id, b.name idealizer_name');
        $this->db->from('protocols_idealizers a');
        $this->db->join('teams b', '(b.license_id=a.license_id and b.team_id=a.idealizer_id)');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        $this->db->order_by('b.name');
        return $this->db->get()->result();
    }

    function get_protocol_teams($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.team_id, b.name team_name');
        $this->db->from('protocols_teams a');
        $this->db->join('teams b', '(b.license_id=a.license_id and b.team_id=a.team_id)');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        $this->db->order_by('b.name');
        return $this->db->get()->result();
    }

    function get_protocol_samples($paParams){
        $this->db->select('a.id, a.license_id, a.protocol_id, a.sample_id, b.name sample_name, b.link sample_link, b.order_by');
        $this->db->from('protocols_samples a');
        $this->db->join('shared_protocols_samples b', '(b.sample_id=a.sample_id)', 'left');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        $this->db->order_by('b.order_by');
        return $this->db->get()->result();
    }

    function get_protocol_notes($paParams){
        $this->db->select('a.note_id, a.license_id, a.protocol_id, a.note_at, a.notes,'.
                          'a.user_id, u.nick_name user_name');
        $this->db->from('protocols_notes a');
        $this->db->join('auth_users u', '(u.user_id=a.user_id)', 'left');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        $this->db->order_by('a.note_at', 'asc');
        return $this->db->get()->result();
    }

    function get_climatic_history($paParams){
        $this->db->select('w.license_id, p.protocol_id, w.period, w.pluviometry,'.
                          'h.pluviometry pluviometry_history, w.temperature, h.temperature temperature_history');
        $this->db->from('vi_weather_monthly w');
        $this->db->join('(select p.license_id, p.protocol_id, p.period_start, p.period_end'.
                          ' from vi_protocols_period p) p', '(p.license_id=w.license_id)', 'left');
        $this->db->join('(select h.license_id, h.num_month, h.pluviometry, h.temperature'.
                          ' from vi_weather_history_monthly h) h', '(h.license_id=w.license_id and h.num_month=w.num_month)', 'left');
        $this->db->where('w.license_id', $paParams['license_id']);
        $this->db->where('md5(p.protocol_id)', $paParams['protocol_id']);
        $this->db->where('w.period >= p.period_start');
        $this->db->where('w.period <= p.period_end');
        $this->db->order_by('w.license_id, w.period');
        return $this->db->get()->result();
    }

    function get_samples_analyze($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,
                        round(avg(a.num_atr),1) num_atr,
                        round(avg(a.num_tch),1) num_tch,
                        round(avg(a.num_tah),1) num_tah,
                        round(avg(a.num_wei),1) num_wei,
                        p1.pos_atr, p2.pos_tch, p3.pos_tah, p4.pos_wei');
        $this->db->from('vi_samples_analyze_average a');
        $this->db->join('(select b.license_id, b.protocol_id, b.treatment_id, @curRow_1 := @curRow_1 + 1 as pos_atr 
                            from vi_samples_analyze_average b 
                            join (select @curRow_1 := 0) r
                           where b.license_id='.$paParams['license_id'].' and md5(b.protocol_id)="'.$paParams['protocol_id'].'" 
                           order by b.num_atr desc) p1', '(p1.license_id=a.license_id and p1.protocol_id=a.protocol_id and p1.treatment_id=a.treatment_id)');
        $this->db->join('(select b.license_id, b.protocol_id, b.treatment_id, @curRow_2 := @curRow_2 + 1 as pos_tch 
                            from vi_samples_analyze_average b 
                            join (select @curRow_2 := 0) r
                           where b.license_id='.$paParams['license_id'].' and md5(b.protocol_id)="'.$paParams['protocol_id'].'" 
                           order by b.num_tch desc) p2', '(p2.license_id=a.license_id and p2.protocol_id=a.protocol_id and p2.treatment_id=a.treatment_id)');
        $this->db->join('(select b.license_id, b.protocol_id, b.treatment_id, @curRow_3 := @curRow_3 + 1 as pos_tah 
                            from vi_samples_analyze_average b 
                            join (select @curRow_3 := 0) r
                           where b.license_id='.$paParams['license_id'].' and md5(b.protocol_id)="'.$paParams['protocol_id'].'" 
                           order by b.num_tah desc) p3', '(p3.license_id=a.license_id and p3.protocol_id=a.protocol_id and p3.treatment_id=a.treatment_id)');
        $this->db->join('(select b.license_id, b.protocol_id, b.treatment_id, @curRow_4 := @curRow_4 + 1 as pos_wei 
                            from vi_samples_analyze_average b 
                            join (select @curRow_4 := 0) r
                           where b.license_id='.$paParams['license_id'].' and md5(b.protocol_id)="'.$paParams['protocol_id'].'" 
                           order by b.num_wei desc) p4', '(p4.license_id=a.license_id and p4.protocol_id=a.protocol_id and p4.treatment_id=a.treatment_id)');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        $this->db->group_by('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, p1.pos_atr, p2.pos_tch, p3.pos_tah, p4.pos_wei');
        $this->db->order_by('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name');
        return $this->db->get()->result();
    }

    function get_treatments_period($paParams){
        $this->db->select('vps.treatment_id, vps.treatment_name');
        $this->db->from('vi_protocols_sketches vps');
        $this->db->join('vi_samples_analyze sa', '(sa.license_id=vps.license_id and sa.protocol_id=vps.protocol_id and sa.sketch_id=vps.sketch_id)');
        $this->db->where('vps.license_id', $paParams['license_id']);
        $this->db->where('md5(vps.protocol_id)', $paParams['protocol_id']);
        $this->db->group_by('vps.treatment_id, vps.treatment_name');
        $this->db->order_by('vps.treatment_id, vps.treatment_name');
        return $this->db->get()->result();
    }

  function get_samples_analyze_period($paParams){
    $this->db->select('sap.license_id, sap.protocol_id, sap.treatment_id, sap.treatment_name,'.
                      'avg(sap.num_atr) num_atr, avg(p1.pos_atr) pos_atr,'.
                      'avg(sap.num_tch) num_tch, avg(p2.pos_tch) pos_tch,'.
                      'avg(sap.num_tah) num_tah, avg(p3.pos_tah) pos_tah,'.
                      'avg(med.num_atr_avg) num_atr_avg,'.
                      'avg(med.num_tch_avg) num_tch_avg,'.
                      'avg(med.num_tah_avg) num_tah_avg');
    $this->db->from('vi_samples_weight_treatment_period sap');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_atr, @curRow_1 := @curRow_1 + 1 as pos_atr'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_atr) num_atr'.
                              ' from vi_samples_weight_treatment_period v2'.
                             ' where v2.license_id='.$paParams['license_id'].
                               ' and md5(v2.protocol_id)="'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_1 := 0) rn1'.
                     ' order by v1.num_atr desc) p1', '(p1.license_id=sap.license_id and p1.protocol_id=sap.protocol_id and p1.treatment_id=sap.treatment_id)');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_tch, @curRow_2 := @curRow_2 + 1 as pos_tch'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_tch) num_tch'.
                              ' from vi_samples_weight_treatment_period v2'.
                             ' where v2.license_id='.$paParams['license_id'].
                               ' and md5(v2.protocol_id)="'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_2 := 0) rn2'.
                     ' order by v1.num_tch desc) p2', '(p2.license_id=sap.license_id and p2.protocol_id=sap.protocol_id and p2.treatment_id=sap.treatment_id)');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_tah, @curRow_3 := @curRow_3 + 1 as pos_tah'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_tah) num_tah'.
                              ' from vi_samples_weight_treatment_period v2'.
                             ' where v2.license_id='.$paParams['license_id'].
                               ' and md5(v2.protocol_id)="'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_3 := 0) rn3'.
                     ' order by v1.num_tah desc) p3', '(p3.license_id=sap.license_id and p3.protocol_id=sap.protocol_id and p3.treatment_id=sap.treatment_id)');
    $this->db->join('(select m.license_id, m.protocol_id,'.
                           ' round(avg(m.num_atr),2) num_atr_avg,'.
                           ' round(avg(m.num_tch),2) num_tch_avg,'.
                           ' round(avg(m.num_tah),2) num_tah_avg'.
                      ' from vi_samples_weight_treatment_period m'.
                     ' group by m.license_id, m.protocol_id) med', '(med.license_id=sap.license_id and med.protocol_id=sap.protocol_id)');
    $this->db->where('sap.license_id', $paParams['license_id']);
    $this->db->where('md5(sap.protocol_id)', $paParams['protocol_id']);
    $this->db->group_by('sap.license_id, sap.protocol_id, sap.treatment_id, sap.treatment_name');
    $this->db->order_by('sap.treatment_name');
    return $this->db->get()->result();
  }

  function get_samples_analyze_graphic_period($paParams){
    $ls_query = 'select vps.license_id, vps.protocol_id, vps.dt_sample'.$paParams['sql_select_sum'].
                 ' from '.
                 ' (select vps.license_id, vps.protocol_id, vps.treatment_id, vps.treatment_name, sa.dt_sample '.$paParams['sql_subquery_avg'].
                    ' from vi_protocols_sketches vps '.
                    ' join vi_samples_analyze sa on (sa.license_id=vps.license_id and sa.protocol_id=vps.protocol_id and sa.sketch_id=vps.sketch_id) '.
                   ' where vps.license_id = '.$paParams['license_id'].
                     ' and md5(vps.protocol_id) = "'.$paParams['protocol_id'].'"'.
                   ' group by vps.license_id, vps.protocol_id, vps.treatment_id, vps.treatment_name, sa.dt_sample '.
                   ' order by vps.license_id, vps.protocol_id, vps.treatment_id, vps.treatment_name, sa.dt_sample '.
                 ' ) vps '.
                ' where vps.license_id = '.$paParams['license_id'].
                  ' and md5(vps.protocol_id) = "'.$paParams['protocol_id'].'"'.
                ' group by vps.license_id, vps.protocol_id, vps.dt_sample';
    $lo_query = $this->db->query($ls_query);
    return $lo_query;
  }

    function get_biometry_st_gp($paParams){
        $li_license = $paParams['license_id'];
        $ls_protocol = trim($paParams['protocol_id']);

        $ls_query = 'select r.license_id, r.protocol_id, r.treatment_id, r.treatment_name,
                            sum(r.num_stems) num_stems, sum(r.pos_stems) pos_stems,
                            sum(r.num_weight) num_weight, sum(r.pos_weight) pos_weight,
                            sum(r.num_gaps) num_gaps, sum(r.perc_gaps) perc_gaps, sum(r.pos_gaps) pos_gaps
                       from (
                            /* stems */
                             select a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,
                                    a.num_stems, p1.pos_stems, 0 num_weight, 0 pos_weight, 0 num_gaps, 0 perc_gaps, 0 pos_gaps
                               from vi_samples_stems_average a
                               join (select b.license_id, b.protocol_id, b.treatment_id, @curRow_1 := @curRow_1 + 1 as pos_stems
                                       from vi_samples_stems_average b
                                       join (select @curRow_1 := 0) r
                                      where b.license_id = '.$li_license.'
                                        and md5(b.protocol_id) = "'.$ls_protocol.'"
                                      order by b.num_stems desc
                                    ) p1 on (p1.license_id=a.license_id and p1.protocol_id=a.protocol_id and p1.treatment_id=a.treatment_id)
                              group by a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, p1.pos_stems

                            /* weight */
                              union all
                             select a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,
                                    0 num_stems, 0 pos_stems, a.num_weight, p2.pos_weight, 0 num_gaps, 0 perc_gaps, 0 pos_gaps
                               from vi_samples_weight_average a
                               join (select b.license_id, b.protocol_id, b.treatment_id, @curRow_2 := @curRow_2 + 1 as pos_weight
                                       from vi_samples_weight_average b
                                       join (select @curRow_2 := 0) r
                                      where b.license_id = '.$li_license.'
                                        and md5(b.protocol_id)="'.$ls_protocol.'"
                                      order by b.num_weight desc
                                    ) p2 on (p2.license_id=a.license_id and p2.protocol_id=a.protocol_id and p2.treatment_id=a.treatment_id)
                              group by a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, p2.pos_weight

                            /* gaps */
                              union all
                             select a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,
                                    0 num_stems, 0 pos_stems, 0 num_weight, 0 pos_weight, a.num_gaps, a.perc_gaps, p3.pos_gaps
                               from vi_samples_gaps_average a
                               join (select b.license_id, b.protocol_id, b.treatment_id, @curRow_3 := @curRow_3 + 1 as pos_gaps
                                       from vi_samples_gaps_average b
                                       join (select @curRow_3 := 0) r
                                      where b.license_id = '.$li_license.'
                                        and md5(b.protocol_id)="'.$ls_protocol.'"
                                      order by b.num_gaps desc
                                    ) p3 on (p3.license_id=a.license_id and p3.protocol_id=a.protocol_id and p3.treatment_id=a.treatment_id)
                              group by a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, p3.pos_gaps
                            ) r
                      where r.license_id = '.$li_license.'
                        and md5(r.protocol_id) = "'.$ls_protocol.'"
                      group by r.license_id, r.protocol_id, r.treatment_id, r.treatment_name
                      order by r.license_id, r.protocol_id, r.treatment_id, r.treatment_name';
        
        $lo_query = $this->db->query($ls_query)->result_array();
        return $lo_query;
    }

  function get_biometry_stems($paParams){
    $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                      'round(avg(a.num_stems_meter), 2) num_stems,'.
                      'round(avg(a.num_diameter_avg), 2) num_diameter,'.
                      'round(avg(a.num_height_avg), 2) num_height,'.
                      'round(avg(a.tch_volumetric), 2) tch_volumetric,'.
                      'round(avg(a.tch_volumetric_minus15), 2) tch_volumetric_minus15,'.
                      'round(avg(case when c.tch_volumetric_avg is null then 0.00 else c.tch_volumetric_avg end), 2) tch_volumetric_minus15_avg,'.
                      'p1.pos_stems, p2.pos_diameter, p3.pos_height, p4.pos_tch');
    $this->db->from('vi_biometry_stems a');
    $this->db->join('(select b1.license_id, b1.protocol_id, avg(b1.tch_volumetric) tch_volumetric_avg'.
                      ' from (select b.license_id, b.protocol_id, b.treatment_id, round(avg(b.tch_volumetric_minus15), 2) tch_volumetric'.
                              ' from vi_biometry_stems b'.
                             ' where b.license_id = '.$paParams['license_id'].
                               ' and md5(b.protocol_id) = "'.trim($paParams['protocol_id']).'"'.
                             ' group by b.license_id, b.protocol_id, b.treatment_id) b1 '.
                     ' group by b1.license_id, b1.protocol_id) c', '(c.license_id=a.license_id and c.protocol_id=a.protocol_id)', 'left');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_stems_meter, @curRow_1 := @curRow_1 + 1 as pos_stems'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_stems_meter) num_stems_meter'.
                              ' from vi_biometry_stems v2'.
                             ' where v2.license_id='.$paParams['license_id'].
                               ' and md5(v2.protocol_id)="'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_1 := 0) rn1'.
                     ' order by v1.num_stems_meter desc) p1', '(p1.license_id=a.license_id and p1.protocol_id=a.protocol_id and p1.treatment_id=a.treatment_id)');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_diameter_avg, @curRow_2 := @curRow_2 + 1 as pos_diameter'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_diameter_avg) num_diameter_avg'.
                              ' from vi_biometry_stems v2'.
                             ' where v2.license_id='.$paParams['license_id'].
                               ' and md5(v2.protocol_id)="'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_2 := 0) rn2'.
                     ' order by v1.num_diameter_avg desc) p2', '(p2.license_id=a.license_id and p2.protocol_id=a.protocol_id and p2.treatment_id=a.treatment_id)');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_height_avg, @curRow_3 := @curRow_3 + 1 as pos_height'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_height_avg) num_height_avg'.
                              ' from vi_biometry_stems v2'.
                             ' where v2.license_id='.$paParams['license_id'].
                               ' and md5(v2.protocol_id)="'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_3 := 0) rn3'.
                     ' order by v1.num_height_avg desc) p3', '(p3.license_id=a.license_id and p3.protocol_id=a.protocol_id and p3.treatment_id=a.treatment_id)');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.tch_volumetric_minus15, @curRow_4 := @curRow_4 + 1 as pos_tch'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.tch_volumetric_minus15) tch_volumetric_minus15'.
                              ' from vi_biometry_stems v2'.
                             ' where v2.license_id='.$paParams['license_id'].
                               ' and md5(v2.protocol_id)="'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_4 := 0) rn4'.
                     ' order by v1.tch_volumetric_minus15 desc) p4', '(p4.license_id=a.license_id and p4.protocol_id=a.protocol_id and p4.treatment_id=a.treatment_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->group_by('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                        'p1.pos_stems, p2.pos_diameter, p3.pos_height, p4.pos_tch');
    $this->db->order_by('a.license_id, a.protocol_id, a.treatment_name');
    return $this->db->get()->result();
  }

  function get_biometry_internodes($paParams){
    $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                      'round(a.num_node,2) num_node, p1.pos_node,'.
                      'a.num_pith, p2.pos_pith,'.
                      'a.perc_pith,'.
                      'a.num_flower, p3.pos_flower,'.
                      'a.perc_flower');
    $this->db->from('vi_biometry_internodes a');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_node, @curRow_1 := @curRow_1 + 1 as pos_node'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_node) num_node'.
                              ' from vi_biometry_internodes v2'.
                             ' where v2.license_id='.$paParams['license_id'].
                               ' and md5(v2.protocol_id)="'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_1 := 0) rn1'.
                     ' order by v1.num_node desc) p1', '(p1.license_id=a.license_id and p1.protocol_id=a.protocol_id and p1.treatment_id=a.treatment_id)');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_pith, @curRow_2 := @curRow_2 + 1 as pos_pith'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_pith) num_pith'.
                              ' from vi_biometry_internodes v2'.
                             ' where v2.license_id='.$paParams['license_id'].
                               ' and md5(v2.protocol_id)="'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_2 := 0) rn1'.
                     ' order by v1.num_pith desc) p2', '(p2.license_id=a.license_id and p2.protocol_id=a.protocol_id and p2.treatment_id=a.treatment_id)');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_flower, @curRow_3 := @curRow_3 + 1 as pos_flower'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_flower) num_flower'.
                              ' from vi_biometry_internodes v2'.
                             ' where v2.license_id='.$paParams['license_id'].
                               ' and md5(v2.protocol_id)="'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_3 := 0) rn1'.
                     ' order by v1.num_flower desc) p3', '(p3.license_id=a.license_id and p3.protocol_id=a.protocol_id and p3.treatment_id=a.treatment_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->order_by('a.treatment_name');
    return $this->db->get()->result();
  }

  function get_biometry_infestation($paParams){
    $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                      'round(a.num_node,2) num_node, p1.pos_node,'.
                      'a.num_infestation, p2.pos_infestation,'.
                      'a.num_hole, p3.pos_hole,'.
                      'a.perc_hole,'.
                      'a.num_damage, p4.pos_damage,'.
                      'a.perc_damage');
    $this->db->from('vi_biometry_infestation a');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_node, @curRow_1 := @curRow_1 + 1 as pos_node'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_node) num_node'.
                              ' from vi_biometry_infestation v2'.
                             ' where v2.license_id = '.$paParams['license_id'].
                             '   and md5(v2.protocol_id) = "'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_1 := 0) rn1'.
                     ' order by v1.num_node desc) p1', '(p1.license_id=a.license_id and p1.protocol_id=a.protocol_id and p1.treatment_id=a.treatment_id)');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_infestation, @curRow_2 := @curRow_2 + 1 as pos_infestation'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_infestation) num_infestation'.
                              ' from vi_biometry_infestation v2'.
                             ' where v2.license_id = '.$paParams['license_id'].
                             '   and md5(v2.protocol_id) = "'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_2 := 0) rn1'.
                     ' order by v1.num_infestation desc) p2', '(p2.license_id=a.license_id and p2.protocol_id=a.protocol_id and p2.treatment_id=a.treatment_id)');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_hole, @curRow_3 := @curRow_3 + 1 as pos_hole'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_hole) num_hole'.
                              ' from vi_biometry_infestation v2'.
                             ' where v2.license_id = '.$paParams['license_id'].
                             '   and md5(v2.protocol_id) = "'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_3 := 0) rn1'.
                     ' order by v1.num_hole desc) p3', '(p3.license_id=a.license_id and p3.protocol_id=a.protocol_id and p3.treatment_id=a.treatment_id)');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_damage, @curRow_4 := @curRow_4 + 1 as pos_damage'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_damage) num_damage'.
                              ' from vi_biometry_infestation v2'.
                             ' where v2.license_id = '.$paParams['license_id'].
                             '   and md5(v2.protocol_id) = "'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_4 := 0) rn1'.
                     ' order by v1.num_damage desc) p4', '(p4.license_id=a.license_id and p4.protocol_id=a.protocol_id and p4.treatment_id=a.treatment_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->order_by('a.treatment_name');
    return $this->db->get()->result();
  }

  function get_biometry_tillers($paParams){
    $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                      'a.num_tiller, p1.pos_tiller,'.
                      'a.num_gap, p2.pos_gap,'.
                      'a.num_tiller_mts, p3.pos_tiller_mts,'.
                      'a.perc_gap, p4.pos_perc_gap');
    $this->db->from('vi_biometry_tillers a');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_tiller, @curRow_1 := @curRow_1 + 1 as pos_tiller'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_tiller) num_tiller'.
                              ' from vi_biometry_tillers v2'.
                             ' where v2.license_id = '.$paParams['license_id'].
                             '   and md5(v2.protocol_id) = "'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_1 := 0) rn1'.
                     ' order by v1.num_tiller desc) p1', '(p1.license_id=a.license_id and p1.protocol_id=a.protocol_id and p1.treatment_id=a.treatment_id)');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_gap, @curRow_2 := @curRow_2 + 1 as pos_gap'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_gap) num_gap'.
                              ' from vi_biometry_tillers v2'.
                             ' where v2.license_id = '.$paParams['license_id'].
                             '   and md5(v2.protocol_id) = "'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_2 := 0) rn1'.
                     ' order by v1.num_gap desc) p2', '(p2.license_id=a.license_id and p2.protocol_id=a.protocol_id and p2.treatment_id=a.treatment_id)');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.num_tiller_mts, @curRow_3 := @curRow_3 + 1 as pos_tiller_mts'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.num_tiller_mts) num_tiller_mts'.
                              ' from vi_biometry_tillers v2'.
                             ' where v2.license_id = '.$paParams['license_id'].
                             '   and md5(v2.protocol_id) = "'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_3 := 0) rn1'.
                     ' order by v1.num_tiller_mts desc) p3', '(p3.license_id=a.license_id and p3.protocol_id=a.protocol_id and p3.treatment_id=a.treatment_id)');
    $this->db->join('(select v1.license_id, v1.protocol_id, v1.treatment_id, v1.perc_gap, @curRow_4 := @curRow_4 + 1 as pos_perc_gap'.
                      ' from (select v2.license_id, v2.protocol_id, v2.treatment_id, avg(v2.perc_gap) perc_gap'.
                              ' from vi_biometry_tillers v2'.
                             ' where v2.license_id = '.$paParams['license_id'].
                             '   and md5(v2.protocol_id) = "'.$paParams['protocol_id'].'"'.
                             ' group by v2.license_id, v2.protocol_id, v2.treatment_id) v1'.
                      ' join (select @curRow_4 := 0) rn1'.
                     ' order by v1.perc_gap desc) p4', '(p4.license_id=a.license_id and p4.protocol_id=a.protocol_id and p4.treatment_id=a.treatment_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->order_by('a.treatment_name');
    return $this->db->get()->result();
  }

  function get_biometry_diseases($paParams){
    $this->db->select('a.license_id, a.protocol_id,'.
                      'a.disease_id, d.name disease_name, d.short_name disease_short_name, d.agent disease_agent,'.
                      'count(*) subtotal, b.total,'.
                      'round(case when b.total > 0 then ((count(*) / b.total) * 100) else 0 end, 2) disease_perc');
    $this->db->from('samples_diseases a');
    $this->db->join('diseases d', '(d.license_id=a.license_id and d.disease_id = a.disease_id)');
    $this->db->join('(select b.license_id, b.protocol_id, count(*) total'.
                      ' from samples_diseases b'.
                     ' group by b.license_id, b.protocol_id) b', '(b.license_id=a.license_id and b.protocol_id = a.protocol_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->group_by('a.license_id, a.protocol_id, a.disease_id, d.name, d.short_name, d.agent');
    $this->db->order_by('a.license_id, a.protocol_id, a.disease_id');
    return $this->db->get()->result();
  }

  function get_biometry_diseases_dat($paParams){
    $this->db->select('a.license_id, a.protocol_id,'.
                      'a.disease_id, d.name disease_name, d.short_name disease_short_name');
    $this->db->from('samples_diseases a');
    $this->db->join('diseases d', '(d.license_id=a.license_id and d.disease_id = a.disease_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->group_by('a.license_id, a.protocol_id, a.disease_id, d.name, d.short_name');
    $this->db->order_by('a.license_id, a.protocol_id, a.disease_id');
    return $this->db->get()->result();
  }

  function get_biometry_diseases_cross($paParams){
    $ls_query = 'select p.license_id, p.protocol_id, p.treatment_id, p.treatment_name'.
                $paParams['sql_select_sum'].
                 ' from ('.
                       ' select s.license_id, s.protocol_id, s.treatment_id, s.treatment_name'.
                                $paParams['sql_subquery_diseases'].
                         ' from ('.
                               ' select a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, d.disease_id, count(*) qtd '.
                                 ' from vi_protocols_sketches a '.
                                 ' join samples_diseases d on (d.license_id=a.license_id and d.protocol_id=a.protocol_id and d.sketch_id=a.sketch_id) '.
                                ' where a.license_id = '.$paParams['license_id'].
                                  ' and md5(a.protocol_id) = "'.$paParams['protocol_id'].'"'.
                                ' group by a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, d.disease_id '.
                                ' order by a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, d.disease_id '.
                               ') s '.
                       ') p '.
                ' group by p.license_id, p.protocol_id, p.treatment_id, p.treatment_name '.
                ' order by p.license_id, p.protocol_id, p.treatment_id, p.treatment_name ';
    $lo_query = $this->db->query($ls_query);
    return $lo_query;
  }

  function get_biometry_diseases_groups_dat($paParams){
    $this->db->select('a.license_id, a.protocol_id, d.group_id, g.name group_name');
    $this->db->from('samples_diseases a');
    $this->db->join('diseases d', '(d.license_id=a.license_id and d.disease_id = a.disease_id)');
    $this->db->join('diseases_groups g', '(g.license_id=d.license_id and g.group_id=d.group_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->group_by('a.license_id, a.protocol_id, d.group_id, g.name');
    $this->db->order_by('a.license_id, a.protocol_id, d.group_id');
    return $this->db->get()->result();
  }

  function get_biometry_diseases_groups_cross($paParams){
    $ls_query = 'select p.license_id, p.protocol_id, p.treatment_id, p.treatment_name'.
                $paParams['sql_select_groups_sum'].
                 ' from ('.
                       ' select sq.license_id, sq.protocol_id, sq.treatment_id, sq.treatment_name'.
                                $paParams['sql_subquery_diseases_groups'].
                         ' from ('.
                               ' select a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, ds.group_id, count(*) qtd '.
                                 ' from vi_protocols_sketches a '.
                                 ' join samples_diseases d on (d.license_id=a.license_id and d.protocol_id=a.protocol_id and d.sketch_id=a.sketch_id) '.
                                 ' join diseases ds on (ds.license_id=d.license_id and ds.disease_id=d.disease_id)'.
                                 ' join diseases_groups dg on (dg.license_id=ds.license_id and dg.group_id=ds.group_id)'.
                                ' where a.license_id = '.$paParams['license_id'].
                                  ' and md5(a.protocol_id) = "'.$paParams['protocol_id'].'"'.
                                ' group by a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, ds.group_id '.
                                ' order by a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, ds.group_id '.
                               ') sq '.
                       ') p '.
                ' group by p.license_id, p.protocol_id, p.treatment_id, p.treatment_name '.
                ' order by p.license_id, p.protocol_id, p.treatment_id, p.treatment_name ';
    $lo_query = $this->db->query($ls_query);
    return $lo_query;
  }

  function get_biometry_diseases_groups($paParams){
    $this->db->select('a.license_id, a.protocol_id,'.
                      'ps.treatment_id, ps.treatment_name, d.group_id, dg.name group_name,'.
                      'count(*) subtotal, b.total,'.
                      'round(case when b.total > 0 then ((count(*) / b.total) * 100) else 0 end, 2) group_perc');
    $this->db->from('samples_diseases a');
    $this->db->join('diseases d', '(d.license_id=a.license_id and d.disease_id = a.disease_id)');
    $this->db->join('diseases_groups dg', '(dg.license_id=d.license_id and dg.group_id = d.group_id)');
    $this->db->join('(select b.license_id, b.protocol_id, count(*) total'.
                      ' from samples_diseases b'.
                     ' group by b.license_id, b.protocol_id) b', '(b.license_id=a.license_id and b.protocol_id = a.protocol_id)');
    $this->db->join('vi_protocols_sketches ps', '(ps.license_id=a.license_id and ps.protocol_id = a.protocol_id and ps.sketch_id=a.sketch_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->group_by('a.license_id, a.protocol_id, ps.treatment_id, ps.treatment_name, d.group_id, dg.name');
    $this->db->order_by('a.license_id, a.protocol_id, ps.treatment_name, dg.name');
    return $this->db->get()->result();
  }

  function get_biometry_pests($paParams){
    $this->db->select('a.license_id, a.protocol_id,'.
                      'a.pest_id, d.name pest_name, d.short_name pest_short_name,'.
                      'count(*) subtotal, b.total,'.
                      'round(case when b.total > 0 then ((count(*) / b.total) * 100) else 0 end, 2) pest_perc');
    $this->db->from('samples_pests a');
    $this->db->join('pests d', '(d.license_id=a.license_id and d.pest_id = a.pest_id)');
    $this->db->join('(select b.license_id, b.protocol_id, count(*) total'.
                      ' from samples_pests b'.
                     ' group by b.license_id, b.protocol_id) b', '(b.license_id=a.license_id and b.protocol_id = a.protocol_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->group_by('a.license_id, a.protocol_id, a.pest_id, d.name');
    $this->db->order_by('a.license_id, a.protocol_id, a.pest_id');
    return $this->db->get()->result();
  }

  function get_biometry_pests_dat($paParams){
    $this->db->select('a.license_id, a.protocol_id,'.
                      'a.pest_id, p.name pest_name, p.short_name pest_short_name');
    $this->db->from('samples_pests a');
    $this->db->join('pests p', '(p.license_id=a.license_id and p.pest_id = a.pest_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->group_by('a.license_id, a.protocol_id, a.pest_id, p.name, p.short_name');
    $this->db->order_by('a.license_id, a.protocol_id, a.pest_id');
    return $this->db->get()->result();
  }

  function get_biometry_pests_cross($paParams){
    $ls_query = 'select p.license_id, p.protocol_id, p.treatment_id, p.treatment_name'.
                $paParams['sql_select_sum'].
                 ' from ('.
                       ' select s.license_id, s.protocol_id, s.treatment_id, s.treatment_name'.
                                $paParams['sql_subquery_pests'].
                         ' from ('.
                               ' select a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, p.pest_id, count(*) qtd '.
                                 ' from vi_protocols_sketches a '.
                                 ' join samples_pests p on (p.license_id=a.license_id and p.protocol_id=a.protocol_id and p.sketch_id=a.sketch_id) '.
                                ' where a.license_id = '.$paParams['license_id'].
                                  ' and md5(a.protocol_id) = "'.$paParams['protocol_id'].'"'.
                                ' group by a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, p.pest_id '.
                                ' order by a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, p.pest_id '.
                               ') s '.
                       ') p '.
                ' group by p.license_id, p.protocol_id, p.treatment_id, p.treatment_name '.
                ' order by p.license_id, p.protocol_id, p.treatment_id, p.treatment_name ';
    $lo_query = $this->db->query($ls_query);
    return $lo_query;
  }

  function get_biometry_pests_groups_dat($paParams){
    $this->db->select('a.license_id, a.protocol_id, d.group_id, g.name group_name');
    $this->db->from('samples_pests a');
    $this->db->join('pests d', '(d.license_id=a.license_id and d.pest_id = a.pest_id)');
    $this->db->join('pests_groups g', '(g.license_id=d.license_id and g.group_id=d.group_id)');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->group_by('a.license_id, a.protocol_id, d.group_id, g.name');
    $this->db->order_by('a.license_id, a.protocol_id, d.group_id');
    return $this->db->get()->result();
  }

  function get_biometry_pests_groups_cross($paParams){
    $ls_query = 'select p.license_id, p.protocol_id, p.treatment_id, p.treatment_name'.
                $paParams['sql_select_groups_sum'].
                 ' from ('.
                       ' select sq.license_id, sq.protocol_id, sq.treatment_id, sq.treatment_name'.
                                $paParams['sql_subquery_pests_groups'].
                         ' from ('.
                               ' select a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, ds.group_id, count(*) qtd '.
                                 ' from vi_protocols_sketches a '.
                                 ' join samples_pests d on (d.license_id=a.license_id and d.protocol_id=a.protocol_id and d.sketch_id=a.sketch_id) '.
                                 ' join pests ds on (ds.license_id=d.license_id and ds.pest_id=d.pest_id)'.
                                 ' join pests_groups dg on (dg.license_id=ds.license_id and dg.group_id=ds.group_id)'.
                                ' where a.license_id = '.$paParams['license_id'].
                                  ' and md5(a.protocol_id) = "'.$paParams['protocol_id'].'"'.
                                ' group by a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, ds.group_id '.
                                ' order by a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, ds.group_id '.
                               ') sq '.
                       ') p '.
                ' group by p.license_id, p.protocol_id, p.treatment_id, p.treatment_name '.
                ' order by p.license_id, p.protocol_id, p.treatment_id, p.treatment_name ';
    $lo_query = $this->db->query($ls_query);
    return $lo_query;
  }

  function get_treatment_index($paParams){
    $this->db->select('a.license_id, a.currency_id, a.name currency_name');
    $this->db->from('currencies a');
    $this->db->join('auth_licenses_params b', 'b.license_id=a.license_id and b.currency_id=a.currency_id');
    $this->db->where('a.license_id', $paParams['license_id']);
    return $this->db->get()->result();
  }

  function get_treatment_cost($paParams){
    $this->db->select('a.license_id, a.protocol_id, a.treatment_id,'.
                      'a.product_id_main, a.product_name_main, a.manufacturer_name,'.
                      'a.product_id, a.product_name, a.is_main,'.
                      'a.dose, a.dose_cost, a.ha_cost,'.
                      'a.purchase_dt, a.rate_value');
    $this->db->from('vi_protocols_products_cost a');
    $this->db->where('a.license_id', $paParams['license_id']);
    $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
    $this->db->order_by('a.license_id, a.protocol_id, a.treatment_id, a.is_main desc');
    return $this->db->get()->result();
  }

  function get_treatment_cost_total($paParams){
    $this->db->select('v.license_id, v.protocol_id, v.treatment_id, v.product_id_main, v.product_name_main, v.manufacturer_name,'.
                      'sum(v.ha_cost) ha_cost, b.ha_cost_avg');
    $this->db->from('vi_protocols_products_cost v');
    $this->db->join('(select b.license_id, b.protocol_id, avg(a.ha_cost_sum) ha_cost_avg'.
                      ' from vi_protocols_products_cost b'.
                      ' join (select a.license_id, a.protocol_id, a.treatment_id, sum(a.ha_cost) ha_cost_sum'.
                              ' from vi_protocols_products_cost a'.
                             ' group by a.license_id, a.protocol_id, a.treatment_id) a on (a.license_id=b.license_id and a.protocol_id=b.protocol_id)'.
                     ' group by b.license_id, b.protocol_id) b', '(b.license_id=v.license_id and b.protocol_id=v.protocol_id)');
    $this->db->where('v.license_id', $paParams['license_id']);
    $this->db->where('md5(v.protocol_id)', $paParams['protocol_id']);
    $this->db->group_by('v.treatment_id, v.product_id_main, v.product_name_main, v.manufacturer_name');
    $this->db->order_by('v.treatment_id');
    return $this->db->get()->result();
  }

  function get_compounds($paParams){
    $this->db->select('ppc.protocol_id,'.
                      'ppc.treatment_id, p.name treatment_name,'.
                      'ppc.compound_id, c.short_name compound_short_name, c.name compound_name,'.
                      'p.manufacturer_id, m.name manufacturer_name,'.
                      'avg(ppc.guarantee) guarantee,'.
                      'round(avg(vsc.num_compound),2) num_compound,'.
                      'round(case when (avg(ppc.guarantee) > 0) then (((100 * avg(vsc.num_compound))/avg(ppc.guarantee))-100) else 0 end,2) perc_result');
    $this->db->from('protocols_products_compounds ppc');
    $this->db->join('protocols_products pp', '(pp.license_id=ppc.license_id and pp.protocol_id=ppc.protocol_id and pp.treatment_id=ppc.treatment_id)');
    $this->db->join('products p', '(p.license_id=pp.license_id and p.product_id=pp.product_id)');
    $this->db->join('manufacturers m', '(m.license_id=p.license_id and m.manufacturer_id=p.manufacturer_id)');
    $this->db->join('compounds c', '(c.license_id=ppc.license_id and c.compound_id=ppc.compound_id)', 'left');
    $this->db->join('vi_samples_compounds vsc', '(vsc.license_id=ppc.license_id and vsc.treatment_id=ppc.treatment_id and vsc.protocol_id=ppc.protocol_id and vsc.compound_id=ppc.compound_id)', 'left');
    $this->db->where('ppc.license_id', $paParams['license_id']);
    $this->db->where('md5(ppc.protocol_id)', $paParams['protocol_id']);
    $this->db->group_by('ppc.protocol_id, ppc.treatment_id, p.name, ppc.compound_id, c.short_name, c.name, p.manufacturer_id, m.name');
    $this->db->order_by('ppc.treatment_id, ppc.compound_id, c.name');
    return $this->db->get()->result();
  }

  function get_math_protocols_variables($paParams){
    $this->db->select('pv.protocol_id, spv.variable_id, spv.name variable_name');
    $this->db->from('protocols_variables pv');
    $this->db->join('shared_protocols_variables spv', '(spv.variable_id=pv.variable_id)');
    $this->db->where('pv.license_id', $paParams['license_id']);
    $this->db->where('md5(pv.protocol_id)', $paParams['protocol_id']);
    $this->db->order_by('spv.order_by');
    return $this->db->get()->result();
  }

    /* -------------------------------------------------------------------------
    Buscando dados para aplicar as regras
    ------------------------------------------------------------------------- */
    function get_math_stats_samples_atr($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name, a.num_atr_avg value');
        $this->db->from('vi_stats_samples_atr a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    function get_math_anova_treatments_sum_atr($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, sum(a.num_atr_avg) value');
        $this->db->from('vi_stats_samples_atr a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        $this->db->group_by('a.license_id, a.protocol_id, a.treatment_id');
        return $this->db->get()->result();
    }
    function get_math_anova_repetitions_sum_atr($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.dt_sample, sum(a.num_atr_avg) value');
        $this->db->from('vi_stats_samples_atr a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        $this->db->group_by('a.license_id, a.protocol_id, a.dt_sample');
        return $this->db->get()->result();
    }
    /* ---------------------------------------------------------------------- */







    function get_math_anova_atr($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_atr_sum value_sum,'.
                'a.num_atr_avg value_avg,'.
                'a.num_atr_s2 num_s2');
        $this->db->from('vi_anova_analyze a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    function get_math_anova_atr_samples($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_atr_sum value_sum,'.
                'a.num_atr_avg value_avg');
        $this->db->from('vi_anova_analyze_samples a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    function get_math_anova_atr_repetitions($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.dt_sample,'.
                'avg(a.num_atr_rep_sum) num_atr_rep_sum');
        $this->db->from('vi_anova_analyze_repetitions a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        $this->db->group_by('a.license_id, a.protocol_id, a.dt_sample');
        return $this->db->get()->result();
    }

    /* ---------------------------------------------------------------------- */
    function get_math_anova_pol($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_pol_sum value_sum,'.
                'a.num_pol_avg value_avg,'.
                'a.num_pol_s2 num_s2');
        $this->db->from('vi_anova_analyze a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    function get_math_anova_pol_samples($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_pol_sum value_sum,'.
                'a.num_pol_avg value_avg');
        $this->db->from('vi_anova_analyze_samples a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    /* ---------------------------------------------------------------------- */
    function get_math_anova_stems($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_stems_sum value_sum,'.
                'a.num_stems_avg value_avg,'.
                'a.num_stems_s2 num_s2');
        $this->db->from('vi_anova_stems a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    function get_math_anova_stems_samples($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_stems_sum value_sum,'.
                'a.num_stems_avg value_avg');
        $this->db->from('vi_anova_stems_samples a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    /* ---------------------------------------------------------------------- */
    function get_math_anova_diameters($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_diameter_sum value_sum,'.
                'a.num_diameter_avg value_avg,'.
                'a.num_diameter_s2 num_s2');
        $this->db->from('vi_anova_diameter a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    function get_math_anova_diameters_samples($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_diameter_sum value_sum,'.
                'a.num_diameter_avg value_avg');
        $this->db->from('vi_anova_diameter_samples a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    /* ---------------------------------------------------------------------- */
    function get_math_anova_heights($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_height_sum value_sum,'.
                'a.num_height_avg value_avg,'.
                'a.num_height_s2 num_s2');
        $this->db->from('vi_anova_heights a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    function get_math_anova_heights_samples($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_height_sum value_sum,'.
                'a.num_height_avg value_avg');
        $this->db->from('vi_anova_heights_samples a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    /* ---------------------------------------------------------------------- */
    function get_math_anova_internodes($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_node_sum value_sum,'.
                'a.num_node_avg value_avg,'.
                'a.num_node_s2 num_s2');
        $this->db->from('vi_anova_internodes a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    function get_math_anova_internodes_samples($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_node_sum value_sum,'.
                'a.num_node_avg value_avg');
        $this->db->from('vi_anova_internodes_samples a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    /* ---------------------------------------------------------------------- */
    function get_math_anova_tillers($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_tiller_sum value_sum,'.
                'a.num_tiller_avg value_avg,'.
                'a.num_tiller_s2 num_s2');
        $this->db->from('vi_anova_tillers a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    function get_math_anova_tillers_samples($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_tiller_sum value_sum,'.
                'a.num_tiller_avg value_avg');
        $this->db->from('vi_anova_tillers_samples a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    /* ---------------------------------------------------------------------- */
    function get_math_anova_flowering($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_flower_sum value_sum,'.
                'a.num_flower_avg value_avg,'.
                'a.num_flower_s2 num_s2');
        $this->db->from('vi_anova_flowering a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    function get_math_anova_flowering_samples($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_flower_sum value_sum,'.
                'a.num_flower_avg value_avg');
        $this->db->from('vi_anova_flowering_samples a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    /* ---------------------------------------------------------------------- */
    function get_math_anova_pith($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_pith_sum value_sum,'.
                'a.num_pith_avg value_avg,'.
                'a.num_pith_s2 num_s2');
        $this->db->from('vi_anova_pith a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    function get_math_anova_pith_samples($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_pith_sum value_sum,'.
                'a.num_pith_avg value_avg');
        $this->db->from('vi_anova_pith_samples a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    /* ---------------------------------------------------------------------- */
    function get_math_anova_holes($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_hole_sum value_sum,'.
                'a.num_hole_avg value_avg,'.
                'a.num_hole_s2 num_s2');
        $this->db->from('vi_anova_holes a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    function get_math_anova_holes_samples($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_hole_sum value_sum,'.
                'a.num_hole_avg value_avg');
        $this->db->from('vi_anova_holes_samples a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    /* ---------------------------------------------------------------------- */
    function get_math_anova_damages($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_damage_sum value_sum,'.
                'a.num_damage_avg value_avg,'.
                'a.num_damage_s2 num_s2');
        $this->db->from('vi_anova_damages a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    function get_math_anova_damages_samples($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_damage_sum value_sum,'.
                'a.num_damage_avg value_avg');
        $this->db->from('vi_anova_damages_samples a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    /* ---------------------------------------------------------------------- */
    function get_math_anova_infestation($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_infestation_sum value_sum,'.
                'a.num_infestation_avg value_avg,'.
                'a.num_infestation_s2 num_s2');
        $this->db->from('vi_anova_infestation a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }
    function get_math_anova_infestation_samples($paParams){
        $this->db->select('a.license_id, a.protocol_id, a.treatment_id, a.treatment_name,'.
                'a.num_infestation_sum value_sum,'.
                'a.num_infestation_avg value_avg');
        $this->db->from('vi_anova_infestation_samples a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
        return $this->db->get()->result();
    }

    /* ---------------------------------------------------------------------- */

    function get_math_anova_table_f($piGrauTratamento, $piGrauErro){
        $this->db->select('a.value');
        $this->db->from('shared_anova_table_f a');
        $this->db->where('a.column_f = ', $piGrauTratamento);
        $this->db->where('a.line_f = ', $piGrauErro);
        $this->db->where('a.percentage = ', 0.05);
        return $this->db->get()->result();
    }
    function get_math_anova_ratings($paParams, $prCoefficient){
        $this->db->select('a.min_value, a.max_value, a.sort, a.accuracy, a.color');
        $this->db->from('math_anova_ratings a');
        $this->db->where('a.license_id', $paParams['license_id']);
        $this->db->where('a.min_value <= ', $prCoefficient);
        $this->db->where('a.max_value > ', $prCoefficient);
        return $this->db->get()->result();
    }

    /* ---------------------------------------------------------------------- */
    /* -- Procedimentos de UPDATES ------------------------------------------ */
    /* ---------------------------------------------------------------------- */
    function upd_result_anova($pa_params){
        $this->db->set('anova_ftb', $pa_params['anova_ftb']);
        $this->db->set('anova_ftb_cv', $pa_params['anova_ftb_cv']);
        $this->db->set('anova_rat_values', $pa_params['anova_rat_values']);
        $this->db->set('anova_rat_sort', $pa_params['anova_rat_sort']);
        $this->db->set('anova_rat_color', $pa_params['anova_rat_color']);
        $this->db->set('anova_rat_accuracy', $pa_params['anova_rat_accuracy']);
        $this->db->where('license_id', $pa_params['license_id']);
        $this->db->where('md5(protocol_id)', $pa_params['protocol_id']);
        $this->db->update('protocols');
        if($this->db->trans_status()==TRUE){
            $this->db->trans_commit();
            return TRUE;
        }else{
            $this->db->trans_rollback();
            return FALSE;
        }
    }

}
