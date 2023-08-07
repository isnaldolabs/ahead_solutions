<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| ------------------------------------------------------------------------------
|  xml file appweb -> loading params
| ------------------------------------------------------------------------------
|
*/
function fo_get_appweb_connection(){
  $CI =& get_instance();
  $CI->load->library('encryption');
  $loFileName = 'appweb.xml';
  if (file_exists($loFileName)){
    $loConfig = simplexml_load_file($loFileName);
    $loNode['hostname'] = $CI->encryption->decrypt($loConfig->section_database->hostname);
    $loNode['username'] = $CI->encryption->decrypt($loConfig->section_database->username);
    $loNode['password'] = $CI->encryption->decrypt($loConfig->section_database->password);
    $loNode['database'] = $CI->encryption->decrypt($loConfig->section_database->database);
  }
  return $loNode;
}

function fo_get_appweb_email(){
  $CI =& get_instance();
  $CI->load->library('encryption');
  $loFileName = 'appweb.xml';
  if (file_exists($loFileName)){
    $loConfig = simplexml_load_file($loFileName);
    $loNode['host']             = $CI->encryption->decrypt($loConfig->section_email->host);
    $loNode['smtp_secure']      = $CI->encryption->decrypt($loConfig->section_email->smtp_secure);
    $loNode['port']             = $CI->encryption->decrypt($loConfig->section_email->port);
    $loNode['smtp_auto_tls']    = $CI->encryption->decrypt($loConfig->section_email->smtp_auto_tls);
    $loNode['smtp_auth']        = $CI->encryption->decrypt($loConfig->section_email->smtp_auth);
    $loNode['charset']          = $CI->encryption->decrypt($loConfig->section_email->charset);
    $loNode['username']         = $CI->encryption->decrypt($loConfig->section_email->username);
    $loNode['password']         = $CI->encryption->decrypt($loConfig->section_email->password);
    $loNode['smtp_debug']       = $CI->encryption->decrypt($loConfig->section_email->smtp_debug);
    $loNode['from']             = $CI->encryption->decrypt($loConfig->section_email->from);
    $loNode['name']             = $CI->encryption->decrypt($loConfig->section_email->name);
  }
  return $loNode;
}

/*
| ------------------------------------------------------------------------------
|  get session's variables
| ------------------------------------------------------------------------------
|
*/
function fi_get_user(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_USER);
}
function fs_get_email(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_EMAIL);
}
function fs_get_nick_name(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_NICK_NAME);
}
function fs_get_full_name(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_FULL_NAME);
}
function fi_get_level(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_LEVEL);
}
function fs_get_level_name(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_LEVEL_NAME);
}
function fb_get_logged(){
  $CI =& get_instance();
  if($CI->session->userdata(SESS_LOGGED) == TRUE){
    return TRUE;
  }else{
    redirect(RT_SIGNIN_01);
    return FALSE;
  }
}
function fi_get_is_admin(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_IS_ADMIN);
}
function fi_get_license(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_LICENSE);
}
function fs_get_license_name(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_LICENSE_NAME);
}
function fs_get_license_short_name(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_LICENSE_SHORT_NAME);
}
function fi_get_season(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_SEASON);
}
function fs_get_season_name(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_SEASON_NAME);
}
function fi_get_lines_page(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_LINES_PAGE);
}
function fi_get_farm(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_FARM);
}
function fs_get_farm_code(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_FARM_CODE);
}
function fs_get_farm_name(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_FARM_NAME);
}
function fi_get_plot_id(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_PLOT_ID);
}
function fs_get_plot_code(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_PLOT_CODE);
}
function fi_get_protocol(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_PROTOCOL);
}
function fs_get_protocol_title(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_PROTOCOL_TITLE);
}
function fi_get_protocol_type_id(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_PROTOCOL_TYPE_ID);
}
function fi_get_protocol_treatment_id(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_PROTOCOL_TREATMENT_ID);
}
function fi_get_protocol_designing_id(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_PROTOCOL_DESIGNING_ID);
}
function fi_get_protocol_view_option(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_PROTOCOL_VIEW_OPTION);
}
function fi_get_protocol_filter_status(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_PROTOCOL_FILTER_STATUS);
}
function fi_get_shared_integration(){
  $CI =& get_instance();
  return $CI->session->userdata(SESS_SHARED_INTEGRATION);
}

