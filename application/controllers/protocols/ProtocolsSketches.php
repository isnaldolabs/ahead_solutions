<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsSketches extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_PROTOCOLS_SKETCHES;

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('protocols/ProtocolsSketches_model', 'ds_model');

    $this->data['view_title']       = 'Croqui';
    $this->data['view_title_rec']   = 'Croqui';
    $this->data['menu_active']      = MENU_PROTOCOLS;
    $this->data['link_delete']      = base_url(RT_PROTOCOLS_SKETCHES_DB_DEL);
    $this->data['link_insert']      = base_url(RT_PROTOCOLS_SKETCHES_DB_INS);
    $this->data['link_new_order']   = base_url(RT_PROTOCOLS_SKETCHES_DB_UPD_ORDER);
  }

  public function index(){
    $laParams = array(
        'license_id' => fi_get_license(),
        'protocol_id' => md5(fi_get_protocol()),
        'type_protocol' => fi_get_protocol_type_id()
    );

    $this->data['ds_treatments_done']   = $this->ds_model->get_treatments_done($laParams);
    log_message('info', $this->db->last_query());

    $this->data['ds_dataset']   = $this->ds_model->get_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['ds_repetitions']   = $this->ds_model->get_treatments($laParams);
    log_message('info', $this->db->last_query());

    $this->data['li_total_rows']    = $this->ds_model->get_count_all($laParams);
    log_message('info', $this->db->last_query());

    $this->data['lo_lines_page']    = fo_lines_page(fi_get_lines_page(), $this->link_redirect);
    $this->data['lo_pagination']    = foPagination($this->link_redirect, $this->data['li_total_rows']);

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = FALSE;

    $this->data['protocol_id']      = fi_get_protocol();
    $this->data['protocol_title']   = fs_get_protocol_title();

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('protocols/protocols_sketches/vw_protocols_sketches', $this->data);
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/js_delete');
    $this->load->view('patterns/v_footer');
  }

  public function ct_db_insert($key){
    $laParams = array(
        'license_id' => fi_get_license(),
        'protocol_id' => $key,
        'type_protocol' => fi_get_protocol_type_id());

    $this->data['ds_params'] = $this->ds_model->get_treatments($laParams);
    log_message('info', $this->db->last_query());
    $liProtocol     = $this->data['ds_params'][0]->protocol_id;
    $liRepetitions  = $this->data['ds_params'][0]->repetitions;

    switch ($laParams['type_protocol']){
        case PROTOCOL_TYPE_VARIETY:
            $this->data['ds_treatments'] = $this->ds_model->get_treatments_varieties($laParams);
            break;
        case PROTOCOL_TYPE_PRODUCTS:
            $this->data['ds_treatments'] = $this->ds_model->get_treatments_products($laParams);
            break;
        case PROTOCOL_TYPE_COMPOSED:
            $this->data['ds_treatments'] = $this->ds_model->get_treatments_prodvar($laParams);
            break;
        case PROTOCOL_TYPE_MISC:
            $this->data['ds_treatments'] = $this->ds_model->get_treatments_miscellaneous($laParams);
            break;
    }
    log_message('info', $this->db->last_query());

    $laTreatments = $this->data['ds_treatments'];

    $li_order = 1;

    for ($i = 1; $i <= $liRepetitions; $i++){
        shuffle($laTreatments);
        foreach ($laTreatments as $item) {
            $loRecord = array(
               'license_id'     => fi_get_license(),
               'protocol_id'    => $liProtocol,
               'num_block'      => $i,
               'treatment_id'   => $item->treatment_id,
               'num_order'      => $li_order
               );
            if($this->ds_model->add($loRecord)){
                $li_order++;
                $lbProcess = TRUE;
            }else{
                $lbProcess = FALSE;
            }
        }
    }

    if($lbProcess==TRUE){
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_SAVING));
        redirect($this->link_redirect);
    }else{
        $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING));
        log_message('error', MSG_FAILURE_SAVING);
        redirect(base_url(RT_PROTOCOLS_SKETCHES_DB_DEL.'/'.$key));
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

    public function ct_db_call_upd_order($pi_main, $pi_order_new, $pi_aux, $pi_order){
        $lo_order['license_id']     = fi_get_license();
        $lo_order['sketch_main']    = $pi_main;
        $lo_order['order_new']      = $pi_order_new;
        $lo_order['sketch_aux']     = $pi_aux;
        $lo_order['order']          = $pi_order;
        if(!$this->ds_model->upd_new_order($lo_order)){
            $error = $this->db->error();
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_SAVING.$error['code'].' - '.$error['message']));
            log_message('error', $this->db->last_query());
            log_message('error', MSG_FAILURE_SAVING.$error['code'].' - '.$error['message']);
        }
        redirect($this->link_redirect);
    }

}
