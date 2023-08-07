<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsAttachs extends CI_Controller {

  protected $data = array();
  protected $link_redirect = RT_PROTOCOLS_ATTACHS;

  public function __construct(){
    parent::__construct();
    fb_get_logged();
    $this->output->cache(0);
    $this->load->model('protocols/ProtocolsAttachs_model', 'ds_model');

    $this->data['view_title']       = 'Anexos';
    $this->data['view_title_rec']   = 'Anexos';
    $this->data['menu_active']      = MENU_PROTOCOLS;
    $this->data['link_upload']      = base_url(RT_PROTOCOLS_ATTACHS_UPLOAD);
    $this->data['link_download']    = base_url(RT_PROTOCOLS_ATTACHS_DOWNLOAD);
    $this->data['link_delete']      = base_url(RT_PROTOCOLS_ATTACHS_DB_DEL);
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
    $this->load->view('protocols/protocols_attachs/vw_protocols_attachs');
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/js_delete');
    $this->load->view('patterns/v_footer');
  }

    public function ct_upload(){
        $ls_file    = $_FILES[FIELD_UPLOAD]['name'];
        $li_error   = $_FILES[FIELD_UPLOAD]['error'];

        if($li_error==0){
            $lo_setup = self::fo_prepare_upload($ls_file);
            $this->upload->initialize($lo_setup);
            if (!$this->upload->do_upload(FIELD_UPLOAD)){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            }
            $lo_file = array('image_file' => $this->upload->data());
            $la_record = array(
                'protocol_id'   => fi_get_protocol(),
                'file_name'     => $lo_file['image_file']['file_name'],
                'path_name'     => $this->data['path_name'],
            );
            $this->ds_model->add($la_record);
            log_message('info', $this->db->last_query());
        }else{
            switch ($li_error){
                case 1: $ls_error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini'; 
                        break;
                case 2: $ls_error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form'; 
                        break;
                case 3: $ls_error = 'The uploaded file was only partially uploaded'; 
                        break;
                case 4: $ls_error = 'No file was uploaded'; 
                        break;
                case 6: $ls_error = 'Missing a temporary folder'; 
                        break;
                case 7: $ls_error = 'Failed to write file to disk.'; 
                        break;
                case 8: $ls_error = 'A PHP extension stopped the file upload.'; 
                        break;
            }
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$ls_error));
        }
        redirect($this->link_redirect);
    }

    public function fo_prepare_upload($ps_file){
        $this->data['path_name'] = PATH_ATTACHS.'/lic_'.fi_get_license().'/';
        if (!is_dir($this->data['path_name'])){
            mkdir($this->data['path_name'], 0777, $recursive = TRUE);
        }
        $lo_config_upload['file_name']      = $ps_file;
        $lo_config_upload['upload_path']    = $this->data['path_name'];
        $lo_config_upload['allowed_types']  = 'pdf|xls|xlsx|doc|docx|png|jpg';
        $lo_config_upload['encrypt_name']   = TRUE;
        $lo_config_upload['remove_spaces']  = TRUE;
        $lo_config_upload['encrypt_name']   = FALSE;
        $lo_config_upload['max_size']       = 2048;
        $lo_config_upload['overwrite']      = TRUE;
        return $lo_config_upload;
    }

  public function ct_db_delete($key){
    $this->data['ds_file'] = $this->ds_model->get_by_key($key);

    $ls_name = $this->data['ds_file'][0]->file_name;
    $ls_path = $this->data['ds_file'][0]->path_name;
    $ls_file = $ls_path.$ls_name;

    if($this->ds_model->delete($key)){
      if (is_file($ls_file)){
        unlink($ls_file);
      }
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_SUCCESS, 'text'=>MSG_SUCCESS_DELETING));
    }else{
      $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_DELETING));
    }
    redirect($this->link_redirect);
  }

    public function ct_download($ps_key){
        if($ps_key != NULL){
            $lo_record = $this->ds_model->get_by_key($ps_key);
            log_message('info', $this->db->last_query());
            if (count($lo_record) > 0){
                force_download(($lo_record[0]->path_name.$lo_record[0]->file_name), NULL);
            }
        }else{
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>MSG_FAILURE_DOWNLOADING));
        }
    }

}