/*
| ------------------------------------------------------------------------------
|  database's tables
| ------------------------------------------------------------------------------
|
*/
function fo_get_protocol_rating_default($paParams){
  $CI =& get_instance();
  $CI->db->select('a.license_id, a.rating_id, a.rating');
  $CI->db->from('protocols_ratings a');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('a.rating', PROTOCOL_RATING_PROGRESS);
  return $CI->db->get()->result();
}

function fo_get_protocol($paParams){
  $CI =& get_instance();
  $CI->db->select('a.*');
  $CI->db->from('protocols a');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  return $CI->db->get()->result();
}

function fo_get_protocol_treatments($paParams){
  $CI =& get_instance();
  $CI->db->select('count(a.treatment_id) amount');
  $CI->db->from('vi_treatments a');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $la_treatments = $CI->db->get()->result();
  $li_treatments = $la_treatments[0]->amount;
  return $li_treatments;
}

function fo_get_sample_analyze($paParams){
  $CI =& get_instance();
  $CI->db->select('a.analyze_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'round(a.num_weight,2) num_weight,'.
                  'round(a.num_brix,2) num_brix,'.
                  'round(a.num_lai,2) num_lai,'.
                  'round(a.num_pbu,2) num_pbu,'.
                  'round(a.num_lpb,2) num_lpb,'.
                  'round(a.num_s,2) num_s,'.
                  'round(a.num_pc,2) num_pc,'.
                  'round(a.num_fc,2) num_fc,'.
                  'round(a.num_purity,2) num_purity,'.
                  'round(a.num_ar,2) num_ar,'.
                  'round(a.num_c1,4) num_c1,'.
                  'round(a.num_c2,4) num_c2,'.
                  'round(a.num_arc,2) num_arc,'.
                  'round(a.num_atr1,2) num_atr1,'.
                  'round(a.num_atr2,2) num_atr2');
  $CI->db->from('vi_samples_analyze a');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample', 'desc');
  return $CI->db->get()->result();
}

