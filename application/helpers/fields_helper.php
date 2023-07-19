<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos COMUNS à todas às tabelas
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_license_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'license_id','id' => 'license_id','label' => 'Licença','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 6,'row' => FALSE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_code($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'code','id' => 'code','label' => 'Código','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_code10($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'code','id' => 'code','label' => 'Código','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_code20($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'code','id' => 'code','label' => 'Código','required' => TRUE,'optional' => FALSE,'size' => 20,'maxlength' => 20,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_short_name5($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'short_name','id' => 'short_name','label' => 'Sigla','required' => TRUE,'optional' => FALSE,'size' => 5,'maxlength' => 5,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 1,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_short_name10($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'short_name','id' => 'short_name','label' => 'Sigla','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_short_name20($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'short_name','id' => 'short_name','label' => 'Sigla','required' => TRUE,'optional' => FALSE,'size' => 20,'maxlength' => 20,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_name10($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'name','id' => 'name','label' => 'Nome','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_name20($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'name','id' => 'name','label' => 'Nome','required' => TRUE,'optional' => FALSE,'size' => 20,'maxlength' => 20,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_name30($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'name','id' => 'name','label' => 'Nome','required' => TRUE,'optional' => FALSE,'size' => 30,'maxlength' => 30,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_name50($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'name','id' => 'name','label' => 'Nome','required' => TRUE,'optional' => FALSE,'size' => 50,'maxlength' => 50,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_name100($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'name','id' => 'name','label' => 'Nome','required' => TRUE,'optional' => FALSE,'size' => 100,'maxlength' => 100,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 8,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_description100($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'description','id' => 'description','label' => 'Descrição','required' => TRUE,'optional' => FALSE,'size' => 100,'maxlength' => 100,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 8,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_active($poValue=NULL, $poError=NULL){
  return array('type' => 'checkbox','name' => 'active','id' => 'active','label' => 'Registro ativo?','required' => TRUE,'optional' => FALSE,'checked' => (($poValue==NULL || $poValue==0)?'':'checked'),'description' => 'active description','col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'id','id' => 'id','label' => '#id','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 1,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_licensor_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'licensor_id','id' => 'licensor_id','label' => 'Licenciador','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}

/* ----------------------- ----------------------- */
function fl_distance($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'distance','id' => 'distance','label' => 'Distância','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_area($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'area','id' => 'area','label' => 'Área','required' => FALSE,'optional' => TRUE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'readonly' => 'readonly','style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_total_area($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'total_area','id' => 'total_area','label' => 'Área Total','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_production_area($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'production_area','id' => 'production_area','label' => 'Área de Produção','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_tons($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'tons','id' => 'tons','label' => 'Toneladas','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_cut_tons($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'cut_tons','id' => 'cut_tons','label' => 'Toneladas Cortadas','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_dt_start($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'dt_start','id' => 'dt_start','label' => 'Data de início','required' => TRUE,'optional' => FALSE,'value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_dt_end($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'dt_end','id' => 'dt_end','label' => 'Data de término','required' => TRUE,'optional' => FALSE,'value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}

/* ----------------------- ----------------------- */
function fl_unit_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'unit_id','id' => 'unit_id','label' => 'Unidade de Negócio','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_group_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'group_id','id' => 'group_id','label' => 'Grupo','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => FALSE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_user_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'user_id','id' => 'user_id','label' => 'Usuário','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 6,'row' => FALSE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_season_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'season_id','id' => 'season_id','label' => 'Código da Safra','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => FALSE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_line_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'line_id','id' => 'line_id','label' => 'Linha','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_subline_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'subline_id','id' => 'subline_id','label' => 'Sublinha','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_applicant_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'applicant_id','id' => 'applicant_id','label' => 'Solicitante','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_currency_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'currency_id','id' => 'currency_id','label' => 'Código','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_rate_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'rate_id','id' => 'rate_id','label' => 'Código','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => FALSE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_cutting_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'cutting_id','id' => 'cutting_id','label' => 'Estágio de Corte','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_environment_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'environment_id','id' => 'environment_id','label' => 'Ambiente','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_responsible_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'responsible_id','id' => 'responsible_id','label' => 'Responsável','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_soil_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'soil_id','id' => 'soil_id','label' => 'Solo','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_mode_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'mode_id','id' => 'mode_id','label' => 'Modo de Aplicação','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_variety_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'variety_id','id' => 'variety_id','label' => 'Variedade','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_product_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'product_id','id' => 'product_id','label' => 'Produto','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_farm_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'farm_id','id' => 'farm_id','label' => 'Código','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_designing_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'designing_id','id' => 'designing_id','label' => 'Delineamento','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_factor_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'factor_id','id' => 'factor_id','label' => 'Fator D.Q.L.','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_factor_id_c($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'factor_id_c','id' => 'factor_id_c','label' => 'Fator D.Q.L. Coluna','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_factor_id_q($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'factor_id_q','id' => 'factor_id_q','label' => 'Fator D.Q.L. Fila','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_scheme_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'scheme_id','id' => 'scheme_id','label' => 'Esquema de Plantio','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_spacing_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'spacing_id','id' => 'spacing_id','label' => 'Espaçamento','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_maturity_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'maturity_id','id' => 'maturity_id','label' => 'Maturação','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_idealizer_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'idealizer_id','id' => 'idealizer_id','label' => 'Idealizador','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_variable_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'variable_id','id' => 'variable_id','label' => 'Variável','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_team_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'team_id','id' => 'team_id','label' => 'Equipe','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_plot_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'plot_id','id' => 'plot_id','label' => 'Talhão','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_protocol_plot_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'protocol_plot_id','id' => 'protocol_plot_id','label' => 'Talhão','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_parcel_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'parcel_id','id' => 'parcel_id','label' => 'Parcela','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_treatment_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'treatment_id','id' => 'treatment_id','label' => 'Tratamento','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_measure_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'measure_id','id' => 'measure_id','label' => 'Código','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_region_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'region_id','id' => 'region_id','label' => 'Região','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_dose_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'dose_id','id' => 'dose_id','label' => 'Código','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_protocol_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'protocol_id','id' => 'protocol_id','label' => 'Protocolo','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_manufacturer_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'manufacturer_id','id' => 'manufacturer_id','label' => 'Fabricante','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_description_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'description_id','id' => 'description_id','label' => 'Descrição','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_method_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'method_id','id' => 'method_id','label' => 'Método','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_check_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'check_id','id' => 'check_id','label' => 'Cronograma','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_weather_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'weather_id','id' => 'weather_id','label' => 'Clima','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_test_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'test_id','id' => 'test_id','label' => 'Tipo do Ensaio','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_status($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'status','id' => 'status','label' => 'Status','required' => FALSE,'placeholder' => '','maxlength' => 10,'readonly' => 'readonly','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_type_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'type_id','id' => 'type_id','label' => 'Tipo','required' => FALSE,'placeholder' => '','maxlength' => 10,'readonly' => 'readonly','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_methodology_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'methodology_id','id' => 'methodology_id','label' => 'Metodologia','required' => FALSE,'placeholder' => '','maxlength' => 10,'readonly' => 'readonly','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_analyze_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'analyze_id','id' => 'analyze_id','label' => 'Amostra','required' => FALSE,'placeholder' => '','maxlength' => 10,'readonly' => 'readonly','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_sketch_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'sketch_id','id' => 'sketch_id','label' => 'Croqui','required' => FALSE,'placeholder' => '','maxlength' => 10,'readonly' => 'readonly','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_weight_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'weight_id','id' => 'weight_id','label' => 'Amostra de Peso','required' => FALSE,'placeholder' => '','maxlength' => 10,'value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_stem_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'stem_id','id' => 'stem_id','label' => 'Amostra de Colmo','required' => FALSE,'placeholder' => '','maxlength' => 10,'value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_height_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'height_id','id' => 'height_id','label' => 'Amostra de Altura','required' => FALSE,'placeholder' => '','maxlength' => 10,'value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_diameter_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'diameter_id','id' => 'diameter_id','label' => 'Amostra do Diâmetro','required' => FALSE,'placeholder' => '','maxlength' => 10,'value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_node_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'node_id','id' => 'node_id','label' => 'Amostra do Entrenó','required' => FALSE,'placeholder' => '','maxlength' => 10,'value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_gap_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'gap_id','id' => 'gap_id','label' => 'Amostra do Falhas','required' => FALSE,'placeholder' => '','maxlength' => 10,'value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_flower_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'flower_id','id' => 'flower_id','label' => 'Amostra de Florescimento','required' => FALSE,'placeholder' => '','maxlength' => 10,'value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_pith_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'pith_id','id' => 'pith_id','label' => 'Amostra do Isoporização','required' => FALSE,'placeholder' => '','maxlength' => 10,'value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_tiller_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'tiller_id','id' => 'tiller_id','label' => 'Amostra de Perfilho','required' => FALSE,'placeholder' => '','maxlength' => 10,'value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_infestation_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'infestation_id','id' => 'infestation_id','label' => 'Amostra do Diâmetro','required' => FALSE,'placeholder' => '','maxlength' => 10,'value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_file_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'file_id','id' => 'file_id','label' => 'Anexo','required' => FALSE,'placeholder' => '','maxlength' => 10,'value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_spot_id($poValue=NULL, $poError=NULL){
  return array('type' => 'number','name' => 'spot_id','id' => 'spot_id','label' => 'Ponto','required' => TRUE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'size' => 4,'maxlength' => 4,'col' => 1,'row' => TRUE,'style' => 'width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}
function fl_misc_id($poValue=NULL, $poError=NULL){
  return array('type' => 'number','name' => 'misc_id','id' => 'misc_id','label' => 'Diverso','required' => TRUE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'size' => 4,'maxlength' => 4,'col' => 4,'row' => TRUE,'style' => 'width: 150px;','error_msg' => ($poError==NULL?'':$poError));
}
function fl_compound_id($poValue=NULL, $poError=NULL){
  return array('type' => 'number','name' => 'compound_id','id' => 'compound_id','label' => 'Composto','required' => TRUE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'size' => 4,'maxlength' => 4,'col' => 4,'row' => TRUE,'style' => 'width: 150px;','error_msg' => ($poError==NULL?'':$poError));
}
function fl_damage_id($poValue=NULL, $poError=NULL){
  return array('type' => 'number','name' => 'damage_id','id' => 'damage_id','label' => 'Dano','required' => TRUE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'size' => 4,'maxlength' => 4,'col' => 4,'row' => TRUE,'style' => 'width: 150px;','error_msg' => ($poError==NULL?'':$poError));
}
function fl_setting_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'setting_id','id' => 'setting_id','label' => 'Configuração','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_sample_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'sample_id','id' => 'sample_id','label' => 'Amostra','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_disease_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'disease_id','id' => 'disease_id','label' => 'Doença','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_pest_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'pest_id','id' => 'pest_id','label' => 'Praga','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_hole_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'hole_id','id' => 'hole_id','label' => 'Furos','required' => FALSE,'placeholder' => '','maxlength' => 10,'readonly' => 'readonly','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_rating_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'rating_id','id' => 'rating_id','label' => 'Classificação','required' => FALSE,'placeholder' => '','maxlength' => 10,'readonly' => 'readonly','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_note_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'note_id','id' => 'note_id','label' => 'Observações','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 12,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_notes($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'notes','id' => 'notes','label' => 'Observações','required' => FALSE,'optional' => TRUE,'size' => 2000,'maxlength' => 2000,'placeholder' => 'Insira suas observações aqui','value' => ($poValue==NULL?'':$poValue),'col' => 12,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela AUTH_GROUPS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_groups_is_admin($poValue=NULL, $poError=NULL){
  return array('type' => 'checkbox','name' => 'is_admin','id' => 'is_admin','label' => 'Grupo administrativo?','required' => TRUE,'optional' => FALSE,'checked' => (($poValue==NULL || $poValue==0)?'':'checked'),'description' => 'is a administrative group','col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela AUTH_USERS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_users_email($poValue=NULL, $poError=NULL){
  return array('type' => 'email','name' => 'email','id' => 'email','label' => 'E-mail','required' => TRUE,'optional' => FALSE,'size' => 100,'maxlength' => 100,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 6,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_users_password($poValue=NULL, $poError=NULL){
  return array('type' => 'password','name' => 'password','id' => 'password','label' => 'Senha','required' => TRUE,'optional' => FALSE,'size' => 255,'maxlength' => 255,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 3,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_users_nick_name($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'nick_name','id' => 'nick_name','label' => 'Apelido','required' => TRUE,'optional' => FALSE,'size' => 30,'maxlength' => 30,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 3,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_users_full_name($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'full_name','id' => 'full_name','label' => 'Nome completo','required' => TRUE,'optional' => FALSE,'size' => 100,'maxlength' => 100,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 6,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_users_group_id($poValue=NULL, $poError=NULL){
  return array('type' => 'select','name' => 'group_id','id' => 'group_id','label' => 'Grupo','required' => FALSE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_spot($poValue=NULL, $poError=NULL){
  return array('type' => 'number','name' => 'spot','id' => 'spot','label' => 'Ponto','required' => TRUE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'size' => 4,'maxlength' => 4,'col' => 4,'row' => TRUE,'style' => 'width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela SEASONS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_seasons_num_year($poValue=NULL, $poError=NULL){
  return array('type' => 'number','name' => 'num_year','id' => 'num_year','label' => 'Ano Safra','required' => TRUE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'size' => 4,'maxlength' => 4,'col' => 4,'row' => TRUE,'style' => 'width: 125px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela PLOTS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_plot_code($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'plot_code','id' => 'plot_code','label' => 'Talhão','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_block_code($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'block_code','id' => 'block_code','label' => 'Gleba','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_dt_planting($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'dt_planting','id' => 'dt_planting','label' => 'Data de Plantio','required' => TRUE,'optional' => FALSE,'value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_dt_cutting($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'dt_cutting','id' => 'dt_cutting','label' => 'Data do Corte Anterior','required' => TRUE,'optional' => FALSE,'value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela PARCELS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_parcel_code($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'parcel_code','id' => 'parcel_code','label' => 'Parcela','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela CURRENCIES_RATES
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_dt_rate($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'dt_rate','id' => 'dt_rate','label' => 'Data','required' => TRUE,'optional' => FALSE,'value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_rate($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'rate','id' => 'rate','label' => 'Valor','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela PROTOCOLS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_title($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'title','id' => 'title','label' => 'Título','required' => TRUE,'optional' => FALSE,'size' => 100,'maxlength' => 100,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 12,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_goal($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'goal','id' => 'goal','label' => 'Objetivo','required' => TRUE,'optional' => FALSE,'size' => 150,'maxlength' => 150,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 12,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_dt_end_planned($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'dt_end_planned','id' => 'dt_end_planned','label' => 'Data de término planejada','required' => TRUE,'optional' => FALSE,'value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_dt_planned($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'dt_planned','id' => 'dt_planned','label' => 'Data Planejada','required' => TRUE,'optional' => FALSE,'value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_dt_applied($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'dt_applied','id' => 'dt_applied','label' => 'Data Aplicada','required' => TRUE,'optional' => FALSE,'value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_repetitions($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'repetitions','id' => 'repetitions','label' => 'Repetições','required' => FALSE,'size' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'maxlength' => 10,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_conclusion($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'conclusion','id' => 'conclusion','label' => 'Conclusões','required' => FALSE,'optional' => TRUE,'size' => 2000,'maxlength' => 2000,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 12,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_rating($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'rating','id' => 'rating','label' => 'Classificação','required' => FALSE,'size' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'col' => 2,'row' => TRUE,'maxlength' => 10,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela WEATHERS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_station_id($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'station_id','id' => 'station_id','label' => 'Posto Meteorológico','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_dt_weather($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'dt_weather','id' => 'dt_weather','label' => 'Data','required' => TRUE,'optional' => FALSE,'value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_pluviometry($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'pluviometry','id' => 'pluviometry','label' => 'Pluviometria','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_temperature($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'temperature','id' => 'temperature','label' => 'Temperatura','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_temperature_min($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'temperature_min','id' => 'temperature_min','label' => 'Temperatura Mín.','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_temperature_max($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'temperature_max','id' => 'temperature_max','label' => 'Temperatura Máx.','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela SAMPLES_ANALYZE
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_dt_sample($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'dt_sample','id' => 'dt_sample','label' => 'Data','required' => TRUE,'optional' => FALSE,'value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_num_brix($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_brix','id' => 'num_brix','label' => 'Brix','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_num_lai($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_lai','id' => 'num_lai','label' => 'Lai','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_num_pbu($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_pbu','id' => 'num_pbu','label' => 'Pbu','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela PLANTING_SCHEMES
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_streets($poValue=NULL, $poError=NULL){
  return array('type' => 'number','name' => 'streets','id' => 'streets','label' => 'Pontos/Ruas','required' => TRUE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'size' => 4,'maxlength' => 4,'col' => 4,'row' => TRUE,'style' => 'width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}
function fl_meters($poValue=NULL, $poError=NULL){
  return array('type' => 'number','name' => 'meters','id' => 'meters','label' => 'Metros','required' => TRUE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'size' => 4,'maxlength' => 4,'col' => 4,'row' => TRUE,'style' => 'width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela math_anova_ratings
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_min_value($poValue=NULL, $poError=NULL){
  return array('type' => 'number','name' => 'min_value','id' => 'min_value','label' => 'Valor Mínimo','required' => TRUE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'size' => 4,'maxlength' => 4,'col' => 4,'row' => TRUE,'style' => 'width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}
function fl_max_value($poValue=NULL, $poError=NULL){
  return array('type' => 'number','name' => 'max_value','id' => 'max_value','label' => 'Valor Máximo','required' => TRUE,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'optional' => FALSE,'size' => 4,'maxlength' => 4,'col' => 4,'row' => TRUE,'style' => 'width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela SAMPLES_WEIGHT
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_num_weight($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_weight','id' => 'num_weight','label' => 'Peso','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 1,'row' => TRUE,'style' => 'max-width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela SAMPLES_STEMS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_num_stems($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_stems','id' => 'num_stems','label' => 'Colmos','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 1,'row' => TRUE,'style' => 'max-width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela SAMPLES_DIAMETERS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_num_diameter($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_diameter','id' => 'num_diameter','label' => 'Diâmetro','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 1,'row' => TRUE,'style' => 'max-width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela SAMPLES_HEIGHTS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_num_height($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_height','id' => 'num_height','label' => 'Altura','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 1,'row' => TRUE,'style' => 'max-width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela SAMPLES_HEIGHTS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_num_node($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_node','id' => 'num_node','label' => 'Entrenós','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 1,'row' => TRUE,'style' => 'max-width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela SAMPLES_FLOWERING
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_num_flower($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_flower','id' => 'num_flower','label' => 'Flores','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 1,'row' => TRUE,'style' => 'max-width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela SAMPLES_PITH
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_num_pith($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_pith','id' => 'num_pith','label' => 'Isoporos','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 1,'row' => TRUE,'style' => 'max-width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela SAMPLES_TILLERS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_num_tiller($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_tiller','id' => 'num_tiller','label' => 'Perfilhos','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 1,'row' => TRUE,'style' => 'max-width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}
function fl_num_gap($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_gap','id' => 'num_gap','label' => 'Falha','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 1,'row' => TRUE,'style' => 'max-width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela SAMPLES_INFESTATION
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_num_infestation($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_infestation','id' => 'num_infestation','label' => 'Infestação','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 1,'row' => TRUE,'style' => 'max-width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela PROTOCOLS_PRODUCTS_SETTINGS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_dose($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'dose','id' => 'dose','label' => 'Dose','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_purchase_dt($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'purchase_dt','id' => 'purchase_dt','label' => 'Data de Compra','required' => TRUE,'optional' => FALSE,'value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_dose_cost($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'dose_cost','id' => 'dose_cost','label' => 'Custo','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela PROTOCOLS_PRODUCTS_COMPOUNDS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_guarantee($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'guarantee','id' => 'guarantee','label' => 'Garantia','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela SAMPLES_DAMAGES
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_num_damage($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_damage','id' => 'num_damage','label' => 'Danos','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 1,'row' => TRUE,'style' => 'max-width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela SAMPLES_COMPOUNDS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_num_compound($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_compound','id' => 'num_compound','label' => 'Valor','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 1,'row' => TRUE,'style' => 'max-width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela SAMPLES_HOLES
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_num_hole($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'num_hole','id' => 'num_hole','label' => 'Furos','required' => TRUE,'optional' => FALSE,'size' => 10,'maxlength' => 10,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 1,'row' => TRUE,'style' => 'max-width: 100px;','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela DISEASES
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_agent($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'agent','id' => 'agent','label' => 'Agente Causador','required' => TRUE,'optional' => FALSE,'size' => 50,'maxlength' => 50,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 4,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela VARIETIES
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_protection_term($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'protection_term','id' => 'protection_term','label' => 'Prazo de Proteção','required' => TRUE,'optional' => FALSE,'size' => 50,'maxlength' => 50,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
function fl_royalties($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'royalties','id' => 'royalties','label' => 'Royalties','required' => TRUE,'optional' => FALSE,'size' => 50,'maxlength' => 50,'placeholder' => '','value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Atributos referentes à tabela PROTOCOLS_NOTES
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fl_note_at($poValue=NULL, $poError=NULL){
  return array('type' => 'text','name' => 'note_at','id' => 'note_at','label' => 'Data da Observação','required' => TRUE,'optional' => FALSE,'value' => ($poValue==NULL?'':$poValue),'col' => 2,'row' => TRUE,'style' => '','error_msg' => ($poError==NULL?'':$poError));
}
