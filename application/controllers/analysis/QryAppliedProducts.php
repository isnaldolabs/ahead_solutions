<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QryAppliedProducts extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_QRY_APPLIED_PRODUCTS;

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('analysis/Analysis_model', 'ds_model');

    $this->data['view_title'] = 'Produtos Aplicados';
    $this->data['menu_active'] = MENU_ANALYSIS;
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license(),
       'type_id' => PROTOCOL_TYPE_PRODUCTS,
       'limit' => fi_get_lines_page(),
       'start' => $this->uri->segment(2, 0)
    );

    $this->data['ds_applied_products'] = $this->ds_model->get_applied_products($laParams);
    log_message('info', $this->db->last_query());

    $this->data['ds_applied_products_groups'] = $this->ds_model->get_applied_products_groups($laParams);
    log_message('info', $this->db->last_query());

    $this->data['li_total_rows'] = $this->ds_model->get_applied_products_count_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page'] = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination'] = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('analysis/vw_qry_applied_products');
    $this->load->view('analysis/vw_qry_applied_products_js');
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/v_footer');
  }

}
