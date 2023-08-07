<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsTreatmentsDQL extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_PROTOCOLS_TREATMENTS_DQL;

  private function prepareFields(){
    $this->data['input_treatment_id']      = fl_treatment_id($this->session->flashdata('set_value_treatment_id'), $this->session->flashdata('set_error_treatment_id'));
    $this->data['input_protocol_id']    = fl_protocol_id($this->session->flashdata('set_value_protocol_id'), $this->session->flashdata('set_error_protocol_id'));
    $this->data['input_license_id']     = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_treatment_id_c']    = fl_treatment_id_c($this->session->flashdata('set_value_treatment_id_c'), $this->session->flashdata('set_error_treatment_id_c'));
    $this->data['input_treatment_id_q']    = fl_treatment_id_q($this->session->flashdata('set_value_treatment_id_q'), $this->session->flashdata('set_error_treatment_id_q'));

    //listas de apoio
    $laParams = array('license_id' => fi_get_license());
    $this->data['input_factors_list_c'] = $this->ds_model->get_list_factors_dql($laParams);
    $this->data['input_factors_list_q'] = $this->ds_model->get_list_factors_dql($laParams);
  }

  private function postRecord(){
    $this->data['treatment_id']    = trim(xss_clean($this->input->post('edt_treatment_id')));
    $this->data['protocol_id']  = trim(xss_clean($this->input->post('edt_protocol_id')));
    $this->data['license_id']   = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['treatment_id_c']  = trim(xss_clean($this->input->post('edt_treatment_id_c')));
    $this->data['treatment_id_q']  = trim(xss_clean($this->input->post('edt_treatment_id_q')));
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_treatment_id',    $this->data['treatment_id']);
    $this->session->set_flashdata('set_value_protocol_id',  $this->data['protocol_id']);
    $this->session->set_flashdata('set_value_license_id',   $this->data['license_id']);
    $this->session->set_flashdata('set_value_treatment_id_c',  $this->data['treatment_id_c']);
    $this->session->set_flashdata('set_value_treatment_id_q',  $this->data['treatment_id_q']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_treatment_id',    form_error('edt_treatment_id'));
    $this->session->set_flashdata('set_error_protocol_id',  form_error('edt_protocol_id'));
    $this->session->set_flashdata('set_error_license_id',   form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_treatment_id_c',  form_error('edt_treatment_id_c'));
    $this->session->set_flashdata('set_error_treatment_id_q',  form_error('edt_treatment_id_q'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    return TRUE;
  }

  private function saveRecord(){
    if(isset($this->data['treatment_id'])){
      $this->record['treatment_id'] = $this->data['treatment_id'];
    }
    $this->record['protocol_id']    = fi_get_protocol();
    $this->record['license_id']     = fi_get_license();
    $this->record['treatment_id_c']    = $this->data['treatment_id_c'];
    $this->record['treatment_id_q']    = $this->data['treatment_id_q'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('protocols/ProtocolsTreatmentsDQL_model', 'ds_model');

    $this->data['view_title'] = 'Tratamentos D.Q.L. do Protocolo';
    $this->data['view_title_rec'] = 'Tratamentos D.Q.L. do Protocolo';
    $this->data['menu_active'] = MENU_PROTOCOLS;
    $this->data['link_delete'] = base_url(RT_PROTOCOLS_TREATMENTS_DQL_DB_DEL);
    $this->data['link_insert'] = base_url(RT_PROTOCOLS_TREATMENTS_DQL_VW_INS);
    $this->data['link_update'] = base_url(RT_PROTOCOLS_TREATMENTS_DQL_VW_UPD);
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
    $this->load->view('protocols/protocols_treatments_dql/vw_treatments_factors_dql');
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
    $this->load->view('protocols/protocols_treatments_dql/vw_treatments_factors_dql_ins', $this->data);
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
        redirect(base_url(RT_PROTOCOLS_TREATMENTS_DQL_VW_INS));
      }else{
        self::saveRecord();
        if($this->ds_model->add($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_PROTOCOLS_TREATMENTS_DQL_VW_INS));
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
