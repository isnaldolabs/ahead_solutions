<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Informações de sistema
| -------------------------------------------------------------------------
*/
/* Author */
define('SYSTEM_NAME',   'Ahead Agro');
define('COPYRIGHT',     'Ahead Solutions');
define('LOGO_MARCA',    'assets/images/logo/brand.png');
define('ICON_MARCA',    'assets/images/logo/favicon-32x32.png');
define('FAVICON',       'assets/images/logo/favicon-32x32.png');
define('ICON_DEFAULT',  'assets/images/default/user.png');
define('ICON_EMPTY',    'assets/images/default/empty.png');
define('VERSION',       'v2.05.20230625.1630');

/* Integraton */
define('DELIMITER_CHAR', ';');

/*
| -------------------------------------------------------------------------
| Flashdata
|   Exemplo para gravar:
|     $this->session->set_flashdata(FLASH_MSG, array('type'=>TYPE_SUCCESS,
|                                                    'text'=>'Safra foi excluída com sucesso.'));
|
|   Exemplos para ler:
|     (1) $this->session->flashdata(FLASH_MSG);
|     (2) $this->data['flash_message'] = fsFlashMessage($this->session->flashdata(MSG_EVENT));
| -------------------------------------------------------------------------
*/
/* Class */
define('MSG_EVENT',  'msg_event');
define('MSG_RULE',   'msg_field');
define('MSG_ACCESS', 'msg_access');

define('MSG_SUCCESS_SAVING', 'Registro gravado com sucesso.'.'</br>');
define('MSG_FAILURE_SAVING', 'Houve uma falha ao gravar o registro.'.'</br>');

define('MSG_SUCCESS_DELETING', 'O registro foi excluído com sucesso.'.'</br>');
define('MSG_FAILURE_DELETING', 'Houve uma falha ao excluir o registro.'.'</br>');

define('MSG_RECORD_NOT_FOUND', 'Registro não localizado!');

define('MSG_SUCCESS_DOWNLOADING',   'Download realizado com sucesso.'.'</br>');
define('MSG_FAILURE_DOWNLOADING',   'Houve um erro ao fazer o download do arquivo.'.'</br>');

/* Types */
define('TYPE_PRIMARY',   1);
define('TYPE_SECONDARY', 2);
define('TYPE_SUCCESS',   3);
define('TYPE_INFO',      4);
define('TYPE_WARNING',   5);
define('TYPE_DANGER',    6);

/*
| -------------------------------------------------------------------------
| Interface
| -------------------------------------------------------------------------
*/
/* Pagination entre os registros */
define('PAGINATION_ACTIVE', 'Y');

/* Usadas para a construção dos botões de cada form */
define('BTN_POST_SAVE',   'btnSave');
define('BTN_POST_RETURN', 'btnReturn');
define('BTN_SAVE',   '<input type="submit" name="btnSave" id="btnSave" class="btn btn-primary me-2" style="width: 100px;" value="Gravar" />');
define('BTN_RETURN', '<input type="submit" name="btnReturn" id="btnReturn" class="btn btn-secondary" style="width: 100px;" value="Retornar" />');

define('ICO_NEW', '<i class="fe fe-plus me-2"></i>');
define('ICO_UPD', '<i class="fe fe-edit-3 me-2"></i>');

/* HTMLs pré-definidos para a classe set_error_delimiters */
define('HTML_ERROR_PREFIX', '<p class="small text-red" style="padding: 0px; margin: 0px;">');
define('HTML_ERROR_SUFFIX', '</p>');

//define('PADDING_NAV_ITEM', 'style="padding-left: 0.5rem;padding-right: 0.5rem;"');
define('PADDING_NAV_ITEM', '');

