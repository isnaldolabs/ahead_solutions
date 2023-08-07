<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weathers extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_WEATHERS;

  private function prepareFields(){
    $this->data['input_weather_id']         = fl_weather_id($this->session->flashdata('set_value_weather_id'), $this->session->flashdata('set_error_weather_id'));
    $this->data['input_license_id']         = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_station_id']         = fl_station_id($this->session->flashdata('set_value_station_id'), $this->session->flashdata('set_error_station_id'));
    $this->data['input_dt_weather']         = fl_dt_weather($this->session->flashdata('set_value_dt_weather'), $this->session->flashdata('set_error_dt_weather'));
    $this->data['input_pluviometry']        = fl_pluviometry($this->session->flashdata('set_value_pluviometry'), $this->session->flashdata('set_error_pluviometry'));
    $this->data['input_temperature']        = fl_temperature($this->session->flashdata('set_value_temperature'), $this->session->flashdata('set_error_temperature'));
    $this->data['input_temperature_min']    = fl_temperature_min($this->session->flashdata('set_value_temperature_min'), $this->session->flashdata('set_error_temperature_min'));
    $this->data['input_temperature_max']    = fl_temperature_max($this->session->flashdata('set_value_temperature_max'), $this->session->flashdata('set_error_temperature_max'));

    //listas de apoio
    $laParams = array('license_id' => fi_get_license());
    $this->data['input_station_list'] = $this->ds_model->get_list_station($laParams);
  }

  private function getRecord($poRecord){
    $lr_pluviometry     = str_replace(".",",", $poRecord[0]->pluviometry);
    $lr_temperature     = str_replace(".",",", $poRecord[0]->temperature);
    $lr_temperature_min = str_replace(".",",", $poRecord[0]->temperature_min);
    $lr_temperature_max = str_replace(".",",", $poRecord[0]->temperature_max);

    $this->data['weather_id']       = $poRecord[0]->weather_id;
    $this->data['license_id']       = $poRecord[0]->license_id;
    $this->data['station_id']       = $poRecord[0]->station_id;
    $this->data['dt_weather']       = $poRecord[0]->dt_weather;
    $this->data['pluviometry']      = $lr_pluviometry;
    $this->data['temperature']      = $lr_temperature;
    $this->data['temperature_min']  = $lr_temperature_min;
    $this->data['temperature_max']  = $lr_temperature_max;
  }

  private function postRecord(){
    $lr_pluviometry     = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_pluviometry')))));
    $lr_temperature     = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_temperature')))));
    $lr_temperature_min = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_temperature_min')))));
    $lr_temperature_max = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_temperature_max')))));

    $this->data['weather_id']       = trim(xss_clean($this->input->post('edt_weather_id')));
    $this->data['license_id']       = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['station_id']       = trim(xss_clean($this->input->post('edt_station_id')));
    $this->data['dt_weather']       = $this->input->post('edt_dt_weather');
    $this->data['pluviometry']      = round($lr_pluviometry,1);
    $this->data['temperature']      = round($lr_temperature,1);
    $this->data['temperature_min']  = round($lr_temperature_min,1);
    $this->data['temperature_max']  = round($lr_temperature_max,1);
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_weather_id',       $this->data['weather_id']);
    $this->session->set_flashdata('set_value_license_id',       $this->data['license_id']);
    $this->session->set_flashdata('set_value_station_id',       $this->data['station_id']);
    $this->session->set_flashdata('set_value_dt_weather',       $this->data['dt_weather']);
    $this->session->set_flashdata('set_value_pluviometry',      $this->data['pluviometry']);
    $this->session->set_flashdata('set_value_temperature',      $this->data['temperature']);
    $this->session->set_flashdata('set_value_temperature_min',  $this->data['temperature_min']);
    $this->session->set_flashdata('set_value_temperature_max',  $this->data['temperature_max']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_license_id',       form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_station_id',       form_error('edt_station_id'));
    $this->session->set_flashdata('set_error_dt_weather',       form_error('edt_dt_weather'));
    $this->session->set_flashdata('set_error_pluviometry',      form_error('edt_weather'));
    $this->session->set_flashdata('set_error_temperature',      form_error('edt_temperature'));
    $this->session->set_flashdata('set_error_temperature_min',  form_error('edt_temperature_min'));
    $this->session->set_flashdata('set_error_temperature_max',  form_error('edt_temperature_max'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(array(rule_station_id(), rule_dt_weather(), rule_pluviometry(), rule_temperature()));
    return $this->form_validation->run();
  }

  private function saveRecord(){
    if(isset($this->data['weather_id'])){
      $this->record['weather_id'] = $this->data['weather_id'];
    }
    $this->record['license_id']         = fi_get_license();
    $this->record['station_id']         = $this->data['station_id'];
    $this->record['dt_weather']         = $this->data['dt_weather'];
    $this->record['pluviometry']        = $this->data['pluviometry'];
    $this->record['temperature']        = $this->data['temperature'];
    $this->record['temperature_min']    = $this->data['temperature_min'];
    $this->record['temperature_max']    = $this->data['temperature_max'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('prepare/Weathers_model', 'ds_model');

    $this->data['view_title'] = 'Condições climáticas';
    $this->data['view_title_rec'] = 'Condição climática';
    $this->data['menu_active'] = MENU_PREPARE;
    $this->data['link_delete'] = base_url(RT_WEATHERS_DB_DEL);
    $this->data['link_insert'] = base_url(RT_WEATHERS_VW_INS);
    $this->data['link_update'] = base_url(RT_WEATHERS_VW_UPD);
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license(),
       'limit' => fi_get_lines_page(),
       'start' => $this->uri->segment(2, 0));

    $dados = $this->data['ds_dataset']  = $this->ds_model->get_all($laParams);

    
    
     $this->data['ds_dataset_station'] = $this->ds_model->get_list_station($laParams);
    
    // $this->data['ds_dataset_nameStation']
    log_message('info', $this->db->last_query());

    $this->data['li_total_rows']    = $this->ds_model->get_count_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page']    = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination']    = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('prepare/weathers/vw_weathers');
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
    $this->load->view('prepare/weathers/vw_weathers_ins', $this->data);
    $this->load->view('prepare/weathers/js_weathers');
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
        redirect(base_url(RT_WEATHERS_VW_INS));
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
    if(($key!=NULL) and ($this->session->flashdata('set_value_weather_id')!=NULL) ){
      self::prepareFields();
    }else{
      $loRecord = $this->ds_model->get_by_key($key);
      if ($loRecord[0]->weather_id > 0){
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
    $this->load->view('prepare/weathers/vw_weathers_upd', $this->data);
    $this->load->view('prepare/weathers/js_weathers');
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
        redirect(base_url(RT_WEATHERS_VW_UPD).'/'.md5($this->data['weather_id']));
      }else{
        self::saveRecord();
        if($this->ds_model->upd($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_WEATHERS_VW_UPD).'/'.md5($this->data['weather_id']));
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
