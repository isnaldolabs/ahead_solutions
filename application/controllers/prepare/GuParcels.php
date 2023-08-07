<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuParcels extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_GU_PARCELS;

  private function prepareFields(){
    $this->data['input_parcel_id']      = fl_parcel_id($this->session->flashdata('set_value_parcel_id'), $this->session->flashdata('set_error_parcel_id'));
    $this->data['input_plot_id']        = fl_plot_id($this->session->flashdata('set_value_plot_id'), $this->session->flashdata('set_error_plot_id'));
    $this->data['input_license_id']     = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_parcel_code']    = fl_parcel_code($this->session->flashdata('set_value_parcel_code'), $this->session->flashdata('set_error_parcel_code'));
    $this->data['input_variety_id']     = fl_variety_id($this->session->flashdata('set_value_variety_id'), $this->session->flashdata('set_error_variety_id'));
    $this->data['input_area']           = fl_area($this->session->flashdata('set_value_area'), $this->session->flashdata('set_error_area'));
    $this->data['input_dt_planting']    = fl_dt_planting($this->session->flashdata('set_value_dt_planting'), $this->session->flashdata('set_error_dt_planting'));

    //listas de apoio
    $laParams = array('license_id' => fi_get_license());
    $this->data['input_variety_list']   = $this->ds_model->get_list_variety($laParams);
  }

  private function getRecord($poRecord){
    $lrArea = str_replace(".",",", $poRecord[0]->area);

    $this->data['parcel_id']    = $poRecord[0]->parcel_id;
    $this->data['plot_id']      = $poRecord[0]->plot_id;
    $this->data['license_id']   = $poRecord[0]->license_id;
    $this->data['parcel_code']  = $poRecord[0]->parcel_code;
    $this->data['variety_id']   = $poRecord[0]->variety_id;
    $this->data['area']         = $lrArea;
    $this->data['dt_planting']  = $poRecord[0]->dt_planting;
  }

  private function postRecord(){
    $lrArea = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_area')))));

    $this->data['parcel_id']    = trim(xss_clean($this->input->post('edt_parcel_id')));
    $this->data['plot_id']      = trim(xss_clean($this->input->post('edt_plot_id')));
    $this->data['license_id']   = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['parcel_code']  = trim(xss_clean($this->input->post('edt_parcel_code')));
    $this->data['variety_id']   = trim(xss_clean($this->input->post('edt_variety_id')));
    $this->data['area']         = $lrArea;
    $this->data['dt_planting']  = $this->input->post('edt_dt_planting');
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_parcel_id',    $this->data['parcel_id']);
    $this->session->set_flashdata('set_value_plot_id',      $this->data['plot_id']);
    $this->session->set_flashdata('set_value_license_id',   $this->data['license_id']);
    $this->session->set_flashdata('set_value_parcel_code',  $this->data['parcel_code']);
    $this->session->set_flashdata('set_value_variety_id',   $this->data['variety_id']);
    $this->session->set_flashdata('set_value_area',         $this->data['area']);
    $this->session->set_flashdata('set_value_dt_planting',  $this->data['dt_planting']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_plot_id',      form_error('edt_plot_id'));
    $this->session->set_flashdata('set_error_license_id',   form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_parcel_code',  form_error('edt_parcel_code'));
    $this->session->set_flashdata('set_error_variety_id',   form_error('edt_variety_id'));
    $this->session->set_flashdata('set_error_area',         form_error('edt_area'));
    $this->session->set_flashdata('set_error_dt_planting',  form_error('edt_dt_planting'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(array(rule_parcel_code(), rule_area()));
    return $this->form_validation->run();
  }

  private function saveRecord(){
    if(isset($this->data['parcel_id'])){
      $this->record['parcel_id'] = $this->data['parcel_id'];
    }
    $this->record['plot_id']        = fi_get_plot_id();
    $this->record['license_id']     = fi_get_license();
    $this->record['parcel_code']    = $this->data['parcel_code'];
    $this->record['variety_id']     = $this->data['variety_id'];
    $this->record['area']           = $this->data['area'];
    $this->record['dt_planting']    = $this->data['dt_planting'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('prepare/GuParcels_model', 'ds_model');

    $this->data['view_title'] = 'Parcelas';
    $this->data['view_title_rec'] = 'Parcela';
    $this->data['menu_active'] = MENU_PREPARE;
    $this->data['link_delete'] = base_url(RT_GU_PARCELS_DB_DEL);
    $this->data['link_insert'] = base_url(RT_GU_PARCELS_VW_INS);
    $this->data['link_update'] = base_url(RT_GU_PARCELS_VW_UPD);
  }

  public function index(){

    $laParams = array(
       'license_id' => fi_get_license(),
       'plot_id' => fi_get_plot_id(),
       'limit' => fi_get_lines_page(),
       'start' => $this->uri->segment(2, 0));

    $this->data['ds_dataset']       = $this->ds_model->get_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['li_total_rows']    = $this->ds_model->get_count_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page']    = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination']    = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->data['farm_code']    = fs_get_farm_code();
    $this->data['farm_name']    = fs_get_farm_name();
    $this->data['plot_code']    = fs_get_plot_code();

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('prepare/gu_parcels/vw_gu_parcels');
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
    $this->load->view('prepare/gu_parcels/vw_gu_parcels_ins', $this->data);
    $this->load->view('prepare/gu_parcels/js_gu_parcels', $this->data);
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
        redirect(base_url(RT_GU_PARCELS_VW_INS));
      }else{
        self::saveRecord();
        if($this->ds_model->add($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_GU_PARCELS_VW_INS));
        }
      }
    }
  }

  public function ct_vw_update($key){
    if(($key!=NULL) and ($this->session->flashdata('set_value_parcel_id')!=NULL) ){
      self::prepareFields();
    }else{
      $loRecord = $this->ds_model->get_by_key($key);
      if ($loRecord[0]->parcel_id > 0){
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
    $this->load->view('prepare/gu_parcels/vw_gu_parcels_upd', $this->data);
    $this->load->view('prepare/gu_parcels/js_gu_parcels', $this->data);
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
        redirect(base_url(RT_GU_PARCELS_VW_UPD).'/'.md5($this->data['parcel_id']));
      }else{
        self::saveRecord();
        if($this->ds_model->upd($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_GU_PARCELS_VW_UPD).'/'.md5($this->data['parcel_id']));
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

  public function ct_call_gu_plots_gu_parcels($key){
    $loRecord = $this->ds_model->get_by_key($key);
    if ($loRecord[0]->plot_id > 0){
        $this->session->set_userdata(SESS_PLOT_CODE, $loRecord[0]->plot_code);
        redirect(RT_GU_PARCELS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

}
