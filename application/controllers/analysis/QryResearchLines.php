<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QryResearchLines extends CI_Controller {

  protected $data = array();

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('analysis/Analysis_model', 'ds_model');

    $this->data['view_title'] = 'Linhas de Pesquisa';
    $this->data['menu_active'] = MENU_ANALYSIS;
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license()
    );

    $this->data['ds_research_status']   = $this->ds_model->get_research_status($laParams);
    log_message('info', $this->db->last_query());

    $this->data['ds_research_lines']    = $this->ds_model->get_research_lines($laParams);
    log_message('info', $this->db->last_query());

    $this->data['ds_research_sublines'] = $this->ds_model->get_research_sublines($laParams);
    log_message('info', $this->db->last_query());

    $this->data['ds_research_list']     = $this->ds_model->get_research_list($laParams);
    log_message('info', $this->db->last_query());

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('analysis/vw_qry_research_lines');
    $this->load->view('analysis/vw_qry_research_lines_js');
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/v_footer');
  }

}
