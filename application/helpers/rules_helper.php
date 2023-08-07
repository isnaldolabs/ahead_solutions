<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras usadas para validar os inputs fields dos formulários
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/

/*
| -------------------------------------------------------------------------
| rules validation:
| contém as definições das regras usadas para validações em formulários.
|
| Regras possíveis a serem configurados no Codeigniter
|
| required: Retorna FALSE se o campo está vazio.
| matches: Retorna FALSE se o campo não tiver o mesmo valor que o campo passado como parâmetro. Utilização: matches[form_item]
| is_unique: Retorna FALSE se o campo não for único na tabela e campo definidos no parâmetro. Utilização: is_unique[tabela.campo]
| min_length: Retorna FALSE se o campo for menor que o número passado como parâmetro. Utilização: min_length[6]
| max_length: Retorna FALSE se o campo for maior que o número passado como parâmetro. Utilização max_length[12]
| exact_length: Retorna FALSE se o campo não for exatamente do mesmo tamanho que o número passado como parâmetro. Utilização: exact_length[8]
| greater_than: Retorna FALSE se o campo for menor que o parâmetro ou não for numérico. Utilização: greater_than[8]
| less_than: Retorna FALSE se o campo for maior que o parâmetro ou não for numérico. Utilização: less_than[8]
| alpha: Retorna FALSE se o campo conter algo além de caracteres do alfabeto.
| alpha_numeric: Retorna FALSE se o campo contém algo além de caracteres alfanuméricos.
| alpha_dash: Retorna FALSE se o campo contém algo além de caracteres alfanuméricos, sublinhados (_) ou traços (-).
| numeric: Retorna FALSE se o campo contém algo além de caracteres numéricos.
| integer: Retorna FALSE se o campo contém algo além de um inteiro.
| decimal: Retorna FALSE se o campo contém algo além de um decimal (ele usa ‘.’ (ponto) para definir o decimal).
| is_natural: Retorna FALSE se o campo contém algo além de um número natural: 0, 1, 2, 3, etc.
| is_natural_no_zero: Retorna FALSE se o campo contém algo além de um número natural, mas sem o zero: 1, 2, 3, etc.
| valid_email: Retorna FALSE se o campo não contém um endereço de email válido.
| valid_emails: Retorna FALSE se qualquer um dos valores separados por vírgula não for um email válido.
| valid_ip: Retorna FALSE se o IP fornecido não for válido. Aceita um parâmetro opcional para especificar o formato do IP: “IPv4” ou “IPv6”.
| valid_base64: Retorna FALSE se a string fornecida contém algo além de carácteres Base64.
|
| $this->form_validation->set_rules('reg[dob]','Date of birth',array('regex_match[/^((0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)\d\d)$/]'));
|
| -------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras genéricas associadas com os inputs fields dos formulários
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_email(){
  return
    array(
      'field' => 'edt_email',
      'label' => 'e-mail',
      'rules' => 'required|trim|valid_email|min_length[5]|max_length[100]'
    );
}
function rule_new_email(){
  return
    array(
      'field' => 'edt_email',
      'label' => 'e-mail',
      'rules' => 'required|trim|valid_email|min_length[5]|max_length[100]|is_unique[auth_users.email]',
      'errors' => array('is_unique' => 'O e-mail %s já é utilizado em nossa plataforma.')
    );
}
function rule_password(){
  return
    array(
      'field' => 'edt_password',
      'label' => 'password',
      'rules' => 'required|trim|min_length[5]|max_length[32]'
    );
}
function rule_passconf(){
  return
    array(
      'field' => 'edt_passconf',
      'label' => 'password',
      'rules' => 'required|trim|min_length[5]|max_length[32]|matches[edt_password]',
      'errors' => array('matches' => 'Confirmação da senha não corresponde com a senha informada.')
    );
}
function rule_uf(){
  return
    array(
      'field' => 'edt_uf',
      'label' => 'estado',
      'rules' => 'required|trim|alpha|exact_length[2]|callback__check_uf',
      'errors' => array('alpha' => 'Use somente letras!')
    );
}
function rule_code10(){
  return
    array(
      'field' => 'edt_code',
      'label' => 'código',
      'rules' => 'required|trim|min_length[1]|max_length[10]'
    );
}
function rule_code20(){
  return
    array(
      'field' => 'edt_code',
      'label' => 'código',
      'rules' => 'required|trim|min_length[1]|max_length[20]'
    );
}
function rule_short_name10(){
  return
    array(
      'field' => 'edt_short_name',
      'label' => 'sigla',
      'rules' => 'required|trim|min_length[1]|max_length[10]'
    );
}
function rule_short_name20(){
  return
    array(
      'field' => 'edt_short_name',
      'label' => 'sigla',
      'rules' => 'required|trim|min_length[1]|max_length[20]'
    );
}
function rule_name10(){
  return
    array(
      'field' => 'edt_name',
      'label' => 'nome',
      'rules' => 'required|trim|min_length[1]|max_length[10]'
    );
}
function rule_name20(){
  return
    array(
      'field' => 'edt_name',
      'label' => 'nome',
      'rules' => 'required|trim|min_length[1]|max_length[20]'
    );
}
function rule_name30(){
  return
    array(
      'field' => 'edt_name',
      'label' => 'nome',
      'rules' => 'required|trim|min_length[1]|max_length[30]'
    );
}
function rule_name50(){
  return
    array(
      'field' => 'edt_name',
      'label' => 'nome',
      'rules' => 'required|trim|min_length[1]|max_length[50]'
    );
}
function rule_name_callback(){
  return
    array(
      'field' => 'edt_name',
      'label' => 'nome',
      'rules' => 'check_cnpj'
    );
}
function rule_name100(){
  return
    array(
      'field' => 'edt_name',
      'label' => 'nome',
      'rules' => 'required|trim|min_length[1]|max_length[100]'
    );
}
function rule_num_year(){
  return
    array(
      'field' => 'edt_num_year',
      'label' => 'ano',
      'rules' => 'required|trim|integer|exact_length[4]'
    );
}
function rule_dt_start(){
  return
    array(
      'field' => 'edt_dt_start',
      'label' => 'data de início',
      'rules' => 'required|trim|exact_length[10]'
    );
}
function rule_dt_end(){
  return
    array(
      'field' => 'edt_dt_end',
      'label' => 'data de término',
      'rules' => 'required|trim|exact_length[10]'
    );
}
function rule_dt_planned(){
  return
    array(
      'field' => 'edt_dt_planned',
      'label' => 'data da avaliação',
      'rules' => 'required|trim|exact_length[10]'
    );
}
function rule_spot_id(){
  return
    array(
      'field' => 'edt_spot_id',
      'label' => 'ponto',
      'rules' => 'required|trim|integer|greater_than[0]'
    );
}
function rule_notes(){
  return
    array(
      'field' => 'edt_notes',
      'label' => 'Observações',
      'rules' => 'required'
    );
}
function rule_note_at(){
  return
    array(
      'field' => 'edt_note_at',
      'label' => 'data da observação',
      'rules' => 'required|trim|exact_length[10]'
    );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela AUTH_GROUPS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_active(){
  return
    array(
      'field' => 'edt_active',
      'label' => 'ativo',
      'rules' => 'integer'
    );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela AUTH_USERS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_nick_name(){
  return
    array(
      'field' => 'edt_nick_name',
      'label' => 'Apelido',
      'rules' => 'required|trim|min_length[2]|max_length[30]'
    );
}
function rule_full_name(){
  return
    array(
      'field' => 'edt_full_name',
      'label' => 'Nome completo',
      'rules' => 'required|trim|min_length[2]|max_length[100]'
    );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela CURRENCIES_RATES
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_dt_rate(){
  return
    array(
      'field' => 'edt_dt_rate',
      'label' => 'data da cotação',
      'rules' => 'required|trim|exact_length[10]'
    );
}
function rule_currency_rate(){
  return
    array(
      'field' => 'edt_rate',
      'label' => 'valor do índice',
      'rules' => 'required'
    );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela DOSES
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_dose(){
  return
    array(
      'field' => 'edt_dose',
      'label' => 'quantidade da dose',
      'rules' => 'required'
    );
}
function rule_dose_cost(){
  return
    array(
      'field' => 'edt_dose_cost',
      'label' => 'valor da dose',
      'rules' => 'required'
    );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela PROTOCOLS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_title(){
  return
    array(
      'field' => 'edt_title',
      'label' => 'título',
      'rules' => 'required|trim|min_length[1]|max_length[100]'
    );
}
function rule_goal(){
  return
    array(
      'field' => 'edt_goal',
      'label' => 'objetivos',
      'rules' => 'required|trim|min_length[1]|max_length[150]'
    );
}
function rule_conclusion(){
  return
    array(
      'field' => 'edt_conclusion',
      'label' => 'Conclusões',
      'rules' => 'required'
    );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela PLOTS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_plot_code(){
  return
    array(
      'field' => 'edt_plot_code',
      'label' => 'Talhão',
      'rules' => 'required|trim|min_length[1]|max_length[10]'
    );
}
function rule_block_code(){
  return
    array(
      'field' => 'edt_block_code',
      'label' => 'Gleba',
      'rules' => 'required|trim|min_length[1]|max_length[10]'
    );
}
/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela PARCELS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_parcel_code(){
  return
    array(
      'field' => 'edt_parcel_code',
      'label' => 'Parcela',
      'rules' => 'required|trim|min_length[1]|max_length[10]'
    );
}
function rule_area(){
  return
    array(
      'field' => 'edt_area',
      'label' => 'área',
      'rules' => 'required'
    );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela WEATHERS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_station_id(){
  return
    array(
      'field' => 'edt_station_id',
      'label' => 'Posto Meteorológico',
      'rules' => 'required'
    );
}
function rule_dt_weather(){
  return
    array(
      'field' => 'edt_dt_weather',
      'label' => 'data',
      'rules' => 'required|trim|exact_length[10]'
    );
}
function rule_pluviometry(){
  return
    array(
      'field' => 'edt_pluviometry',
      'label' => 'quantidade de chuva',
      'rules' => 'required'
    );
}
function rule_temperature(){
  return
    array(
      'field' => 'edt_temperature',
      'label' => 'temperatura',
      'rules' => 'required'
    );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_ANALYZE
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_dt_sample(){
  return
    array(
      'field' => 'edt_dt_sample',
      'label' => 'data da amostra',
      'rules' => 'required|trim|exact_length[10]'
    );
}
function rule_num_brix(){
  return
    array(
      'field' => 'edt_num_brix',
      'label' => 'Brix (%)',
      'rules' => 'required'
    );
}
function rule_num_lai(){
  return
    array(
      'field' => 'edt_num_lai',
      'label' => 'Lai (%)',
      'rules' => 'required'
    );
}
function rule_num_pbu(){
  return
    array(
      'field' => 'edt_num_pbu',
      'label' => 'Pbu (g)',
      'rules' => 'required'
    );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_ANALYZE
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_num_weight(){
  return
    array(
      'field' => 'edt_num_weight',
      'label' => 'peso da amostra',
      'rules' => 'required|trim'
    );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_WEIGHT
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_meters(){
  return
    array(
      'field' => 'edt_meters',
      'label' => 'metros',
      'rules' => 'required|trim|integer|greater_than[0]'
    );
}
function rule_streets(){
  return
    array(
      'field' => 'edt_streets',
      'label' => 'ruas',
      'rules' => 'required|trim|integer|greater_than[0]'
    );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_WEIGHT
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_min_value(){
  return
    array(
      'field' => 'edt_min_value',
      'label' => 'Valor Mínimo',
      'rules' => 'required|trim|integer|greater_than[-1]'
    );
}
function rule_max_value(){
  return
    array(
      'field' => 'edt_max_value',
      'label' => 'Valor Máximo',
      'rules' => 'required|trim|integer|greater_than[0]'
    );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_STEMS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_num_stems(){
  return
    array(
      'field' => 'edt_num_stems',
      'label' => 'colmos da amostra',
      'rules' => 'required|trim|greater_than[0]'
    );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_DIAMETERS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_num_diameter(){
  return
    array(
      'field' => 'edt_num_diameter',
      'label' => 'diâmetro da amostra',
      'rules' => 'required|trim|greater_than[0]'
    );
}
/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_HEIGHTS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_num_height(){
  return
    array(
      'field' => 'edt_num_height',
      'label' => 'altura da amostra',
      'rules' => 'required|trim'
    );
}
/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_INTERNODES
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_num_node(){
  return
    array(
      'field' => 'edt_num_node',
      'label' => 'entrenós da amostra',
      'rules' => 'required|trim'
    );
}
/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_FLOWERING
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_num_flower(){
  return
    array(
      'field' => 'edt_num_flower',
      'label' => 'florescimento da amostra',
      'rules' => 'required|trim'
    );
}
/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_PITH
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_num_pith(){
  return
    array(
      'field' => 'edt_num_pith',
      'label' => 'isoporização da amostra',
      'rules' => 'required|trim'
    );
}
/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_TILLERS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_num_tiller(){
  return
    array(
      'field' => 'edt_num_tiller',
      'label' => 'perfilhos',
      'rules' => 'required|trim'
    );
}
function rule_num_gap(){
  return
    array(
      'field' => 'edt_num_gap',
      'label' => 'Falhas',
      'rules' => 'required|trim'
    );
}
/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_INFESTATION
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_num_infestation(){
  return
    array(
      'field' => 'edt_num_infestation',
      'label' => 'infestações da amostra',
      'rules' => 'required|trim'
    );
}
/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_DAMAGES
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_num_damage(){
  return
    array(
      'field' => 'edt_num_damage',
      'label' => 'danos da amostra',
      'rules' => 'required|trim'
    );
}
/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_COMPOUNDS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_num_compound(){
  return
    array(
      'field' => 'edt_num_compound',
      'label' => 'valor do composto',
      'rules' => 'required|trim'
    );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_DISEASES
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_disease_id(){
  return
    array(
      'field' => 'edt_disease_id',
      'label' => 'doença',
      'rules' => 'required|trim|integer|greater_than[0]'
    );
}
/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_PESTS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_pest_id(){
  return
    array(
      'field' => 'edt_pest_id',
      'label' => 'praga',
      'rules' => 'required|trim|integer|greater_than[0]'
    );
}
/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela SAMPLES_HOLES
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_num_hole(){
  return
    array(
      'field' => 'edt_num_hole',
      'label' => 'furos da amostra',
      'rules' => 'required|trim'
    );
}
/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras referentes à tabela PROTOCOLS_PRODUCTS_COMPOUNDS
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function rule_guarantee(){
  return
    array(
      'field' => 'edt_guarantee',
      'label' => 'valor da Guarantia',
      'rules' => 'required'
    );
}
