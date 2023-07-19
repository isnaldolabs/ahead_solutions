<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_USER_PROFILE;

  private function prepareFields(){
    $this->data['input_group_id']   = fl_group_id($this->session->flashdata('set_value_group_id'), $this->session->flashdata('set_error_group_id'));
    $this->data['input_license_id'] = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_name']       = fl_name30($this->session->flashdata('set_value_name'), $this->session->flashdata('set_error_name'));
    $this->data['input_active']     = fl_active($this->session->flashdata('set_value_active'), $this->session->flashdata('set_error_active'));
    $this->data['input_is_admin']   = fl_groups_is_admin($this->session->flashdata('set_value_is_admin'), $this->session->flashdata('set_error_is_admin'));
  }

  private function getRecord($poRecord){
    $this->data['group_id']     = $poRecord[0]->group_id;
    $this->data['license_id']   = $poRecord[0]->license_id;
    $this->data['name']         = $poRecord[0]->name;
    $this->data['active']       = $poRecord[0]->active;
    $this->data['is_admin']     = $poRecord[0]->is_admin;
  }

  private function postRecord(){
    $this->data['group_id']     = trim(xss_clean($this->input->post('edt_group_id')));
    $this->data['license_id']   = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['name']         = trim(xss_clean($this->input->post('edt_name')));
    $this->data['active']       = ($this->input->post('edt_active')=='on'?1:0);
    $this->data['is_admin']     = ($this->input->post('edt_is_admin')=='on'?1:0);
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_group_id',     $this->data['group_id']);
    $this->session->set_flashdata('set_value_license_id',   $this->data['license_id']);
    $this->session->set_flashdata('set_value_name',         $this->data['name']);
    $this->session->set_flashdata('set_value_active',       $this->data['active']);
    $this->session->set_flashdata('set_value_is_admin',     $this->data['is_admin']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_license_id',   form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_name',         form_error('edt_name'));
    $this->session->set_flashdata('set_error_active',       form_error('edt_active'));
    $this->session->set_flashdata('set_error_is_admin',     form_error('edt_is_admin'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(array(rule_name30()));
    return $this->form_validation->run();
  }

  private function saveRecord(){
    if(isset($this->data['group_id'])){
      $this->record['group_id'] = $this->data['group_id'];
    }
    $this->record['license_id'] = fi_get_license();
    $this->record['name']       = $this->data['name'];
    $this->record['active']     = $this->data['active'];
    $this->record['is_admin']   = $this->data['is_admin'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('authorizations/Profile_model', 'ds_model');

    $this->data['view_title'] = 'Perfil';
    $this->data['view_title_rec'] = 'Perfil';
    $this->data['menu_active'] = MENU_ADMIN;
    $this->data['link_delete'] = '';
    $this->data['link_insert'] = '';
    $this->data['link_update'] = base_url(RT_USER_PROFILE_VW_UPD);
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license(),
       'limit' => fi_get_lines_page(),
       'start' => $this->uri->segment(2, 0));

    $this->data['dataset'] = $this->ds_model->get_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['li_total_rows'] = $this->ds_model->get_count_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page']    = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination']    = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('authorizations/groups/vw_groups');
    $this->load->view('patterns/js_filter');
    if (fiLevelAccess(fi_get_user(), FNC_GROUPS)==ACCESS_LEVEL_COMPLETE){
      $this->load->view('patterns/js_delete');
    }
    $this->load->view('patterns/v_footer');
  }

  public function ct_vw_update($key){
    if(($key!=NULL) and ($this->session->flashdata('set_value_group_id')!=NULL) ){
      self::prepareFields();
    }else{
      $loRecord = $this->ds_model->get_by_key($key);
      if ($loRecord[0]->group_id > 0){
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
    $this->load->view('authorizations/groups/vw_groups_upd', $this->data);
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
        redirect(base_url(RT_USER_PROFILE_VW_UPD).'/'.md5($this->data['group_id']));
      }else{
        self::saveRecord();
        if($this->ds_model->upd($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_USER_PROFILE_VW_UPD).'/'.md5($this->data['group_id']));
        }
      }
    }
  }

  public function ct_profile_lines_page($piLines, $psRedirect){
        $la_record = array(
            'user_id' => md5(fi_get_user()),
            'lines_page' => $piLines);
        if($this->ds_model->upd_lines_page($la_record)){
            log_message('info', $this->db->last_query());
            $this->session->set_userdata(SESS_LINES_PAGE, $piLines);
            redirect(base_url($psRedirect));
        }else{
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
            log_message('error', MSG_FAILURE_SAVING);
            redirect(base_url($psRedirect));
        }
  }

}