/*
| -------------------------------------------------------------------------
| Usadas para identificar os atributos da sessão atual.
| -------------------------------------------------------------------------
*/
define('SESS_USER',                     'user');
define('SESS_EMAIL',                    'email');
define('SESS_NICK_NAME',                'nick_name');
define('SESS_FULL_NAME',                'full_name');
define('SESS_LEVEL',                    'level');
define('SESS_LEVEL_NAME',               'level_name');
define('SESS_LOGGED',                   'logged');
define('SESS_IS_ADMIN',                 'is_admin');
define('SESS_LICENSE',                  'license');
define('SESS_LICENSE_NAME',             'license_name');
define('SESS_LICENSE_SHORT_NAME',       'license_short_name');
define('SESS_SEASON',                   'season');
define('SESS_SEASON_NAME',              'season_name');
define('SESS_LINES_PAGE',               'lines_page');
define('SESS_FARM',                     'farm');
define('SESS_FARM_CODE',                'farm_code');
define('SESS_FARM_NAME',                'farm_name');
define('SESS_PLOT_ID',                  'plot_id');
define('SESS_PLOT_CODE',                'plot_code');
define('SESS_PROTOCOL',                 'protocol');
define('SESS_PROTOCOL_TITLE',           'protocol_title');
define('SESS_PROTOCOL_TYPE_ID',         'protocol_type_id');
define('SESS_PROTOCOL_TREATMENT_ID',    'protocol_treatment_id');
define('SESS_PROTOCOL_DESIGNING_ID',    'protocol_designing_id');
define('SESS_PROTOCOL_FILTER_STATUS',   'protocol_filter_status');
define('SESS_SHARED_INTEGRATION',       'shared_integration');
define('SESS_PROTOCOL_VIEW_OPTION',     'protocol_view_option');

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Source form to integrations are related to Table shared_integrations and integrations process
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
define('SHD_SAMPLES_ANALYZE',       1);
define('SHD_SAMPLES_WEIGHT',        2);
define('SHD_SAMPLES_STEMS',         3);
define('SHD_SAMPLES_HEIGHT',        4);
define('SHD_SAMPLES_DIAMETER',      5);
define('SHD_SAMPLES_INTERNODES',    6);
define('SHD_SAMPLES_FLOWERING',     7);
define('SHD_SAMPLES_PITH',          8);
define('SHD_SAMPLES_TILLERS',       9);
define('SHD_SAMPLES_INFESTATION',   10);
define('SHD_SAMPLES_HOLES',         11);
define('SHD_SAMPLES_DAMAGES',       12);
define('SHD_SAMPLES_COMPOUNDS',     13);
define('SHD_SAMPLES_DISEASES',      14);
define('SHD_SAMPLES_PESTS',         15);
define('SHD_SAMPLES_GAPS',          16);

define('SHD_DAT_SOILS',                 51);
define('SHD_DAT_VARIETIES',             52);
define('SHD_DAT_GEOGRAPHICAL_UNITS',    53);
define('SHD_DAT_TEAMS',                 54);
define('SHD_DAT_PRODUCTS',              55);
define('SHD_DAT_COMPUNDS',              56);
define('SHD_DAT_DISEASES',              57);
define('SHD_DAT_PESTS',                 58);

define('FIELD_INPUT_FORM',  'edt_import_sample');
define('INTEGRATION_PATH',  './uploads/integration');

define('FILE_SAMPLES_ANALYZE',      'samples_analyze.csv');
define('FILE_SAMPLES_WEIGHT',       'samples_weight.csv');
define('FILE_SAMPLES_STEMS',        'samples_stems.csv');
define('FILE_SAMPLES_HEIGHT',       'samples_height.csv');
define('FILE_SAMPLES_DIAMETER',     'samples_diameter.csv');
define('FILE_SAMPLES_INTERNODES',   'samples_internodes.csv');
define('FILE_SAMPLES_FLOWERING',    'samples_flowering.csv');
define('FILE_SAMPLES_PITH',         'samples_pith.csv');
define('FILE_SAMPLES_TILLERS',      'samples_tillers.csv');
define('FILE_SAMPLES_INFESTATION',  'samples_infestation.csv');
define('FILE_SAMPLES_HOLES',        'samples_holes.csv');
define('FILE_SAMPLES_DAMAGES',      'samples_damages.csv');
define('FILE_SAMPLES_COMPOUNDS',    'samples_compounds.csv');
define('FILE_SAMPLES_DISEASES',     'samples_diseases.csv');
define('FILE_SAMPLES_PESTS',        'samples_pests.csv');
define('FILE_SAMPLES_GAPS',         'samples_gaps.csv');

define('FILE_DAT_SOILS',                'dat_soils.csv');
define('FILE_DAT_VARIETIES',            'dat_varieties.csv');
define('FILE_DAT_GEOGRAPHICAL_UNITS',   'dat_geographical_units.csv');
define('FILE_DAT_TEAMS',                'dat_teams.csv');
define('FILE_DAT_PRODUCTS',             'dat_products.csv');
define('FILE_DAT_COMPOUNDS',            'dat_compounds.csv');
define('FILE_DAT_DISEASES',             'dat_diseases.csv');
define('FILE_DAT_PESTS',                'dat_pests.csv');

define('POS_LICENSE_ID'         , 0);
define('POS_PROTOCOL_ID'        , 1);
define('POS_SKETCH_ID'          , 7);
define('POS_DT_SAMPLE'          , 8);
define('POS_SPOT_ID'            , 9);
define('POS_COMPOUND_ID'        , 8);

define('POS_NUM_BRIX'           , 10);
define('POS_NUM_LAI'            , 11);
define('POS_NUM_PBU'            , 12);
define('POS_NUM_WEIGHT_ANAL'    , 13);

