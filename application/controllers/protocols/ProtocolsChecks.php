<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsChecks extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_PROTOCOLS_CHECKS;

  private function prepareFields(){
    $this->data['input_check_id']       = fl_check_id($this->session->flashdata('set_value_check_id'), $this->session->flashdata('set_error_check_id'));
    $this->data['input_protocol_id']    = fl_protocol_id($this->session->flashdata('set_value_protocol_id'), $this->session->flashdata('set_error_protocol_id'));
    $this->data['input_license_id']     = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_dt_planned']     = fl_dt_planned($this->session->flashdata('set_value_dt_planned'), $this->session->flashdata('set_error_dt_planned'));
    $this->data['input_dt_applied']     = fl_dt_applied($this->session->flashdata('set_value_dt_applied'), $this->session->flashdata('set_error_dt_applied'));
    $this->data['input_description_id'] = fl_description_id($this->session->flashdata('set_value_description_id'), $this->session->flashdata('set_error_description_id'));
    $this->data['input_method_id']      = fl_method_id($this->session->flashdata('set_value_method_id'), $this->session->flashdata('set_error_method_id'));
    $this->data['input_status']         = fl_status($this->session->flashdata('set_value_status'), $this->session->flashdata('set_error_status'));
    $this->data['input_notes']          = fl_notes($this->session->flashdata('set_value_notes'), $this->session->flashdata('set_error_notes'));

    //listas de apoio
    $laParams = array('license_id' => fi_get_license());
    $this->data['input_description_list']   = $this->ds_model->get_list_descriptions($laParams);
    $this->data['input_method_list']        = $this->ds_model->get_list_methods($laParams);
  }

  private function getRecord($poRecord){
    $this->data['check_id']         = $poRecord[0]->check_id;
    $this->data['protocol_id']      = $poRecord[0]->protocol_id;
    $this->data['license_id']       = $poRecord[0]->license_id;
    $this->data['dt_planned']       = $poRecord[0]->dt_planned;
    $this->data['dt_applied']       = $poRecord[0]->dt_applied;
    $this->data['description_id']   = $poRecord[0]->description_id;
    $this->data['method_id']        = $poRecord[0]->method_id;
    $this->data['status']           = $poRecord[0]->status;
    $this->data['notes']            = $poRecord[0]->notes;
  }

  private function postRecord(){
    $this->data['check_id']         = trim(xss_clean($this->input->post('edt_check_id')));
    $this->data['protocol_id']      = trim(xss_clean($this->input->post('edt_protocol_id')));
    $this->data['license_id']       = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['dt_planned']       = $this->input->post('edt_dt_planned');
    $this->data['dt_applied']       = $this->input->post('edt_dt_applied');
    $this->data['description_id']   = trim(xss_clean($this->input->post('edt_description_id')));
    $this->data['method_id']        = trim(xss_clean($this->input->post('edt_method_id')));
    $this->data['status']           = trim(xss_clean($this->input->post('edt_status')));
    $this->data['notes']            = trim(xss_clean($this->input->post('edt_notes')));
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_check_id',         $this->data['check_id']);
    $this->session->set_flashdata('set_value_protocol_id',      $this->data['protocol_id']);
    $this->session->set_flashdata('set_value_license_id',       $this->data['license_id']);
    $this->session->set_flashdata('set_value_dt_planned',       $this->data['dt_planned']);
    $this->session->set_flashdata('set_value_dt_applied',       $this->data['dt_applied']);
    $this->session->set_flashdata('set_value_description_id',   $this->data['description_id']);
    $this->session->set_flashdata('set_value_method_id',        $this->data['method_id']);
    $this->session->set_flashdata('set_value_status',           $this->data['status']);
    $this->session->set_flashdata('set_value_notes',            $this->data['notes']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_protocol_id',      form_error('edt_protocol_id'));
    $this->session->set_flashdata('set_error_license_id',       form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_dt_planned',       form_error('edt_dt_planned'));
    $this->session->set_flashdata('set_error_dt_applied',       form_error('edt_dt_applied'));
    $this->session->set_flashdata('set_error_description_id',   form_error('edt_description_id'));
    $this->session->set_flashdata('set_error_method_id',        form_error('edt_method_id'));
    $this->session->set_flashdata('set_error_status',           form_error('edt_status'));
    $this->session->set_flashdata('set_error_notes',            form_error('edt_notes'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(array(rule_dt_planned()));
    return $this->form_validation->run();
  }

  private function saveRecord(){
    if($this->data['dt_applied'] != NULL){
        $this->data['status'] = CHECK_STATUS_CLOSED;
    }else{
        $this->data['status'] = CHECK_STATUS_OPENED;
    }

    if(isset($this->data['check_id'])){
      $this->record['check_id'] = $this->data['check_id'];
    }
    $this->record['protocol_id']    = fi_get_protocol();
    $this->record['license_id']     = fi_get_license();
    $this->record['dt_planned']     = $this->data['dt_planned'];
    $this->record['dt_applied']     = ($this->data['dt_applied']==NULL?NULL:$this->data['dt_applied']);
    $this->record['description_id'] = $this->data['description_id'];
    $this->record['method_id']      = $this->data['method_id'];
    $this->record['status']         = $this->data['status'];
    $this->record['notes']          = $this->data['notes'];
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('protocols/ProtocolsChecks_model', 'ds_model');

    $this->data['view_title']   = 'Cronograma de Avaliações';
    $this->data['view_title_rec'] = 'Cronograma de Avaliação';
    $this->data['menu_active']  = MENU_PROTOCOLS;
    $this->data['link_delete']  = base_url(RT_PROTOCOLS_CHECKS_DB_DEL);
    $this->data['link_insert']  = base_url(RT_PROTOCOLS_CHECKS_VW_INS);
    $this->data['link_update']  = base_url(RT_PROTOCOLS_CHECKS_VW_UPD);
    $this->data['link_send']    = base_url(RT_PROTOCOLS_CHECKS_SEND_MAIL);
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license(),
       'protocol_id' => fi_get_protocol(),
       'limit' => fi_get_lines_page(),
       'start' => $this->uri->segment(2, 0));

    $this->data['dataset']          = $this->ds_model->get_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['li_total_rows']    = $this->ds_model->get_count_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page']    = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination']    = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->data['protocol_id']      = fi_get_protocol();
    $this->data['protocol_title']   = fs_get_protocol_title();

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('protocols/protocols_checks/vw_protocols_checks');
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
    $this->load->view('protocols/protocols_checks/vw_protocols_checks_ins', $this->data);
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
        redirect(base_url(RT_PROTOCOLS_CHECKS_VW_INS));
      }else{
        self::saveRecord();
        if($this->ds_model->add($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_PROTOCOLS_CHECKS_VW_INS));
        }
      }
    }
  }

  public function ct_vw_update($key){
    if(($key!=NULL) and ($this->session->flashdata('set_value_check_id')!=NULL) ){
      self::prepareFields();
    }else{
      $loRecord = $this->ds_model->get_by_key($key);
      if ($loRecord[0]->check_id > 0){
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
    $this->load->view('protocols/protocols_checks/vw_protocols_checks_upd', $this->data);
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
        redirect(base_url(RT_PROTOCOLS_CHECKS_VW_UPD).'/'.md5($this->data['check_id']));
      }else{
        self::saveRecord();
        if($this->ds_model->upd($this->record)){
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_PROTOCOLS_CHECKS_VW_UPD).'/'.md5($this->data['id']));
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

    public function ct_send_mail($pi_protocol){
        if($pi_protocol == NULL or $pi_protocol == 0){
            redirect(base_url($this->link_redirect));
        }else{
            $laSetParams = array(
                'license_id' => fi_get_license(),
                'protocol_id' => $pi_protocol);
            $protocol_team = $this->ds_model->get_list_protocols_teams($laSetParams);
            log_message('info', $this->db->last_query());

            if(count($protocol_team)>=1){
                foreach($protocol_team as $row){
                    $loMail = array(
                        'info_protocol' => $pi_protocol,
                        'info_name'     => $row->name,
                        'info_email'    => $row->email
                    );
                }

                $loContent = $this->load->view('emails/eml_protocol_checks', $loMail, TRUE);
                if (foEmailChecks($loMail, $loContent)){
                    redirect(base_url(RT_PROTOCOLS_CHECKS));
                }

            }else{
                $this->session->set_flashdata(MSG_ACCESS, array('type'=>TYPE_DANGER, 'text'=>'Não há equipe ou e-mail definidos para o envio do Cronograma de avaliações do experimento.'));
                redirect($this->link_redirect);
            }
        }
    }

}
