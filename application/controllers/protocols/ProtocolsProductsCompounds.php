<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsProductsCompounds extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_PROTOCOLS_PRODUCTS;

  private function prepareFields(){
    $this->data['input_setting_id']     = fl_setting_id($this->session->flashdata('set_value_setting_id'), $this->session->flashdata('set_error_setting_id'));
    $this->data['input_license_id']     = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_protocol_id']    = fl_protocol_id($this->session->flashdata('set_value_protocol_id'), $this->session->flashdata('set_error_protocol_id'));
    $this->data['input_treatment_id']   = fl_treatment_id($this->session->flashdata('set_value_treatment_id'), $this->session->flashdata('set_error_treatment_id'));
    $this->data['input_compound_id']    = fl_compound_id($this->session->flashdata('set_value_compound_id'), $this->session->flashdata('set_error_compound_id'));
    $this->data['input_guarantee']      = fl_guarantee($this->session->flashdata('set_value_guarantee'), $this->session->flashdata('set_error_guarantee'));

    //listas de apoio
    $laParams = array(
        'license_id' => fi_get_license(),
        'protocol_id' => fi_get_protocol()
        );
    $this->data['input_compounds_list'] = $this->ds_model->get_list_compounds($laParams);
  }

  private function getRecord($poRecord){
    $lr_guarantee = str_replace(".",",", $poRecord[0]->guarantee);

    $this->data['setting_id']   = $poRecord[0]->setting_id;
    $this->data['license_id']   = $poRecord[0]->license_id;
    $this->data['protocol_id']  = $poRecord[0]->protocol_id;
    $this->data['treatment_id'] = $poRecord[0]->treatment_id;
    $this->data['compound_id']  = $poRecord[0]->compound_id;
    $this->data['guarantee']    = $lr_guarantee;
  }

  private function postRecord(){
    $lr_guarantee = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_guarantee')))));

    $this->data['setting_id']   = trim(xss_clean($this->input->post('edt_setting_id')));
    $this->data['license_id']   = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['protocol_id']  = trim(xss_clean($this->input->post('edt_protocol_id')));
    $this->data['treatment_id'] = trim(xss_clean($this->input->post('edt_treatment_id')));
    $this->data['compound_id']  = trim(xss_clean($this->input->post('edt_compound_id')));
    $this->data['guarantee']    = $lr_guarantee;
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_setting_id',   $this->data['setting_id']);
    $this->session->set_flashdata('set_value_license_id',   $this->data['license_id']);
    $this->session->set_flashdata('set_value_protocol_id',  $this->data['protocol_id']);
    $this->session->set_flashdata('set_value_treatment_id', $this->data['treatment_id']);
    $this->session->set_flashdata('set_value_compound_id',  $this->data['compound_id']);
    $this->session->set_flashdata('set_value_guarantee',    $this->data['guarantee']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_license_id',   form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_protocol_id',  form_error('edt_protocol_id'));
    $this->session->set_flashdata('set_error_treatment_id', form_error('edt_treatment_id'));
    $this->session->set_flashdata('set_error_compound_id',  form_error('edt_compound_id'));
    $this->session->set_flashdata('set_error_guarantee',    form_error('edt_guarantee'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(array(rule_guarantee()));
    return TRUE;
  }

  private function saveRecord(){
    if(isset($this->data['setting_id'])){
      $this->record['setting_id'] = $this->data['setting_id'];
    }
    $this->record['license_id']     = fi_get_license();
    $this->record['protocol_id']    = fi_get_protocol();
    $this->record['treatment_id']   = $this->data['treatment_id'];
    $this->record['compound_id']    = $this->data['compound_id'];
    $this->record['guarantee']      = $this->data['guarantee'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('protocols/ProtocolsProductsCompounds_model', 'ds_model');

    $this->data['view_title'] = 'Configuração dos Compoostos do Tratamento';
    $this->data['view_title_rec'] = 'Compoosto Configurado para o Tratamento';
    $this->data['menu_active'] = MENU_PROTOCOLS;
    $this->data['link_delete_set'] = base_url(RT_PROTOCOLS_PRODUCTS_COMPOUNDS_DB_DEL);
    $this->data['link_insert_set'] = base_url(RT_PROTOCOLS_PRODUCTS_COMPOUNDS_VW_INS);
    $this->data['link_update_set'] = base_url(RT_PROTOCOLS_PRODUCTS_COMPOUNDS_VW_UPD);
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license(),
       'protocol_id' => fi_get_protocol(),
       'treatment_id' => fi_get_protocol_treatment_id(),
       'limit' => fi_get_lines_page(),
       'start' => $this->uri->segment(2, 0));

    $this->data['dataset']          = $this->ds_model->get_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['li_total_rows']    = $this->ds_model->get_count_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page']    = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination']    = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->data['protocol_id']      = fi_get_protocol();
    $this->data['protocol_title']   = fs_get_protocol_title();

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('protocols/protocols_products_compounds/vw_protocols_products_compounds');
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/js_delete');
    $this->load->view('patterns/v_footer');
  }

  public function ct_vw_insert($pi_protocol, $pi_treatment){
    $this->session->set_flashdata('set_value_treatment_id', $pi_treatment);
    $this->session->set_flashdata('set_value_protocol_id',  $pi_protocol);
    $this->prepareFields();
    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = FALSE;
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('protocols/protocols_products_compounds/vw_protocols_products_compounds_ins', $this->data);
    $this->load->view('protocols/protocols_products_compounds/js_protocols_products_compounds');
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
        redirect(base_url(RT_PROTOCOLS_PRODUCTS_COMPOUNDS_VW_INS).'/'.$this->data['protocol_id'].'/'.$this->data['treatment_id']);
      }else{
        self::saveRecord();
        if($this->ds_model->add($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_PROTOCOLS_PRODUCTS_COMPOUNDS_VW_INS).'/'.$this->data['protocol_id'].'/'.$this->data['treatment_id']);
        }
      }
    }
  }

  public function ct_vw_update($key){
    if(($key!=NULL) and ($this->session->flashdata('set_value_setting_id')!=NULL) ){
      self::prepareFields();
    }else{
      $loRecord = $this->ds_model->get_by_key($key);
      if ($loRecord[0]->setting_id > 0){
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
    $this->load->view('protocols/protocols_products_compounds/vw_protocols_products_compounds_upd', $this->data);
    $this->load->view('protocols/protocols_products_compounds/js_protocols_products_compounds');
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
        redirect(base_url(RT_PROTOCOLS_PRODUCTS_COMPOUNDS_VW_UPD).'/'.md5($this->data['setting_id']));
      }else{
        self::saveRecord();
        if($this->ds_model->upd($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_PROTOCOLS_PRODUCTS_COMPOUNDS_VW_UPD).'/'.md5($this->data['setting_id']));
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

}
