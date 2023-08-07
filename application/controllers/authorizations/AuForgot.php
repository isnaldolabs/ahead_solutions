<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuForgot extends CI_Controller {

  protected $data = array();

  public function __construct(){
    parent::__construct();
    $this->output->cache(0);
    $this->load->helper('string'); // necessário para a função random_string
    $this->load->model('authorizations/Authorizations_model', 'dsRecord');
  }

  public function index(){
    self::ct_forgot_show();
  }

  public function ct_forgot_show(){
    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['flash_email'] = $this->session->flashdata('edt_email');
    $this->load->view('patterns/v_header');
    $this->load->view('authorizations/vw_forgot');
    $this->load->view('patterns/v_footer');
  }

  public function ct_forgot_send(){
    $this->data['email'] = trim(xss_clean($this->input->post('edt_email')));
    $this->session->set_flashdata('edt_email', $this->data['email']);
    if(self::validForm() == FALSE){
      $this->session->set_flashdata('error_email', form_error('edt_email'));
      redirect(RT_FORGOT_01);
    }else{
      $loUser = $this->dsRecord->getUserByEmail($this->data['email']);
      if(count($loUser)==1){
        foreach ($loUser as $row){
          $this->record['user_id'] = $row->user_id;
          $this->record['password_before'] = $row->password;
          $lsNickName = $row->nick_name;
        }
        $this->record['email'] = $this->data['email'];
        $this->record['recover_key'] = md5($row->email);
        $this->record['recover_code'] = random_string('numeric',10);

        $this->dsRecord->add_recover($this->record);

        $loMail = array(
          'info_email' => $this->data['email'],
          'info_name' => $lsNickName,
          'info_key' => $this->record['recover_key'],
          'info_code' => $this->record['recover_code']
        );
        $loContent = $this->load->view('emails/eml_forgot_sent', $loMail, TRUE);
        if(foEmailForgot($loMail, $loContent)){
          redirect(base_url(RT_FORGOT_03));
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Ocorreu uma falha ao enviar o e-mail.'));
          redirect(RT_FORGOT_01);
        }
      }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_WARNING, 'text'=>'E-mail não existe ou está inativo.'));
        redirect(RT_FORGOT_01);
      }
    }
  }

  private function validForm(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(
            array(rule_email())
            );
    return $this->form_validation->run();
  }

  public function ct_forgot_sent(){
    $this->load->view('patterns/v_header');
    $this->load->view('authorizations/vw_forgot_sent');
    $this->load->view('patterns/v_footer');
  }

}