<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExportsTab extends CI_Controller {

    protected $data = array();

    public function __construct(){
        parent::__construct();
        fb_get_logged();

        $this->output->cache(0);
        $this->load->model('protocols/ProtocolsResult_model', 'ds_model');
    }

    public function rt_pdf_protocol($pskey, $piSample){
        if(($pskey==NULL) or ($pskey=='')){
            return '';
        }else{
            $this->la_params = array(
               'license_id' => fi_get_license(),
               'protocol_id' => $pskey
            );
            $this->data['li_sample'] = $piSample;

            $this->data['ds_protocolo'] = $this->ds_model->get_protocol($this->la_params);
            log_message('info', $this->db->last_query());

            $this->data['ds_protocolo_idealizers'] = $this->ds_model->get_protocol_idealizers($this->la_params);
            log_message('info', $this->db->last_query());

            $this->data['ds_protocolo_teams'] = $this->ds_model->get_protocol_teams($this->la_params);
            log_message('info', $this->db->last_query());

            $this->data['ds_protocolo_idealizers'] = $this->ds_model->get_protocol_idealizers($this->la_params);
            log_message('info', $this->db->last_query());

            $this->data['ds_protocolo_teams'] = $this->ds_model->get_protocol_teams($this->la_params);
            log_message('info', $this->db->last_query());

            $this->data['ds_protocolo_notes'] = $this->ds_model->get_protocol_notes($this->la_params);
            log_message('info', $this->db->last_query());

            switch ($piSample){
                case 1:
                    $this->data['ds_samples_analyze'] = $this->ds_model->get_samples_analyze($this->la_params);
                    log_message('info', $this->db->last_query());
                    break;
            }

            $this->load->view('exports/pdf_protocol', $this->data);
        }
    }

    // -- ----------------------------------------------------------------------
    public function setHeaderTab($pa_header){
        $this->la_header = $pa_header;
    }
    public function setContentTab($array_content){
        $this->array_content = $array_content;
    }
    public function generateAndDownloadTab($ps_file){
        $header_file = $this->getHeaderTab();
        $content_file = $this->getContentTab();

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
    private function getHeaderTab(){
        return $this->la_header;
    }
    private function getContentTab(){
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
    // -- ----------------------------------------------------------------------

    public function rt_tab_protocol_analyze_1($pskey){
        if(($pskey==NULL) or ($pskey=='')){
            return '';
        }else{
            $this->la_params = array(
               'license_id' => fi_get_license(),
               'protocol_id' => $pskey
            );
            $this->data['ds_export_tab'] = $this->ds_model->get_samples_analyze($this->la_params);
            log_message('info', $this->db->last_query());

            $array_content = array();
            foreach ($this->data['ds_export_tab'] as $row){
                $la_row['protocol_id']      = $row->protocol_id;
                $la_row['treatment_name']   = utf8_decode($row->treatment_name);
                $la_row['num_atr']          = $row->num_atr;
                $la_row['pos_atr']          = $row->pos_atr;
                $la_row['num_tch']          = $row->num_tch;
                $la_row['pos_tch']          = $row->pos_tch;
                $la_row['num_tah']          = $row->num_tah;
                $la_row['pos_tah']          = $row->pos_tah;
                $la_row['num_wei']          = $row->num_wei;
                $la_row['pos_wei']          = $row->pos_wei;
                array_push($array_content, $la_row);
            }
            $la_header_tab = array(
                'Protocolo',
                'Tratamento',
                'ATR', 
                utf8_decode('Posição'),
                'TCH', 
                utf8_decode('Posição'),
                'TAH', 
                utf8_decode('Posição'),
                'Peso', 
                utf8_decode('Posição')
            );
            $this->setHeaderTab($la_header_tab);
            $this->setContentTab($array_content);
            $this->generateAndDownloadTab('tab_protocol_analyze_'.fi_get_protocol().'.csv');
        }
    }

}
