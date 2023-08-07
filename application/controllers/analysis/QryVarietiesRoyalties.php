<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QryVarietiesRoyalties extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_QRY_VARIETIES_ROYALTIES;

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('analysis/Analysis_model', 'ds_model');

    $this->data['view_title'] = 'Roylaties das Variedades';
    $this->data['menu_active'] = MENU_ANALYSIS;
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license(),
       'type_id' => PROTOCOL_TYPE_VARIETY,
       'limit' => fi_get_lines_page(),
       'start' => $this->uri->segment(2, 0)
    );

    $this->data['ds_varieties_royalties'] = $this->ds_model->get_varieties_royalties($laParams);
    log_message('info', $this->db->last_query());

    $this->data['ds_varieties_royalties_licensors'] = $this->ds_model->get_varieties_royalties_licensors($laParams);
    log_message('error', $this->db->last_query());

    $this->data['li_total_rows'] = $this->ds_model->get_varieties_royalties_count_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page'] = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination'] = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('analysis/vw_qry_varieties_royalties');
    $this->load->view('analysis/vw_qry_varieties_royalties_js');
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/v_footer');
  }

}
