<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Função usada para construir os menus
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function fsCreateMenu($poTitle, $poMenu){
  $lsItems = '';
  for($i = 0; $i < count($poMenu); $i++){
    if ($poMenu[$i]['permission']==TRUE){
      $lsItems .= '<li class="pt-1"><a href="'.$poMenu[$i]['link'].'" style="text-decoration:none;"><i class="'.$poMenu[$i]['icon'].' pr-1"></i>'.$poMenu[$i]['name'].'</a></li>';
    }
  }
  if ($lsItems!=''){
    $lsMenu =
      '<div class="col-md-3">'.
        '<div class="card" style="border-width:.5px;">'.
          '<div class="card-header">'.
            '<h3 class="card-title">'.
              $poTitle.
            '</h3>'.
          '</div>'.
          '<div class="card-body m-0 p-0">'.
            '<div class="m-0 p-0 border-0">'.
              '<ul class="pl-5 pt-1 pb-1 mt-0 mb-1" style="list-style: none;">'.
              $lsItems.
              '</ul>'.
            '</div>'.
          '</div>'.
        '</div>'.
      '</div>';
  }else{
    $lsMenu = '';
  }
  return $lsMenu;
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Menus do módulo 'Administration'
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function getMenuAdminOptions(){
  return
    array(
      array("name" => "Grupos",     "icon"=>"fe fe-inbox",  "link" => base_url(RT_ADMIN_GROUPS),        "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_GROUPS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Configurar", "icon"=>"fe fe-users",  "link" => base_url(RT_ADMIN_GROUPS_CONFIG), "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_GROUPS_CONFIG)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Permissões", "icon"=>"fe fe-lock",   "link" => base_url(RT_ADMIN_PERMISSIONS),   "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_PERMISSIONS)==ACCESS_LEVEL_DENIED?FALSE:TRUE))
      );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Menus do módulo 'Security'
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function getMenuSecurityOptions(){
  return
    array(
      array("name" => "Licenças",   "icon"=>"fe fe-book-open",  "link" => base_url(RT_SECURITY_LICENSES),   "support"=>"javascript:void(0)", "permission"=>TRUE),
      array("name" => "Usuários",   "icon"=>"fe fe-user",       "link" => base_url(RT_SECURITY_USERS),      "support"=>"javascript:void(0)", "permission"=>TRUE),
      array("name" => "Configurar", "icon"=>"fe fe-user-check", "link" => base_url(RT_USERS_LICENSES),      "support"=>"javascript:void(0)", "permission"=>TRUE)
      );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Menus do módulo 'Preparar'
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function getMenuDadosAgronomicos(){
  return
    array(
      array("name" => "Ambientes",              "icon" => "", "link" => base_url(RT_ENVIRONMENTS),          "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_ENVIRONMENTS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Solo",                   "icon" => "", "link" => base_url(RT_SOILS),                 "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_SOILS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Estágios de Corte",      "icon" => "", "link" => base_url(RT_CUTTINGS),              "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_CUTTINGS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Licenciantes",           "icon" => "", "link" => base_url(RT_VARIETIES_LICENSORS),   "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_VARIETIES_LICENSORS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Graus de Maturação",     "icon" => "", "link" => base_url(RT_MATURATION),            "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_MATURATION)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Variedades",             "icon" => "", "link" => base_url(RT_VARIETIES),             "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_VARIETIES)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Espaçamentos",           "icon" => "", "link" => base_url(RT_SPACING),               "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_SPACING)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Esquemas de Plantio",    "icon" => "", "link" => base_url(RT_PLANTING_SCHEMES),      "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_PLANTING_SCHEMES)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Posto Meteorológico",    "icon" => "", "link" => base_url(RT_STATION_WEATHERS),      "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_STATION_WEATHERS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Chuva e temperatura",    "icon" => "", "link" => base_url(RT_WEATHERS),              "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_WEATHERS)==ACCESS_LEVEL_DENIED?FALSE:TRUE))
    );
}

function getMenuDadosBiologicos(){
  return
    array(
      array("name" => "Grupos de Doenças",      "icon" => "", "link" => base_url(RT_DISEASES_GROUPS),       "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_DISEASES_GROUPS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Doenças",                "icon" => "", "link" => base_url(RT_DISEASES),              "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_DISEASES)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Grupos de Pragas",       "icon" => "", "link" => base_url(RT_PESTS_GROUPS),          "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_PESTS_GROUPS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Pragas",                 "icon" => "", "link" => base_url(RT_PESTS),                 "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_PESTS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      );
}

function getPrepareExperiments(){
  return
    array(
      array("name" => "Linhas de pesquisa",         "icon" => "", "link" => base_url(RT_RESEARCH_LINES),        "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_RESEARCH_LINES)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Sublinhas de pesquisa",      "icon" => "", "link" => base_url(RT_RESEARCH_SUBLINES),     "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_RESEARCH_SUBLINES)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Descrições das Avaliações",  "icon" => "", "link" => base_url(RT_CHECKS_DESCRIPTIONS),   "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_CHECKS_DESCRIPTIONS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Métodos das Avaliações",     "icon" => "", "link" => base_url(RT_CHECKS_METHODS),        "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_CHECKS_METHODS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Experimentos Diversos",      "icon" => "", "link" => base_url(RT_MISCELLANEOUS),         "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_MISCELLANEOUS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Tipos de ensaio",            "icon" => "", "link" => base_url(RT_TYPES_TESTS),           "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_TYPES_TESTS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Fatores D.Q.L.",             "icon" => "", "link" => base_url(RT_FACTORS_DQL),           "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_FACTORS_DQL)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Tratamentos D.Q.L.",         "icon" => "", "link" => base_url(RT_TREATMENTS_DQL),        "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_TREATMENTS_DQL)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Equipes Técnicas",           "icon" => "", "link" => base_url(RT_TEAMS),                 "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_TEAMS)==ACCESS_LEVEL_DENIED?FALSE:TRUE))
      );
}

function getMenuPrepareFinance(){
  return
    array(
      array("name" => "Moedas",     "icon" => "", "link" => base_url(RT_CURRENCIES),        "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_CURRENCIES)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Cotações",   "icon" => "", "link" => base_url(RT_CURRENCIES_RATES),  "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_CURRENCIES_RATES)==ACCESS_LEVEL_DENIED?FALSE:TRUE))
      );
}

function getPrepareDivisoesGeograficas(){
  return
    array(
      array("name" => "Unidades de Negócio",    "icon" => "", 'link' => base_url(RT_BUSINESS_UNITS),  "support"=>"javascript:void(0);", "permission"=>(fiLevelAccess(fi_get_user(), FNC_BUSINESS_UNITS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Safras",                 "icon" => "", 'link' => base_url(RT_SEASONS),         "support"=>"javascript:void(0);", "permission"=>(fiLevelAccess(fi_get_user(), FNC_SEASONS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Regiões",                "icon" => "", 'link' => base_url(RT_GU_REGIONS),      "support"=>"javascript:void(0);", "permission"=>(fiLevelAccess(fi_get_user(), FNC_GU_REGIONS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Fazendas",               "icon" => "", 'link' => base_url(RT_GU_FARMS),        "support"=>"javascript:void(0);", "permission"=>(fiLevelAccess(fi_get_user(), FNC_GU_FARMS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Parcela",                "icon" => "", "link" => "javascript:void(0);",        "support"=>"javascript:void(0);", "permission"=>FALSE)
      );
}

function getMenuPrepareInsumos(){
  return
    array(
      array("name" => "Produtos",               "icon" => "", "link" => base_url(RT_PRODUCTS),          "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_PRODUCTS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Grupos de Produtos",     "icon" => "", "link" => base_url(RT_PRODUCTS_GROUPS),   "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_PRODUCTS_GROUPS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Fabricantes",            "icon" => "", "link" => base_url(RT_MANUFACTURERS),     "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_MANUFACTURERS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Modos de aplicação",     "icon" => "", "link" => base_url(RT_APPLICATION_MODES), "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_APPLICATION_MODES)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Compostos",              "icon" => "", "link" => base_url(RT_COMPOUNDS),         "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_COMPOUNDS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Unidades de Medidas",    "icon" => "", "link" => base_url(RT_MEASURE_UNITS),     "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_MEASURE_UNITS)==ACCESS_LEVEL_DENIED?FALSE:TRUE))
      );
}

function getPreparePreferences(){
  return
    array(
      array("name" => "Delineamentos",                  "icon" => "", "link" => base_url(RT_DESIGNING),             "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_DESIGNING)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Classificação dos Experimentos", "icon" => "", "link" => base_url(RT_PROTOCOLS_RATINGS),     "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_RATINGS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Classificação ANOVA",            "icon" => "", "link" => base_url(RT_MATH_ANOVA_RATINGS),    "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_MATH_ANOVA_RATINGS)==ACCESS_LEVEL_DENIED?FALSE:TRUE))
      );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Menus do módulo 'Executar'
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function getPerformAgronomicData(){
  return
    array(
      array("name" => "Pré-análises",       "icon" => "", "link" => base_url(RT_WEATHERS), "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_WEATHERS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Entrada de cana",    "icon" => "", "link" => base_url(RT_WEATHERS), "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_WEATHERS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Biometria",          "icon" => "", "link" => base_url(RT_WEATHERS), "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_WEATHERS)==ACCESS_LEVEL_DENIED?FALSE:TRUE))
      );
}

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Menus do módulo 'Análises'
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function getAnalysisOverall(){
  return
    array(
      array("name" => "Linhas e Sublinhas",             "icon" => "", "link" => base_url(RT_QRY_RESEARCH_LINES),        "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_QRY_RESEARCH_LINES)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Status das Avaliações",          "icon" => "", "link" => base_url(RT_QRY_CHECKS_STATUS),         "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_QRY_CHECKS_STATUS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Produtos Aplicados",             "icon" => "", "link" => base_url(RT_QRY_APPLIED_PRODUCTS),      "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_QRY_APPLIED_PRODUCTS)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Royalties das Variedades",       "icon" => "", "link" => base_url(RT_QRY_VARIETIES_ROYALTIES),   "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_QRY_VARIETIES_ROYALTIES)==ACCESS_LEVEL_DENIED?FALSE:TRUE)),
      array("name" => "Perfilho por Tratamento",        "icon" => "", "link" => "javascript:void(0);",                  "support"=>"javascript:void(0)", "permission"=>FALSE),
      array("name" => "Biometria - Tabelas e Gráficos", "icon" => "", "link" => "javascript:void(0);",                  "support"=>"javascript:void(0)", "permission"=>FALSE),
      array("name" => "Produtos [entre nós]",           "icon" => "", "link" => "javascript:void(0);",                  "support"=>"javascript:void(0)", "permission"=>FALSE),
      array("name" => "Colheita por Produto",           "icon" => "", "link" => "javascript:void(0);",                  "support"=>"javascript:void(0)", "permission"=>FALSE),
      array("name" => "Valores e Garantias",            "icon" => "", "link" => "javascript:void(0);",                  "support"=>"javascript:void(0)", "permission"=>FALSE)
      );
}
function getAnalysisWeathers(){
  return
    array(
      array("name" => "Chuva e temperatura", "icon" => "", "link" => base_url(RT_QRY_WEATHERS), "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_QRY_WEATHERS)==ACCESS_LEVEL_DENIED?FALSE:TRUE))
      );
}
function getAnalysisGeneralAlerts(){
  return
    array(
      array("name" => "Protocolos e Avaliações", "icon" => "", "link" => base_url(RT_QRY_PROTOCOLS_ALERTS), "support"=>"javascript:void(0)", "permission"=>(fiLevelAccess(fi_get_user(), FNC_QRY_PROTOCOLS_ALERTS)==ACCESS_LEVEL_DENIED?FALSE:TRUE))
      );
}
