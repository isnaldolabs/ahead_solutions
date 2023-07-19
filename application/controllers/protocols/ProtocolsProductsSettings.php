<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsProductsSettings extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_PROTOCOLS_PRODUCTS;

  private function prepareFields(){
    $this->data['input_setting_id']     = fl_setting_id($this->session->flashdata('set_value_setting_id'), $this->session->flashdata('set_error_setting_id'));
    $this->data['input_license_id']     = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_protocol_id']    = fl_protocol_id($this->session->flashdata('set_value_protocol_id'), $this->session->flashdata('set_error_protocol_id'));
    $this->data['input_treatment_id']   = fl_treatment_id($this->session->flashdata('set_value_treatment_id'), $this->session->flashdata('set_error_treatment_id'));
    $this->data['input_product_id']     = fl_product_id($this->session->flashdata('set_value_product_id'), $this->session->flashdata('set_error_product_id'));
    $this->data['input_dose']           = fl_dose($this->session->flashdata('set_value_dose'), $this->session->flashdata('set_error_dose'));
    $this->data['input_purchase_dt']    = fl_purchase_dt($this->session->flashdata('set_value_purchase_dt'), $this->session->flashdata('set_error_purchase_dt'));
    $this->data['input_dose_cost']      = fl_dose_cost($this->session->flashdata('set_value_dose_cost'), $this->session->flashdata('set_error_dose_cost'));

    //listas de apoio
    $laParams = array(
        'license_id' => fi_get_license(),
        'protocol_id' => fi_get_protocol()
        );
    $this->data['input_product_list'] = $this->ds_model->get_list_products($laParams);
  }

  private function getRecord($poRecord){
    $lr_dose        = str_replace(".",",", $poRecord[0]->dose);
    $lr_dose_cost   = str_replace(".",",", $poRecord[0]->dose_cost);

    $this->data['setting_id']   = $poRecord[0]->setting_id;
    $this->data['license_id']   = $poRecord[0]->license_id;
    $this->data['protocol_id']  = $poRecord[0]->protocol_id;
    $this->data['treatment_id'] = $poRecord[0]->treatment_id;
    $this->data['product_id']   = $poRecord[0]->product_id;
    $this->data['dose']         = $lr_dose;
    $this->data['purchase_dt']  = $poRecord[0]->purchase_dt;
    $this->data['dose_cost']    = $lr_dose_cost;
  }

  private function postRecord(){
    $lr_dose        = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_dose')))));
    $lr_dose_cost   = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_dose_cost')))));

    $this->data['setting_id']   = trim(xss_clean($this->input->post('edt_setting_id')));
    $this->data['license_id']   = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['protocol_id']  = trim(xss_clean($this->input->post('edt_protocol_id')));
    $this->data['treatment_id'] = trim(xss_clean($this->input->post('edt_treatment_id')));
    $this->data['product_id']   = trim(xss_clean($this->input->post('edt_product_id')));
    $this->data['dose']         = $lr_dose;
    $this->data['purchase_dt']  = $this->input->post('edt_purchase_dt');
    $this->data['dose_cost']    = $lr_dose_cost;
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_setting_id',   $this->data['setting_id']);
    $this->session->set_flashdata('set_value_license_id',   $this->data['license_id']);
    $this->session->set_flashdata('set_value_protocol_id',  $this->data['protocol_id']);
    $this->session->set_flashdata('set_value_treatment_id', $this->data['treatment_id']);
    $this->session->set_flashdata('set_value_product_id',   $this->data['product_id']);
    $this->session->set_flashdata('set_value_dose',         $this->data['dose']);
    $this->session->set_flashdata('set_value_purchase_dt',  $this->data['purchase_dt']);
    $this->session->set_flashdata('set_value_dose_cost',    $this->data['dose_cost']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_license_id',   form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_protocol_id',  form_error('edt_protocol_id'));
    $this->session->set_flashdata('set_error_treatment_id', form_error('edt_treatment_id'));
    $this->session->set_flashdata('set_error_product_id',   form_error('edt_product_id'));
    $this->session->set_flashdata('set_error_dose',         form_error('edt_dose'));
    $this->session->set_flashdata('set_error_purchase_dt',  form_error('edt_purchase_dt'));
    $this->session->set_flashdata('set_error_dose_cost',    form_error('edt_dose_cost'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(array(rule_dose(), rule_dose_cost()));
    return TRUE;
  }

  private function saveRecord(){
    if(isset($this->data['setting_id'])){
      $this->record['setting_id'] = $this->data['setting_id'];
    }
    $this->record['license_id']     = fi_get_license();
    $this->record['protocol_id']    = fi_get_protocol();
    $this->record['treatment_id']   = $this->data['treatment_id'];
    $this->record['product_id']     = $this->data['product_id'];
    $this->record['dose']           = $this->data['dose'];
    $this->record['purchase_dt']    = $this->data['purchase_dt'];
    $this->record['dose_cost']      = $this->data['dose_cost'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('protocols/ProtocolsProductsSettings_model', 'ds_model');

    $this->data['view_title'] = 'Configuração dos Produtos do Tratamento';
    $this->data['view_title_rec'] = 'Produto Configurado para o Tratamento';
    $this->data['menu_active'] = MENU_PROTOCOLS;
    $this->data['link_delete_set'] = base_url(RT_PROTOCOLS_PRODUCTS_SETTINGS_DB_DEL);
    $this->data['link_insert_set'] = base_url(RT_PROTOCOLS_PRODUCTS_SETTINGS_VW_INS);
    $this->data['link_update_set'] = base_url(RT_PROTOCOLS_PRODUCTS_SETTINGS_VW_UPD);
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
    $this->load->view('protocols/protocols_products_settings/vw_protocols_products_settings');
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
    $this->load->view('protocols/protocols_products_settings/vw_protocols_products_settings_ins', $this->data);
    $this->load->view('protocols/protocols_products_settings/js_protocols_products_settings');
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
        redirect(base_url(RT_PROTOCOLS_PRODUCTS_SETTINGS_VW_INS).'/'.$this->data['protocol_id'].'/'.$this->data['treatment_id']);
      }else{
        self::saveRecord();
        if($this->ds_model->add($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_PROTOCOLS_PRODUCTS_SETTINGS_VW_INS).'/'.$this->data['protocol_id'].'/'.$this->data['treatment_id']);
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
    $this->load->view('protocols/protocols_products_settings/vw_protocols_products_settings_upd', $this->data);
    $this->load->view('protocols/protocols_products_settings/js_protocols_products_settings');
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
        redirect(base_url(RT_PROTOCOLS_PRODUCTS_SETTINGS_VW_UPD).'/'.md5($this->data['setting_id']));
      }else{
        self::saveRecord();
        if($this->ds_model->upd($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_PROTOCOLS_PRODUCTS_SETTINGS_VW_UPD).'/'.md5($this->data['setting_id']));
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
