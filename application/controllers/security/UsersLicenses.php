<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersLicenses extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_USERS_LICENSES;

  private function prepareFields(){
    $this->data['input_license_id'] = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_user_id']    = fl_user_id($this->session->flashdata('set_value_user_id'), $this->session->flashdata('set_error_user_id'));

    //listas de apoio
    $this->data['input_licenses_list']  = $this->ds_model->get_list_licenses();
    $this->data['input_users_list']     = $this->ds_model->get_list_users();
  }

  private function postRecord(){
    $this->data['license_id']   = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['user_id']      = trim(xss_clean($this->input->post('edt_user_id')));
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_license_id',   $this->data['license_id']);
    $this->session->set_flashdata('set_value_user_id',      $this->data['user_id']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_license_id',   form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_user_id',      form_error('edt_user_id'));
  }

  private function saveRecord(){
    $this->record['license_id'] = $this->data['license_id'];
    $this->record['user_id']    = $this->data['user_id'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('security/UserLicense_model', 'ds_model');

    $this->data['view_title'] = 'Licenças dos Usuários';
    $this->data['view_title_rec'] = 'Licença do Usuário';
    $this->data['menu_active'] = MENU_SECURITY;
    $this->data['link_delete'] = base_url(RT_USERS_LICENSES_DB_DEL);
    $this->data['link_insert'] = base_url(RT_USERS_LICENSES_VW_INS);
    $this->data['link_update'] = '';
  }

  public function index(){
    $liStart = $this->uri->segment(2, 0);
    $this->data['ds_dataset'] = $this->ds_model->get_all(fi_get_lines_page(), $liStart);
    log_message('info', $this->db->last_query());

    $this->data['li_total_rows'] = $this->ds_model->get_count_all();
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page']     = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination']    = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('security/users_licenses/vw_users_licenses');
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
    $this->load->view('security/users_licenses/vw_users_licenses_ins', $this->data);
    $this->load->view('patterns/v_footer');
  }

  public function ct_db_insert(){
    if(isset($_POST[BTN_POST_RETURN])){
      redirect($this->link_redirect);
    }
    elseif(isset($_POST[BTN_POST_SAVE])){
      self::postRecord();
      self::flashRecord();
      self::flashErrors();
      self::saveRecord();
      $retorno = $this->ds_model->add($this->record);
      if(isset($retorno) and $retorno['code']==0){
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
        redirect($this->link_redirect);
      }else{
        $error = $this->db->error();
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING.$error['code'].' - '.$error['message']));
        log_message('error', MSG_FAILURE_SAVING.$error['code'].' - '.$error['message']);
        redirect(base_url(RT_USERS_LICENSES_VW_INS));
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
