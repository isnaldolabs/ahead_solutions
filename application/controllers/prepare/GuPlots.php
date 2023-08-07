<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuPlots extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_GU_PLOTS;

  private function prepareFields(){
    $this->data['input_plot_id']            = fl_plot_id($this->session->flashdata('set_value_plot_id'), $this->session->flashdata('set_error_plot_id'));
    $this->data['input_license_id']         = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_season_id']          = fl_season_id($this->session->flashdata('set_value_season_id'), $this->session->flashdata('set_error_season_id'));
    $this->data['input_farm_id']            = fl_farm_id($this->session->flashdata('set_value_farm_id'), $this->session->flashdata('set_error_farm_id'));
    $this->data['input_block_code']         = fl_block_code($this->session->flashdata('set_value_block_code'), $this->session->flashdata('set_error_block_code'));
    $this->data['input_plot_code']          = fl_plot_code($this->session->flashdata('set_value_plot_code'), $this->session->flashdata('set_error_plot_code'));
    $this->data['input_variety_id']         = fl_variety_id($this->session->flashdata('set_value_variety_id'), $this->session->flashdata('set_error_variety_id'));
    $this->data['input_cutting_id']         = fl_cutting_id($this->session->flashdata('set_value_cutting_id'), $this->session->flashdata('set_error_cutting_id'));
    $this->data['input_region_id']          = fl_region_id($this->session->flashdata('set_value_region_id'), $this->session->flashdata('set_error_region_id'));
    $this->data['input_soil_id']            = fl_soil_id($this->session->flashdata('set_value_soil_id'), $this->session->flashdata('set_error_soil_id'));
    $this->data['input_environment_id']     = fl_environment_id($this->session->flashdata('set_value_environment_id'), $this->session->flashdata('set_error_environment_id'));
    $this->data['input_spacing_id']         = fl_spacing_id($this->session->flashdata('set_value_spacing_id'), $this->session->flashdata('set_error_spacing_id'));
    $this->data['input_distance']           = fl_distance($this->session->flashdata('set_value_distance'), $this->session->flashdata('set_error_distance'));
    $this->data['input_total_area']         = fl_total_area($this->session->flashdata('set_value_total_area'), $this->session->flashdata('set_error_total_area'));
    $this->data['input_production_area']    = fl_production_area($this->session->flashdata('set_value_production_area'), $this->session->flashdata('set_error_production_area'));
    $this->data['input_tons']               = fl_tons($this->session->flashdata('set_value_tons'), $this->session->flashdata('set_error_tons'));
    $this->data['input_cut_tons']           = fl_cut_tons($this->session->flashdata('set_value_cut_tons'), $this->session->flashdata('set_error_cut_tons'));
    $this->data['input_dt_planting']        = fl_dt_planting($this->session->flashdata('set_value_dt_planting'), $this->session->flashdata('set_error_dt_planting'));
    $this->data['input_dt_cutting']         = fl_dt_cutting($this->session->flashdata('set_value_dt_cutting'), $this->session->flashdata('set_error_dt_cutting'));

    //listas de apoio
    $laParams = array('license_id' => fi_get_license());
    $this->data['input_variety_list']       = $this->ds_model->get_list_variety($laParams);
    $this->data['input_cutting_list']       = $this->ds_model->get_list_cutting($laParams);
    $this->data['input_region_list']        = $this->ds_model->get_list_gu_regions($laParams);
    $this->data['input_soil_list']          = $this->ds_model->get_list_soil($laParams);
    $this->data['input_environment_list']   = $this->ds_model->get_list_environment($laParams);
    $this->data['input_spacing_list']       = $this->ds_model->get_list_spacing($laParams);
  }

  private function getRecord($poRecord){
    $lr_distance        = str_replace(".",",", $poRecord[0]->distance);
    $lr_total_area      = str_replace(".",",", $poRecord[0]->total_area);
    $lr_production_area = str_replace(".",",", $poRecord[0]->production_area);
    $lr_tons            = str_replace(".",",", $poRecord[0]->tons);
    $lr_cut_tons        = str_replace(".",",", $poRecord[0]->cut_tons);

    $this->data['plot_id']          = $poRecord[0]->plot_id;
    $this->data['license_id']       = $poRecord[0]->license_id;
    $this->data['season_id']        = $poRecord[0]->season_id;
    $this->data['farm_id']          = $poRecord[0]->farm_id;
    $this->data['block_code']       = $poRecord[0]->block_code;
    $this->data['plot_code']        = $poRecord[0]->plot_code;
    $this->data['variety_id']       = $poRecord[0]->variety_id;
    $this->data['cutting_id']       = $poRecord[0]->cutting_id;
    $this->data['region_id']        = $poRecord[0]->region_id;
    $this->data['soil_id']          = $poRecord[0]->soil_id;
    $this->data['environment_id']   = $poRecord[0]->environment_id;
    $this->data['spacing_id']       = $poRecord[0]->spacing_id;
    $this->data['distance']         = $lr_distance;
    $this->data['total_area']       = $lr_total_area;
    $this->data['production_area']  = $lr_production_area;
    $this->data['tons']             = $lr_tons;
    $this->data['cut_tons']         = $lr_cut_tons;
    $this->data['dt_planting']      = $poRecord[0]->dt_planting;
    $this->data['dt_cutting']       = $poRecord[0]->dt_cutting;
  }

  private function postRecord(){
    $lr_distance        = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_distance')))));
    $lr_total_area      = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_total_area')))));
    $lr_production_area = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_production_area')))));
    $lr_tons            = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_tons')))));
    $lr_cut_tons        = str_replace(",",".", str_replace(".","", trim(xss_clean($this->input->post('edt_cut_tons')))));

    $this->data['plot_id']          = trim(xss_clean($this->input->post('edt_plot_id')));
    $this->data['license_id']       = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['season_id']        = fi_get_season();
    $this->data['farm_id']          = trim(xss_clean($this->input->post('edt_farm_id')));
    $this->data['block_code']       = trim(xss_clean($this->input->post('edt_block_code')));
    $this->data['plot_code']        = trim(xss_clean($this->input->post('edt_plot_code')));
    $this->data['variety_id']       = trim(xss_clean($this->input->post('edt_variety_id')));
    $this->data['cutting_id']       = trim(xss_clean($this->input->post('edt_cutting_id')));
    $this->data['region_id']        = trim(xss_clean($this->input->post('edt_region_id')));
    $this->data['soil_id']          = trim(xss_clean($this->input->post('edt_soil_id')));
    $this->data['environment_id']   = trim(xss_clean($this->input->post('edt_environment_id')));
    $this->data['spacing_id']       = trim(xss_clean($this->input->post('edt_spacing_id')));
    $this->data['distance']         = $lr_distance;
    $this->data['total_area']       = $lr_total_area;
    $this->data['production_area']  = $lr_production_area;
    $this->data['tons']             = $lr_tons;
    $this->data['cut_tons']         = $lr_cut_tons;
    $this->data['dt_planting']      = $this->input->post('edt_dt_planting');
    $this->data['dt_cutting']       = $this->input->post('edt_dt_cutting');
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_plot_id',          $this->data['plot_id']);
    $this->session->set_flashdata('set_value_license_id',       $this->data['license_id']);
    $this->session->set_flashdata('set_value_season_id',        $this->data['season_id']);
    $this->session->set_flashdata('set_value_farm_id',          $this->data['farm_id']);
    $this->session->set_flashdata('set_value_block_code',       $this->data['block_code']);
    $this->session->set_flashdata('set_value_plot_code',        $this->data['plot_code']);
    $this->session->set_flashdata('set_value_variety_id',       $this->data['variety_id']);
    $this->session->set_flashdata('set_value_cutting_id',       $this->data['cutting_id']);
    $this->session->set_flashdata('set_value_region_id',        $this->data['region_id']);
    $this->session->set_flashdata('set_value_soil_id',          $this->data['soil_id']);
    $this->session->set_flashdata('set_value_environment_id',   $this->data['environment_id']);
    $this->session->set_flashdata('set_value_spacing_id',       $this->data['spacing_id']);
    $this->session->set_flashdata('set_value_distance',         $this->data['distance']);
    $this->session->set_flashdata('set_value_total_area',       $this->data['total_area']);
    $this->session->set_flashdata('set_value_production_area',  $this->data['production_area']);
    $this->session->set_flashdata('set_value_tons',             $this->data['tons']);
    $this->session->set_flashdata('set_value_cut_tons',         $this->data['cut_tons']);
    $this->session->set_flashdata('set_value_dt_planting',      $this->data['dt_planting']);
    $this->session->set_flashdata('set_value_dt_cutting',       $this->data['dt_cutting']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_license_id',       form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_season_id',        form_error('edt_season_id'));
    $this->session->set_flashdata('set_error_farm_id',          form_error('edt_farm_id'));
    $this->session->set_flashdata('set_error_block_code',       form_error('edt_block_code'));
    $this->session->set_flashdata('set_error_plot_code',        form_error('edt_plot_code'));
    $this->session->set_flashdata('set_error_variety_id',       form_error('edt_variety_id'));
    $this->session->set_flashdata('set_error_cutting_id',       form_error('edt_cutting_id'));
    $this->session->set_flashdata('set_error_region_id',        form_error('edt_region_id'));
    $this->session->set_flashdata('set_error_soil_id',          form_error('edt_soil_id'));
    $this->session->set_flashdata('set_error_environment_id',   form_error('edt_environment_id'));
    $this->session->set_flashdata('set_error_spacing_id',       form_error('edt_spacing_id'));
    $this->session->set_flashdata('set_error_distance',         form_error('edt_distance'));
    $this->session->set_flashdata('set_error_total_area',       form_error('edt_total_area'));
    $this->session->set_flashdata('set_error_production_area',  form_error('edt_production_area'));
    $this->session->set_flashdata('set_error_tons',             form_error('edt_tons'));
    $this->session->set_flashdata('set_error_cut_tons',         form_error('edt_cut_tons'));
    $this->session->set_flashdata('set_error_dt_planting',      form_error('edt_dt_planting'));
    $this->session->set_flashdata('set_error_dt_cutting',       form_error('edt_dt_cutting'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(array(rule_plot_code(), rule_block_code()));
    return $this->form_validation->run();
  }

  private function saveRecord(){
    if(isset($this->data['plot_id'])){
      $this->record['plot_id'] = $this->data['plot_id'];
    }
    $this->record['license_id']         = fi_get_license();
    $this->record['season_id']          = fi_get_season();
    $this->record['farm_id']            = fi_get_farm();
    $this->record['block_code']         = $this->data['block_code'];
    $this->record['plot_code']          = $this->data['plot_code'];
    $this->record['variety_id']         = $this->data['variety_id'];
    $this->record['cutting_id']         = $this->data['cutting_id'];
    $this->record['region_id']          = $this->data['region_id'];
    $this->record['soil_id']            = $this->data['soil_id'];
    $this->record['environment_id']     = $this->data['environment_id'];
    $this->record['spacing_id']         = $this->data['spacing_id'];
    $this->record['distance']           = $this->data['distance'];
    $this->record['total_area']         = $this->data['total_area'];
    $this->record['production_area']    = $this->data['production_area'];
    $this->record['tons']               = $this->data['tons'];
    $this->record['cut_tons']           = $this->data['cut_tons'];
    $this->record['dt_planting']        = $this->data['dt_planting'];
    $this->record['dt_cutting']         = $this->data['dt_cutting'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('prepare/GuPlot_model', 'ds_model');

    $this->data['view_title'] = 'Talhões';
    $this->data['view_title_rec'] = 'Talhão';
    $this->data['menu_active'] = MENU_PREPARE;
    $this->data['link_delete'] = base_url(RT_GU_PLOTS_DB_DEL);
    $this->data['link_insert'] = base_url(RT_GU_PLOTS_VW_INS);
    $this->data['link_update'] = base_url(RT_GU_PLOTS_VW_UPD);
    $this->data['link_parcels'] = base_url(RT_CALL_GU_PLOTS_GU_PARCELS);
  }

  public function index(){

    $laParams = array(
       'license_id' => fi_get_license(),
       'farm_id' => fi_get_farm(),
       'season_id' => fi_get_season(),
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

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('prepare/gu_plots/vw_gu_plots');
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
    $this->load->view('prepare/gu_plots/vw_gu_plots_ins', $this->data);
    $this->load->view('prepare/gu_plots/js_gu_plots', $this->data);
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
        redirect(base_url(RT_GU_PLOTS_VW_INS));
      }else{
        self::saveRecord();
        if($this->ds_model->add($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_GU_PLOTS_VW_INS));
        }
      }
    }
  }

  public function ct_vw_update($key){
    if(($key!=NULL) and ($this->session->flashdata('set_value_plot_id')!=NULL) ){
      self::prepareFields();
    }else{
      $loRecord = $this->ds_model->get_by_key($key);
      if ($loRecord[0]->plot_id > 0){
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
    $this->load->view('prepare/gu_plots/vw_gu_plots_upd', $this->data);
    $this->load->view('prepare/gu_plots/js_gu_plots', $this->data);
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
        redirect(base_url(RT_GU_PLOTS_VW_UPD).'/'.md5($this->data['plot_id']));
      }else{
        self::saveRecord();
        if($this->ds_model->upd($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_GU_PLOTS_VW_UPD).'/'.md5($this->data['plot_id']));
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
        $this->session->set_userdata(SESS_PLOT_ID,   $loRecord[0]->plot_id);
        $this->session->set_userdata(SESS_PLOT_CODE, $loRecord[0]->plot_code);
        redirect(RT_GU_PARCELS);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_RECORD_NOT_FOUND));
        redirect($this->link_redirect);
    }
  }

}