define('POS_NUM_WEIGHT'         , 10);
define('POS_NUM_STEMS'          , 10);
define('POS_NUM_HEIGHT'         , 10);
define('POS_NUM_DIAMETER'       , 10);
define('POS_NUM_NODE'           , 10);
define('POS_NUM_FLOWER'         , 10);
define('POS_NUM_PITH'           , 10);
define('POS_NUM_INFESTATION'    , 10);
define('POS_NUM_HOLES'          , 10);
define('POS_NUM_DAMAGES'        , 10);
define('POS_NUM_GAPS'           , 10);
define('POS_NUM_TILLER'         , 10);

define('POS_DT_SAMPLE_CP'       , 11);
define('POS_SPOT_ID_CP'         , 12);
define('POS_NUM_COMPOUNDS'      , 13);

/*
| ------------------------------------------------------------------------------
| Interface
| ------------------------------------------------------------------------------
*/

define('FIELD_UPLOAD',  'edt_upload');
define('PATH_ATTACHS',  './uploads/attachs');


/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Navigation
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
define('MENU_DASHBOARD',    1);
define('MENU_PREPARE',      2);
define('MENU_PROTOCOLS',    3);
define('MENU_INTEGRATIONS', 4);
define('MENU_ANALYSIS',     5);
define('MENU_ADMIN',        6);
define('MENU_HELPCENTER',   7);
define('MENU_SECURITY',     8);

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Items a page
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
define('PARAM_LINES_PAGE_5',    5);
define('PARAM_LINES_PAGE_10',   10);
define('PARAM_LINES_PAGE_50',   50);
define('PARAM_LINES_PAGE_100',  100);
define('PARAM_LINES_PAGE_ALL',  100000);

define('PARAM_CHECKS_UPCOMING_DAYS', 7);

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Database Fields Enumerateds
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
/* field active */
define('ACTIVE_YES', 1);
define('ACTIVE_NO',  0);

/* field protocols.status */
define('PROTOCOL_STATUS_OPENED',    1);
define('PROTOCOL_STATUS_CLOSED',    2);
define('PROTOCOL_STATUS_CANCELED',  9);

/* field protocols.rating */
define('PROTOCOL_RATING_PROGRESS',  0);
define('PROTOCOL_RATING_VALID',     1);
define('PROTOCOL_RATING_NEUTER',    2);
define('PROTOCOL_RATING_ADVERSE',   3);

/* field protocols_checks.status */
define('CHECK_STATUS_OPENED',       1);
define('CHECK_STATUS_UPCOMING',     2);
define('CHECK_STATUS_DELAYED',      3);
define('CHECK_STATUS_PROGRESS',     4);
define('CHECK_STATUS_CLOSED',       5);
define('CHECK_STATUS_CANCELED',     9);

/* field protocols_types.type*/
define('PROTOCOL_TYPE_VARIETY',     1);
define('PROTOCOL_TYPE_PRODUCTS',    2);
define('PROTOCOL_TYPE_COMPOSED',    3);
define('PROTOCOL_TYPE_MISC',        4);

/* Table auth_users_recover */
define('RECOVER_STATUS_OPEN',     1);
define('RECOVER_STATUS_APPLIED',  2);
define('RECOVER_STATUS_CANCELED', 9);

/* Table auth_permissions */
define('ACCESS_LEVEL_DENIED',   0);
define('ACCESS_LEVEL_READ',     1);
define('ACCESS_LEVEL_COMPLETE', 2);

/* Table designing */
define('DESIGNING_DIC', 1);
define('DESIGNING_DBA', 2);
define('DESIGNING_DQL', 3);

