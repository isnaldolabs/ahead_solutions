<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MathAnovaRatings extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_MATH_ANOVA_RATINGS;

  private function prepareFields(){
    $this->data['input_rating_id']  = fl_rating_id($this->session->flashdata('set_value_rating_id'), $this->session->flashdata('set_error_rating_id'));
    $this->data['input_license_id'] = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_min_value']  = fl_min_value($this->session->flashdata('set_value_min_value'), $this->session->flashdata('set_error_min_value'));
    $this->data['input_max_value']  = fl_max_value($this->session->flashdata('set_value_max_value'), $this->session->flashdata('set_error_max_value'));
  }

  private function getRecord($poRecord){
    $this->data['rating_id']    = $poRecord[0]->rating_id;
    $this->data['license_id']   = $poRecord[0]->license_id;
    $this->data['min_value']    = $poRecord[0]->min_value;
    $this->data['max_value']    = $poRecord[0]->max_value;
  }

  private function postRecord(){
    $this->data['rating_id']    = trim(xss_clean($this->input->post('edt_rating_id')));
    $this->data['license_id']   = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['min_value']    = trim(xss_clean($this->input->post('edt_min_value')));
    $this->data['max_value']    = trim(xss_clean($this->input->post('edt_max_value')));
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_rating_id',    $this->data['rating_id']);
    $this->session->set_flashdata('set_value_license_id',   $this->data['license_id']);
    $this->session->set_flashdata('set_value_min_value',    $this->data['min_value']);
    $this->session->set_flashdata('set_value_max_value',    $this->data['max_value']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_license_id',   form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_min_value',    form_error('edt_min_value'));
    $this->session->set_flashdata('set_error_max_value',    form_error('edt_max_value'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(array(rule_min_value(),rule_max_value()));
    return $this->form_validation->run();
  }

  private function saveRecord(){
    if(isset($this->data['rating_id'])){
      $this->record['rating_id'] = $this->data['rating_id'];
    }
    $this->record['license_id'] = fi_get_license();
    $this->record['min_value']  = $this->data['min_value'];
    $this->record['max_value']  = $this->data['max_value'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('prepare/MathAnovaRatings_model', 'ds_model');

    $this->data['view_title'] = 'Classificação ANOVA';
    $this->data['view_title_rec'] = 'Classificação ANOVA';
    $this->data['menu_active'] = MENU_PREPARE;

    $this->data['link_delete'] = '';
    $this->data['link_insert'] = '';
    $this->data['link_update'] = base_url(RT_MATH_ANOVA_RATINGS_VW_UPD);
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

    $this->data['lo_lines_page']    = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination']    = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('prepare/math_anova_ratings/vw_math_anova_ratings');
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/v_footer');
  }

  public function ct_vw_update($key){
    if(($key!=NULL) and ($this->session->flashdata('set_value_rating_id')!=NULL) ){
      self::prepareFields();
    }else{
      $loRecord = $this->ds_model->get_by_key($key);
      if ($loRecord[0]->rating_id > 0){
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
    $this->load->view('prepare/math_anova_ratings/vw_math_anova_ratings_upd', $this->data);
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
        redirect(base_url(RT_MATH_ANOVA_RATINGS_VW_UPD).'/'.md5($this->data['rating_id']));
      }else{
        self::saveRecord();
        if($this->ds_model->upd($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_MATH_ANOVA_RATINGS_VW_UPD).'/'.md5($this->data['rating_id']));
        }
      }
    }
  }

}
