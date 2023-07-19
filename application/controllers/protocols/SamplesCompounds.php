<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SamplesCompounds extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_SAMPLES_COMPOUNDS;

  private function prepareFields(){
    $this->data['input_sample_id']      = fl_sample_id($this->session->flashdata('set_value_sample_id'), $this->session->flashdata('set_error_sample_id'));
    $this->data['input_protocol_id']    = fl_protocol_id($this->session->flashdata('set_value_protocol_id'), $this->session->flashdata('set_error_protocol_id'));
    $this->data['input_license_id']     = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_sketch_id']      = fl_sketch_id($this->session->flashdata('set_value_sketch_id'), $this->session->flashdata('set_error_sketch_id'));
    $this->data['input_compound_id']    = fl_compound_id($this->session->flashdata('set_value_compound_id'), $this->session->flashdata('set_error_compound_id'));
    $this->data['input_dt_sample']      = fl_dt_sample($this->session->flashdata('set_value_dt_sample'), $this->session->flashdata('set_error_dt_sample'));
    $this->data['input_spot_id']        = fl_spot_id($this->session->flashdata('set_value_spot_id'), $this->session->flashdata('set_error_spot_id'));
    $this->data['input_num_compound']   = fl_num_compound($this->session->flashdata('set_value_num_compound'), $this->session->flashdata('set_error_num_compound'));

    //listas de apoio
    $laParams = array(
        'license_id'    => fi_get_license(),
        'protocol_id'   => fi_get_protocol(),
        'treatment_id'  => fi_get_protocol_treatment_id());
    $this->data['input_compound_list']  = $this->ds_model->get_list_compounds($laParams);
  }

  private function getRecord($poRecord){
    $lr_num_compound = str_replace(".",",", $poRecord[0]->num_compound);

    $this->data['sample_id']        = $poRecord[0]->sample_id;
    $this->data['protocol_id']      = $poRecord[0]->protocol_id;
    $this->data['license_id']       = $poRecord[0]->license_id;
    $this->data['sketch_id']        = $poRecord[0]->sketch_id;
    $this->data['compound_id']      = $poRecord[0]->compound_id;
    $this->data['compound_name']    = $poRecord[0]->compound_name;
    $this->data['dt_sample']        = $poRecord[0]->dt_sample;
    $this->data['spot_id']          = $poRecord[0]->spot_id;
    $this->data['num_compound']     = $lr_num_compound;
  }

  private function postRecord(){
    $lr_num_compound = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_num_compound')))));
    $this->data['sample_id']    = trim(xss_clean($this->input->post('edt_sample_id')));
    $this->data['protocol_id']  = trim(xss_clean($this->input->post('edt_protocol_id')));
    $this->data['license_id']   = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['sketch_id']    = trim(xss_clean($this->input->post('edt_sketch_id')));
    $this->data['compound_id']  = trim(xss_clean($this->input->post('edt_compound_id')));
    $this->data['dt_sample']    = $this->input->post('edt_dt_sample');
    $this->data['spot_id']      = trim(xss_clean($this->input->post('edt_spot_id')));
    $this->data['num_compound'] = $lr_num_compound;
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_sample_id',    $this->data['sample_id']);
    $this->session->set_flashdata('set_value_protocol_id',  $this->data['protocol_id']);
    $this->session->set_flashdata('set_value_license_id',   $this->data['license_id']);
    $this->session->set_flashdata('set_value_sketch_id',    $this->data['sketch_id']);
    $this->session->set_flashdata('set_value_compound_id',  $this->data['compound_id']);
    $this->session->set_flashdata('set_value_dt_sample',    $this->data['dt_sample']);
    $this->session->set_flashdata('set_value_spot_id',      $this->data['spot_id']);
    $this->session->set_flashdata('set_value_num_compound', $this->data['num_compound']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_protocol_id',  form_error('edt_protocol_id'));
    $this->session->set_flashdata('set_error_license_id',   form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_sketch_id',    form_error('edt_sketch_id'));
    $this->session->set_flashdata('set_error_compound_id',  form_error('edt_compound_id'));
    $this->session->set_flashdata('set_error_dt_sample',    form_error('edt_dt_sample'));
    $this->session->set_flashdata('set_error_spot_id',      form_error('edt_spot_id'));
    $this->session->set_flashdata('set_error_num_compound', form_error('edt_num_compound'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(array(rule_dt_sample(), rule_spot_id(), rule_num_compound()));
    return $this->form_validation->run();
  }

  private function saveRecord(){
    if(isset($this->data['sample_id'])){
      $this->record['sample_id'] = $this->data['sample_id'];
    }
    $this->record['protocol_id']    = fi_get_protocol();
    $this->record['license_id']     = fi_get_license();
    $this->record['sketch_id']      = $this->data['sketch_id'];
    $this->record['compound_id']    = $this->data['compound_id'];
    $this->record['dt_sample']      = $this->data['dt_sample'];
    $this->record['spot_id']        = $this->data['spot_id'];
    $this->record['num_compound']   = $this->data['num_compound'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('protocols/SamplesCompounds_model', 'ds_model');

    $this->data['view_title'] = 'Amostras de Compostos';
    $this->data['view_title_rec'] = 'Amostra de Compostos';
    $this->data['menu_active'] = MENU_PROTOCOLS;
    $this->data['link_delete'] = base_url(RT_SAMPLES_COMPOUNDS_DB_DEL);
    $this->data['link_insert'] = base_url(RT_SAMPLES_COMPOUNDS_VW_INS);
    $this->data['link_update'] = base_url(RT_SAMPLES_COMPOUNDS_VW_UPD);
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license(),
       'protocol_id' => md5(fi_get_protocol()),
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
    $this->load->view('protocols/samples_compounds/vw_samples_compounds');
    $this->load->view('patterns/js_delete');
    $this->load->view('patterns/js_delete');
    $this->load->view('patterns/v_footer');
  }

  public function ct_vw_insert($pi_sketch, $pi_treatment){
    $this->session->set_flashdata('set_value_sketch_id', $pi_sketch);
    $this->session->set_flashdata(SESS_PROTOCOL_TREATMENT_ID, $pi_treatment);

    $this->prepareFields();
    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = FALSE;
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('protocols/samples_compounds/vw_samples_compounds_ins', $this->data);
    $this->load->view('protocols/samples_compounds/js_samples_compounds');
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
        redirect(base_url(RT_SAMPLES_COMPOUNDS_VW_INS).'/'.$this->data['sketch_id']);
      }else{
        self::saveRecord();
        if($this->ds_model->add($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_SAMPLES_COMPOUNDS_VW_INS).'/'.$this->data['sketch_id']);
        }
      }
    }
  }

  public function ct_vw_update($key, $pi_treatment){
    $this->session->set_flashdata(SESS_PROTOCOL_TREATMENT_ID, $pi_treatment);
    if(($key!=NULL) and ($this->session->flashdata('set_value_sample_id')!=NULL) ){
      self::prepareFields();
    }else{
      $loRecord = $this->ds_model->get_by_key($key);
      if ($loRecord[0]->sample_id > 0){
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
    $this->load->view('protocols/samples_compounds/vw_samples_compounds_upd', $this->data);
    $this->load->view('protocols/samples_compounds/js_samples_compounds');
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
        redirect(base_url(RT_SAMPLES_COMPOUNDS_VW_UPD).'/'.md5($this->data['sample_id']));
      }else{
        self::saveRecord();
        if($this->ds_model->upd($this->record)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
            redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_SAMPLES_COMPOUNDS_VW_UPD).'/'.md5($this->data['sample_id']));
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
