<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_ADMIN_PERMISSIONS;

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('authorizations/Permission_model', 'ds_model');

    $this->data['view_title'] = 'Permissões';
    $this->data['menu_active'] = MENU_ADMIN;
    $this->data['link_update'] = base_url(RT_ADMIN_PERMISSIONS_DB_UPD);
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license(),
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
    
    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('authorizations/permissions/vw_permissions');
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/v_footer');
  }

  public function ct_db_update($psKey, $piLevel){
    if($this->ds_model->upd($psKey, $piLevel)){
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
      redirect($this->link_redirect);
    }else{
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
      log_message('error', MSG_FAILURE_SAVING);
      redirect($this->link_redirect);
    }
  }

}
