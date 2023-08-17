<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Protocols extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_PROTOCOLS;

  private function prepareFields(){
    $this->data['input_protocol_id']    = fl_protocol_id($this->session->flashdata('set_value_protocol_id'), $this->session->flashdata('set_error_protocol_id'));
    $this->data['input_license_id']     = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_code']           = fl_code20($this->session->flashdata('set_value_code'), $this->session->flashdata('set_error_code'));
    $this->data['input_type_id']        = fl_type_id($this->session->flashdata('set_value_type_id'), $this->session->flashdata('set_error_type_id'));
    $this->data['input_methodology_id'] = fl_methodology_id($this->session->flashdata('set_value_methodology_id'), $this->session->flashdata('set_error_methodology_id'));
    $this->data['input_dt_start']       = fl_dt_start($this->session->flashdata('set_value_dt_start'), $this->session->flashdata('set_error_dt_start'));
    $this->data['input_dt_end_planned'] = fl_dt_end_planned($this->session->flashdata('set_value_dt_end_planned'), $this->session->flashdata('set_error_dt_end_planned'));
    $this->data['input_dt_end']         = fl_dt_end($this->session->flashdata('set_value_dt_end'), $this->session->flashdata('set_error_dt_end'));
    $this->data['input_title']          = fl_title($this->session->flashdata('set_value_title'), $this->session->flashdata('set_error_title'));
    $this->data['input_goal']           = fl_goal($this->session->flashdata('set_value_goal'), $this->session->flashdata('set_error_goal'));
    $this->data['input_repetitions']    = fl_repetitions($this->session->flashdata('set_value_repetitions'), $this->session->flashdata('set_error_repetitions'));
    $this->data['input_test_id']        = fl_test_id($this->session->flashdata('set_value_test_id'), $this->session->flashdata('set_error_test_id'));
    $this->data['input_designing_id']   = fl_designing_id($this->session->flashdata('set_value_designing_id'), $this->session->flashdata('set_error_designing_id'));
    $this->data['input_scheme_id']      = fl_scheme_id($this->session->flashdata('set_value_scheme_id'), $this->session->flashdata('set_error_scheme_id'));
    $this->data['input_subline_id']     = fl_subline_id($this->session->flashdata('set_value_subline_id'), $this->session->flashdata('set_error_subline_id'));
    $this->data['input_applicant_id']   = fl_applicant_id($this->session->flashdata('set_value_applicant_id'), $this->session->flashdata('set_error_applicant_id'));
    $this->data['input_responsible_id'] = fl_responsible_id($this->session->flashdata('set_value_responsible_id'), $this->session->flashdata('set_error_responsible_id'));

    //listas de apoio
    $laParams = array('license_id' => fi_get_license());
    $this->data['input_type_list']          = $this->ds_model->get_list_types();
    $this->data['input_methodology_list']   = $this->ds_model->get_list_methodologies();
    $this->data['input_type_test_list']     = $this->ds_model->get_list_types_tests($laParams);
    $this->data['input_designing_list']     = $this->ds_model->get_list_designing($laParams);
    $this->data['input_scheme_list']        = $this->ds_model->get_list_schemes($laParams);
    $this->data['input_subline_list']       = $this->ds_model->get_list_subline($laParams);
    $this->data['input_applicant_list']     = $this->ds_model->get_list_applicant($laParams);
    $this->data['input_responsible_list']   = $this->ds_model->get_list_responsible($laParams);
  }

  private function getRecord($poRecord){
    $this->data['protocol_id']      = $poRecord[0]->protocol_id;
    $this->data['license_id']       = $poRecord[0]->license_id;
    $this->data['code']             = $poRecord[0]->code;
    $this->data['type_id']          = $poRecord[0]->type_id;
    $this->data['methodology_id']   = $poRecord[0]->methodology_id;
    $this->data['dt_start']         = $poRecord[0]->dt_start;
    $this->data['dt_end_planned']   = $poRecord[0]->dt_end_planned;
    $this->data['dt_end']           = $poRecord[0]->dt_end;
    $this->data['title']            = $poRecord[0]->title;
    $this->data['goal']             = $poRecord[0]->goal;
    $this->data['repetitions']      = $poRecord[0]->repetitions;
    $this->data['test_id']          = $poRecord[0]->test_id;
    $this->data['designing_id']     = $poRecord[0]->designing_id;
    $this->data['scheme_id']        = $poRecord[0]->scheme_id;
    $this->data['subline_id']       = $poRecord[0]->subline_id;
    $this->data['applicant_id']     = $poRecord[0]->applicant_id;
    $this->data['responsible_id']   = $poRecord[0]->responsible_id;
  }

  private function postRecord(){
    $this->data['protocol_id']      = trim(xss_clean($this->input->post('edt_protocol_id')));
    $this->data['license_id']       = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['code']             = trim(xss_clean($this->input->post('edt_code')));
    $this->data['type_id']          = trim(xss_clean($this->input->post('edt_type_id')));
    $this->data['methodology_id']   = trim(xss_clean($this->input->post('edt_methodology_id')));
    $this->data['dt_start']         = $this->input->post('edt_dt_start');
    $this->data['dt_end_planned']   = $this->input->post('edt_dt_end_planned');
    $this->data['dt_end']           = $this->input->post('edt_dt_end');
    $this->data['title']            = trim(xss_clean($this->input->post('edt_title')));
    $this->data['goal']             = trim(xss_clean($this->input->post('edt_goal')));
    $this->data['repetitions']      = trim(xss_clean($this->input->post('edt_repetitions')));
    $this->data['test_id']          = trim(xss_clean($this->input->post('edt_test_id')));
    $this->data['designing_id']     = trim(xss_clean($this->input->post('edt_designing_id')));
    $this->data['scheme_id']        = trim(xss_clean($this->input->post('edt_scheme_id')));
    $this->data['subline_id']       = trim(xss_clean($this->input->post('edt_subline_id')));
    $this->data['applicant_id']     = trim(xss_clean($this->input->post('edt_applicant_id')));
    $this->data['responsible_id']   = trim(xss_clean($this->input->post('edt_responsible_id')));
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_protocol_id',      $this->data['protocol_id']);
    $this->session->set_flashdata('set_value_license_id',       $this->data['license_id']);
    $this->session->set_flashdata('set_value_code',             $this->data['code']);
    $this->session->set_flashdata('set_value_type_id',          $this->data['type_id']);
    $this->session->set_flashdata('set_value_methodology_id',   $this->data['methodology_id']);
    $this->session->set_flashdata('set_value_dt_start',         $this->data['dt_start']);
    $this->session->set_flashdata('set_value_dt_end_planned',   $this->data['dt_end_planned']);
    $this->session->set_flashdata('set_value_dt_end',           $this->data['dt_end']);
    $this->session->set_flashdata('set_value_title',            $this->data['title']);
    $this->session->set_flashdata('set_value_goal',             $this->data['goal']);
    $this->session->set_flashdata('set_value_repetitions',      $this->data['repetitions']);
    $this->session->set_flashdata('set_value_test_id',          $this->data['test_id']);
    $this->session->set_flashdata('set_value_designing_id',     $this->data['designing_id']);
    $this->session->set_flashdata('set_value_scheme_id',        $this->data['scheme_id']);
    $this->session->set_flashdata('set_value_subline_id',       $this->data['subline_id']);
    $this->session->set_flashdata('set_value_applicant_id',     $this->data['applicant_id']);
    $this->session->set_flashdata('set_value_responsible_id',   $this->data['responsible_id']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_license_id',       form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_code',             form_error('edt_code'));
    $this->session->set_flashdata('set_error_type_id',          form_error('edt_type_id'));
    $this->session->set_flashdata('set_error_methodology_id',   form_error('edt_methodology_id'));
    $this->session->set_flashdata('set_error_dt_start',         form_error('edt_dt_start'));
    $this->session->set_flashdata('set_error_dt_end_planned',   form_error('edt_dt_end_planned'));
    $this->session->set_flashdata('set_error_dt_end',           form_error('edt_dt_end'));
    $this->session->set_flashdata('set_error_title',            form_error('edt_title'));
    $this->session->set_flashdata('set_error_goal',             form_error('edt_goal'));
    $this->session->set_flashdata('set_error_repetitions',      form_error('edt_repetitions'));
    $this->session->set_flashdata('set_error_test_id',          form_error('edt_test_id'));
    $this->session->set_flashdata('set_error_designing_id',     form_error('edt_designing_id'));
    $this->session->set_flashdata('set_error_acheme_id',        form_error('edt_scheme_id'));
    $this->session->set_flashdata('set_error_subline_id',       form_error('edt_subline_id'));
    $this->session->set_flashdata('set_error_applicant_id',     form_error('edt_applicant_id'));
    $this->session->set_flashdata('set_error_responsible_id',   form_error('edt_responsible_id'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(array(rule_code20(), rule_title(), rule_goal(), rule_dt_start()));
    return $this->form_validation->run();
  }

  private function saveRecord(){
    if(isset($this->data['protocol_id'])){
      $this->record['protocol_id'] = $this->data['protocol_id'];
    }
    $this->record['license_id']     = fi_get_license();
    $this->record['code']           = $this->data['code'];
    $this->record['type_id']        = $this->data['type_id'];
    $this->record['methodology_id'] = $this->data['methodology_id'];
    $this->record['dt_start']       = $this->data['dt_start'];
    $this->record['dt_end_planned'] = $this->data['dt_end_planned'];
    $this->record['dt_end']         = $this->data['dt_end'];
    $this->record['title']          = $this->data['title'];
    $this->record['goal']           = $this->data['goal'];
    $this->record['test_id']        = $this->data['test_id'];
    $this->record['designing_id']   = $this->data['designing_id'];
    $this->record['scheme_id']      = $this->data['scheme_id'];
    $this->record['subline_id']     = $this->data['subline_id'];
    $this->record['applicant_id']   = $this->data['applicant_id'];
    $this->record['responsible_id'] = $this->data['responsible_id'];

    //-- Para D.I.C. (Delineamento Inteiramente Casualizado) deve-se gerar apenas um bloco
    if ($this->record['designing_id']==DESIGNING_DIC){
        $this->record['repetitions']    = 1;
    }else{
        $this->record['repetitions']    = $this->data['repetitions'];
    }
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('protocols/Protocols_model', 'ds_model');

    $this->data['view_title'] = 'Experimentos';
    $this->data['view_title_rec'] = 'Experimento';
    $this->data['menu_active'] = MENU_PROTOCOLS;
    $this->data['link_delete'] = base_url(RT_PROTOCOLS_DB_DEL);
    $this->data['link_insert'] = base_url(RT_PROTOCOLS_VW_INS);
    $this->data['link_update'] = base_url(RT_PROTOCOLS_VW_UPD);

    $this->data['link_view_option']     = base_url(RT_CALL_PROTOCOLS_VIEW_OPTION);
    $this->data['link_filter_status']   = base_url(RT_CALL_PROTOCOLS_FILTER_STATUS);
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license(),
       'status' => fi_get_protocol_filter_status(),
       'limit' => fi_get_lines_page(),
       'start' => $this->uri->segment(2, 0));

    $this->data['ds_dataset']       = $this->ds_model->get_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['li_total_rows']    = $this->ds_model->get_count_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page']    = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination']    = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    
    if(fi_get_protocol_view_option()==0){
        $this->data['search_bar'] = TRUE;
    }else{
        $this->data['search_bar'] = FALSE;        
    }

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('protocols/protocols/vw_protocols');
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/js_delete');
    $this->load->view('patterns/v_footer');
  }

  public function ct_vw_insert(){
    $this->prepareFields();
    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = FALSE;
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('protocols/protocols/vw_protocols_ins', $this->data);
    $this->load->view('patterns/v_footer');
  }

  public function ct_db_insert(){
    if(isset($_POST[BTN_POST_RETURN])){
      redirect($this->link_redirect);
    }
    elseif(isset($_POST[BTN_POST_SAVE])){
      self::postRecord();
      self::flashRecord();
      $lbCheck = self::checkRecord();
      if($lbCheck==FALSE){
        self::flashErrors();
        redirect(base_url(RT_PROTOCOLS_VW_INS));
      }else{
        self::saveRecord();
        if($this->ds_model->add($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
        }
      }
    }
  }

  public function ct_vw_update($key){
    if(($key!=NULL) and ($this->session->flashdata('set_value_protocol_id')!=NULL) ){
      self::prepareFields();
    }else{
      $loRecord = $this->ds_model->get_by_key($key);
      if ($loRecord[0]->protocol_id > 0){
        self::getRecord($loRecord);
        self::flashRecord();
        self::prepareFields();
      }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_INFO, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
      }
    }
    $this->data['search_bar'] = FALSE;
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('protocols/protocols/vw_protocols_upd', $this->data);
    $this->load->view('patterns/v_footer');
  }

  public function ct_db_update(){
    if(isset($_POST[BTN_POST_RETURN])){
      redirect($this->link_redirect);
    }elseif(isset($_POST[BTN_POST_SAVE])){
      self::postRecord();
      self::flashRecord();
      $lbCheck = self::checkRecord();
      if($lbCheck==FALSE){
        self::flashErrors();
        redirect(base_url(RT_PROTOCOLS_VW_UPD).'/'.md5($this->data['protocol_id']));
      }else{
        self::saveRecord();
        if($this->ds_model->upd($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_PROTOCOLS_VW_UPD).'/'.md5($this->data['protocol_id']));
        }
      }
    }
  }

  public function ct_db_delete($key){
    if($this->ds_model->delete($key)){
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_DELETING));
    }else{
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_DELETING));
    }
    redirect($this->link_redirect);
  }

  public function ct_db_upd_status($pskey, $poStatus){
    if($this->ds_model->upd_status($pskey, $poStatus)){
      log_message('info', $this->db->last_query());
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
    }else{
      log_message('info', $this->db->last_query());
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
    }
    redirect($this->link_redirect);
  }

  public function ct_call_protocols_gu_plots($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_GU_PLOTS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_idealizers($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_IDEALIZERS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_samples($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_SAMPLES);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_variables($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_VARIABLES);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_teams($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_TEAMS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_checks($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_CHECKS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_varieties($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_VARIETIES);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_products($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_PRODUCTS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_factorsdql($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_FACTORS_DQL);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_treatmentsdql($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_TREATMENTS_DQL);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_composed($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_COMPOSED);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_miscellaneous($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_MISCELLANEOUS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_sketches($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        $this->session->set_userdata(SESS_PROTOCOL_TYPE_ID, $loRecord[0]->type_id);
        redirect(RT_PROTOCOLS_SKETCHES);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_notes($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_NOTES);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_attachs($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_ATTACHS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_station_weathers($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_STATION_WEATHERS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_close($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_PROTOCOLS_CLOSE_VW_UPD.'/'.$key);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_analyze($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_ANALYZE);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_weight($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_WEIGHT);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_stems($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_STEMS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_diameters($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_DIAMETERS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_heights($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_HEIGHTS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_internodes($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_INTERNODES);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_flowering($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_FLOWERING);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_pith($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_PITH);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_tillers($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_TILLERS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_gaps($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_GAPS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_infestation($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_INFESTATION);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_holes($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_HOLES);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_damages($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_DAMAGES);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_compounds($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_COMPOUNDS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_diseases($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_DISEASES);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_samples_pests($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,         $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,   $loRecord[0]->title);
        redirect(RT_SAMPLES_PESTS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_result($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->protocol_id > 0){
        $this->session->set_userdata(SESS_PROTOCOL,              $loRecord[0]->protocol_id);
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,        $loRecord[0]->title);
        $this->session->set_userdata(SESS_PROTOCOL_DESIGNING_ID, $loRecord[0]->designing_id);
//        redirect(RT_PROTOCOLS_RESULT_PROT.'/'.$key, '');
        redirect(RT_PROTOCOLS_RESULT_REPORT.'/'.$key, '');
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_view_option($pi_view_option){
    $this->session->set_userdata(SESS_PROTOCOL_VIEW_OPTION, $pi_view_option);
    redirect($this->link_redirect);
  }

  public function ct_call_protocols_filter_status($pi_filter_status){
    $this->session->set_userdata(SESS_PROTOCOL_FILTER_STATUS, $pi_filter_status);
    redirect($this->link_redirect);
  }

  public function ct_call_protocols_filter_search($pi_filter_status){
    $search = $this->input->post('search');
    $laParams = array(
      'license_id' => fi_get_license(),
      'status' => fi_get_protocol_filter_status(),
      'limit' => fi_get_lines_page(),
      'start' => $this->uri->segment(2, 0));

    $this->data['ds_dataset']       = $this->ds_model->get_search($laParams, $search );
    log_message('info', $this->db->last_query());

    $this->data['li_total_rows']    = $this->ds_model->get_count_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page']    = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination']    = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    
    if(fi_get_protocol_view_option()==0){
        $this->data['search_bar'] = TRUE;
    }else{
        $this->data['search_bar'] = FALSE;        
    }
    
    $this->data['search'] = TRUE;
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('protocols/protocols/vw_protocols');
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/js_delete');
    $this->load->view('patterns/v_footer');
  }

}
