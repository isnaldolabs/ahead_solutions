<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IntegrationsSpl extends CI_Controller {

    protected $data = array();
    protected $link_redirect = RT_INTEGRATIONS_SPL;

    // ----------------------------------------- Pos 0 ---- Pos 1 ------ Pos 2 ---- Pos 3 - Pos 4 --- Pos 5 ------- Pos 6 ---- Pos 7 ------- Pos 8 -------------- Pos 9 -- Pos 10 ---- Pos 11 --- Pos 12 --- Pos 13
    protected $la_header_analyze        = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Brix (%)', 'LAI (%)', 'PBU (g)', 'Peso');

    // ----------------------------------------- Pos 0 ---- Pos 1 ------ Pos 2 ---- Pos 3 - Pos 4 --- Pos 5 ------- Pos 6 ---- Pos 7 ------- Pos 8 -------------- Pos 9 -- Pos 10
    protected $la_header_weight         = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Peso');
    protected $la_header_stems          = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Colmos');
    protected $la_header_height         = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Altura');
    protected $la_header_diameter       = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Diametro');
    protected $la_header_internodes     = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Entrenos');
    protected $la_header_gaps           = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Falhas');
    protected $la_header_flowering      = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Flores');
    protected $la_header_pith           = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Isoporos');
    protected $la_header_infestation    = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Infestacao');
    protected $la_header_holes          = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Furos');
    protected $la_header_damages        = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Danos');

    // ----------------------------------------- Pos 0 ---- Pos 1 ------ Pos 2 ---- Pos 3 - Pos 4 --- Pos 5 ------- Pos 6 ---- Pos 7 ------- Pos 8 -------------- Pos 9 -- Pos 10 -------- Pos 11 -------- Pos 12 -------- Pos 13 -------- Pos 14
    protected $la_header_diseases       = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Cod_Doenca_1', 'Cod_Doenca_2', 'Cod_Doenca_3', 'Cod_Doenca_4', 'Cod_Doenca_5');
    protected $la_header_pests          = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Cod_Praga_1',  'Cod_Praga_2',  'Cod_Praga_3',  'Cod_Praga_4',  'Cod_Praga_5');

    // ----------------------------------------- Pos 0 ---- Pos 1 ------ Pos 2 ---- Pos 3 - Pos 4 --- Pos 5 ------- Pos 6 ---- Pos 7 ------- Pos 8 -------------- Pos 9 -- Pos 10 ----- Pos 11
    protected $la_header_tillers        = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Data (dd/mm/yyyy)', 'Ponto', 'Perfilhos', 'Falhas');

    // ----------------------------------------- Pos 0 ---- Pos 1 ------ Pos 2 ---- Pos 3 - Pos 4 --- Pos 5 ------- Pos 6 ---- Pos 7 ------- Pos 8 ----- Pos 9 -- Pos 10 -- Pos 11 ------------- Pos 12 - Pos 13
    protected $la_header_compounds      = array('Licenca', 'Protocolo', 'Fazenda', 'Nome', 'Talhao', 'Tratamento', 'Gleba',   'Croqui',     'Composto', 'Nome',  'Sigla',  'Data (dd/mm/yyyy)', 'Ponto', 'Valor');

    //-- -----------------------------------------------------------------------
    public function __construct(){
        parent::__construct();
        fb_get_logged();
        $this->output->cache(0);
        $this->load->model('integrations/IntegrationsSpl_model', 'ds_model');

        $this->data['view_title'] = 'Integrações - exportação e importação';
        $this->data['menu_active'] = MENU_INTEGRATIONS;
    }

    //-- -----------------------------------------------------------------------
    public function index(){
        $laParams = array(
            'license_id' => fi_get_license(),
            'protocol_id' => fi_get_protocol(),
            'shared_integration' => fi_get_shared_integration(),
            'is_sample' => ACTIVE_YES);

        $this->data['ds_dataset']       = $this->ds_model->get_all($laParams);
        log_message('info', $this->db->last_query());

        $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
        $this->data['search_bar'] = TRUE;

        $this->data['protocol_id']      = fi_get_protocol();
        $this->data['protocol_title']   = fs_get_protocol_title();
        $this->data['original_route']   = self::fs_original_route(fi_get_shared_integration());
        $this->data['form_action']      = self::fs_form_action(fi_get_shared_integration());

        $this->load->view('patterns/v_header');
        $this->load->view('patterns/v_navigation', $this->data);
        $this->load->view('integrations/vw_integrations_spl');
        $this->load->view('patterns/js_filter');
        $this->load->view('patterns/v_footer');
    }

    //-- Call: Integrations ----------------------------------------------------
    public function ct_call_integrations_spl($po_source){
        $this->session->set_userdata(SESS_SHARED_INTEGRATION, $po_source);
        if ($po_source==NULL){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_WARNING, 'text'=>'Formulário de origem não foi identificado.'));
        }
        redirect(RT_INTEGRATIONS_SPL);
    }

    public function setParamsDB(){
        $this->la_params = array(
            'license_id' => fi_get_license(),
            'protocol_id' => fi_get_protocol()
        );
    }

    public function setHeader($pa_header){
        $this->la_header = $pa_header;
    }

    public function setContent($array_content){
        $this->array_content = $array_content;
    }

    public function generateAndDownloadCSV($ps_file){
        $header_file = $this->getHeader();
        $content_file = $this->getContent();

        header('Cache-Control: max-age=0');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="'.$ps_file.'";');
        $output = fopen('php://output', 'w');
        if (!empty($header_file)){
            fputcsv($output, $header_file, DELIMITER_CHAR);
        }
        foreach ($content_file as $value) {
            fputcsv($output, $value, DELIMITER_CHAR);
        }
    }

    private function getHeader(){
        return $this->la_header;
    }

    private function getContent(){
        $array_retorno = array();
        if (count($this->array_content) > 0) {
            foreach ($this->array_content as $value) {
                $array_temp = array();
                foreach ($value as $col){
                    $array_temp[] = $col;
                }
                $array_retorno[] = $array_temp;
                unset($array_temp);
            }
        }
        return $array_retorno;
    }

    public function fs_original_route($pi_integration){
        $ls_original_route = '';
        switch ($pi_integration){
            case SHD_SAMPLES_ANALYZE:
                $ls_original_route = RT_SAMPLES_ANALYZE; break;
            case SHD_SAMPLES_WEIGHT:
                $ls_original_route = RT_SAMPLES_WEIGHT; break;
            case SHD_SAMPLES_STEMS:
                $ls_original_route = RT_SAMPLES_STEMS; break;
            case SHD_SAMPLES_HEIGHT:
                $ls_original_route = RT_SAMPLES_HEIGHTS; break;
            case SHD_SAMPLES_DIAMETER:
                $ls_original_route = RT_SAMPLES_DIAMETERS; break;
            case SHD_SAMPLES_INTERNODES:
                $ls_original_route = RT_SAMPLES_INTERNODES; break;
            case SHD_SAMPLES_FLOWERING:
                $ls_original_route = RT_SAMPLES_FLOWERING; break;
            case SHD_SAMPLES_PITH:
                $ls_original_route = RT_SAMPLES_PITH; break;
            case SHD_SAMPLES_TILLERS:
                $ls_original_route = RT_SAMPLES_TILLERS; break;
            case SHD_SAMPLES_INFESTATION:
                $ls_original_route = RT_SAMPLES_INFESTATION; break;
            case SHD_SAMPLES_HOLES:
                $ls_original_route = RT_SAMPLES_HOLES; break;
            case SHD_SAMPLES_DAMAGES:
                $ls_original_route = RT_SAMPLES_DAMAGES; break;
            case SHD_SAMPLES_COMPOUNDS:
                $ls_original_route = RT_SAMPLES_COMPOUNDS; break;
            case SHD_SAMPLES_DISEASES:
                $ls_original_route = RT_SAMPLES_DISEASES; break;
            case SHD_SAMPLES_PESTS:
                $ls_original_route = RT_SAMPLES_PESTS; break;
            case SHD_SAMPLES_GAPS:
                $ls_original_route = RT_SAMPLES_GAPS; break;
        }
        return $ls_original_route;
    }

    public function fs_form_action($pi_integration){
        $ls_form_action = '';
        switch ($pi_integration){
            case SHD_SAMPLES_ANALYZE:
                $ls_form_action = RT_INTEGRATIONS_SPL_ANALYZE_IMPORT; break;
            case SHD_SAMPLES_WEIGHT:
                $ls_form_action = RT_INTEGRATIONS_SPL_WEIGHT_IMPORT; break;
            case SHD_SAMPLES_STEMS:
                $ls_form_action = RT_INTEGRATIONS_SPL_STEMS_IMPORT; break;
            case SHD_SAMPLES_HEIGHT:
                $ls_form_action = RT_INTEGRATIONS_SPL_HEIGHT_IMPORT; break;
            case SHD_SAMPLES_DIAMETER:
                $ls_form_action = RT_INTEGRATIONS_SPL_DIAMETER_IMPORT; break;
            case SHD_SAMPLES_INTERNODES:
                $ls_form_action = RT_INTEGRATIONS_SPL_INTERNODES_IMPORT; break;
            case SHD_SAMPLES_FLOWERING:
                $ls_form_action = RT_INTEGRATIONS_SPL_FLOWERING_IMPORT; break;
            case SHD_SAMPLES_PITH:
                $ls_form_action = RT_INTEGRATIONS_SPL_PITH_IMPORT; break;
            case SHD_SAMPLES_TILLERS:
                $ls_form_action = RT_INTEGRATIONS_SPL_TILLERS_IMPORT; break;
            case SHD_SAMPLES_INFESTATION:
                $ls_form_action = RT_INTEGRATIONS_SPL_INFESTATION_IMPORT; break;
            case SHD_SAMPLES_HOLES:
                $ls_form_action = RT_INTEGRATIONS_SPL_HOLES_IMPORT; break;
            case SHD_SAMPLES_DAMAGES:
                $ls_form_action = RT_INTEGRATIONS_SPL_DAMAGES_IMPORT; break;
            case SHD_SAMPLES_COMPOUNDS:
                $ls_form_action = RT_INTEGRATIONS_SPL_COMPOUNDS_IMPORT; break;
            case SHD_SAMPLES_DISEASES:
                $ls_form_action = RT_INTEGRATIONS_SPL_DISEASES_IMPORT; break;
            case SHD_SAMPLES_PESTS:
                $ls_form_action = RT_INTEGRATIONS_SPL_PESTS_IMPORT; break;
            case SHD_SAMPLES_GAPS:
                $ls_form_action = RT_INTEGRATIONS_SPL_GAPS_IMPORT; break;
        }
        return $ls_form_action;
    }

    public function fo_prepare_upload($pi_license, $pi_protocol, $po_file){
        $ls_path = INTEGRATION_PATH.'_lic'.$pi_license.'_pro'.$pi_protocol;
        $ls_file = 'lic'.$pi_license.'_pro'.$pi_protocol.'_'.$po_file;
        if (!is_dir($ls_path)){
            mkdir($ls_path, 0777, $recursive = TRUE);
        }
        $lo_config_upload['file_name']      = $ls_file;
        $lo_config_upload['upload_path']    = $ls_path;                             // determinamos o path para gravar o arquivo
        $lo_config_upload['allowed_types']  = 'csv';                                // definimos através da extensão os tipos de arquivos suportados
        $lo_config_upload['encrypt_name']   = TRUE;                                 // definimos que o novo nome do arquivo
        $lo_config_upload['encrypt_name']   = FALSE;                                // será alterado para um nome criptografado default TRUE
        $lo_config_upload['max_size']       = (5 * 1024 * 1024);                    // tamanho máximo do arquivo: 5mb
        $lo_config_upload['overwrite']      = TRUE;                                 // permissão para substituir o arquivo existente
        return $lo_config_upload;
    }

    public function setLogSpl($po_integration, $pi_records){
        $la_data_log = array(
            'code'          => $po_integration,
            'license_id'    => fi_get_license(),
            'user_id'       => fi_get_user(),
            'protocol_id'   => fi_get_protocol(),
            'num_records'   => $pi_records
        );
        $this->ds_model->add_log_spl($la_data_log);
        log_message('info', $this->db->last_query());

        $la_data_alert = array(
            'license_id'    => fi_get_license(),
            'protocol_id'   => fi_get_protocol(),
            'name'          => 'Inclusão de '.$pi_records.' de '.fs_name_integration($po_integration)
        );
        $this->ds_model->add_log_spl_alert($la_data_alert);
        log_message('info', $this->db->last_query());
    }

    public function set_template_row($pa_row){
        $la_row['license_id']       = $pa_row->license_id;
        $la_row['protocol_id']      = $pa_row->protocol_id;
        $la_row['farm_code']        = utf8_decode($pa_row->farm_code);
        $la_row['farm_name']        = utf8_decode($pa_row->farm_name);
        $la_row['plot_code']        = utf8_decode($pa_row->plot_code);
        $la_row['treatment_name']   = utf8_decode($pa_row->treatment_name);
        $la_row['num_block']        = 'B'.$pa_row->num_block;
        $la_row['sketch_id']        = $pa_row->sketch_id;
        return $la_row;
    }

    public function set_template_row_compounds($pa_row){
        $la_row['license_id']           = $pa_row->license_id;
        $la_row['protocol_id']          = $pa_row->protocol_id;
        $la_row['farm_code']            = utf8_decode($pa_row->farm_code);
        $la_row['farm_name']            = utf8_decode($pa_row->farm_name);
        $la_row['plot_code']            = utf8_decode($pa_row->plot_code);
        $la_row['treatment_name']       = utf8_decode($pa_row->treatment_name);
        $la_row['num_block']            = 'B'.$pa_row->num_block;
        $la_row['sketch_id']            = $pa_row->sketch_id;
        $la_row['compound_id']          = $pa_row->compound_id;
        $la_row['compound_name']        = utf8_decode($pa_row->compound_name);
        $la_row['compound_short_name']  = utf8_decode($pa_row->compound_short_name);
        return $la_row;
    }

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Analyze --------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_analyze_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_analyze);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_ANALYZE);
    }

    public function ct_integrations_samples_analyze_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_ANALYZE);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_ANALYZE);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_ANALYZE){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto'));
                redirect(RT_SAMPLES_ANALYZE);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_analyze($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesAnalyze($lo_data);
                        $this->ds_model->add_int_samples_analyze($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_ANALYZE, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesAnalyze($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'num_brix'      => ($poRecordCSV[POS_NUM_BRIX]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_BRIX]))),
            'num_lai'       => ($poRecordCSV[POS_NUM_LAI]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_LAI]))),
            'num_pbu'       => ($poRecordCSV[POS_NUM_PBU]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_PBU]))),
            'num_weight'    => ($poRecordCSV[POS_NUM_WEIGHT_ANAL]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_WEIGHT_ANAL])))
        );
        return $lo_record;
    }
    //-- End: Samples Analyze ----------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Weight ---------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_weight_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_weight);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_WEIGHT);
    }

    public function ct_integrations_samples_weight_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_WEIGHT);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_WEIGHT);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_WEIGHT){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_WEIGHT);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_weight($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesWeight($lo_data);
                        $this->ds_model->add_int_samples_weight($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_WEIGHT, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesWeight($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'num_weight'    => ($poRecordCSV[POS_NUM_WEIGHT]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_WEIGHT])))
        );
        return $lo_record;
    }
    //-- End: Samples Weight -----------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Stems ----------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_stems_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_stems);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_STEMS);
    }

    public function ct_integrations_samples_stems_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_STEMS);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_STEMS);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_STEMS){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_STEMS);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_stems($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesStems($lo_data);
                        $this->ds_model->add_int_samples_stems($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_STEMS, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesStems($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'num_stems'     => ($poRecordCSV[POS_NUM_STEMS]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_STEMS])))
        );
        return $lo_record;
    }
    //-- End: Samples Stems ------------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Height ---------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_height_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_height);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_HEIGHT);
    }

    public function ct_integrations_samples_height_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_HEIGHT);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_HEIGHTS);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_HEIGHT){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_HEIGHTS);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_heights($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesHeight($lo_data);
                        $this->ds_model->add_int_samples_height($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_HEIGHT, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesHeight($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'num_height'    => ($poRecordCSV[POS_NUM_HEIGHT]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_HEIGHT])))
        );
        return $lo_record;
    }
    //-- End: Samples Height -----------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Diameter -------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_diameter_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_diameter);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_DIAMETER);
    }

    public function ct_integrations_samples_diameter_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_DIAMETER);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_DIAMETERS);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_DIAMETER){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_DIAMETERS);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_diameters($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesDiameter($lo_data);
                        $this->ds_model->add_int_samples_diameters($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_DIAMETER, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesDiameter($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'num_diameter'  => ($poRecordCSV[POS_NUM_DIAMETER]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_DIAMETER])))
        );
        return $lo_record;
    }
    //-- End: Samples Diameter ---------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Internodes -----------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_internodes_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_internodes);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_INTERNODES);
    }

    public function ct_integrations_samples_internodes_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_INTERNODES);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_INTERNODES);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_INTERNODES){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_INTERNODES);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_internodes($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesInternodes($lo_data);
                        $this->ds_model->add_int_samples_internodes($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_INTERNODES, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesInternodes($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'num_node'      => ($poRecordCSV[POS_NUM_NODE]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_NODE])))
        );
        return $lo_record;
    }
    //-- End: Samples Internodes -------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Gaps -----------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_gaps_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_gaps);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_GAPS);
    }

    public function ct_integrations_samples_gaps_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_GAPS);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_GAPS);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_GAPS){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_GAPS);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_gaps($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesGaps($lo_data);
                        $this->ds_model->add_int_samples_gaps($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_GAPS, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesGaps($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'num_gap'       => ($poRecordCSV[POS_NUM_GAPS]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_GAPS])))
        );
        return $lo_record;
    }
    //-- End: Samples Gaps -------------------------------------------------------------------------------------------------------------------------------
    
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Flowerings -----------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_flowering_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_flowering);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_FLOWERING);
    }

    public function ct_integrations_samples_flowering_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_FLOWERING);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_FLOWERING);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_FLOWERING){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_FLOWERING);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_flowering($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesFlowering($lo_data);
                        $this->ds_model->add_int_samples_flowering($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_FLOWERING, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesFlowering($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'num_flower'    => ($poRecordCSV[POS_NUM_FLOWER]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_FLOWER])))
        );
        return $lo_record;
    }
    //-- End: Samples Flowering --------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Pith -----------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_pith_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_pith);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_PITH);
    }

    public function ct_integrations_samples_pith_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_PITH);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_PITH);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_PITH){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_PITH);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_pith($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesPith($lo_data);
                        $this->ds_model->add_int_samples_pith($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_PITH, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesPith($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'num_pith'      => ($poRecordCSV[POS_NUM_PITH]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_PITH])))
        );
        return $lo_record;
    }
    //-- End: Samples Pith -------------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Tillers --------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_tillers_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_tillers);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_TILLERS);
    }

    public function ct_integrations_samples_tillers_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_TILLERS);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_TILLERS);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_TILLERS){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_TILLERS);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_tillers($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesTillers($lo_data);
                        $this->ds_model->add_int_samples_tillers($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_TILLERS, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesTillers($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'num_tiller'    => ($poRecordCSV[POS_NUM_TILLER]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_TILLER]))),
            'num_gap'       => ($poRecordCSV[POS_NUM_GAP]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_GAP])))
        );
        return $lo_record;
    }
    //-- End: Samples Tillers ----------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Infestation ----------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_infestation_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_infestation);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_INFESTATION);
    }

    public function ct_integrations_samples_infestation_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_INFESTATION);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_INFESTATION);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_INFESTATION){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_INFESTATION);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_infestation($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesInfestation($lo_data);
                        $this->ds_model->add_int_samples_infestation($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_INFESTATION, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesInfestation($poRecordCSV){
        $lo_record = array(
            'license_id'        => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'       => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'         => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'         => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'           => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'num_infestation'   => ($poRecordCSV[POS_NUM_INFESTATION]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_INFESTATION])))
        );
        return $lo_record;
    }
    //-- End: Samples Infestation ------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Holes ----------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_holes_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_holes);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_HOLES);
    }

    public function ct_integrations_samples_holes_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_HOLES);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_HOLES);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_HOLES){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_HOLES);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_holes($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesHoles($lo_data);
                        $this->ds_model->add_int_samples_holes($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_HOLES, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesHoles($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'num_hole'      => ($poRecordCSV[POS_NUM_HOLES]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_HOLES])))
        );
        return $lo_record;
    }
    //-- End: Samples Holes ------------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Damages --------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_damages_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_damages);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_DAMAGES);
    }

    public function ct_integrations_samples_damages_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_DAMAGES);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_DAMAGES);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_DAMAGES){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_DAMAGES);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_damages($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesDamages($lo_data);
                        $this->ds_model->add_int_samples_damages($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_DAMAGES, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesDamages($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'num_damage'    => ($poRecordCSV[POS_NUM_DAMAGES]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_DAMAGES])))
        );
        return $lo_record;
    }
    //-- End: Samples Damages ----------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Compounds ------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_compounds_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template_spl_compounds($this->la_params);
        log_message('error', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row_compounds($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_compounds);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_COMPOUNDS);
    }

    public function ct_integrations_samples_compounds_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_COMPOUNDS);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_COMPOUNDS);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_COMPOUNDS){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_COMPOUNDS);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_compounds($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesCompounds($lo_data);
                        $this->ds_model->add_int_samples_compounds($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_COMPOUNDS, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesCompounds($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'compound_id'   => $poRecordCSV[POS_COMPOUND_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE_CP]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE_CP])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID_CP]==''? 0: $poRecordCSV[POS_SPOT_ID_CP]),
            'num_compound'  => ($poRecordCSV[POS_NUM_COMPOUNDS]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[POS_NUM_COMPOUNDS])))
        );
        return $lo_record;
    }
    //-- End: Samples Compounds --------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Diseases -------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_diseases_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_diseases);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_DISEASES);
    }

    public function ct_integrations_samples_diseases_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_DISEASES);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_DISEASES);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_DISEASES){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_DISEASES);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_diseases($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesDiseases($lo_data);
                        // Disease 1 -------------------------------------------
                        if($lo_record['disease1']!=NULL or $lo_record['disease1']!=''){
                            $lo_dataset = $this->getColumnsSamplesDiseasesDataSet($lo_record, 1);
                            $this->ds_model->add_int_samples_diseases($lo_dataset);
                            log_message('info', $this->db->last_query());
                            $li_records++;
                        }
                        // Disease 2 -------------------------------------------
                        if($lo_record['disease2']!=NULL or $lo_record['disease2']!=''){
                            $lo_dataset = $this->getColumnsSamplesDiseasesDataSet($lo_record, 2);
                            $this->ds_model->add_int_samples_diseases($lo_dataset);
                            log_message('info', $this->db->last_query());
                            $li_records++;
                        }
                        // Disease 3 -------------------------------------------
                        if($lo_record['disease3']!=NULL or $lo_record['disease3']!=''){
                            $lo_dataset = $this->getColumnsSamplesDiseasesDataSet($lo_record, 3);
                            $this->ds_model->add_int_samples_diseases($lo_dataset);
                            log_message('info', $this->db->last_query());
                            $li_records++;
                        }
                        // Disease 4 -------------------------------------------
                        if($lo_record['disease4']!=NULL or $lo_record['disease4']!=''){
                            $lo_dataset = $this->getColumnsSamplesDiseasesDataSet($lo_record, 4);
                            $this->ds_model->add_int_samples_diseases($lo_dataset);
                            log_message('info', $this->db->last_query());
                            $li_records++;
                        }
                        // Disease 5 -------------------------------------------
                        if($lo_record['disease5']!=NULL or $lo_record['disease5']!=''){
                            $lo_dataset = $this->getColumnsSamplesDiseasesDataSet($lo_record, 5);
                            $this->ds_model->add_int_samples_diseases($lo_dataset);
                            log_message('info', $this->db->last_query());
                            $li_records++;
                        }
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_DISEASES, $li_records);
                fclose($lo_farq);
                $this->ds_model->sp_upd_samples_diseases($this->la_params);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesDiseases($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'disease1'      => ($poRecordCSV[10]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[10]))),
            'disease2'      => ($poRecordCSV[11]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[11]))),
            'disease3'      => ($poRecordCSV[12]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[12]))),
            'disease4'      => ($poRecordCSV[13]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[13]))),
            'disease5'      => ($poRecordCSV[14]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[14])))
        );
        return $lo_record;
    }

    public function getColumnsSamplesDiseasesDataSet($poRecord, $poColumn){
        $lo_record = array(
            'license_id'    => $poRecord['license_id'],
            'protocol_id'   => $poRecord['protocol_id'],
            'sketch_id'     => $poRecord['sketch_id'],
            'dt_sample'     => $poRecord['dt_sample'],
            'spot_id'       => $poRecord['spot_id'],
            'disease_id'    => $poRecord['disease'.$poColumn]
        );
        return $lo_record;
    }

    //-- End: Samples Diseases ---------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Samples Pests ----------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_samples_pests_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_template_row($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_pests);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_SAMPLES_PESTS);
    }

    public function ct_integrations_samples_pests_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), fi_get_protocol(), FILE_SAMPLES_PESTS);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_SAMPLES_PESTS);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_SAMPLES_PESTS){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto.'));
                redirect(RT_SAMPLES_PESTS);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_samples_pests($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if(($row != 0) and ($lo_data[0] != '')){
                        $lo_record = $this->getColumnsSamplesPests($lo_data);
                        // Pest 1 ----------------------------------------------
                        if($lo_record['pest1']!=NULL or $lo_record['pest1']!=''){
                            $lo_dataset = $this->getColumnsSamplesPestsDataSet($lo_record, 1);
                            $this->ds_model->add_int_samples_pests($lo_dataset);
                            log_message('info', $this->db->last_query());
                            $li_records++;
                        }
                        // Pest 2 ----------------------------------------------
                        if($lo_record['pest2']!=NULL or $lo_record['pest2']!=''){
                            $lo_dataset = $this->getColumnsSamplesPestsDataSet($lo_record, 2);
                            $this->ds_model->add_int_samples_pests($lo_dataset);
                            log_message('info', $this->db->last_query());
                            $li_records++;
                        }
                        // Pest 3 ----------------------------------------------
                        if($lo_record['pest3']!=NULL or $lo_record['pest3']!=''){
                            $lo_dataset = $this->getColumnsSamplesPestsDataSet($lo_record, 3);
                            $this->ds_model->add_int_samples_pests($lo_dataset);
                            log_message('info', $this->db->last_query());
                            $li_records++;
                        }
                        // Pest 4 ----------------------------------------------
                        if($lo_record['pest4']!=NULL or $lo_record['pest4']!=''){
                            $lo_dataset = $this->getColumnsSamplesPestsDataSet($lo_record, 4);
                            $this->ds_model->add_int_samples_pests($lo_dataset);
                            log_message('info', $this->db->last_query());
                            $li_records++;
                        }
                        // Pest 5 ----------------------------------------------
                        if($lo_record['pest5']!=NULL or $lo_record['pest5']!=''){
                            $lo_dataset = $this->getColumnsSamplesPestsDataSet($lo_record, 5);
                            $this->ds_model->add_int_samples_pests($lo_dataset);
                            log_message('info', $this->db->last_query());
                            $li_records++;
                        }
                    }
                    $row++;
                }
                $this->setLogSpl(SHD_SAMPLES_PESTS, $li_records);
                fclose($lo_farq);
                $this->ds_model->sp_upd_samples_pests($this->la_params);
                redirect(RT_INTEGRATIONS_SPL);
            }
        }
    }

    public function getColumnsSamplesPests($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[POS_LICENSE_ID],
            'protocol_id'   => $poRecordCSV[POS_PROTOCOL_ID],
            'sketch_id'     => $poRecordCSV[POS_SKETCH_ID],
            'dt_sample'     => ($poRecordCSV[POS_DT_SAMPLE]==''? 0: fdDateBr_to_DateMySQL($poRecordCSV[POS_DT_SAMPLE])),
            'spot_id'       => ($poRecordCSV[POS_SPOT_ID]==''? 0: $poRecordCSV[POS_SPOT_ID]),
            'pest1'         => ($poRecordCSV[10]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[10]))),
            'pest2'         => ($poRecordCSV[11]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[11]))),
            'pest3'         => ($poRecordCSV[12]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[12]))),
            'pest4'         => ($poRecordCSV[13]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[13]))),
            'pest5'         => ($poRecordCSV[14]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[14])))
        );
        return $lo_record;
    }


    public function getColumnsSamplesPestsDataSet($poRecord, $poColumn){
        $lo_record = array(
            'license_id'    => $poRecord['license_id'],
            'protocol_id'   => $poRecord['protocol_id'],
            'sketch_id'     => $poRecord['sketch_id'],
            'dt_sample'     => $poRecord['dt_sample'],
            'spot_id'       => $poRecord['spot_id'],
            'pest_id'       => $poRecord['pest'.$poColumn]
        );
        return $lo_record;
    }
    //-- End: Samples Pests ----------------------------------------------------------------------------------------------------------------------------

}
