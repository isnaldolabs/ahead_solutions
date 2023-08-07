<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuSignout extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->output->cache(0);
    $this->load->model('authorizations/Authorizations_model', 'dsRecord');        
  }

  public function index(){
    self::ct_signout();
    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_ACCESS));
    $this->load->view('patterns/v_header');
    $this->load->view('authorizations/vw_signin', $this->data);
    $this->load->view('patterns/v_footer');
  }

  public function ct_signout(){
    if (fi_get_user()!=NULL){
      self::foCloseSession();
      $this->session->set_flashdata(MSG_ACCESS, array('type'=>TYPE_PRIMARY,
                                                      'text'=>'Logout realizado.'));
    }
  }

/*
| -------------------------------------------------------------------------
| Função usada para controlar o encerramento da sessão
| -------------------------------------------------------------------------
*/
  private function foCloseSession(){
    $this->reglog['user']    = fi_get_user();
    $this->reglog['type']    = 2;
    $this->reglog['message'] = 'foCloseSession';

    $dadosSessao = array(
      SESS_USER                 => NULL,
      SESS_EMAIL                => NULL,
      SESS_NICK_NAME            => NULL,
      SESS_FULL_NAME            => NULL,
      SESS_LEVEL_NAME           => NULL,
      SESS_LOGGED               => FALSE,
      SESS_IS_ADMIN             => NULL,
      SESS_LICENSE              => NULL,
      SESS_LICENSE_NAME         => NULL,
      SESS_LICENSE_SHORT_NAME   => NULL,
      SESS_SEASON               => NULL,
      SESS_SEASON_NAME          => NULL,
      SESS_LINES_PAGE           => NULL,
      SESS_PROTOCOL_VIEW_OPTION => NULL,

    );
    $this->session->unset_userdata($dadosSessao);
    $this->session->sess_destroy();
  }

}