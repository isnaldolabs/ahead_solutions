<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtocolsResult extends CI_Controller {

    protected $data = array();
    protected $la_params = array();
    protected $link_redirect = RT_PROTOCOLS_RESULT;
    protected $li_repetitions;
    protected $li_treats_amount;

    public function __construct(){
        parent::__construct();
        fb_get_logged();
        $this->output->cache(0);
        $this->load->model('protocols/ProtocolsResult_model', 'ds_model');

        $this->data['view_title']       = 'Comparações';
        $this->data['view_title_rec']   = 'Comparação';
        $this->data['menu_active']      = MENU_PROTOCOLS;

        $this->data['protocol_id']              = fi_get_protocol();
        $this->data['protocol_title']           = fs_get_protocol_title();
        $this->data['protocol_designing_id']    = fi_get_protocol_designing_id();

        $this->data['menu_prot_active'] = 0;
        $this->data['menu_samp_active'] = 0;
        $this->data['menu_clim_active'] = 0;
        $this->data['menu_isoq_active'] = 0;
        $this->data['menu_math_active'] = 0;

        $this->data['menu_variable_active'] = 0;

        $this->la_params = array(
            'license_id' => fi_get_license(),
            'protocol_id' => md5(fi_get_protocol())
        );

        $this->data['ds_protocol_samples'] = $this->ds_model->get_protocol_samples($this->la_params);
        log_message('info', $this->db->last_query());

        $this->data['ds_math_variables'] = $this->ds_model->get_math_protocols_variables($this->la_params);
        log_message('info', $this->db->last_query());
    }

    public function ct_result_report($psKey){
        $this->la_params = array(
            'license_id' => fi_get_license(),
            'protocol_id' => $psKey
        );

        $this->data['menu_prot_active'] = 1;

        // Protocolo -----------------------------------------------------------
        $this->data['ds_protocolo'] = $this->ds_model->get_protocol($this->la_params);
        log_message('info', $this->db->last_query());
        $this->data['ds_protocolo_idealizers'] = $this->ds_model->get_protocol_idealizers($this->la_params);
        log_message('info', $this->db->last_query());
        $this->data['ds_protocolo_teams'] = $this->ds_model->get_protocol_teams($this->la_params);
        log_message('info', $this->db->last_query());

        // Amostras: Pré-análises ----------------------------------------------
        $this->data['ds_samples_analyze'] = $this->ds_model->get_samples_analyze($this->la_params);
        log_message('info', $this->db->last_query());

        $this->data['ds_samples_analyze_period'] = $this->ds_model->get_samples_analyze_period($this->la_params);
        log_message('info', $this->db->last_query());

        $this->data['ds_treatments_period'] = $this->ds_model->get_treatments_period($this->la_params);
        log_message('info', $this->db->last_query());

        $this->la_params['ds_crosstab_treatments'] = $this->data['ds_treatments_period'];

        /* ------------------------------------------------------------------------------*/
        /* -- BEGIN: estrutura para criar os dados de análise de ATR por período ------- */
        /* ------------------------------------------------------------------------------*/
        $ls_sub_atr = '';
        $li_sub_atr = 1;
        foreach ($this->la_params['ds_crosstab_treatments'] as $row){
            $ls_sub_atr .= ', avg(case when vps.treatment_id = '.$row->treatment_id.' then sa.num_atr1 else 0 end) col'.$li_sub_atr.PHP_EOL;
            $li_sub_atr++;
        }
        $this->la_params['sql_subquery_avg'] = $ls_sub_atr;

        $ls_sel_atr = '';
        $li_sel_atr = 1;
        foreach ($this->la_params['ds_crosstab_treatments'] as $row){
            $ls_sel_atr .= ', sum(col'.$li_sel_atr.') col'.$li_sel_atr.PHP_EOL;
            $li_sel_atr++;
        }
        $this->la_params['sql_select_sum'] = $ls_sel_atr;

        $this->data['ds_samples_analyze_graphic_period_atr'] = $this->ds_model->get_samples_analyze_graphic_period($this->la_params);
        log_message('info', $this->db->last_query());
        /* -- END: estrutura para criar os dados de análise de ATR por período --------- */

        /* ------------------------------------------------------------------------------*/
        /* -- BEGIN: estrutura para criar os dados de análise de TCH por período ------- */
        /* ------------------------------------------------------------------------------*/
        $ls_sub_tch = '';
        $li_sub_tch = 1;
        foreach ($this->la_params['ds_crosstab_treatments'] as $row){
            $ls_sub_tch .= ', avg(case when vps.treatment_id = '.$row->treatment_id.' then sa.num_tch else 0 end) col'.$li_sub_tch.PHP_EOL;
            $li_sub_tch++;
        }
        $this->la_params['sql_subquery_avg'] = $ls_sub_tch;

        $ls_sel_tch = '';
        $li_sel_tch = 1;
        foreach ($this->la_params['ds_crosstab_treatments'] as $row){
            $ls_sel_tch .= ', sum(col'.$li_sel_tch.') col'.$li_sel_tch.PHP_EOL;
            $li_sel_tch++;
        }
        $this->la_params['sql_select_sum'] = $ls_sel_tch;

        $this->data['ds_samples_analyze_graphic_period_tch'] = $this->ds_model->get_samples_analyze_graphic_period($this->la_params);
        log_message('info', $this->db->last_query());
        /* -- END: estrutura para criar os dados de análise de TCH por período --------- */

        /* ------------------------------------------------------------------------------*/
        /* -- BEGIN: estrutura para criar os dados de análise de TAH por período ------- */
        /* ------------------------------------------------------------------------------*/
        $ls_sub_tah = '';
        $li_sub_tah = 1;
        foreach ($this->la_params['ds_crosstab_treatments'] as $row){
            $ls_sub_tah .= ', avg(case when vps.treatment_id = '.$row->treatment_id.' then sa.num_tah else 0 end) col'.$li_sub_tah.PHP_EOL;
            $li_sub_tah++;
        }
        $this->la_params['sql_subquery_avg'] = $ls_sub_tah;

        $ls_sel_tah = '';
        $li_sel_tah = 1;
        foreach ($this->la_params['ds_crosstab_treatments'] as $row){
            $ls_sel_tah .= ', sum(col'.$li_sel_tah.') col'.$li_sel_tah.PHP_EOL;
            $li_sel_tah++;
        }
        $this->la_params['sql_select_sum'] = $ls_sel_tah;

        $this->data['ds_samples_analyze_graphic_period_tah'] = $this->ds_model->get_samples_analyze_graphic_period($this->la_params);
        log_message('info', $this->db->last_query());
        /* -- END: estrutura para criar os dados de análise de TAH por período --------- */

        // Biometria de Colmos/Stems -------------------------------------------
        $this->data['ds_biometry_stems'] = $this->ds_model->get_biometry_stems($this->la_params);
        log_message('info', $this->db->last_query());
    
        // Biometria de Entrenós/Internodes ------------------------------------
        $this->data['ds_biometry_internodes'] = $this->ds_model->get_biometry_internodes($this->la_params);
        log_message('info', $this->db->last_query());
    
        // Biometria de Perfilhos/Tillers --------------------------------------
        $this->data['ds_biometry_tillers'] = $this->ds_model->get_biometry_tillers($this->la_params);
        log_message('info', $this->db->last_query());

        // Biometria de Infestações/Infestation --------------------------------
        $this->data['ds_biometry_infestation'] = $this->ds_model->get_biometry_infestation($this->la_params);
        log_message('info', $this->db->last_query());
        
        // BEGIN: dados financeiros --------------------------------------------
        $this->data['ds_treatment_index'] = $this->ds_model->get_treatment_index($this->la_params);
        log_message('info', $this->db->last_query());

        $this->data['ds_treatment_cost'] = $this->ds_model->get_treatment_cost($this->la_params);
        log_message('info', $this->db->last_query());

        $this->data['ds_treatment_cost_total'] = $this->ds_model->get_treatment_cost_total($this->la_params);
        log_message('info', $this->db->last_query());

        $this->data['ds_compounds'] = $this->ds_model->get_compounds($this->la_params);
        log_message('info', $this->db->last_query());
        // END: dados financeiros ----------------------------------------------

        // BEGIN: doenças ------------------------------------------------------
        $this->data['ds_biometry_diseases'] = $this->ds_model->get_biometry_diseases($this->la_params);
        log_message('info', $this->db->last_query());

        $this->data['ds_biometry_diseases_dat'] = $this->ds_model->get_biometry_diseases_dat($this->la_params);
        log_message('info', $this->db->last_query());

        $ls_sub_diseases = '';
        $li_sub_diseases = 1;
        foreach ($this->data['ds_biometry_diseases_dat'] as $row){
            $ls_sub_diseases .= ', case when s.disease_id = '.$row->disease_id.' then s.qtd else 0 end col'.$li_sub_diseases.PHP_EOL;
            $li_sub_diseases++;
        }
        $this->la_params['sql_subquery_diseases'] = $ls_sub_diseases;

        $ls_sel_diseases = '';
        $li_sel_diseases = 1;
        foreach ($this->data['ds_biometry_diseases_dat'] as $row){
            $ls_sel_diseases .= ', sum(col'.$li_sel_diseases.') col'.$li_sel_diseases.PHP_EOL;
            $li_sel_diseases++;
        }
        $this->la_params['sql_select_sum'] = $ls_sel_diseases;

        $this->data['ds_biometry_diseases_cross'] = $this->ds_model->get_biometry_diseases_cross($this->la_params);
        log_message('info', $this->db->last_query());

        // diseases by groups
        $this->data['ds_biometry_diseases_groups_dat'] = $this->ds_model->get_biometry_diseases_groups_dat($this->la_params);
        log_message('info', $this->db->last_query());

        $ls_sub_groups = '';
        $li_sub_groups = 1;
        foreach ($this->data['ds_biometry_diseases_groups_dat'] as $row){
            $ls_sub_groups .= ', case when sq.group_id = '.$row->group_id.' then sq.qtd else 0 end col'.$li_sub_groups.PHP_EOL;
            $li_sub_groups++;
        }
        $this->la_params['sql_subquery_diseases_groups'] = $ls_sub_groups;

        $ls_sel_groups = '';
        $li_sel_groups = 1;
        foreach ($this->data['ds_biometry_diseases_groups_dat'] as $row){
            $ls_sel_groups .= ', sum(col'.$li_sel_groups.') col'.$li_sel_groups.PHP_EOL;
            $li_sel_groups++;
        }
        $this->la_params['sql_select_groups_sum'] = $ls_sel_groups;

        $this->data['ds_biometry_diseases_groups_cross'] = $this->ds_model->get_biometry_diseases_groups_cross($this->la_params);
        log_message('info', $this->db->last_query());
        // END: doenças --------------------------------------------------------
        
        // BEGIN: pragas -------------------------------------------------------
        $this->data['ds_biometry_pests'] = $this->ds_model->get_biometry_pests($this->la_params);
        log_message('info', $this->db->last_query());

        $this->data['ds_biometry_pests_dat'] = $this->ds_model->get_biometry_pests_dat($this->la_params);
        log_message('info', $this->db->last_query());

        $ls_sub_pests = '';
        $li_sub_pests = 1;
        foreach ($this->data['ds_biometry_pests_dat'] as $row){
            $ls_sub_pests .= ', case when s.pest_id = '.$row->pest_id.' then s.qtd else 0 end col'.$li_sub_pests.PHP_EOL;
            $li_sub_pests++;
        }
        $this->la_params['sql_subquery_pests'] = $ls_sub_pests;

        $ls_sel_pests = '';
        $li_sel_pests = 1;
        foreach ($this->data['ds_biometry_pests_dat'] as $row){
            $ls_sel_pests .= ', sum(col'.$li_sel_pests.') col'.$li_sel_pests.PHP_EOL;
            $li_sel_pests++;
        }
        $this->la_params['sql_select_sum'] = $ls_sel_pests;

        $this->data['ds_biometry_pests_cross'] = $this->ds_model->get_biometry_pests_cross($this->la_params);
        log_message('info', $this->db->last_query());

        // pests by groups
        $this->data['ds_biometry_pests_groups_dat'] = $this->ds_model->get_biometry_pests_groups_dat($this->la_params);
        log_message('info', $this->db->last_query());

        $ls_sub_groups = '';
        $li_sub_groups = 1;
        foreach ($this->data['ds_biometry_pests_groups_dat'] as $row){
            $ls_sub_groups .= ', case when sq.group_id = '.$row->group_id.' then sq.qtd else 0 end col'.$li_sub_groups.PHP_EOL;
            $li_sub_groups++;
        }
        $this->la_params['sql_subquery_pests_groups'] = $ls_sub_groups;

        $ls_sel_groups = '';
        $li_sel_groups = 1;
        foreach ($this->data['ds_biometry_pests_groups_dat'] as $row){
            $ls_sel_groups .= ', sum(col'.$li_sel_groups.') col'.$li_sel_groups.PHP_EOL;
            $li_sel_groups++;
        }
        $this->la_params['sql_select_groups_sum'] = $ls_sel_groups;

        $this->data['ds_biometry_pests_groups_cross'] = $this->ds_model->get_biometry_pests_groups_cross($this->la_params);
        log_message('info', $this->db->last_query());
        // END: pragas ---------------------------------------------------------
        
        
        
        
        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        // Clima e Temperatura -------------------------------------------------
        $this->data['ds_climatic_history'] = $this->ds_model->get_climatic_history($this->la_params);
        log_message('info', $this->db->last_query());

        /* ------------------------------------------------------------------------------*/

        $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
        $this->data['search_bar'] = TRUE;

        $this->load->view('patterns/v_header');
        $this->load->view('patterns/v_navigation', $this->data);
        $this->load->view('protocols/protocols_result/vw_result_report', $this->data);
        $this->load->view('protocols/protocols_result/js_result_report', $this->data);
        $this->load->view('patterns/js_filter');
        $this->load->view('patterns/v_footer');
    }

//------------------------------------------------------------------------------  
//------------------------------------------------------------------------------  
//------------------------------------------------------------------------------  
//------------------------------------------------------------------------------  
//------------------------------------------------------------------------------  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  public function ct_result_prot($psKey){}
  public function ct_result_analizes($psKey){}
  public function ct_result_stems($psKey){}
  public function ct_result_internodes($psKey){}
  public function ct_result_tillers($psKey){}
  public function ct_result_infestation($psKey){}
  public function ct_result_compounds($psKey){}
  public function ct_result_diseases($psKey){}
  public function ct_result_pests($psKey){}
  public function ct_result_climatic($psKey){}

  public function ct_result_isoquantas($psKey){
    $this->la_params = array(
       'license_id' => fi_get_license(),
       'protocol_id' => $psKey
    );

    $this->data['menu_isoq_active'] = 1;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('protocols/protocols_result/vw_result_menu', $this->data);
    $this->load->view('protocols/protocols_result/vw_result_isoquantas', $this->data);
    $this->load->view('protocols/protocols_result/js_result_isoquantas', $this->data);
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/v_footer');
  }

  public function ct_result_group_sdh($psKey){
    $this->la_params = array(
       'license_id' => fi_get_license(),
       'protocol_id' => $psKey
    );

    $this->data['menu_samp_active'] = 2;

    $this->data['ds_biometry_group_sdh'] = $this->ds_model->get_biometry_group_sdh($this->la_params);
    log_message('info', $this->db->last_query());

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('protocols/protocols_result/vw_result_menu', $this->data);
    $this->load->view('protocols/protocols_result/vw_result_group_sdh', $this->data);
    $this->load->view('protocols/protocols_result/js_result_group_sdh', $this->data);
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/v_footer');
  }

  public function ct_result_biometry_st_gp($psKey){
    $this->la_params = array(
       'license_id' => fi_get_license(),
       'protocol_id' => $psKey
    );

    $this->data['menu_samp_active'] = 2;

    $this->data['ds_biometry_st_gp'] = $this->ds_model->get_biometry_st_gp($this->la_params);
    log_message('info', $this->db->last_query());

    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('protocols/protocols_result/vw_result_menu', $this->data);
    $this->load->view('protocols/protocols_result/vw_result_biometry_st_gp', $this->data);
    $this->load->view('protocols/protocols_result/js_result_biometry_st_gp', $this->data);
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/v_footer');
  }



















  // -----------------------------------------------------------------------------------------------------------------------
  // -----------------------------------------------------------------------------------------------------------------------
  // -----------------------------------------------------------------------------------------------------------------------
  // -----------------------------------------------------------------------------------------------------------------------
  // -----------------------------------------------------------------------------------------------------------------------

  public function ct_result_math_dic($piVariable, $psProtocol){
    $this->la_params = array(
       'license_id' => fi_get_license(),
       'protocol_id' => $psProtocol
    );
    $this->data['menu_math_active'] = 1;
    $this->data['menu_variable_active'] = $piVariable;
    $this->data['ls_response_variable'] = $this->fs_response_variable($piVariable);

    $lo_protocols           = fo_get_protocol($this->la_params);
    $this->li_repetitions   = $lo_protocols[0]->repetitions;
    $this->li_treats_amount = fo_get_protocol_treatments($this->la_params);

    //-- Buscando a estatística geral
    $this->ct_math_stats_samples($piVariable);

    //-- ANOVA: quadro de análise de variância
    $this->ct_math_dic_anova_variance($piVariable);

    // -- Avaliação da precisão experimental
    $this->ct_math_dic_anova_precision();

    // -- VIEW D.I.C.
    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('protocols/protocols_result/vw_result_menu', $this->data);
    $this->load->view('protocols/protocols_result/vw_result_math_anova_stats', $this->data);
    $this->load->view('protocols/protocols_result/vw_result_math_dic_anova_variance', $this->data);
    $this->load->view('protocols/protocols_result/vw_result_math_dic_anova_precision', $this->data);
    $this->load->view('protocols/protocols_result/js_result_math', $this->data);
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/v_footer');
  }

  // -----------------------------------------------------------------------------------------------------------------------
  // -----------------------------------------------------------------------------------------------------------------------

  public function ct_result_math_dba($piVariable, $psProtocol){
    $this->la_params = array(
       'license_id' => fi_get_license(),
       'protocol_id' => $psProtocol
    );
    $this->data['menu_math_active'] = 1;
    $this->data['menu_variable_active'] = $piVariable;
    $this->data['ls_response_variable'] = $this->fs_response_variable($piVariable);

    $lo_protocols           = fo_get_protocol($this->la_params);
    $this->li_repetitions   = $lo_protocols[0]->repetitions;
    $this->li_treats_amount = fo_get_protocol_treatments($this->la_params);

    //-- Buscando a estatística geral
    $this->ct_math_stats_samples($piVariable);

    //-- ANOVA: quadro de análise de variância
    $this->ct_math_dba_anova_variance($piVariable);

    // -- Avaliação da precisão experimental
    $this->ct_math_dba_anova_precision();

    // -- VIEW D.B.A.
    $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
    $this->data['search_bar'] = TRUE;

    $this->load->view('patterns/v_header');
    $this->load->view('patterns/v_navigation', $this->data);
    $this->load->view('protocols/protocols_result/vw_result_menu', $this->data);
    $this->load->view('protocols/protocols_result/vw_result_math_anova_stats', $this->data);
    $this->load->view('protocols/protocols_result/vw_result_math_dba_anova_variance', $this->data);
    $this->load->view('protocols/protocols_result/vw_result_math_dba_anova_precision', $this->data);
    $this->load->view('protocols/protocols_result/js_result_math', $this->data);
    $this->load->view('patterns/js_filter');
    $this->load->view('patterns/v_footer');
  }

  // -----------------------------------------------------------------------------------------------------------------------
  // -----------------------------------------------------------------------------------------------------------------------

  private function fs_response_variable($pi_variable){
    switch ($pi_variable){
        case MATH_AV_ATR:           $ls_result = 'ATR';           break;
        case MATH_AV_POL:           $ls_result = 'Pol';           break;
        case MATH_AV_STEMS:         $ls_result = 'Colmos/m2';     break;
        case MATH_AV_DIAMETERS:     $ls_result = 'Diâmetro (cm)'; break;
        case MATH_AV_HEIGHTS:       $ls_result = 'Altura (m)';    break;
        case MATH_AV_INTERNODES:    $ls_result = 'Entrenós';      break;
        case MATH_AV_TILLERS:       $ls_result = 'Perfilhos';     break;
        case MATH_AV_FLOWERING:     $ls_result = 'Flores';        break;
        case MATH_AV_PITH:          $ls_result = 'Isoporos';      break;
        case MATH_AV_HOLES:         $ls_result = 'Perfuros';      break;
        case MATH_AV_DAMAGES:       $ls_result = 'Danos';         break;
        case MATH_AV_INFESTATION:   $ls_result = 'Infestação';    break;
    }
    return $ls_result;
  }

  private function fo_ds_stats_samples($pa_params, $pi_variable){
    switch ($pi_variable){
        case MATH_AV_ATR:
            $la_result = $this->ds_model->get_math_stats_samples_atr($pa_params);
            break;
        case MATH_AV_POL:
            $la_result= $this->ds_model->get_math_stats_samples_pol($pa_params);
            break;
        case MATH_AV_STEMS:
            $la_result = $this->ds_model->get_math_stats_samples_stems($pa_params);
            break;
        case MATH_AV_DIAMETERS:
            $la_result = $this->ds_model->get_math_stats_samples_diameters($pa_params);
            break;
        case MATH_AV_HEIGHTS:
            $la_result = $this->ds_model->get_math_stats_samples_heights($pa_params);
            break;
        case MATH_AV_INTERNODES:
            $la_result = $this->ds_model->get_math_stats_samples_internodes($pa_params);
            break;
        case MATH_AV_TILLERS:
            $la_result = $this->ds_model->get_math_stats_samples_tillers($pa_params);
            break;
        case MATH_AV_FLOWERING:
            $la_result = $this->ds_model->get_math_stats_samples_flowering($pa_params);
            break;
        case MATH_AV_PITH:
            $la_result = $this->ds_model->get_math_stats_samples_pith($pa_params);
            break;
        case MATH_AV_HOLES:
            $la_result = $this->ds_model->get_math_stats_samples_holes($pa_params);
            break;
        case MATH_AV_DAMAGES:
            $la_result = $this->ds_model->get_math_stats_samples_damages($pa_params);
            break;
        case MATH_AV_INFESTATION:
            $la_result = $this->ds_model->get_math_stats_samples_infestation($pa_params);
            break;
    }
    log_message('info', $this->db->last_query());
    return $la_result;
  }

  private function fo_ds_anova_treatments_sum($pa_params, $pi_variable){
    switch ($pi_variable){
        case MATH_AV_ATR:
            $la_result = $this->ds_model->get_math_anova_treatments_sum_atr($pa_params);
            break;
    }
    log_message('info', $this->db->last_query());
    return $la_result;
  }

  private function fo_ds_anova_repetitions_sum($pa_params, $pi_variable){
    switch ($pi_variable){
        case MATH_AV_ATR:
            $la_result = $this->ds_model->get_math_anova_repetitions_sum_atr($pa_params);
            break;
    }
    log_message('info', $this->db->last_query());
    return $la_result;
  }


  //-- -------------------------------------------------------------------------

  /* ---------------------------------------------------------------------------
  | ct_math_stats_samples:
  | ---------------------
  |     Buscando os dados para aplicar apresentar as estatísticas gerais
  |     + Quadro: Medidas de tendência central
  |     + Quadro: Medidas de variabilidade ou dispersão
  --------------------------------------------------------------------------- */
  private function ct_math_stats_samples($piVariable){
    $this->data['ds_stats'] = $this->fo_ds_stats_samples($this->la_params, $piVariable);

    $la_stats = [];
    foreach ($this->data['ds_stats'] as $row){
        array_push($la_stats, round($row->value,3));
    }

    $lr_stats_avg = round(stats_media($la_stats),2);
    $this->data['lr_stats_avg'] = $lr_stats_avg;

    $lr_stats_sum = round(stats_soma($la_stats),2);
    $this->data['lr_stats_sum'] = $lr_stats_sum;

    $this->data['lr_stats_med'] = round(stats_mediana($la_stats),2);
    $this->data['lr_stats_mod'] = round(stats_moda($la_stats),2);
    sort($la_stats);
    $this->data['lr_stats_min'] = round(current($la_stats),2);
    $this->data['lr_stats_max'] = round(end($la_stats),2);
    $this->data['lr_stats_amp'] = round(stats_amplitude($la_stats),2);

    $lr_stats_vs2 = round(stats_variancia_s2($la_stats, $this->li_treats_amount, $lr_stats_avg),2);
    $this->data['lr_stats_vs2'] = $lr_stats_vs2;

    $lr_stats_dsv = round(stats_desvio_padrao($lr_stats_vs2),2);
    $this->data['lr_stats_dsv'] = $lr_stats_dsv;

    $this->data['lr_stats_err'] = round(stats_erro_padrao($lr_stats_dsv, $this->li_treats_amount),2);
    $this->data['lr_stats_coe'] = round(stats_coeficiente($lr_stats_dsv, $lr_stats_avg),2);
  }

  //-- --------------------------------------------
  //-- D.I.C. ANOVA: quadro de análise de variância
  //-- --------------------------------------------
  private function ct_math_dic_anova_variance($piVariable){
    
    $li_rpts = ($this->li_repetitions-1==0?1:$this->li_repetitions-1);
    
    //-- Graus de liberdade
    $li_anova_gl_tr = $this->li_treats_amount-1;
    $this->data['li_anova_gl_tr'] = $li_anova_gl_tr;
    $li_anova_gl_er = $this->li_treats_amount*($li_rpts);
    $this->data['li_anova_gl_er'] = $li_anova_gl_er;
    $li_anova_gl_tt = ($this->li_treats_amount*$this->li_repetitions)-1;
    $this->data['li_anova_gl_tt'] = $li_anova_gl_tt;

    //-- Soma dos quadrados
    $lr_anova_sq_tt = round(dic_anova_sq_total($this->data['ds_stats'], $this->li_treats_amount, $this->li_repetitions),3);
    $this->data['lr_anova_sq_tt'] = $lr_anova_sq_tt;
    $this->data['ds_anova_treatments_sum'] = $this->fo_ds_anova_treatments_sum($this->la_params, $piVariable);
    $lr_anova_sq_tr = round(dic_anova_sq_treatments($this->data['ds_anova_treatments_sum'], $this->li_treats_amount, $this->li_repetitions),3);
    $this->data['lr_anova_sq_tr'] = $lr_anova_sq_tr;
    $lr_anova_sq_er = round(dic_anova_sq_error($lr_anova_sq_tt, $lr_anova_sq_tr),3);
    $this->data['lr_anova_sq_er'] = $lr_anova_sq_er;

    //-- Quadrados médios
    $lr_anova_qm_tr = round(dic_anova_qm($lr_anova_sq_tr, $li_anova_gl_tr),3);
    $this->data['lr_anova_qm_tr'] = $lr_anova_qm_tr;
    $lr_anova_qm_er = round(dic_anova_qm($lr_anova_sq_er, $li_anova_gl_er),3);
    $this->data['lr_anova_qm_er'] = $lr_anova_qm_er;

    //-- F. Cálculo
    if ($lr_anova_qm_er!=0){
        $this->data['lr_anova_fcalc'] = round($lr_anova_qm_tr / $lr_anova_qm_er,3);
    }else{
        $this->data['lr_anova_fcalc'] = 0;
    }
  }

  // ---------------------------------------------
  // -- D.I.C.: Avaliação da precisão experimental
  // ---------------------------------------------
  private function ct_math_dic_anova_precision(){
    $this->data['ds_anova_table_f'] = $this->ds_model->get_math_anova_table_f($this->data['li_anova_gl_tr'], $this->data['li_anova_gl_er']);
    log_message('info', $this->db->last_query());

    $lr_anova_ftb = $this->data['ds_anova_table_f'][0]->value;
    $this->data['lr_anova_ftb'] = $lr_anova_ftb;

    if ($this->data['lr_stats_avg']!=0){
        $lr_anova_ftb_cv = round((sqrt($this->data['lr_anova_qm_er']) / $this->data['lr_stats_avg']) * 100,2);
    }else{
        $lr_anova_ftb_cv = -9999;
    }
    if (is_nan($lr_anova_ftb_cv)==TRUE){
        $lr_anova_ftb_cv = -9999;
    }
    $this->data['lr_anova_ftb_cv'] = $lr_anova_ftb_cv;

    $this->data['ds_anova_ratings'] = $this->ds_model->get_math_anova_ratings($this->la_params, $lr_anova_ftb_cv);
    log_message('info', $this->db->last_query());

    if( count($this->data['ds_anova_ratings']) > 0){
        $this->data['lr_anova_rat_values'] = 'Valores de '.$this->data['ds_anova_ratings'][0]->min_value.
                                            ' até '.$this->data['ds_anova_ratings'][0]->max_value;
        $this->data['lr_anova_rat_sort'] = $this->data['ds_anova_ratings'][0]->sort;
        $this->data['lr_anova_rat_accuracy'] = $this->data['ds_anova_ratings'][0]->accuracy;
        $this->data['lr_anova_rat_color'] = $this->data['ds_anova_ratings'][0]->color;
    }else{
        $this->data['lr_anova_rat_values'] = '';
        $this->data['lr_anova_rat_sort'] = '';
        $this->data['lr_anova_rat_accuracy'] = '';
        $this->data['lr_anova_rat_color'] = '';
    }

    $la_anova = array(
        'license_id'            => fi_get_license(),
        'protocol_id'           => md5(fi_get_protocol()),
        'anova_ftb'             => $lr_anova_ftb,
        'anova_ftb_cv'          => $lr_anova_ftb_cv,
        'anova_rat_values'      => $this->data['lr_anova_rat_values'],
        'anova_rat_sort'        => $this->data['lr_anova_rat_sort'],
        'anova_rat_color'       => $this->data['lr_anova_rat_color'],
        'anova_rat_accuracy'    => $this->data['lr_anova_rat_accuracy']
    );
    $this->ds_model->upd_result_anova($la_anova);
    log_message('info', $this->db->last_query());

  }

  //-- -------------------------------------------------------------------------

  //-- --------------------------------------------
  //-- D.B.A. ANOVA: quadro de análise de variância
  //-- --------------------------------------------
  private function ct_math_dba_anova_variance($piVariable){
    
    $li_rpts = ($this->li_repetitions-1==0?1:$this->li_repetitions-1);
    
    //-- Graus de liberdade
    $li_anova_gl_bl = $li_rpts;
    $this->data['li_anova_gl_bl'] = $li_anova_gl_bl;
    $li_anova_gl_tr = $this->li_treats_amount-1;
    $this->data['li_anova_gl_tr'] = $li_anova_gl_tr;
    $li_anova_gl_er = ($this->li_treats_amount-1)*($li_rpts);
    $this->data['li_anova_gl_er'] = $li_anova_gl_er;
    $li_anova_gl_tt = ($this->li_treats_amount*$this->li_repetitions)-1;
    $this->data['li_anova_gl_tt'] = $li_anova_gl_tt;

    //-- Soma dos quadrados
    $lr_anova_sq_tt = round(dba_anova_sq_total($this->data['ds_stats'], $this->li_treats_amount, $this->li_repetitions),3);
    $this->data['lr_anova_sq_tt'] = $lr_anova_sq_tt;
    $this->data['ds_anova_treatments_sum'] = $this->fo_ds_anova_treatments_sum($this->la_params, $piVariable);
    $lr_anova_sq_tr = round(dba_anova_sq_treatments($this->data['ds_anova_treatments_sum'], $this->li_treats_amount, $this->li_repetitions),3);
    $this->data['lr_anova_sq_tr'] = $lr_anova_sq_tr;
    $this->data['ds_anova_repetitions_sum'] = $this->fo_ds_anova_repetitions_sum($this->la_params, $piVariable);
    $lr_anova_sq_bl = round(dba_anova_sq_blocks($this->data['ds_anova_repetitions_sum'], $this->li_treats_amount, $this->li_repetitions),3);
    $this->data['lr_anova_sq_bl'] = $lr_anova_sq_bl;
    $lr_anova_sq_er = round(dba_anova_sq_error($lr_anova_sq_tt, $lr_anova_sq_tr, $lr_anova_sq_bl),3);
    $this->data['lr_anova_sq_er'] = $lr_anova_sq_er;

    //-- Quadrados médios
    $lr_anova_qm_bl = round(dba_anova_qm($lr_anova_sq_bl, $li_anova_gl_bl),3);
    $this->data['lr_anova_qm_bl'] = $lr_anova_qm_bl;
    $lr_anova_qm_tr = round(dba_anova_qm($lr_anova_sq_tr, $li_anova_gl_tr),3);
    $this->data['lr_anova_qm_tr'] = $lr_anova_qm_tr;
    $lr_anova_qm_er = round(dba_anova_qm($lr_anova_sq_er, $li_anova_gl_er),3);
    $this->data['lr_anova_qm_er'] = $lr_anova_qm_er;

    //-- F. Cálculos
    if ($lr_anova_qm_er!=0){
        $this->data['lr_anova_fcalc_bl'] = round($lr_anova_qm_bl / $lr_anova_qm_er,3);
        $this->data['lr_anova_fcalc_tr'] = round($lr_anova_qm_tr / $lr_anova_qm_er,3);
    }else{
        $this->data['lr_anova_fcalc_bl'] = 0;
        $this->data['lr_anova_fcalc_tr'] = 0;
    }
  }

  // ---------------------------------------------
  // -- D.B.A.: Avaliação da precisão experimental
  // ---------------------------------------------
  private function ct_math_dba_anova_precision(){
    $this->data['lr_anova_rat_values_bl'] = '';
    $this->data['lr_anova_rat_sort_bl'] = '';
    $this->data['lr_anova_rat_accuracy_bl'] = '';
    $this->data['lr_anova_rat_color_bl'] = '';
    $this->data['lr_anova_ftb_bl'] = 0;
    $this->data['lr_anova_ftb_cv_bl'] = 0;
    $this->data['lr_anova_ftb_tr'] = 0;
    $this->data['lr_anova_ftb_cv_tr'] = 0;
    $this->data['lr_anova_rat_values_tr'] = '';
    $this->data['lr_anova_rat_sort_tr'] = '';
    $this->data['lr_anova_rat_color_tr'] = '';
    $this->data['lr_anova_rat_accuracy_tr'] = '';

    //-- Precisão dos Blocos
    $this->data['ds_anova_table_f_bl'] = $this->ds_model->get_math_anova_table_f($this->data['li_anova_gl_bl'], $this->data['li_anova_gl_er']);
    log_message('info', $this->db->last_query());

    if (count($this->data['ds_anova_table_f_bl']) > 0){
        $lr_anova_ftb_bl = $this->data['ds_anova_table_f_bl'][0]->value;
        $this->data['lr_anova_ftb_bl'] = $lr_anova_ftb_bl;

        if ($this->data['lr_stats_avg']!=0){
            $lr_anova_ftb_cv_bl = round((sqrt($this->data['lr_anova_qm_er']) / $this->data['lr_stats_avg']) * 100,2);
        }else{
            $lr_anova_ftb_cv_bl = -9999;
        }
        if (is_nan($lr_anova_ftb_cv_bl)==TRUE){
            $lr_anova_ftb_cv_bl = -9999;
        }
        $this->data['lr_anova_ftb_cv_bl'] = $lr_anova_ftb_cv_bl;

        $this->data['ds_anova_ratings_bl'] = $this->ds_model->get_math_anova_ratings($this->la_params, $lr_anova_ftb_cv_bl);
        log_message('info', $this->db->last_query());

        if( count($this->data['ds_anova_ratings_bl']) > 0){
            $this->data['lr_anova_rat_values_bl'] = 'Valores de '.$this->data['ds_anova_ratings_bl'][0]->min_value.
                                                          ' até '.$this->data['ds_anova_ratings_bl'][0]->max_value;
            $this->data['lr_anova_rat_sort_bl'] = $this->data['ds_anova_ratings_bl'][0]->sort;
            $this->data['lr_anova_rat_accuracy_bl'] = $this->data['ds_anova_ratings_bl'][0]->accuracy;
            $this->data['lr_anova_rat_color_bl'] = $this->data['ds_anova_ratings_bl'][0]->color;
        }

        //-- Precisão dos Tratamentos
        $this->data['ds_anova_table_f_tr'] = $this->ds_model->get_math_anova_table_f($this->data['li_anova_gl_tr'], $this->data['li_anova_gl_er']);
        log_message('info', $this->db->last_query());

        $lr_anova_ftb_tr = $this->data['ds_anova_table_f_tr'][0]->value;
        $this->data['lr_anova_ftb_tr'] = $lr_anova_ftb_tr;

        if ($this->data['lr_stats_avg']!=0){
            $lr_anova_ftb_cv_tr = round((sqrt($this->data['lr_anova_qm_er']) / $this->data['lr_stats_avg']) * 100,2);
        }else{
            $lr_anova_ftb_cv_tr = -9999;
        }
        if (is_nan($lr_anova_ftb_cv_tr)==TRUE){
            $lr_anova_ftb_cv_tr = -9999;
        }
        $this->data['lr_anova_ftb_cv_tr'] = $lr_anova_ftb_cv_tr;

        $this->data['ds_anova_ratings_tr'] = $this->ds_model->get_math_anova_ratings($this->la_params, $lr_anova_ftb_cv_tr);
        log_message('info', $this->db->last_query());

        if( count($this->data['ds_anova_ratings_tr']) > 0){
            $this->data['lr_anova_rat_values_tr'] = 'Valores de '.$this->data['ds_anova_ratings_tr'][0]->min_value.
                                                          ' até '.$this->data['ds_anova_ratings_tr'][0]->max_value;
            $this->data['lr_anova_rat_sort_tr'] = $this->data['ds_anova_ratings_tr'][0]->sort;
            $this->data['lr_anova_rat_accuracy_tr'] = $this->data['ds_anova_ratings_tr'][0]->accuracy;
            $this->data['lr_anova_rat_color_tr'] = $this->data['ds_anova_ratings_tr'][0]->color;
        }else{
            $this->data['lr_anova_rat_values_tr'] = '';
            $this->data['lr_anova_rat_sort_tr'] = '';
            $this->data['lr_anova_rat_accuracy_tr'] = '';
            $this->data['lr_anova_rat_color_tr'] = '';
        }
    }
  }

  //-- -------------------------------------------------------------------------

  private function fo_ds_anova($pa_params, $pi_variable){
    switch ($pi_variable){
        case MATH_AV_ATR:
            $la_result = $this->ds_model->get_math_anova_atr($pa_params);
            break;
        case MATH_AV_POL:
            $la_result= $this->ds_model->get_math_anova_pol($pa_params);
            break;
        case MATH_AV_STEMS:
            $la_result = $this->ds_model->get_math_anova_stems($pa_params);
            break;
        case MATH_AV_DIAMETERS:
            $la_result = $this->ds_model->get_math_anova_diameters($pa_params);
            break;
        case MATH_AV_HEIGHTS:
            $la_result = $this->ds_model->get_math_anova_heights($pa_params);
            break;
        case MATH_AV_INTERNODES:
            $la_result = $this->ds_model->get_math_anova_internodes($pa_params);
            break;
        case MATH_AV_TILLERS:
            $la_result = $this->ds_model->get_math_anova_tillers($pa_params);
            break;
        case MATH_AV_FLOWERING:
            $la_result = $this->ds_model->get_math_anova_flowering($pa_params);
            break;
        case MATH_AV_PITH:
            $la_result = $this->ds_model->get_math_anova_pith($pa_params);
            break;
        case MATH_AV_HOLES:
            $la_result = $this->ds_model->get_math_anova_holes($pa_params);
            break;
        case MATH_AV_DAMAGES:
            $la_result = $this->ds_model->get_math_anova_damages($pa_params);
            break;
        case MATH_AV_INFESTATION:
            $la_result = $this->ds_model->get_math_anova_infestation($pa_params);
            break;
    }
    log_message('info', $this->db->last_query());
    return $la_result;
  }

  private function fo_ds_anova_samples($pa_params, $pi_variable){
    switch ($pi_variable){
        case MATH_AV_ATR:
            $la_result = $this->ds_model->get_math_anova_atr_samples($pa_params);
            break;
        case MATH_AV_POL:
            $la_result = $this->ds_model->get_math_anova_pol_samples($pa_params);
            break;
        case MATH_AV_STEMS:
            $la_result = $this->ds_model->get_math_anova_stems_samples($pa_params);
            break;
        case MATH_AV_DIAMETERS:
            $la_result = $this->ds_model->get_math_anova_diameters_samples($pa_params);
            break;
        case MATH_AV_HEIGHTS:
            $la_result = $this->ds_model->get_math_anova_heights_samples($pa_params);
            break;
        case MATH_AV_INTERNODES:
            $la_result = $this->ds_model->get_math_anova_internodes_samples($pa_params);
            break;
        case MATH_AV_TILLERS:
            $la_result = $this->ds_model->get_math_anova_tillers_samples($pa_params);
            break;
        case MATH_AV_FLOWERING:
            $la_result = $this->ds_model->get_math_anova_flowering_samples($pa_params);
            break;
        case MATH_AV_PITH:
            $la_result = $this->ds_model->get_math_anova_pith_samples($pa_params);
            break;
        case MATH_AV_HOLES:
            $la_result = $this->ds_model->get_math_anova_holes_samples($pa_params);
            break;
        case MATH_AV_DAMAGES:
            $la_result = $this->ds_model->get_math_anova_damages_samples($pa_params);
            break;
        case MATH_AV_INFESTATION:
            $la_result = $this->ds_model->get_math_anova_infestation_samples($pa_params);
            break;
    }
    log_message('info', $this->db->last_query());
    return $la_result;
  }

  private function fo_ds_anova_repetitions($pa_params, $pi_variable){
    switch ($pi_variable){
        case MATH_AV_ATR:
            $la_result = $this->ds_model->get_math_anova_atr_repetitions($pa_params);
            break;
        case MATH_AV_POL:
            $la_result = $this->ds_model->get_math_anova_pol_repetitions($pa_params);
            break;
        case MATH_AV_STEMS:
            $la_result = $this->ds_model->get_math_anova_stems_repetitions($pa_params);
            break;
        case MATH_AV_DIAMETERS:
            $la_result = $this->ds_model->get_math_anova_diameters_repetitions($pa_params);
            break;
        case MATH_AV_HEIGHTS:
            $la_result = $this->ds_model->get_math_anova_heights_repetitions($pa_params);
            break;
        case MATH_AV_INTERNODES:
            $la_result = $this->ds_model->get_math_anova_internodes_repetitions($pa_params);
            break;
        case MATH_AV_TILLERS:
            $la_result = $this->ds_model->get_math_anova_tillers_repetitions($pa_params);
            break;
        case MATH_AV_FLOWERING:
            $la_result = $this->ds_model->get_math_anova_flowering_repetitions($pa_params);
            break;
        case MATH_AV_PITH:
            $la_result = $this->ds_model->get_math_anova_pith_repetitions($pa_params);
            break;
        case MATH_AV_HOLES:
            $la_result = $this->ds_model->get_math_anova_holes_repetitions($pa_params);
            break;
        case MATH_AV_DAMAGES:
            $la_result = $this->ds_model->get_math_anova_damages_repetitions($pa_params);
            break;
        case MATH_AV_INFESTATION:
            $la_result = $this->ds_model->get_math_anova_infestation_repetitions($pa_params);
            break;
    }
    log_message('info', $this->db->last_query());
    return $la_result;
  }








  
  
  
  

  public function rt_pdf_protocol_teste_mpdf(){
//        if(isset($_POST["hidden_div_html"]) && $_POST["hidden_div_html"] != '')
        {

            $html = $_POST["hidden_div_html"];
            $doc = new DOMDocument();
            @$doc->loadHTML($html);
            $tags = $doc->getElementsByTagName('img');
            $i=1;
            $result='';
            foreach ($tags as $tag) {
                $file_name = 'uploads/google_chart'.$i.'.png';
                    $img_Src=$tag->getAttribute('src');
                        file_put_contents($file_name, file_get_contents($img_Src));
                $res= '<img src="uploads/google_chart'.$i.'.png">';
                $result.=$res;
              $i++;
            }

            //include make_pdf
            include("mpdf60/mpdf.php");
            $mpdf=new mPDF();

            $mpdf->allow_charset_conversion = true;
            $mpdf->SetDisplayMode('fullpage');

            $mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list
            $mpdf->WriteHTML($result);
            $mpdf->Output();
        }
  }







}
