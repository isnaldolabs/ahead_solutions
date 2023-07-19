<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seasons extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_SEASONS;

  private function prepareFields(){
    $this->data['input_season_id']  = fl_season_id($this->session->flashdata('set_value_season_id'), $this->session->flashdata('set_error_season_id'));
    $this->data['input_num_year']   = fl_seasons_num_year($this->session->flashdata('set_value_num_year'), $this->session->flashdata('set_error_num_year'));
    $this->data['input_name']       = fl_name20($this->session->flashdata('set_value_name'), $this->session->flashdata('set_error_name'));
    $this->data['input_active']     = fl_active($this->session->flashdata('set_value_active'), $this->session->flashdata('set_error_active'));
    $this->data['input_dt_start']   = fl_dt_start($this->session->flashdata('set_value_dt_start'), $this->session->flashdata('set_error_dt_start'));
    $this->data['input_dt_end']     = fl_dt_end($this->session->flashdata('set_value_dt_end'), $this->session->flashdata('set_error_dt_end'));
  }

  private function getRecord($poRecord){
    $this->data['season_id']  = $poRecord[0]->season_id;
    $this->data['num_year']   = $poRecord[0]->num_year;
    $this->data['name']       = $poRecord[0]->name;
    $this->data['active']     = $poRecord[0]->active;
    $this->data['dt_start']   = $poRecord[0]->dt_start;
    $this->data['dt_end']     = $poRecord[0]->dt_end;
  }

  private function postRecord(){
    $this->data['season_id']  = trim(xss_clean($this->input->post('edt_season_id')));
    $this->data['num_year']   = trim(xss_clean($this->input->post('edt_num_year')));
    $this->data['name']       = trim(xss_clean($this->input->post('edt_name')));
    $this->data['active']     = ($this->input->post('edt_active')=='on'?1:0);
    $this->data['dt_start']   = $this->input->post('edt_dt_start');
    $this->data['dt_end']     = $this->input->post('edt_dt_end');
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_season_id',  $this->data['season_id']);
    $this->session->set_flashdata('set_value_num_year',   $this->data['num_year']);
    $this->session->set_flashdata('set_value_name',       $this->data['name']);
    $this->session->set_flashdata('set_value_active',     $this->data['active']);
    $this->session->set_flashdata('set_value_dt_start',   $this->data['dt_start']);
    $this->session->set_flashdata('set_value_dt_end',     $this->data['dt_end']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_num_year', form_error('edt_num_year'));
    $this->session->set_flashdata('set_error_name',     form_error('edt_name'));
    $this->session->set_flashdata('set_error_active',   form_error('edt_active'));
    $this->session->set_flashdata('set_error_dt_start', form_error('edt_dt_start'));
    $this->session->set_flashdata('set_error_dt_end',   form_error('edt_dt_end'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(
            array(rule_num_year(),
                rule_name20(),
                rule_dt_start(),
                rule_dt_end())
            );
    return $this->form_validation->run();
  }

  private function saveRecord(){
    if(isset($this->data['season_id'])){
      $this->record['season_id'] = $this->data['season_id'];
    }
    $this->record['license_id'] = fi_get_license();
    $this->record['num_year']   = $this->data['num_year'];
    $this->record['name']       = $this->data['name'];
    $this->record['active']     = $this->data['active'];
    $this->record['dt_start']   = $this->data['dt_start'];
    $this->record['dt_end']     = $this->data['dt_end'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('prepare/Season_model', 'ds_model');

    $this->data['view_title'] = 'Safras';
    $this->data['view_title_rec'] = 'Safra';
    $this->data['menu_active'] = MENU_PREPARE;
    $this->data['link_delete'] = base_url(RT_SEASONS_DB_DEL);
    $this->data['link_insert'] = base_url(RT_SEASONS_VW_INS);
    $this->data['link_update'] = base_url(RT_SEASONS_VW_UPD);
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license(),
       'limit' => fi_get_lines_page(),
       'start' => $this->uri->segment(2, 0));

    $this->data['dataset']          = $this->ds_model->get_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['li_total_rows']    = $this->ds_model->get_count_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page']     = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination']    = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('prepare/seasons/vw_seasons');
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
    $this->load->view('prepare/seasons/vw_seasons_ins', $this->data);
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
        redirect(base_url(RT_SEASONS_VW_INS));
      }else{
        self::saveRecord();
        if($this->ds_model->add($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', 'Houve uma falha ao incluir a safra.');
        }
      }
    }
  }

  public function ct_vw_update($key){
    if(($key!=NULL) and ($this->session->flashdata('set_value_season_id')!=NULL) ){
      self::prepareFields();
    }else{
      $loRecord = $this->ds_model->get_by_key($key);
      if ($loRecord[0]->season_id > 0){
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
    $this->load->view('prepare/seasons/vw_seasons_upd', $this->data);
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
        redirect(base_url(RT_SEASONS_VW_UPD).'/'.md5($this->data['season_id']));
      }else{
        self::saveRecord();
        if($this->ds_model->upd($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_SEASONS_VW_UPD).'/'.md5($this->data['season_id']));
        }
      }
    }
  }

  public function ct_db_delete($key){
    if($this->ds_model->delete($key)){
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS,
                                                     'text'=>'A safra selecionada foi excluída com sucesso.'));
    }else{
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER,
                                                     'text'=>'Exceção: houve uma falha ao excluir a safra selecionada.'));
    }
    redirect($this->link_redirect);
  }

}
