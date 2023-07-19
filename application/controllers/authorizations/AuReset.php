<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuReset extends CI_Controller {

  protected $data = array();

  private function postRecord(){
    $this->data['key']      = trim(xss_clean($this->input->post('edt_key')));
    $this->data['code']     = trim(xss_clean($this->input->post('edt_code')));
    $this->data['password'] = trim(xss_clean($this->input->post('edt_password')));
    $this->data['passconf'] = trim(xss_clean($this->input->post('edt_passconf')));
  }

  private function validForm(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(
            array(rule_password(),
                rule_passconf())
            );
    return $this->form_validation->run();
  }

  public function __construct(){
    parent::__construct();
    $this->output->cache(0);
    $this->load->helper('string'); // necessário para a função random_string
    $this->load->model('authorizations/Authorizations_model', 'dsRecord');
  }

  public function index(){
    self::ct_reset_show();
  }

  public function ct_reset_show($psKey, $piCode){
    $this->data['token_key'] = $psKey;
    $this->data['token_code'] = $piCode;

    if($this->dsRecord->getResetPasswordValid($this->data['token_key'], $this->data['token_code']) == FALSE){
      redirect(base_url(RT_RESET_03));
    }else{
      $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_ACCESS));

      $this->load->view('patterns/v_header');
      $this->load->view('authorizations/vw_reset', $this->data);
      $this->load->view('patterns/v_footer');
    }
  }

  public function ct_reset_link_invalid(){
    $this->load->view('patterns/v_header');
    $this->load->view('authorizations/vw_reset_invalid');
    $this->load->view('patterns/v_footer');
  }

  public function ct_reset_check(){
    self::postRecord();
    if(self::validForm() == FALSE){
      $this->session->set_flashdata('error_password', form_error('edt_password'));
      $this->session->set_flashdata('error_passconf', form_error('edt_passconf'));
      redirect(base_url(RT_RESET).'/'.$this->data['key'].'/'.$this->data['code']);
    }else{
      $regUser = $this->dsRecord->get_email_recover($this->data['key'], $this->data['code']);
      if(count($regUser)==1){
        $lbChanged = $this->dsRecord->upd_password($this->data['key'], $this->data['password']);
        if ($lbChanged==TRUE){
          $this->dsRecord->upd_recover_status($this->data['key'], $this->data['code']);
          foreach($regUser as $row){
            $loMail = array(
              'info_name' => $row->email,
              'info_email' => $row->email
            );
          }
          $loContent = $this->load->view('emails/eml_reset_password_done', $loMail, TRUE);
          if (foEmailResetPasswordDone($loMail, $loContent)){
            redirect(base_url(RT_RESET_02));
          }
        }
      }else{
        $this->session->set_flashdata(MSG_ACCESS, array('type'=>TYPE_DANGER, 'text'=>'Este e-mail não possui permissão de acesso em nossa plataforma.'));
        redirect(base_url(RT_RESET).'/'.$this->data['key'].'/'.$this->data['code']);
      }
    }
  }

  public function ct_reset_done(){
    $this->load->view('patterns/v_header');
    $this->load->view('authorizations/vw_reset_done');
    $this->load->view('patterns/v_footer');
  }

}