<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Licenses extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_SECURITY_LICENSES;

  private function prepareFields(){
    $this->data['input_license_id']   = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_name']         = fl_name50($this->session->flashdata('set_value_name'), $this->session->flashdata('set_error_name'));
    $this->data['input_short_name']   = fl_short_name20($this->session->flashdata('set_value_short_name'), $this->session->flashdata('set_error_short_name'));
  }

  private function getRecord($poRecord){
    $this->data['license_id']   = $poRecord[0]->license_id;
    $this->data['name']         = $poRecord[0]->name;
    $this->data['short_name']   = $poRecord[0]->short_name;
  }

  private function postRecord(){
    $this->data['license_id']   = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['name']         = trim(xss_clean($this->input->post('edt_name')));
    $this->data['short_name']   = trim(xss_clean($this->input->post('edt_short_name')));
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_license_id',   $this->data['license_id']);
    $this->session->set_flashdata('set_value_name',         $this->data['name']);
    $this->session->set_flashdata('set_value_short_name',   $this->data['short_name']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_name',         form_error('edt_name'));
    $this->session->set_flashdata('set_error_short_name',   form_error('edt_short_name'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(array(rule_name50(),rule_short_name20()));
    return $this->form_validation->run();
  }

  private function saveRecord(){
    if(isset($this->data['license_id'])){
      $this->record['license_id'] = $this->data['license_id'];
    }
    $this->record['name']       = $this->data['name'];
    $this->record['short_name'] = $this->data['short_name'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('security/License_model', 'ds_model');

    $this->data['view_title'] = 'Licenças';
    $this->data['view_title_rec'] = 'Licença';
    $this->data['menu_active'] = MENU_SECURITY;
    $this->data['link_delete'] = base_url(RT_SECURITY_LICENSES_DB_DEL);
    $this->data['link_insert'] = base_url(RT_SECURITY_LICENSES_VW_INS);
    $this->data['link_update'] = base_url(RT_SECURITY_LICENSES_VW_UPD);
  }

  public function index(){
    $liStart = $this->uri->segment(2, 0);
    $this->data['dataset'] = $this->ds_model->get_all(fi_get_lines_page(), $liStart);
    $this->data['li_total_rows'] = $this->ds_model->get_count_all();

    $this->data['lo_lines_page']     = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination'] = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('security/licenses/vw_licenses');
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
    $this->load->view('security/licenses/vw_licenses_ins', $this->data);
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
        redirect(base_url(RT_SECURITY_LICENSES_VW_INS));
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
    if(($key!=NULL) and ($this->session->flashdata('set_value_license_id')!=NULL) ){
      self::prepareFields();
    }else{
      $loRecord = $this->ds_model->get_by_key($key);
      if ($loRecord[0]->license_id > 0){
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
    $this->load->view('security/licenses/vw_licenses_upd', $this->data);
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
        redirect(base_url(RT_SECURITY_LICENSES_VW_UPD).'/'.md5($this->data['license_id']));
      }else{
        self::saveRecord();
        if($this->ds_model->upd($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_SECURITY_LICENSES_VW_UPD).'/'.md5($this->data['license_id']));
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
