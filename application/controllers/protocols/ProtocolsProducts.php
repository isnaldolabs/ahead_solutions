<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsProducts extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_PROTOCOLS_PRODUCTS;

  private function prepareFields(){
    $this->data['input_treatment_id']   = fl_treatment_id($this->session->flashdata('set_value_treatment_id'), $this->session->flashdata('set_error_treatment_id'));
    $this->data['input_license_id']     = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_protocol_id']    = fl_protocol_id($this->session->flashdata('set_value_protocol_id'), $this->session->flashdata('set_error_protocol_id'));
    $this->data['input_parcel_id']      = fl_parcel_id($this->session->flashdata('set_value_parcel_id'), $this->session->flashdata('set_error_parcel_id'));
    $this->data['input_product_id']     = fl_product_id($this->session->flashdata('set_value_product_id'), $this->session->flashdata('set_error_product_id'));
    $this->data['input_mode_id']        = fl_mode_id($this->session->flashdata('set_value_mode_id'), $this->session->flashdata('set_error_mode_id'));

    //listas de apoio
    $laParams = array(
        'license_id' => fi_get_license(),
        'protocol_id' => fi_get_protocol()
        );
    $this->data['input_parcel_list']    = $this->ds_model->get_list_parcels_products($laParams);
    $this->data['input_product_list']   = $this->ds_model->get_list_products($laParams);
    $this->data['input_mode_list']      = $this->ds_model->get_list_modes($laParams);
  }

  private function postRecord(){
    $this->data['treatment_id'] = trim(xss_clean($this->input->post('edt_treatment_id')));
    $this->data['license_id']   = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['protocol_id']  = trim(xss_clean($this->input->post('edt_protocol_id')));
    $this->data['parcel_id']    = trim(xss_clean($this->input->post('edt_parcel_id')));
    $this->data['product_id']   = trim(xss_clean($this->input->post('edt_product_id')));
    $this->data['mode_id']      = trim(xss_clean($this->input->post('edt_mode_id')));
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_treatment_id', $this->data['treatment_id']);
    $this->session->set_flashdata('set_value_license_id',   $this->data['license_id']);
    $this->session->set_flashdata('set_value_protocol_id',  $this->data['protocol_id']);
    $this->session->set_flashdata('set_value_parcel_id',    $this->data['parcel_id']);
    $this->session->set_flashdata('set_value_product_id',   $this->data['product_id']);
    $this->session->set_flashdata('set_value_mode_id',      $this->data['mode_id']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_treatment_id', form_error('edt_treatment_id'));
    $this->session->set_flashdata('set_error_license_id',   form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_protocol_id',  form_error('edt_protocol_id'));
    $this->session->set_flashdata('set_error_parcel_id',    form_error('edt_parcel_id'));
    $this->session->set_flashdata('set_error_product_id',   form_error('edt_product_id'));
    $this->session->set_flashdata('set_error_mode_id',      form_error('edt_mode_id'));
  }

  private function checkRecord(){
    // $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    return TRUE;
  }

  private function saveRecord(){
    if(isset($this->data['treatment_id'])){
      $this->record['treatment_id'] = $this->data['treatment_id'];
    }
    $this->record['license_id']     = fi_get_license();
    $this->record['protocol_id']    = fi_get_protocol();
    $this->record['parcel_id']      = $this->data['parcel_id'];
    $this->record['product_id']     = $this->data['product_id'];
    $this->record['mode_id']        = $this->data['mode_id'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('protocols/ProtocolsProducts_model', 'ds_model');

    $this->data['view_title'] = 'Tratamento por Produtos';
    $this->data['view_title_rec'] = 'Produto para o Tratamento';
    $this->data['menu_active'] = MENU_PROTOCOLS;
    $this->data['link_delete'] = base_url(RT_PROTOCOLS_PRODUCTS_DB_DEL);
    $this->data['link_insert'] = base_url(RT_PROTOCOLS_PRODUCTS_VW_INS);
    $this->data['link_update'] = base_url(RT_PROTOCOLS_PRODUCTS_VW_UPD);
    $this->data['link_delete_settings'] = base_url(RT_PROTOCOLS_PRODUCTS_SETTINGS_DB_DEL);
    $this->data['link_insert_settings'] = base_url(RT_PROTOCOLS_PRODUCTS_SETTINGS_VW_INS);
    $this->data['link_update_settings'] = base_url(RT_PROTOCOLS_PRODUCTS_SETTINGS_VW_UPD);
    $this->data['link_delete_compounds'] = base_url(RT_PROTOCOLS_PRODUCTS_COMPOUNDS_DB_DEL);
    $this->data['link_insert_compounds'] = base_url(RT_PROTOCOLS_PRODUCTS_COMPOUNDS_VW_INS);
    $this->data['link_update_compounds'] = base_url(RT_PROTOCOLS_PRODUCTS_COMPOUNDS_VW_UPD);
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license(),
       'protocol_id' => fi_get_protocol(),
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
    $this->load->view('protocols/protocols_products/vw_protocols_products');
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
    $this->load->view('protocols/protocols_products/vw_protocols_products_ins', $this->data);
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
        redirect(base_url(RT_PROTOCOLS_PRODUCTS_VW_INS));
      }else{
        self::saveRecord();
        if($this->ds_model->add($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_PROTOCOLS_PRODUCTS_VW_INS));
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

  public function ct_call_protocols_products_settings($pi_protocol, $pi_treat){
    if ($pi_protocol > 0){
        $this->session->set_userdata(SESS_PROTOCOL,                 fi_get_protocol());
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,           fs_get_protocol_title());
        $this->session->set_userdata(SESS_PROTOCOL_TREATMENT_ID,    $pi_treat);
        redirect(RT_PROTOCOLS_PRODUCTS_SETTINGS_VW_INS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

  public function ct_call_protocols_products_compounds($pi_protocol, $pi_treat){
    if ($pi_protocol > 0){
        $this->session->set_userdata(SESS_PROTOCOL,                 fi_get_protocol());
        $this->session->set_userdata(SESS_PROTOCOL_TITLE,           fs_get_protocol_title());
        $this->session->set_userdata(SESS_PROTOCOL_TREATMENT_ID,    $pi_treat);
        redirect(RT_PROTOCOLS_PRODUCTS_COMPOUNDS_VW_INS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

}
