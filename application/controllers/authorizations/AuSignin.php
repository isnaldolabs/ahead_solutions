<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuSignin extends CI_Controller {

    protected $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->output->cache(0);
        $this->load->model('authorizations/Authorizations_model', 'dsRecord');
    }

    public function index()
    {
        self::ct_signin_show();
    }

    public function ct_signin_show()
    {
        $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_ACCESS));
        $this->data['flash_email'] = $this->session->flashdata('edt_email');
        $this->load->view('patterns/v_header');
        $this->load->view('authorizations/vw_signin', $this->data);
        $this->load->view('patterns/v_footer');
    }

    public function ct_signin_check()
    {
        if(isset($_POST[BTN_POST_SAVE])){
            self::postRecord();
            self::flashRecord();
            if(self::validForm() == FALSE){
                $this->session->set_flashdata('error_email', form_error('edt_email'));
                $this->session->set_flashdata('error_password', form_error('edt_password'));
                redirect(RT_SIGNIN_01);
            }else{
                $loAccess = $this->dsRecord->getCheckPermission($this->data['email'], $this->data['password']);
               
                log_message('error', $this->db->last_query());
                if(!empty($loAccess)){
                    self::foOpenSession($loAccess);
                    redirect(RT_MAIN_PREPARE);
                }else{
                    $this->session->set_flashdata(MSG_ACCESS, array('type'=>TYPE_DANGER,'text'=>'Credenciais inválidas.<br>Acesso não permitidos.'));
                    redirect(RT_SIGNIN_01);
                }
            }
        }else{
            redirect(RT_SIGNIN_01);
        }
    }

    private function postRecord(){
        $this->data['email']    = trim(xss_clean($this->input->post('edt_email')));
        $this->data['password'] = trim(xss_clean($this->input->post('edt_password')));
    }

    private function flashRecord()
    {
        $this->session->set_flashdata('edt_email', $this->data['email']);
    }

    private function validForm()
    {
        $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
        $this->form_validation->set_rules(
            array(
                rule_email(),
                rule_password()
            )
        );
        return $this->form_validation->run();
    }

    /*
    | -------------------------------------------------------------------------
    | Função usada para controlar a abertura da sessão
    | -------------------------------------------------------------------------
    */
    private function foOpenSession($poRecord){
        $this->reglog['user']    = $poRecord[0]->user_id;
        $this->reglog['type']    = 1;
        $this->reglog['message'] = 'foOpenSession';

        $dadosSessao = array(
            SESS_USER                 => $poRecord[0]->user_id,
            SESS_EMAIL                => $poRecord[0]->email,
            SESS_NICK_NAME            => $poRecord[0]->nick_name,
            SESS_FULL_NAME            => $poRecord[0]->full_name,
            SESS_LEVEL_NAME           => $poRecord[0]->group_name,
            SESS_LOGGED               => TRUE,
            SESS_IS_ADMIN             => $poRecord[0]->is_admin,
            SESS_LICENSE              => $poRecord[0]->license_id,
            SESS_LICENSE_NAME         => $poRecord[0]->license_name,
            SESS_LICENSE_SHORT_NAME   => $poRecord[0]->license_short_name,
            SESS_SEASON               => $poRecord[0]->season_id_last,
            SESS_SEASON_NAME          => $poRecord[0]->season_name,
            SESS_LINES_PAGE           => ($poRecord[0]->lines_page==NULL?5:$poRecord[0]->lines_page),
            SESS_PROTOCOL_VIEW_OPTION => 0,
        );
        $this->session->set_userdata($dadosSessao);
    }

}