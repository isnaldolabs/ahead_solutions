<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_SECURITY_USERS;

  private function prepareFields(){
    $this->data['input_user_id']    = fl_user_id($this->session->flashdata('set_value_user_id'), $this->session->flashdata('set_error_user_id'));
    $this->data['input_email']      = fl_users_email($this->session->flashdata('set_value_email'), $this->session->flashdata('set_error_email'));
    $this->data['input_active']     = fl_active($this->session->flashdata('set_value_active'), $this->session->flashdata('set_error_active'));
    $this->data['input_nick_name']  = fl_users_nick_name($this->session->flashdata('set_value_nick_name'), $this->session->flashdata('set_error_nick_name'));
    $this->data['input_full_name']  = fl_users_full_name($this->session->flashdata('set_value_full_name'), $this->session->flashdata('set_error_full_name'));
  }

  private function getRecord($poRecord){
    $this->data['user_id']    = $poRecord[0]->user_id;
    $this->data['email']      = $poRecord[0]->email;
    $this->data['active']     = $poRecord[0]->active;
    $this->data['nick_name']  = $poRecord[0]->nick_name;
    $this->data['full_name']  = $poRecord[0]->full_name;
  }

  private function postRecord(){
    $this->data['user_id']    = trim(xss_clean($this->input->post('edt_user_id')));
    $this->data['email']      = trim(xss_clean($this->input->post('edt_email')));
    $this->data['active']     = ($this->input->post('edt_active')=='on'?1:0);
    $this->data['nick_name']  = trim(xss_clean($this->input->post('edt_nick_name')));
    $this->data['full_name']  = trim(xss_clean($this->input->post('edt_full_name')));
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_user_id',    $this->data['user_id']);
    $this->session->set_flashdata('set_value_email',      $this->data['email']);
    $this->session->set_flashdata('set_value_active',     $this->data['active']);
    $this->session->set_flashdata('set_value_nick_name',  $this->data['nick_name']);
    $this->session->set_flashdata('set_value_full_name',  $this->data['full_name']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_email',      form_error('edt_email'));
    $this->session->set_flashdata('set_error_active',     form_error('edt_active'));
    $this->session->set_flashdata('set_error_nick_name',  form_error('edt_nick_name'));
    $this->session->set_flashdata('set_error_full_name',  form_error('edt_full_name'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(
            array(
              rule_email(),
              rule_nick_name(),
              rule_full_name()
            )
    );
    return $this->form_validation->run();
  }

  private function saveRecord(){
    if(isset($this->data['user_id'])){
      $this->record['user_id'] = $this->data['user_id'];
    }
    $this->record['email']      = $this->data['email'];
    $this->record['active']     = $this->data['active'];
    $this->record['nick_name']  = $this->data['nick_name'];
    $this->record['full_name']  = $this->data['full_name'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('security/User_model', 'ds_model');
    $this->load->model('prepare/Season_model', 'dsSeason');

    $this->data['view_title'] = 'Usuários';
    $this->data['view_title_rec'] = 'Usuário';
    $this->data['menu_active'] = MENU_ADMIN;
    $this->data['link_delete'] = base_url(RT_SECURITY_USERS_DB_DEL);
    $this->data['link_insert'] = base_url(RT_SECURITY_USERS_VW_INS);
    $this->data['link_update'] = base_url(RT_SECURITY_USERS_VW_UPD);
  }

  public function index(){
    $liStart = $this->uri->segment(2, 0);

    $this->data['dataset'] = $this->ds_model->get_all(fi_get_lines_page(), $liStart);
    $this->data['li_total_rows'] = $this->ds_model->get_count_all();

    $this->data['lo_lines_page']    = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination']    = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('security/users/vw_users');
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/js_delete');
    $this->load->view('patterns/v_footer');
  }

  public function ct_vw_insert(){
    self::prepareFields();
    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = FALSE;
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('security/users/vw_users_ins', $this->data);
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
        redirect(base_url(RT_SECURITY_USERS_VW_INS));
      }else{
        self::saveRecord();
        if($this->ds_model->add($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));

          $loMail = array(
            'info_email' => $this->record['email'],
            'info_name' => $this->record['full_name']
          );
          $loContent = $this->load->view('emails/eml_user_created', $loMail, TRUE);
          if(foEmailUserCreated($loMail, $loContent)){
            redirect($this->link_redirect);
          }else{
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Ocorreu uma falha ao enviar o e-mail.'));
            redirect($this->link_redirect);
          }

          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', 'Houve uma falha ao incluir a safra.');
        }
      }
    }
  }

  public function ct_vw_update($key){
    if(($key!=NULL) and ($this->session->flashdata('set_value_user_id')!=NULL) ){
      self::prepareFields();
    }else{
      $loRecord = $this->ds_model->get_by_key($key);
      log_message('error', $this->db->last_query());
      if ($loRecord[0]->user_id > 0){
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
    $this->load->view('security/users/vw_users_upd', $this->data);
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
        redirect(base_url(RT_SECURITY_USERS_VW_UPD).'/'.md5($this->data['user_id']));
      }else{
        self::saveRecord();
        if($this->ds_model->upd($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_SECURITY_USERS_VW_UPD).'/'.md5($this->data['user_id']));
        }
      }
    }
  }

  public function ct_db_delete($key){
    if($this->ds_model->del($key)){
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_DELETING));
    }else{
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_DELETING));
    }
    redirect($this->link_redirect);
  }

  function ct_db_update_season($piUser, $piSeason){
    if ($this->ds_model->upd_user_season(fi_get_license(), $piUser, $piSeason)) {
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS,
                                                        'text'=>'O registro selecionado foi atualizado com sucesso.'));
        $loSeason = $this->dsSeason->get_by_key(md5($piSeason));
        $dadosSessao = array(
          SESS_SEASON      => $loSeason[0]->season_id,
          SESS_SEASON_NAME => $loSeason[0]->name);
        $this->session->set_userdata($dadosSessao);
        redirect(base_url(RT_MAIN_PREPARE));
    } else {
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER,
                                                     'text'=>'Exceção: houve uma falha ao atualizar o registro selecionado.'));
      log_message('error', MSG_DEL_ERROR);
    }
  }

    function ct_db_update_license($piUser, $piLicense){
        if ($this->ds_model->upd_user_license($piUser, $piLicense)) {
            $loLicense = fo_get_licenses_by_key($piUser, md5($piLicense));
            $dadosSessao = array(
                SESS_LICENSE              => $loLicense[0]->license_id,
                SESS_LICENSE_NAME         => $loLicense[0]->license_name,
                SESS_LICENSE_SHORT_NAME   => $loLicense[0]->license_short_name,
                SESS_SEASON               => $loLicense[0]->season_id_last,
                SESS_SEASON_NAME          => $loLicense[0]->season_name,
                SESS_LINES_PAGE           => ($loLicense[0]->lines_page==NULL?5:$loLicense[0]->lines_page)
                );
            $this->session->set_userdata($dadosSessao);
            $this->session->set_flashdata(MSG_EVENT,
                array('type'=>TYPE_PRIMARY,
                    'text'=>'Ambiente alterado para "'.$loLicense[0]->license_name.'"'));
            redirect(base_url(RT_MAIN_PREPARE));
        } else {
            $this->session->set_flashdata(MSG_EVENT,
                array('type'=>TYPE_DANGER,
                    'text'=>'Exceção: houve uma falha ao trocar de licença.'));
            log_message('error', 'Exceção: houve uma falha ao trocar de licença.');
        }
    }

}
