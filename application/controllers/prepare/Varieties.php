<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Varieties extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_VARIETIES;

  private function prepareFields(){
    $this->data['input_variety_id']         = fl_variety_id($this->session->flashdata('set_value_variety_id'), $this->session->flashdata('set_error_variety_id'));
    $this->data['input_license_id']         = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_name']               = fl_name20($this->session->flashdata('set_value_name'), $this->session->flashdata('set_error_name'));
    $this->data['input_maturity_id']        = fl_maturity_id($this->session->flashdata('set_value_maturity_id'), $this->session->flashdata('set_error_maturity_id'));
    $this->data['input_licensor_id']        = fl_licensor_id($this->session->flashdata('set_value_licensor_id'), $this->session->flashdata('set_error_licensor_id'));
    $this->data['input_protection_term']    = fl_protection_term($this->session->flashdata('set_value_protection_term'), $this->session->flashdata('set_error_protection_term'));
    $this->data['input_royalties']          = fl_royalties($this->session->flashdata('set_value_royalties'), $this->session->flashdata('set_error_royalties'));

    //listas de apoio
    $laParams = array('license_id' => fi_get_license());
    $this->data['input_maturation_list']    = $this->ds_model->get_list_maturation($laParams);
    $this->data['input_licensor_list']      = $this->ds_model->get_list_licensors($laParams);
  }

  private function getRecord($poRecord){
    $lrRoyalties = str_replace(".",",", $poRecord[0]->royalties);

    $this->data['variety_id']       = $poRecord[0]->variety_id;
    $this->data['license_id']       = $poRecord[0]->license_id;
    $this->data['name']             = $poRecord[0]->name;
    $this->data['maturity_id']      = $poRecord[0]->maturity_id;
    $this->data['licensor_id']      = $poRecord[0]->licensor_id;
    $this->data['protection_term']  = $poRecord[0]->protection_term;
    $this->data['royalties']        = $lrRoyalties;
  }

  private function postRecord(){
    $lrRoyalties = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_royalties')))));

    $this->data['variety_id']       = trim(xss_clean($this->input->post('edt_variety_id')));
    $this->data['license_id']       = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['name']             = trim(xss_clean($this->input->post('edt_name')));
    $this->data['maturity_id']      = trim(xss_clean($this->input->post('edt_maturity_id')));
    $this->data['licensor_id']      = trim(xss_clean($this->input->post('edt_licensor_id')));
    $this->data['protection_term']  = $this->input->post('edt_protection_term');
    $this->data['royalties']        = $lrRoyalties;
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_variety_id',       $this->data['variety_id']);
    $this->session->set_flashdata('set_value_license_id',       $this->data['license_id']);
    $this->session->set_flashdata('set_value_name',             $this->data['name']);
    $this->session->set_flashdata('set_value_maturity_id',      $this->data['maturity_id']);
    $this->session->set_flashdata('set_value_licensor_id',      $this->data['licensor_id']);
    $this->session->set_flashdata('set_value_protection_term',  $this->data['protection_term']);
    $this->session->set_flashdata('set_value_royalties',        $this->data['royalties']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_license_id',       form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_name',             form_error('edt_name'));
    $this->session->set_flashdata('set_error_maturity_id',      form_error('edt_maturity_id'));
    $this->session->set_flashdata('set_error_licensor_id',      form_error('edt_licensor_id'));
    $this->session->set_flashdata('set_error_protection_term',  form_error('edt_protection_term'));
    $this->session->set_flashdata('set_error_royalties',        form_error('edt_royalties'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(array(rule_name20()));
    return $this->form_validation->run();
  }

  private function saveRecord(){
    if(isset($this->data['variety_id'])){
      $this->record['variety_id'] = $this->data['variety_id'];
    }
    $this->record['license_id']         = fi_get_license();
    $this->record['name']               = $this->data['name'];
    $this->record['maturity_id']        = $this->data['maturity_id'];
    $this->record['licensor_id']        = $this->data['licensor_id'];
    $this->record['protection_term']    = $this->data['protection_term'];
    $this->record['royalties']          = $this->data['royalties'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('prepare/Varieties_model', 'ds_model');

    $this->data['view_title'] = 'Variedades';
    $this->data['view_title_rec'] = 'Variedade';
    $this->data['menu_active'] = MENU_PREPARE;
    $this->data['link_delete'] = base_url(RT_VARIETIES_DB_DEL);
    $this->data['link_insert'] = base_url(RT_VARIETIES_VW_INS);
    $this->data['link_update'] = base_url(RT_VARIETIES_VW_UPD);
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license(),
       'limit' => fi_get_lines_page(),
       'start' => $this->uri->segment(2, 0));

    $this->data['ds_dataset']       = $this->ds_model->get_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['li_total_rows']    = $this->ds_model->get_count_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page']     = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination']    = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('prepare/varieties/vw_varieties');
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
    $this->load->view('prepare/varieties/vw_varieties_ins', $this->data);
    $this->load->view('prepare/varieties/js_varieties');
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
        redirect(base_url(RT_VARIETIES_VW_INS));
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
    if(($key!=NULL) and ($this->session->flashdata('set_value_variety_id')!=NULL) ){
      self::prepareFields();
    }else{
      $loRecord = $this->ds_model->get_by_key($key);
      if ($loRecord[0]->variety_id > 0){
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
    $this->load->view('prepare/varieties/vw_varieties_upd', $this->data);
    $this->load->view('prepare/varieties/js_varieties');
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
        redirect(base_url(RT_VARIETIES_VW_UPD).'/'.md5($this->data['variety_id']));
      }else{
        self::saveRecord();
        if($this->ds_model->upd($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_VARIETIES_VW_UPD).'/'.md5($this->data['variety_id']));
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
