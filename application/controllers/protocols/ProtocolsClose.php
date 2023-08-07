<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsClose extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_PROTOCOLS;

  private function prepareFields(){
    $this->data['input_protocol_id']    = fl_protocol_id($this->session->flashdata('set_value_protocol_id'), $this->session->flashdata('set_error_protocol_id'));
    $this->data['input_license_id']     = fl_license_id($this->session->flashdata('set_value_license_id'), $this->session->flashdata('set_error_license_id'));
    $this->data['input_conclusion']     = fl_conclusion($this->session->flashdata('set_value_conclusion'), $this->session->flashdata('set_error_conclusion'));
    $this->data['input_rating']         = fl_rating($this->session->flashdata('set_value_rating'), $this->session->flashdata('set_error_rating'));

    //listas de apoio
    $laParams = array('license_id' => fi_get_license());
    $this->data['input_rating_list'] = $this->ds_model->get_list_ratings($laParams);
  }

  private function getRecord($poRecord){
    $this->data['protocol_id']  = $poRecord[0]->protocol_id;
    $this->data['license_id']   = $poRecord[0]->license_id;
    $this->data['conclusion']   = $poRecord[0]->conclusion;
    $this->data['rating']       = $poRecord[0]->rating;
  }

  private function postRecord(){
    $this->data['protocol_id']  = trim(xss_clean($this->input->post('edt_protocol_id')));
    $this->data['license_id']   = trim(xss_clean($this->input->post('edt_license_id')));
    $this->data['conclusion']   = trim(xss_clean($this->input->post('edt_conclusion')));
    $this->data['rating']       = trim(xss_clean($this->input->post('edt_rating')));
  }

  private function flashRecord(){
    $this->session->set_flashdata('set_value_protocol_id',  $this->data['protocol_id']);
    $this->session->set_flashdata('set_value_license_id',   $this->data['license_id']);
    $this->session->set_flashdata('set_value_conclusion',   $this->data['conclusion']);
    $this->session->set_flashdata('set_value_rating',       $this->data['rating']);
  }

  private function flashErrors(){
    $this->session->set_flashdata('set_error_protocol_id',  form_error('edt_protocol_id'));
    $this->session->set_flashdata('set_error_license_id',   form_error('edt_license_id'));
    $this->session->set_flashdata('set_error_conclusion',   form_error('edt_conclusion'));
    $this->session->set_flashdata('set_error_rating',       form_error('edt_rating'));
  }

  private function checkRecord(){
    $this->form_validation->set_error_delimiters(HTML_ERROR_PREFIX, HTML_ERROR_SUFFIX);
    $this->form_validation->set_rules(array(rule_conclusion()));
    return $this->form_validation->run();
  }

  private function saveRecord(){
    if(isset($this->data['protocol_id'])){
      $this->record['protocol_id'] = $this->data['protocol_id'];
    }
    $this->record['license_id'] = fi_get_license();
    $this->record['conclusion'] = $this->data['conclusion'];
    $this->record['rating']     = $this->data['rating'];
    $this->record['dt_end']     = Date('Y-m-d H:i:s');
    $this->record['status']     = PROTOCOL_STATUS_CLOSED;
  }

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('protocols/Protocols_model', 'ds_model');

    $this->data['protocol_id']      = fi_get_protocol();
    $this->data['protocol_title']   = fs_get_protocol_title();

    $this->data['view_title']   = 'Fechando o Experimento';
    $this->data['view_title_rec'] = 'Fechando o Experimento';
    $this->data['menu_active']  = MENU_PROTOCOLS;
    $this->data['link_update']  = base_url(RT_PROTOCOLS_CLOSE_VW_UPD);
  }

  public function ct_vw_update($key){
    if(($key!=NULL) and ($this->session->flashdata('set_value_protocol_id')!=NULL) ){
      self::prepareFields();
    }else{
      $loRecord = $this->ds_model->get_by_key($key);
      if ($loRecord[0]->protocol_id > 0){
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
    $this->load->view('protocols/protocols/vw_protocols_close_upd', $this->data);
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
        redirect(base_url(RT_PROTOCOLS));
      }else{
        self::saveRecord();
        if($this->ds_model->upd_close($this->record)){
          log_message('info', $this->db->last_query());
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
          redirect($this->link_redirect);
        }else{
          log_message('info', $this->db->last_query());
          $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
          log_message('error', MSG_FAILURE_SAVING);
          redirect(base_url(RT_PROTOCOLS_CLOSE_VW_UPD).'/'.md5($this->data['protocol_id']));
        }
      }
    }
  }

}