function fo_get_sample_weight($paParams){
  $CI =& get_instance();
  $CI->db->select('a.weight_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'round(a.num_weight,2) num_weight');
  $CI->db->from('samples_weight a');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id', '');
  return $CI->db->get()->result();
}

function fo_get_sample_stems($paParams){
  $CI =& get_instance();
  $CI->db->select('a.stem_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'round(a.num_stems,2) num_stems, c.meters,'.
                  'round(case when c.meters > 0 then (a.num_stems/c.meters) else 0 end,2) num_stems_meter');
  $CI->db->from('samples_stems a');
  $CI->db->join('protocols b', '(b.license_id=a.license_id and b.protocol_id=a.protocol_id)');
  $CI->db->join('planting_schemes c', '(c.license_id=b.license_id and c.scheme_id=b.scheme_id)');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id', '');
  return $CI->db->get()->result();
}

function fo_get_sample_diameters($paParams){
  $CI =& get_instance();
  $CI->db->select('a.diameter_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'round(a.num_diameter,2) num_diameter, c.meters,'.
                  'round(case when c.meters > 0 then (a.num_diameter/c.meters) else 0 end,2) num_diameters_meter');
  $CI->db->from('samples_diameters a');
  $CI->db->join('protocols b', '(b.license_id=a.license_id and b.protocol_id=a.protocol_id)');
  $CI->db->join('planting_schemes c', '(c.license_id=b.license_id and c.scheme_id=b.scheme_id)');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id', '');
  return $CI->db->get()->result();
}

function fo_get_sample_heights($paParams){
  $CI =& get_instance();
  $CI->db->select('a.height_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'round(a.num_height,2) num_height, c.meters,'.
                  'round(case when c.meters > 0 then (a.num_height/c.meters) else 0 end,2) num_height_meter');
  $CI->db->from('samples_heights a');
  $CI->db->join('protocols b', '(b.license_id=a.license_id and b.protocol_id=a.protocol_id)');
  $CI->db->join('planting_schemes c', '(c.license_id=b.license_id and c.scheme_id=b.scheme_id)');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id', '');
  return $CI->db->get()->result();
}

function fo_get_products_settings($paParams){
  $CI =& get_instance();
  $CI->db->select('pps.setting_id, pps.product_id, p.name product_name, pps.is_main,'.
                  'pps.dose, mu.short_name measure_short_name, pps.purchase_dt, pps.dose_cost,'.
                  'p.manufacturer_id, m.name manufacturer_name');
  $CI->db->from('protocols_products_settings pps');
  $CI->db->join('products p', '(p.license_id=pps.license_id and p.product_id=pps.product_id)');
  $CI->db->join('manufacturers m', '(m.license_id=p.license_id and m.manufacturer_id=p.manufacturer_id)', 'left');
  $CI->db->join('measure_units mu', '(mu.license_id=pps.license_id and mu.measure_id=p.measure_id)', 'left');
  $CI->db->where('pps.license_id', $paParams['license_id']);
  $CI->db->where('md5(pps.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(pps.treatment_id)', $paParams['treatment_id']);
  $CI->db->order_by('pps.is_main desc, p.name', '');
  return $CI->db->get()->result();
}

function fo_get_products_compounds($paParams){
  $CI =& get_instance();
  $CI->db->select('ppc.setting_id, ppc.license_id, ppc.treatment_id, ppc.protocol_id,'.
                  'ppc.compound_id, c.name compound_name, c.short_name compound_short_name,'.
                  'ppc.guarantee');
  $CI->db->from('protocols_products_compounds ppc');
  $CI->db->join('compounds c', '(c.license_id=ppc.license_id and c.compound_id=ppc.compound_id)');
  $CI->db->where('ppc.license_id', $paParams['license_id']);
  $CI->db->where('md5(ppc.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(ppc.treatment_id)', $paParams['treatment_id']);
  $CI->db->order_by('ppc.compound_id', '');
  return $CI->db->get()->result();
}

function fo_get_sample_internodes($paParams){
  $CI =& get_instance();
  $CI->db->select('a.node_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'round(a.num_node,2) num_node');
  $CI->db->from('samples_internodes a');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id', '');
  return $CI->db->get()->result();
}

function fo_get_sample_gaps($paParams){
  $CI =& get_instance();
  $CI->db->select('a.gap_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'round(a.num_gap,2) num_gap');
  $CI->db->from('samples_gaps a');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id', '');
  return $CI->db->get()->result();
}

function fo_get_sample_flowering($paParams){
  $CI =& get_instance();
  $CI->db->select('a.flower_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'round(a.num_flower,2) num_flower');
  $CI->db->from('samples_flowering a');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id', '');
  return $CI->db->get()->result();
}

function fo_get_sample_pith($paParams){
  $CI =& get_instance();
  $CI->db->select('a.pith_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'round(a.num_pith,2) num_pith');
  $CI->db->from('samples_pith a');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id', '');
  return $CI->db->get()->result();
}

function fo_get_sample_tillers($paParams){
  $CI =& get_instance();
  $CI->db->select('a.tiller_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'round(a.num_tiller,2) num_tiller, round(a.num_gap,2) num_gap');
  $CI->db->from('samples_tillers a');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id', '');
  return $CI->db->get()->result();
}

function fo_get_sample_infestation($paParams){
  $CI =& get_instance();
  $CI->db->select('a.infestation_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'round(a.num_infestation,2) num_infestation');
  $CI->db->from('samples_infestation a');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id', '');
  return $CI->db->get()->result();
}

function fo_get_sample_holes($paParams){
  $CI =& get_instance();
  $CI->db->select('a.hole_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'round(a.num_hole,2) num_hole');
  $CI->db->from('samples_holes a');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id', '');
  return $CI->db->get()->result();
}

function fo_get_sample_damages($paParams){
  $CI =& get_instance();
  $CI->db->select('a.damage_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'round(a.num_damage,2) num_damage');
  $CI->db->from('samples_damages a');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id', '');
  return $CI->db->get()->result();
}

function fo_get_sample_compounds($paParams){
  $CI =& get_instance();
  $CI->db->select('a.sample_id, a.sketch_id,'.
                  'a.compound_id, c.name compound_name, c.short_name compound_short_name,'.
                  'a.dt_sample, a.spot_id,'.
                  'round(a.num_compound,2) num_compound');
  $CI->db->from('samples_compounds a');
  $CI->db->join('compounds c', '(c.license_id=a.license_id and c.compound_id=a.compound_id)');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id');
  return $CI->db->get()->result();
}

function fo_get_sample_diseases($paParams){
  $CI =& get_instance();
  $CI->db->select('a.sample_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'a.disease_id, b.name disease_name, b.short_name disease_short_name, b.agent disease_agent');
  $CI->db->from('samples_diseases a');
  $CI->db->join('diseases b', '(b.license_id=a.license_id and b.disease_id=a.disease_id)');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id, a.disease_id', '');
  return $CI->db->get()->result();
}

function fo_get_sample_pests($paParams){
  $CI =& get_instance();
  $CI->db->select('a.sample_id, a.sketch_id, a.dt_sample, a.spot_id,'.
                  'a.pest_id, b.name pest_name');
  $CI->db->from('samples_pests a');
  $CI->db->join('pests b', '(b.license_id=a.license_id and b.pest_id=a.pest_id)');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('md5(a.protocol_id)', $paParams['protocol_id']);
  $CI->db->where('md5(a.sketch_id)', $paParams['sketch_id']);
  $CI->db->order_by('a.dt_sample desc, a.spot_id, a.pest_id', '');
  return $CI->db->get()->result();
}

function fo_get_protocols_alerts($paParams){
  $CI =& get_instance();
  $CI->db->select('a.alert_id, a.alert_at, a.name alert_name');
  $CI->db->from('protocols_alerts a');
  $CI->db->where('a.license_id', $paParams['license_id']);
  $CI->db->where('a.is_read', ACTIVE_NO);
  $CI->db->order_by('a.alert_at, a.alert_id', 'desc');
  $CI->db->limit(5);
  return $CI->db->get()->result();
}

/*
| ------------------------------------------------------------------------------
|  level access
| ------------------------------------------------------------------------------
|
*/
function fiLevelAccess($piUser, $piFunction){
  $CI =& get_instance();
  $CI->load->model('authorizations/Permission_model', 'dsPermissions');
  $db_level['dsLevel'] = $CI->dsPermissions->get_level($piUser, $piFunction);

  if (count($db_level['dsLevel'])==0){
    $liLevel = ACCESS_LEVEL_DENIED;
  }else{
    foreach ($db_level['dsLevel'] as $row){
      $liLevel = $row->level;
    }
  }
  return $liLevel;
}

/*
| ------------------------------------------------------------------------------
|  access security
| ------------------------------------------------------------------------------
|
*/
function fbAccessSecurity(){
  $CI =& get_instance();
  $CI->load->model('authorizations/Authorizations_model', 'dsSecurity');
  return $CI->dsSecurity->get_security_valid(md5($CI->session->userdata(SESS_EMAIL)));
}

/*
| ------------------------------------------------------------------------------
|  database seasons
| ------------------------------------------------------------------------------
|
*/
function fo_get_seasons(){
  $CI =& get_instance();
  $CI->load->model('prepare/Season_model', 'dsSeason');
  $laParams = array('license_id' => fi_get_license());
  return $CI->dsSeason->get_list_seasons($laParams);
}

function fo_get_licenses_users($paParams){
    $CI =& get_instance();
    $CI->db->select('al.license_id, al.name, al.short_name, aul.user_id');
    $CI->db->from('auth_licenses al');
    $CI->db->join('auth_users_licenses aul', '(aul.license_id=al.license_id)');
    $CI->db->where('aul.user_id', $paParams['user_id']);
    $CI->db->order_by('al.license_id', '');
    return $CI->db->get()->result();
}
function fo_get_licenses_by_key($piUser, $psKey){
    $CI =& get_instance();
    $CI->db->select('us.user_id, us.email, us.nick_name, us.full_name,'.
                    'us.license_id_last, al.license_id, al.name license_name, al.short_name license_short_name,'.
                    'ag.name group_name, ag.is_admin, ap.lines_page,'.
                    'ul.season_id_last, se.name season_name, se.num_year season_num_year');
    $CI->db->from('auth_users us');
    $CI->db->join('auth_users_params ap', '(ap.user_id=us.user_id)');
    $CI->db->join('auth_users_licenses ul', '(ul.license_id=us.license_id_last and ul.user_id=us.user_id)');
    $CI->db->join('auth_licenses al', '(al.license_id=ul.license_id)');
    $CI->db->join('auth_licenses_details ld', '(ld.license_id=al.license_id)');
    $CI->db->join('auth_users_groups gr', '(gr.license_id=ul.license_id and gr.user_id=us.user_id)');
    $CI->db->join('auth_groups ag', '(ag.license_id=gr.license_id and ag.group_id=gr.group_id)');
    $CI->db->join('seasons se', '(se.license_id=ul.license_id and se.season_id=ul.season_id_last)', 'left');
    $CI->db->where('us.user_id', $piUser);
    $CI->db->where('md5(al.license_id)', $psKey);
    $CI->db->where('us.active', ACTIVE_YES);
    $CI->db->where('ld.active', ACTIVE_YES);
    $CI->db->where('ag.active', ACTIVE_YES);
    return $CI->db->get()->result();
}
