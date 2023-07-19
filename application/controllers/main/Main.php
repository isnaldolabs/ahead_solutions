<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('dashboard/Dashboard_model', 'ds_dashboard');
  }

  public function index()
  {
    self::ct_main_dashboard();
  }

  public function ct_main_dashboard()
  {
    $this->data['menu_active'] = MENU_DASHBOARD;
    $this->data['search_bar'] = FALSE;

    $laParams = array(
       'license_id' => fi_get_license(),
       'protocol_status' => PROTOCOL_STATUS_OPENED
    );

    $this->data['ds_dashboard_checks_status'] = $this->ds_dashboard->get_dashboard_checks_status($laParams);
    log_message('info', $this->db->last_query());

    $this->data['ds_dashboard_protocols_status'] = $this->ds_dashboard->get_dashboard_protocols_status($laParams);
    log_message('info', $this->db->last_query());

    $this->data['dsCurrencies']       = $this->ds_dashboard->get_currencies($laParams);
    log_message('info', $this->db->last_query());

    $this->data['dsCurrenciesRates']  = $this->ds_dashboard->get_currencies_rates($laParams);
    log_message('info', $this->db->last_query());

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('main/v_main_dashboard');
    $this->load->view('patterns/v_footer');
  }

  public function ct_main_prepare()
  {
    $this->data['menu_active'] = MENU_PREPARE;
    $this->data['search_bar'] = FALSE;
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('main/v_main_prepare');
    $this->load->view('patterns/v_footer');
  }

  public function ct_main_analyze()
  {
    $this->data['menu_active'] = MENU_ANALYSIS;
    $this->data['search_bar'] = FALSE;
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('main/v_main_analysis');
    $this->load->view('patterns/v_footer');
  }

  public function ct_main_admin()
  {
    $this->data['menu_active'] = MENU_ADMIN;
    $this->data['search_bar'] = FALSE;
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('main/v_main_admin');
    $this->load->view('patterns/v_footer');
  }

  public function ct_main_security()
  {
    $this->data['menu_active'] = MENU_SECURITY;
    $this->data['search_bar'] = FALSE;
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('main/v_main_security');
    $this->load->view('patterns/v_footer');
  }

}