/* Table auth_functions */
define('FNC_GROUPS',                        1);
define('FNC_PERMISSIONS',                   3);
define('FNC_SEASONS',                       4);
define('FNC_ENVIRONMENTS',                  5);
define('FNC_SOILS',                         6);
define('FNC_CUTTINGS',                      7);
define('FNC_CURRENCIES',                    8);
define('FNC_RESEARCH_LINES',                11);
define('FNC_RESEARCH_SUBLINES',             12);
define('FNC_APPLICATION_MODES',             13);
define('FNC_VARIETIES',                     14);
define('FNC_PRODUCTS',                      15);
define('FNC_GU_FARMS',                      16);
define('FNC_DESIGNING',                     17);
define('FNC_SPACING',                       18);
define('FNC_MATURATION',                    19);
define('FNC_TEAMS',                         21);
define('FNC_GU_PLOTS',                      22);
define('FNC_BUSINESS_UNITS',                23);
define('FNC_CURRENCIES_RATES',              24);
define('FNC_GROUPS_CONFIG',                 25);
define('FNC_MEASURE_UNITS',                 26);
define('FNC_DOSES',                         27);
define('FNC_PROTOCOLS',                     28);
define('FNC_GU_REGIONS',                    29);
define('FNC_QRY_RESEARCH_LINES',            30);
define('FNC_MANUFACTURERS',                 31);
define('FNC_PROTOCOLS_IDEALIZERS',          32);
define('FNC_PROTOCOLS_TEAMS',               33);
define('FNC_CHECKS_DESCRIPTIONS',           34);
define('FNC_CHECKS_METHODS',                35);
define('FNC_PROTOCOLS_CHECKS',              36);
define('FNC_WEATHERS',                      37);
define('FNC_QRY_WEATHERS',                  38);
define('FNC_TYPES_TESTS',                   39);
define('FNC_PROTOCOLS_GU_PLOTS',            40);
define('FNC_PROTOCOLS_VARIETIES',           41);
define('FNC_PROTOCOLS_SKETCHES',            42);
define('FNC_GU_PARCELS',                    43);
define('FNC_PLANTING_SCHEMES',              44);
define('FNC_SAMPLES_ANALYZE',               45);
define('FNC_QRY_CHECKS_STATUS',             46);
define('FNC_SAMPLES_WEIGHT',                47);
define('FNC_PROTOCOLS_RESULT',              48);
define('FNC_SAMPLES_STEMS',                 49);
define('FNC_SAMPLES_DIAMETERS',             50);
define('FNC_SAMPLES_HEIGHTS',               51);
define('FNC_PROTOCOLS_PRODUCTS',            52);
define('FNC_MISCELLANEOUS',                 53);
define('FNC_PROTOCOLS_MISC',                54);
define('FNC_SAMPLES_INTERNODES',            55);
define('FNC_SAMPLES_FLOWERING',             56);
define('FNC_SAMPLES_PITH',                  57);
define('FNC_SAMPLES_TILLERS',               58);
define('FNC_SAMPLES_INFESTATION',           59);
define('FNC_COMPOUNDS',                     60);
define('FNC_PROTOCOLS_COMPOUNDS',           61);
define('FNC_INTEGRATIONS',                  62);
define('FNC_SAMPLES_HOLES',                 63);
define('FNC_SAMPLES_DAMAGES',               64);
define('FNC_SAMPLES_COMPOUNDS',             65);
define('FNC_SAMPLES_DISEASES',              66);
define('FNC_SAMPLES_PESTS',                 67);
define('FNC_DISEASES',                      68);
define('FNC_PESTS',                         69);
define('FNC_PROTOCOLS_VARIABLES',           70);
define('FNC_PROTOCOLS_SAMPLES',             71);
define('FNC_FACTORS_DQL',                   72);
define('FNC_PROTOCOLS_FACTORS_DQL',         73);
define('FNC_TREATMENTS_DQL',                74);
define('FNC_PROTOCOLS_TREATMENTS_DQL',      75);
define('FNC_MATH_ANOVA_RATINGS',            76);
define('FNC_DISEASES_GROUPS',               77);
define('FNC_PESTS_GROUPS',                  78);
define('FNC_PRODUCTS_GROUPS',               79);
define('FNC_VARIETIES_LICENSORS',           80);
define('FNC_PROTOCOLS_NOTES',               81);
define('FNC_PROTOCOLS_RATINGS',             82);
define('FNC_QRY_PROTOCOLS_ALERTS',          83);
define('FNC_QRY_APPLIED_PRODUCTS',          84);
define('FNC_QRY_VARIETIES_ROYALTIES',       85);
define('FNC_SAMPLES_GAPS',                  86);
define('FNC_PROTOCOLS_ATTACHS',             87);
define('FNC_STATION_WEATHERS',              88);
define('FNC_PROTOCOLS_STATION_WEATHERS',    89);

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Answer Variables
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
define('MATH_AV_ATR', 1);           // Analyze
define('MATH_AV_POL', 2);           // Analyze
define('MATH_AV_STEMS', 4);         // Colmos/m2
define('MATH_AV_DIAMETERS', 5);     // Diâmetro (cm)
define('MATH_AV_HEIGHTS', 6);       // Altura (m)
define('MATH_AV_INTERNODES', 7);    // Entrenós
define('MATH_AV_TILLERS', 8);       // Perfilhos
define('MATH_AV_FLOWERING', 9);     // Flores
define('MATH_AV_PITH', 10);         // Isoporização
define('MATH_AV_HOLES', 11);        // Perfuros
define('MATH_AV_DAMAGES', 12);      // Danos
define('MATH_AV_INFESTATION', 13);  // Infestação

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Icons to Samples Drill-Draw
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
define('ICO_ARROWS_RIGHT_LEFT', '
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-right-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
       <path d="M21 7l-18 0"></path>
       <path d="M18 10l3 -3l-3 -3"></path>
       <path d="M6 20l-3 -3l3 -3"></path>
       <path d="M3 17l18 0"></path>
    </svg>'
);
