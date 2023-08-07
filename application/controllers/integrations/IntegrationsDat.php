<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IntegrationsDat extends CI_Controller {

    protected $data = array();
    protected $link_redirect = RT_INTEGRATIONS_DAT;

    // ------------------------------------- Pos 0 ----- Pos 1 --------- Pos 2 ------------- Pos 3 ------------- Pos 4 -------------
    protected $la_header_soils      = array('Licenca',  'ID_Solo',      'Nome_Solo',        'Sigla');
    protected $la_header_varieties  = array('Licenca',  'ID_Variedade', 'Nome_Variedade',   'ID_Maturacao',     'Descricao_Maturacao');
    protected $la_header_teams      = array('Licenca',  'ID_Equipe',    'Nome',             'E-mail');
    protected $la_header_products   = array('Licenca',  'ID_Produto',   'Nome_Produto',     'ID_Fabricante',    'Nome_Fabricante');
    protected $la_header_compounds  = array('Licenca',  'ID_Composto',  'Nome_Composto',    'Sigla');
    protected $la_header_diseases   = array('Licenca',  'ID_Doenca',    'Nome_Doenca',      'Sigla',            'Agente');
    protected $la_header_pests      = array('Licenca',  'ID_Praga',     'Nome_Praga');

    protected $la_header_geographical_units = array(
        'Licenca', 'ID_Unidade', 'Nome_Unidade',
        'ID_Fazenda', 'Nome_Fazenda',
        'ID_Regiao', 'Nome_Regiao',
        'ID_Safra', 'Gleba', 'Talhao',
        'ID_Variedade', 'Nome_Variedade', 'ID_Maturacao', 'Nome_Maturacao',
        'ID_Corte', 'Nome_Corte',
        'ID_Solo', 'Nome_Solo', 'Sigla_Solo',
        'ID_Ambiente', 'Nome_Ambiente',
        'ID_Espacamento', 'Nome_Espacamento',
        'Distancia (km)',
        'Area total (ha)',
        'Area producao (ha)',
        'Toneladas (ton)',
        'Plantio (dd/mm/yyyy)',
        'Corte Anterior (dd/mm/yyyy)');

    //-- -----------------------------------------------------------------------
    public function __construct(){
        parent::__construct();
        fb_get_logged();
        $this->output->cache(0);
        $this->load->model('integrations/IntegrationsDat_model', 'ds_model');

        $this->data['view_title'] = 'Integrações - exportação e importação';
        $this->data['menu_active'] = MENU_INTEGRATIONS;
    }

    //-- -----------------------------------------------------------------------
    public function index(){
        $laParams = array(
           'license_id' => fi_get_license(),
           'is_sample' => ACTIVE_NO);

        $this->data['ds_dataset']   = $this->ds_model->get_all($laParams);
        log_message('info', $this->db->last_query());

        $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
        $this->data['search_bar'] = TRUE;

        $this->load->view('patterns/v_header');
        $this->load->view('patterns/v_navigation', $this->data);
        $this->load->view('integrations/vw_integrations_dat');
        $this->load->view('patterns/js_filter');
        $this->load->view('patterns/v_footer');
    }

    //-- Call: Integrations ----------------------------------------------------
    public function setParamsDB(){
        $this->la_params = array(
            'license_id'    => fi_get_license(),
            'season_id'     => fi_get_season()
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

    public function fo_prepare_upload($pi_license, $po_file){
        $ls_path = INTEGRATION_PATH.'_lic'.$pi_license;
        $ls_file = 'lic'.$pi_license.'_'.$po_file;
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

    public function setLogDat($po_integration, $pi_records){
        $la_data_log = array(
            'code'          => $po_integration,
            'license_id'    => fi_get_license(),
            'user_id'       => fi_get_user(),
            'num_records'   => $pi_records
        );
        $this->ds_model->add_log_dat($la_data_log);
        log_message('info', $this->db->last_query());
    }

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Soils ------------------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_dat_soils_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template_soils($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_row_soils($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_soils);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_DAT_SOILS);
    }

    public function set_row_soils($pa_row){
        $la_row['license_id']   = $pa_row->license_id;
        $la_row['soil_id']      = $pa_row->soil_id;
        $la_row['name']         = utf8_decode($pa_row->name);
        $la_row['short_name']   = utf8_decode($pa_row->short_name);
        return $la_row;
    }

    public function ct_integrations_dat_soils_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), FILE_DAT_SOILS);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_INTEGRATIONS_DAT);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_DAT_SOILS){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto'));
                redirect(RT_INTEGRATIONS_DAT);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_dat_soils($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if($row != 0){
                        $lo_record = $this->getColumnsDatSoils($lo_data);
                        $this->ds_model->add_int_dat_soils($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogDat(SHD_DAT_SOILS, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_DAT);
            }
        }
    }

    public function getColumnsDatSoils($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[0],
            'soil_id'       => $poRecordCSV[1],
            'name'          => utf8_encode($poRecordCSV[2]==''? '{null}': $poRecordCSV[2]),
            'short_name'    => utf8_encode($poRecordCSV[3]==''? '{null}': $poRecordCSV[3])
        );
        return $lo_record;
    }
    //-- End: Soils --------------------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Varieties --------------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_dat_varieties_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template_varieties($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_row_varieties($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_varieties);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_DAT_VARIETIES);
    }

    public function set_row_varieties($pa_row){
        $la_row['license_id']       = $pa_row->license_id;
        $la_row['variety_id']       = $pa_row->variety_id;
        $la_row['name']             = utf8_decode($pa_row->name);
        $la_row['maturity_id']      = $pa_row->maturity_id;
        $la_row['maturity_name']    = utf8_decode($pa_row->maturity_name);
        return $la_row;
    }

    public function ct_integrations_dat_varieties_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), FILE_DAT_VARIETIES);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_INTEGRATIONS_DAT);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_DAT_VARIETIES){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto'));
                redirect(RT_INTEGRATIONS_DAT);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_dat_varieties($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if($row != 0){
                        $lo_record = $this->getColumnsDatVarieties($lo_data);
                        $this->ds_model->add_int_dat_varieties($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogDat(SHD_DAT_VARIETIES, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_DAT);
            }
        }
    }

    public function getColumnsDatVarieties($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[0],
            'variety_id'    => $poRecordCSV[1],
            'name'          => utf8_encode($poRecordCSV[2]==''? '{null}': $poRecordCSV[2]),
            'maturity_id'   => ($poRecordCSV[3]==''? '{null}': $poRecordCSV[3]),
            'maturity_name' => utf8_encode($poRecordCSV[4]==''? '{null}': $poRecordCSV[4])
        );
        return $lo_record;
    }
    //-- End: Varieties ----------------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Teams ------------------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_dat_teams_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template_teams($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_row_teams($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_teams);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_DAT_TEAMS);
    }

    public function set_row_teams($pa_row){
        $la_row['license_id']   = $pa_row->license_id;
        $la_row['team_id']      = $pa_row->team_id;
        $la_row['name']         = utf8_decode($pa_row->name);
        $la_row['email']        = utf8_decode($pa_row->email);
        return $la_row;
    }

    public function ct_integrations_dat_teams_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), FILE_DAT_TEAMS);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_INTEGRATIONS_DAT);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_DAT_TEAMS){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto'));
                redirect(RT_INTEGRATIONS_DAT);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_dat_teams($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if($row != 0){
                        $lo_record = $this->getColumnsDatTeams($lo_data);
                        $this->ds_model->add_int_dat_teams($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogDat(SHD_DAT_TEAMS, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_DAT);
            }
        }
    }

    public function getColumnsDatTeams($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[0],
            'team_id'       => $poRecordCSV[1],
            'name'          => utf8_encode($poRecordCSV[2]==''? '{null}': $poRecordCSV[2]),
            'email'         => $poRecordCSV[3]
        );
        return $lo_record;
    }
    //-- End: Teams --------------------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Compounds --------------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_dat_compounds_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template_compounds($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_row_compounds($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_compounds);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_DAT_COMPOUNDS);
    }

    public function set_row_compounds($pa_row){
        $la_row['license_id']   = $pa_row->license_id;
        $la_row['compound_id']  = $pa_row->compound_id;
        $la_row['name']         = utf8_decode($pa_row->name);
        $la_row['short_name']   = utf8_decode($pa_row->short_name);
        return $la_row;
    }

    public function ct_integrations_dat_compounds_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), FILE_DAT_COMPOUNDS);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_INTEGRATIONS_DAT);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_DAT_COMPOUNDS){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto'));
                redirect(RT_INTEGRATIONS_DAT);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_dat_compounds($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if($row != 0){
                        $lo_record = $this->getColumnsDatCompounds($lo_data);
                        $this->ds_model->add_int_dat_compounds($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogDat(SHD_DAT_COMPUNDS, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_DAT);
            }
        }
    }

    public function getColumnsDatCompounds($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[0],
            'compound_id'   => $poRecordCSV[1],
            'name'          => utf8_encode($poRecordCSV[2]==''? '{null}': $poRecordCSV[2]),
            'short_name'    => utf8_encode($poRecordCSV[3]==''? '{null}': $poRecordCSV[3])
        );
        return $lo_record;
    }
    //-- End: Compounds ----------------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Products ---------------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_dat_products_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template_products($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_row_products($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_products);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_DAT_PRODUCTS);
    }

    public function set_row_products($pa_row){
        $la_row['license_id']           = $pa_row->license_id;
        $la_row['product_id']           = $pa_row->product_id;
        $la_row['name']                 = utf8_decode($pa_row->name);
        $la_row['manufacturer_id']      = $pa_row->manufacturer_id;
        $la_row['manufacturer_name']    = utf8_decode($pa_row->manufacturer_name);
        return $la_row;
    }

    public function ct_integrations_dat_products_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), FILE_DAT_PRODUCTS);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_INTEGRATIONS_DAT);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_DAT_PRODUCTS){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto'));
                redirect(RT_INTEGRATIONS_DAT);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_dat_products($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if($row != 0){
                        $lo_record = $this->getColumnsDatProducts($lo_data);
                        $this->ds_model->add_int_dat_products($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogDat(SHD_DAT_PRODUCTS, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_DAT);
            }
        }
    }

    public function getColumnsDatProducts($poRecordCSV){
        $lo_record = array(
            'license_id'        => $poRecordCSV[0],
            'product_id'        => $poRecordCSV[1],
            'name'              => utf8_encode($poRecordCSV[2]==''? '{null}': $poRecordCSV[2]),
            'manufacturer_id'   => ($poRecordCSV[3]==''? '{null}': $poRecordCSV[3]),
            'manufacturer_name' => utf8_encode($poRecordCSV[4]==''? '{null}': $poRecordCSV[4])
        );
        return $lo_record;
    }
    //-- End: Products ----------------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Geographical Units -----------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_dat_geographical_units_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template_geographical_units($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_row_geographical_units($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_geographical_units);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_DAT_GEOGRAPHICAL_UNITS);
    }

    public function set_row_geographical_units($pa_row){
        $la_row['license_id']       = $pa_row->license_id;
        $la_row['unit_id']          = $pa_row->unit_id;
        $la_row['unit_name']        = utf8_decode($pa_row->unit_name);
        $la_row['farm_id']          = $pa_row->farm_id;
        $la_row['farm_name']        = utf8_decode($pa_row->farm_name);
        $la_row['region_id']        = $pa_row->region_id;
        $la_row['region_name']      = utf8_decode($pa_row->region_name);
        $la_row['season_id']        = $pa_row->season_id;
        $la_row['block_code']       = utf8_decode($pa_row->block_code);
        $la_row['plot_code']        = utf8_decode($pa_row->plot_code);
        $la_row['variety_id']       = $pa_row->variety_id;
        $la_row['variety_name']     = utf8_decode($pa_row->variety_name);
        $la_row['maturity_id']      = $pa_row->maturity_id;
        $la_row['maturity_name']    = utf8_decode($pa_row->maturity_name);
        $la_row['cutting_id']       = $pa_row->cutting_id;
        $la_row['cutting_name']     = utf8_decode($pa_row->cutting_name);
        $la_row['soil_id']          = $pa_row->soil_id;
        $la_row['soil_name']        = utf8_decode($pa_row->soil_name);
        $la_row['soil_short_name']  = utf8_decode($pa_row->soil_short_name);
        $la_row['environment_id']   = $pa_row->environment_id;
        $la_row['environment_name'] = utf8_decode($pa_row->environment_name);
        $la_row['spacing_id']       = $pa_row->spacing_id;
        $la_row['spacing_name']     = utf8_decode($pa_row->spacing_name);
        $la_row['distance']         = str_replace(".",",", $pa_row->distance);
        $la_row['total_area']       = str_replace(".",",", $pa_row->total_area);
        $la_row['production_area']  = str_replace(".",",", $pa_row->production_area);
        $la_row['tons']             = str_replace(".",",", $pa_row->tons);
        $la_row['dt_planting']      = $pa_row->dt_planting;
        $la_row['dt_cutting']       = $pa_row->dt_cutting;
        return $la_row;
    }

    public function ct_integrations_dat_geographical_units_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), FILE_DAT_GEOGRAPHICAL_UNITS);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_INTEGRATIONS_DAT);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_DAT_GEOGRAPHICAL_UNITS){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto'));
                redirect(RT_INTEGRATIONS_DAT);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_dat_geographical_units($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if($row != 0){
                        $lo_record = $this->getColumnsDatGeographicalUnits($lo_data);
                        if($lo_record['license_id'] > 0 and $lo_record['license_id'] != ''){
                            $this->ds_model->add_int_dat_geographical_units($lo_record);
                            log_message('info', $this->db->last_query());
                            $li_records++;
                        }else{
                            break;
                        }
                    }
                    $row++;
                }
                $this->setLogDat(SHD_DAT_GEOGRAPHICAL_UNITS, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_DAT);
            }
        }
    }

    public function getColumnsDatGeographicalUnits($poRecordCSV){
        $lo_record = array(
            'license_id'        => $poRecordCSV[0],
            'unit_id'           => $poRecordCSV[1],
            'unit_name'         => utf8_encode($poRecordCSV[2]),
            'farm_id'           => $poRecordCSV[3],
            'farm_name'         => utf8_encode($poRecordCSV[4]),
            'region_id'         => ($poRecordCSV[5]==''? 1: $poRecordCSV[5]),
            'region_name'       => utf8_encode($poRecordCSV[6]==''? '{null}': $poRecordCSV[6]),
            'season_id'         => ($poRecordCSV[7]==''? 1: $poRecordCSV[7]),
            'block_code'        => $poRecordCSV[8],
            'plot_code'         => $poRecordCSV[9],
            'variety_id'        => ($poRecordCSV[10]==''? 1: $poRecordCSV[10]),
            'variety_name'      => utf8_encode($poRecordCSV[11]==''? '{null}': $poRecordCSV[11]),
            'maturity_id'       => ($poRecordCSV[12]==''? 1: $poRecordCSV[12]),
            'maturity_name'     => utf8_encode($poRecordCSV[13]==''? '{null}': $poRecordCSV[13]),
            'cutting_id'        => ($poRecordCSV[14]==''? 1: $poRecordCSV[14]),
            'cutting_name'      => utf8_encode($poRecordCSV[15]==''? '{null}': $poRecordCSV[15]),
            'soil_id'           => ($poRecordCSV[16]==''? 1: $poRecordCSV[16]),
            'soil_name'         => utf8_encode($poRecordCSV[17]==''? '{null}': $poRecordCSV[17]),
            'soil_short_name'   => utf8_encode($poRecordCSV[18]==''? '{null}': $poRecordCSV[18]),
            'environment_id'    => ($poRecordCSV[19]==''? 1: $poRecordCSV[19]),
            'environment_name'  => utf8_encode($poRecordCSV[20]==''? '{null}': $poRecordCSV[20]),
            'spacing_id'        => (($poRecordCSV[21]=='' or $poRecordCSV[21]==NULL)? 1: $poRecordCSV[21]),
            'spacing_name'      => utf8_encode($poRecordCSV[22]==''? '{null}': $poRecordCSV[22]),
            'distance'          => ($poRecordCSV[23]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[23]))),
            'total_area'        => ($poRecordCSV[24]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[24]))),
            'production_area'   => ($poRecordCSV[25]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[25]))),
            'tons'              => ($poRecordCSV[26]==''? 0: str_replace(",",".", str_replace(".","", $poRecordCSV[26]))),
            'dt_planting'       => fdDateBr_to_DateMySQL($poRecordCSV[27]),
            'dt_cutting'        => fdDateBr_to_DateMySQL($poRecordCSV[28])
        );
        return $lo_record;
    }
    //-- End: Geographical Units -------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Diseases ---------------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_dat_diseases_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template_diseases($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_row_diseases($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_diseases);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_DAT_DISEASES);
    }

    public function set_row_diseases($pa_row){
        $la_row['license_id']   = $pa_row->license_id;
        $la_row['disease_id']   = $pa_row->disease_id;
        $la_row['name']         = utf8_decode($pa_row->name);
        $la_row['short_name']   = utf8_decode($pa_row->short_name);
        $la_row['agent']        = utf8_decode($pa_row->agent);
        return $la_row;
    }

    public function ct_integrations_dat_diseases_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), FILE_DAT_DISEASES);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_INTEGRATIONS_DAT);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_DAT_DISEASES){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto'));
                redirect(RT_INTEGRATIONS_DAT);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_dat_diseases($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if($row != 0){
                        $lo_record = $this->getColumnsDatDiseases($lo_data);
                        $this->ds_model->add_int_dat_diseases($lo_record);
                        log_message('error', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogDat(SHD_DAT_DISEASES, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_DAT);
            }
        }
    }

    public function getColumnsDatDiseases($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[0],
            'disease_id'    => $poRecordCSV[1],
            'name'          => utf8_encode($poRecordCSV[2]==''? '{null}': $poRecordCSV[2]),
            'short_name'    => utf8_encode($poRecordCSV[3]==''? '{null}': $poRecordCSV[3]),
            'agent'         => utf8_encode($poRecordCSV[4]==''? '{null}': $poRecordCSV[4])
        );
        return $lo_record;
    }
    //-- End: Diseases -----------------------------------------------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    //-- Begin: Pests ------------------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------------------------------
    public function ct_export_dat_pests_template(){
        $this->setParamsDB();
        $this->data['ds_export_template'] = $this->ds_model->get_template_pests($this->la_params);
        log_message('info', $this->db->last_query());

        $array_content = array();
        foreach ($this->data['ds_export_template'] as $row){
            $array_line = self::set_row_pests($row);
            array_push($array_content, $array_line);
        }
        $this->setHeader($this->la_header_pests);
        $this->setContent($array_content);
        $this->generateAndDownloadCSV(FILE_DAT_PESTS);
    }

    public function set_row_pests($pa_row){
        $la_row['license_id']   = $pa_row->license_id;
        $la_row['pest_id']      = $pa_row->pest_id;
        $la_row['name']         = utf8_decode($pa_row->name);
        return $la_row;
    }

    public function ct_integrations_dat_pests_import(){
        $lo_setup_upload = self::fo_prepare_upload(fi_get_license(), FILE_DAT_PESTS);
        $this->upload->initialize($lo_setup_upload);
        if (!$this->upload->do_upload(FIELD_INPUT_FORM)){
            $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>$this->upload->display_errors()));
            redirect(RT_INTEGRATIONS_DAT);
        }else{
            // se correu tudo bem, recuperamos os dados do arquivo
            $lo_data['file_data'] = $this->upload->data();
            if($lo_data['file_data']['client_name'] != FILE_DAT_PESTS){
                $this->session->set_flashdata(MSG_EVENT, array('type'=>TYPE_DANGER, 'text'=>'Arquivo selecionado não corresponde ao arquivo correto'));
                redirect(RT_INTEGRATIONS_DAT);
            }else{
                $this->setParamsDB();
                $this->ds_model->del_int_dat_pests($this->la_params);
                log_message('info', $this->db->last_query());
                $lo_farq = fopen($lo_data['file_data']['full_path'], 'r');
                $row = 0;
                $li_records = 0;
                while (($lo_data = fgetcsv($lo_farq, 0, ';', '"')) !== FALSE){
                    if($row != 0){
                        $lo_record = $this->getColumnsDatPests($lo_data);
                        $this->ds_model->add_int_dat_pests($lo_record);
                        log_message('info', $this->db->last_query());
                        $li_records++;
                    }
                    $row++;
                }
                $this->setLogDat(SHD_DAT_PESTS, $li_records);
                fclose($lo_farq);
                redirect(RT_INTEGRATIONS_DAT);
            }
        }
    }

    public function getColumnsDatPests($poRecordCSV){
        $lo_record = array(
            'license_id'    => $poRecordCSV[0],
            'pest_id'       => $poRecordCSV[1],
            'name'          => utf8_encode($poRecordCSV[2]==''? '{null}': $poRecordCSV[2])
        );
        return $lo_record;
    }
    //-- End: Pests --------------------------------------------------------------------------------------------------------------------------------------

}
