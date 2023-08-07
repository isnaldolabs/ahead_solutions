<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupsConfig extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_ADMIN_GROUPS_CONFIG;

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('authorizations/GroupConfig_model', 'ds_model');

    $this->data['view_title'] = 'Grupo dos Usuários';
    $this->data['view_title_rec'] = '';
    $this->data['menu_active'] = MENU_ADMIN;
    $this->data['link_delete'] = '';
    $this->data['link_insert'] = '';
    $this->data['link_update'] = base_url(RT_ADMIN_GROUPS_CONFIG_DB_UPD);
  }

  public function index(){
    $laParams = array(
       'license_id' => fi_get_license(),
       'limit' => fi_get_lines_page(),
       'start' => $this->uri->segment(2, 0));

    $this->data['dataset'] = $this->ds_model->get_all($laParams);
    log_message('error', $this->db->last_query());

    $this->data['li_total_rows'] = $this->ds_model->get_count_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page']    = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination']    = foPagination($this->link_redirect, $this->data['li_total_rows']);

    //listas de apoio
    $this->data['input_groups_list']  = $this->ds_model->get_list_groups($laParams);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('authorizations/groups_config/vw_groups_config');
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/v_footer');
  }

  public function ct_db_update($key, $piGroup){
    if($this->ds_model->upd($key, $piGroup)){
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS,
                                                     'text'=>'O registro selecionado foi alterado com sucesso.'));
    }else{
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER,
                                                     'text'=>'Exceção: houve uma falha ao alterar o registro selecionado.'));
    }
    redirect($this->link_redirect);
  }

}
