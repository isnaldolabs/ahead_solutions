<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QryProtocolsAlerts extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_QRY_PROTOCOLS_ALERTS;

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('analysis/Analysis_model', 'ds_model');

    $this->data['view_title'] = 'Alertas de Protocolos e Avaliações';
    $this->data['menu_active'] = MENU_ANALYSIS;
    $this->data['link_update'] = base_url(RT_QRY_PROTOCOLS_ALERTS_DB_UPD_AWARE);
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license(),
       'limit' => fi_get_lines_page(),
       'start' => $this->uri->segment(2, 0)
    );

    $this->data['ds_protocols_alerts'] = $this->ds_model->get_protocols_alerts($laParams);
    log_message('info', $this->db->last_query());

    $this->data['li_total_rows'] = $this->ds_model->get_protocols_alerts_count_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page'] = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination'] = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('analysis/vw_qry_protocols_alerts', $this->data);
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/v_footer');
  }

  public function ct_db_update_aware($key){
    $la_params = array(
        'alert_id' => $key,
        'aware_by' => fi_get_user(),
        'aware_at' => Date('Y-m-d H:i:s')
    );
    if($this->ds_model->upd_aware($la_params)){
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
    }else{
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
    }
    redirect($this->link_redirect);
  }

}
