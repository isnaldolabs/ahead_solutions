<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* -----------------------------------------------------------------------------
 * 
 * fs_buttons()
 * 
 * função usada para construir as ações para a página com a lista e a página com
 * os cards de experimentos, centralizando assim, as chamadas.
 * 
 */
function fs_buttons($pi_protocol, $pi_type, $pi_designing, $pi_status){
    $ls_html = '';
    $ls_svg_users = '
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
        </svg>';
    $ls_svg_settings = '
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
        </svg>';
    $ls_svg_flask = '
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-flask" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M9 3l6 0"></path>
            <path d="M10 9l4 0"></path>
            <path d="M10 3v6l-4 11a.7 .7 0 0 0 .5 1h11a.7 .7 0 0 0 .5 -1l-4 -11v-6"></path>
        </svg>';
    $ls_svg_test_pipe = '
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-test-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M20 8.04l-12.122 12.124a2.857 2.857 0 1 1 -4.041 -4.04l12.122 -12.124"></path>
            <path d="M7 13h8"></path>
            <path d="M19 15l1.5 1.6a2 2 0 1 1 -3 0l1.5 -1.6z"></path>
            <path d="M15 3l6 6"></path>
        </svg>';
    $ls_svg_report = '
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
            <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
            <path d="M9 17v-5"></path>
            <path d="M12 17v-1"></path>
            <path d="M15 17v-3"></path>
        </svg>';

    // people ------------------------------------------------------------------
    if ((fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_IDEALIZERS)>=ACCESS_LEVEL_READ) or
        (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_TEAMS)>=ACCESS_LEVEL_READ)) {
        $ls_html .= '
            <span class="dropdown">
                <a href="javascript:void(0);"
                   class="me-1" style="text-decoration: none;" data-bs-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="text-blue">'.$ls_svg_users.'</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">';
                if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_IDEALIZERS)==ACCESS_LEVEL_COMPLETE){
                    $link = base_url(RT_CALL_PROTOCOLS_IDEALIZERS).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">'.$ls_svg_users.'</span>Idealizadores
                        </a>';
                }
                if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_TEAMS)==ACCESS_LEVEL_COMPLETE){
                    $link = base_url(RT_CALL_PROTOCOLS_TEAMS).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">'.$ls_svg_users.'</span>Equipe Técnica
                        </a>';
                }
        $ls_html .= '
                </div>
            </span>';
        }

// others ----------------------------------------------------------------------
    if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_SAMPLES)>=ACCESS_LEVEL_READ){
        $ls_html .= '
            <span class="dropdown">
                <a href="javascript:void(0);"
                   class="me-1" style="text-decoration: none;" data-bs-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="text-blue">'.$ls_svg_settings.'</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">';
                if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_SAMPLES)==ACCESS_LEVEL_COMPLETE){
                    $link = base_url(RT_CALL_PROTOCOLS_SAMPLES).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-flask" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M9 3l6 0"></path>
                                   <path d="M10 9l4 0"></path>
                                   <path d="M10 3v6l-4 11a.7 .7 0 0 0 .5 1h11a.7 .7 0 0 0 .5 -1l-4 -11v-6"></path>
                                </svg>
                            </span>Amostras
                        </a>';
                }
                if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_VARIABLES)==ACCESS_LEVEL_COMPLETE){
                    $link = base_url(RT_CALL_PROTOCOLS_VARIABLES).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M9 6l11 0"></path>
                                   <path d="M9 12l11 0"></path>
                                   <path d="M9 18l11 0"></path>
                                   <path d="M5 6l0 .01"></path>
                                   <path d="M5 12l0 .01"></path>
                                   <path d="M5 18l0 .01"></path>
                                </svg>
                            </span>Variáveis Resposta
                        </a>';
                }
                if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_GU_PLOTS)==ACCESS_LEVEL_COMPLETE){
                    $link = base_url(RT_CALL_PROTOCOLS_GU_PLOTS).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-collage" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                   <path d="M10 4l4 16"></path>
                                   <path d="M12 12l-8 2"></path>
                                </svg>
                            </span>Talhões
                        </a>';
                }
                if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_VARIETIES)==ACCESS_LEVEL_COMPLETE and $pi_type==PROTOCOL_TYPE_VARIETY){
                    $link = base_url(RT_CALL_PROTOCOLS_VARIETIES).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-leaf" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M5 21c.5 -4.5 2.5 -8 7 -10"></path>
                                   <path d="M9 18c6.218 0 10.5 -3.288 11 -12v-2h-4.014c-9 0 -11.986 4 -12 9c0 1 0 3 2 5h3z"></path>
                                </svg>
                            </span>Tratamento Varietal
                        </a>';
                }
                if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_PRODUCTS)==ACCESS_LEVEL_COMPLETE and $pi_type==PROTOCOL_TYPE_PRODUCTS){
                    $link = base_url(RT_CALL_PROTOCOLS_PRODUCTS).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"></path>
                                   <path d="M12 12l8 -4.5"></path>
                                   <path d="M12 12l0 9"></path>
                                   <path d="M12 12l-8 -4.5"></path>
                                </svg>
                            </span>Tratamento por Produtos
                        </a>';
                }
                if ($pi_designing==DESIGNING_DQL and $pi_type==PROTOCOL_TYPE_COMPOSED){
                    $link = base_url(RT_CALL_PROTOCOLS_FACTORS_DQL).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"></path>
                                   <path d="M12 12l8 -4.5"></path>
                                   <path d="M12 12l0 9"></path>
                                   <path d="M12 12l-8 -4.5"></path>
                                </svg>
                            </span>Fatores para D.Q.L.
                        </a>';
                    $link = base_url(RT_CALL_PROTOCOLS_COMPOSED).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"></path>
                                   <path d="M12 12l8 -4.5"></path>
                                   <path d="M12 12l0 9"></path>
                                   <path d="M12 12l-8 -4.5"></path>
                                </svg>
                            </span>Tratamento Composto
                        </a>';
                }
                if ($pi_designing==DESIGNING_DQL and $pi_type==PROTOCOL_TYPE_MISC){
                    $link = base_url(RT_CALL_PROTOCOLS_MISCELLANEOUS).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"></path>
                                   <path d="M12 12l8 -4.5"></path>
                                   <path d="M12 12l0 9"></path>
                                   <path d="M12 12l-8 -4.5"></path>
                                </svg>
                            </span>Tratamentos Diversos
                        </a>';
                }
                if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_SKETCHES)==ACCESS_LEVEL_COMPLETE){
                    $link = base_url(RT_CALL_PROTOCOLS_SKETCHES).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cube-unfolded" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M2 15h10v5h5v-5h5v-5h-10v-5h-5v5h-5z"></path>
                                   <path d="M7 15v-5h5v5h5v-5"></path>
                                </svg>
                            </span>Croqui
                        </a>';
                }
                if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_CHECKS)==ACCESS_LEVEL_COMPLETE){
                    $link = base_url(RT_CALL_PROTOCOLS_CHECKS).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-due" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                   <path d="M16 3v4"></path>
                                   <path d="M8 3v4"></path>
                                   <path d="M4 11h16"></path>
                                   <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                </svg>
                            </span>Avaliações
                        </a>';
                }
                if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_NOTES)==ACCESS_LEVEL_COMPLETE){
                    $link = base_url(RT_CALL_PROTOCOLS_NOTES).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmarks" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M13 7a2 2 0 0 1 2 2v12l-5 -3l-5 3v-12a2 2 0 0 1 2 -2h6z"></path>
                                   <path d="M9.265 4a2 2 0 0 1 1.735 -1h6a2 2 0 0 1 2 2v12l-1 -.6"></path>
                                </svg>
                            </span>Observações
                        </a>';
                }
                if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_ATTACHS)==ACCESS_LEVEL_COMPLETE){
                    $link = base_url(RT_CALL_PROTOCOLS_ATTACHS).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-paperclip" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5"></path>
                                </svg>
                            </span>Anexos
                        </a>';
                }
                if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_STATION_WEATHERS)==ACCESS_LEVEL_COMPLETE){
                    $link = base_url(RT_CALL_PROTOCOLS_STATION_WEATHERS).'/'.md5($pi_protocol);
                    $ls_html .= 
                        '<a href="'.$link.'" class="dropdown-item">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-rain" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7"></path>
                                   <path d="M11 13v2m0 3v2m4 -5v2m0 3v2"></path>
                                </svg>
                            </span>Posto Meteorológico
                        </a>';
                }
        $ls_html .= '
                </div>
            </span>';
        }

    // samples pre-analyze -----------------------------------------------------
    $ls_html .= '
        <span class="dropdown">
            <a href="javascript:void(0);"
               class="me-1" style="text-decoration: none;" data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="text-green">'.$ls_svg_flask.'</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">';
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_ANALYZE)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_ANALYZE).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Pré-Análises
            </a>';
    }
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_WEIGHT)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_WEIGHT).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Pesos
            </a>';
    }
    $ls_html .= '
            </div>
        </span>';

    // samples stems -----------------------------------------------------------
    $ls_html .= '
        <span class="dropdown">
            <a href="javascript:void(0);"
               class="me-1" style="text-decoration: none;" data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="text-gray">'.$ls_svg_flask.'</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">';
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_STEMS)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_STEMS).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Colmos
            </a>';
    }
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_DIAMETERS)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_DIAMETERS).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Diâmetros
            </a>';
    }
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_HEIGHTS)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_HEIGHTS).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Alturas
            </a>';
    }
    $ls_html .= '
            </div>
        </span>';

    // samples internodes ------------------------------------------------------
    $ls_html .= '
        <span class="dropdown">
            <a href="javascript:void(0);"
               class="me-1" style="text-decoration: none;" data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="text-blue">'.$ls_svg_flask.'</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">';
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_INTERNODES)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_INTERNODES).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Entrenós
            </a>';
    }
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_FLOWERING)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_FLOWERING).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Florescimento
            </a>';
    }
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_PITH)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_PITH).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Isoporização
            </a>';
    }
    $ls_html .= '
            </div>
        </span>';

    // samples tillers ------------------------------------------------------
    $ls_html .= '
        <span class="dropdown">
            <a href="javascript:void(0);"
               class="me-1" style="text-decoration: none;" data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="text-blue">'.$ls_svg_flask.'</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">';
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_TILLERS)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_TILLERS).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Perfilhos
            </a>';
    }
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_GAPS)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_GAPS).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Falhas
            </a>';
    }
    $ls_html .= '
            </div>
        </span>';

    // samples infestation -----------------------------------------------------
    $ls_html .= '
        <span class="dropdown">
            <a href="javascript:void(0);"
               class="me-1" style="text-decoration: none;" data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="text-orange">'.$ls_svg_flask.'</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">';
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_INFESTATION)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_INFESTATION).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Infestação
            </a>';
    }
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_HOLES)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_HOLES).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Perfurados
            </a>';
    }
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_DAMAGES)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_DAMAGES).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Danificados
            </a>';
    }
    $ls_html .= '
            </div>
        </span>';
 
    // samples diseases and pests ----------------------------------------------
    $ls_html .= '
        <span class="dropdown">
            <a href="javascript:void(0);"
               class="me-1" style="text-decoration: none;" data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="text-orange">'.$ls_svg_flask.'</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">';
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_DISEASES)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_DISEASES).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Doenças
            </a>';
    }
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_PESTS)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_PESTS).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Pragas
            </a>';
    }
    $ls_html .= '
            </div>
        </span>';

    // samples compounds -------------------------------------------------------
    $ls_html .= '
        <span class="dropdown">
            <a href="javascript:void(0);"
               class="me-1" style="text-decoration: none;" data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="text-purple">'.$ls_svg_flask.'</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">';
    if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_COMPOUNDS)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_SAMPLES_COMPOUNDS).'/'.md5($pi_protocol);
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">'.$ls_svg_test_pipe.'</span>Compostos
            </a>';
    }
    $ls_html .= '
            </div>
        </span>';

    // outcomes ----------------------------------------------------------------
    if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_RESULT)==ACCESS_LEVEL_COMPLETE){
        $link = base_url(RT_CALL_PROTOCOLS_RESULT).'/'.md5($pi_protocol);
        $ls_html .= '
            <span class="">
                <a href="'.$link.'"
                   class="me-1" style="text-decoration: none;" aria-expanded="false">
                    <span class="text-dark">'.$ls_svg_report.'
                    </span>
                </a>
            </span>';
    }

    // status ------------------------------------------------------------------
    $ls_html .= '
        <span class="dropdown">
            <a href="javascript:void(0);"
               class="me-1" style="text-decoration: none;" data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="text-gray">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-progress-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M10 20.777a8.942 8.942 0 0 1 -2.48 -.969"></path>
                       <path d="M14 3.223a9.003 9.003 0 0 1 0 17.554"></path>
                       <path d="M4.579 17.093a8.961 8.961 0 0 1 -1.227 -2.592"></path>
                       <path d="M3.124 10.5c.16 -.95 .468 -1.85 .9 -2.675l.169 -.305"></path>
                       <path d="M6.907 4.579a8.954 8.954 0 0 1 3.093 -1.356"></path>
                       <path d="M9 12l2 2l4 -4"></path>
                    </svg>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">';
    if($pi_status!=PROTOCOL_STATUS_OPENED){
        $link = base_url(RT_PROTOCOLS_DB_UPD_STATUS).'/'.md5($pi_protocol).'/'.PROTOCOL_STATUS_OPENED;
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-open" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M5 11m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                       <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                       <path d="M8 11v-5a4 4 0 0 1 8 0"></path>
                    </svg>
                </span>Abrir
            </a>';
    }
    if($pi_status!=PROTOCOL_STATUS_CLOSED){
        $link = base_url(RT_CALL_PROTOCOLS_CLOSE).'/'.md5($pi_protocol).'/'.PROTOCOL_STATUS_CLOSED;
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                       <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                       <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                    </svg>
                </span>Fechar
            </a>';
    }
    if($pi_status!=PROTOCOL_STATUS_CANCELED){
        $link = base_url(RT_PROTOCOLS_DB_UPD_STATUS).'/'.md5($pi_protocol).'/'.PROTOCOL_STATUS_CANCELED;
        $ls_html .= 
            '<a href="'.$link.'" class="dropdown-item">
                <span class="me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M18 6l-12 12"></path>
                       <path d="M6 6l12 12"></path>
                    </svg>
                </span>Cancelar
            </a>';
    }
    $ls_html .= '
            </div>
        </span>';
    return $ls_html;
}

if(isset($flash_message)){echo $flash_message;}
?>
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    <?php echo $view_title; ?>
                </h2>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
                    <span class="me-2">
                        <a href="<?php echo $link_view_option.'/0'; ?>"
                           class="btn btn-outline-secondary">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M9 6l11 0"></path>
                                   <path d="M9 12l11 0"></path>
                                   <path d="M9 18l11 0"></path>
                                   <path d="M5 6l0 .01"></path>
                                   <path d="M5 12l0 .01"></path>
                                   <path d="M5 18l0 .01"></path>
                                </svg>
                            </span>
                            Lista
                        </a>
                    </span>
                    <span class="me-1">
                        <a href="<?php echo $link_view_option.'/1'; ?>"
                           class="btn btn-outline-secondary">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-grid" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                   <path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                   <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                   <path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                </svg>
                            </span>
                            Cartões
                        </a>
                    </span>
                    <span class="dropdown me-1">
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z"></path>
                                </svg>
                            </span>
                            Status
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                               href="<?php echo $link_filter_status.'/0'; ?>">
                                <span class="me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <path d="M9 6l11 0"></path>
                                       <path d="M9 12l11 0"></path>
                                       <path d="M9 18l11 0"></path>
                                       <path d="M5 6l0 .01"></path>
                                       <path d="M5 12l0 .01"></path>
                                       <path d="M5 18l0 .01"></path>
                                    </svg>
                                </span>
                                Todos
                            </a>
                            <a class="dropdown-item"
                               href="<?php echo $link_filter_status.'/'.PROTOCOL_STATUS_OPENED; ?>">
                                <span class="me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-open" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <path d="M5 11m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                                       <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                       <path d="M8 11v-5a4 4 0 0 1 8 0"></path>
                                    </svg>
                                </span>
                                Abertos
                            </a>
                            <a class="dropdown-item" 
                               href="<?php echo $link_filter_status.'/'.PROTOCOL_STATUS_CLOSED; ?>">
                                <span class="me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                                       <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                                       <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                                    </svg>
                                </span>
                                Fechados
                            </a>
                            <a class="dropdown-item"
                               href="<?php echo $link_filter_status.'/'.PROTOCOL_STATUS_CANCELED; ?>">
                                <span class="me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <path d="M18 6l-12 12"></path>
                                       <path d="M6 6l12 12"></path>
                                    </svg>
                                </span>
                                Cancelados
                            </a>
                        </div>
                    </span>
                    <span class="dropdown me-1">
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z"></path>
                                </svg>
                            </span>
                            Fatores
                        </button>
                        <div class="dropdown-menu">
                        <form method="POST" id="search" action="<?php echo site_url(RT_CALL_PROTOCOLS_FILTER_SEARCH); ?>">
                        <?php
                        $uniqueLineNames = array();
                        foreach ($ds_dataset as $row) {
                            if (!in_array($row->line_name, $uniqueLineNames)) {
                                array_push($uniqueLineNames, $row->line_name);
                                ?>
                                <a class="dropdown-item" href="<?php echo site_url(RT_CALL_PROTOCOLS_FILTER_SEARCH); ?>/1">
                                    <span class="me-1">
                                        <input type="checkbox" value="<?php echo $row->subline_id;?>" name="search[]">
                                    </span>
                                    <?php echo $row->line_name; ?>
                                </a>
                        <?php
                            }
                        }
                        ?>
                            <a class="dropdown-item">
                              <button style="width: 100%;" class="btn btn-primary"  onclick="validateForm(event)">Pesquisar</button>
                            </a>
                        </div>
                      </form>
                    </span>
                    <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS)==ACCESS_LEVEL_COMPLETE){ ?>
                        <span>
                            <a href="<?php echo $link_insert; ?>"
                               class="btn btn-outline-secondary">
                                <span class="me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <path d="M12 5l0 14"></path>
                                       <path d="M5 12l14 0"></path>
                                    </svg>
                                </span>
                                Adicionar
                            </a>
                        </span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(fi_get_protocol_view_option()==0){ ?>
    <!--begin: visualização por lista-->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                                <tbody>
                                    <?php foreach ($ds_dataset as $row){ ?>
                                    <tr role="row" class="odd">
                                        <td class="small text-muted"><?php echo '#'.$row->protocol_id; ?></td>
                                        <td><span class="avatar avatar-sm bg-<?php echo $row->type_color; ?>-lt"><?php echo $row->type_short_name; ?></span></td>
                                        <td><?php echo $row->code; ?></td>
                                        <td><?php echo $row->line_name; ?></td>
                                        <td>
                                            <?php echo substr($row->title, 0, 50); ?>
                                            <div class="mt-2">
                                                <?php echo fs_buttons($row->protocol_id, $row->type_id, $row->designing_id, $row->status); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <strong><?php echo $row->protocol_progress; ?>%</strong>
                                                </div>
                                                <div class="float-right">
                                                    <small class="text-muted"><?php echo fdDateMySQL_to_DateBr($row->dt_start).' - '.fdDateMySQL_to_DateBr($row->dt_end_planned); ?></small>
                                                </div>
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar <?php echo fs_progress_color($row->protocol_progress); ?>"
                                                     role="progressbar" 
                                                     style="width: <?php echo $row->protocol_progress; ?>%" 
                                                     aria-valuenow="<?php echo $row->protocol_progress; ?>" 
                                                     aria-valuemin="0" 
                                                     aria-valuemax="100">
                                                </div>
                                            </div>
                                        </td>
                                        <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS)==ACCESS_LEVEL_COMPLETE){ ?>
                                            <td class="text-end">
                                                <a class="text-blue me-2" href="<?php echo $link_update."/".md5($row->protocol_id); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                        <path d="M13.5 6.5l4 4"></path>
                                                    </svg>
                                                </a>
                                                <a href="javascript:void(0)"
                                                   class="confirma_exclusao text-red"
                                                   data-target="#modal_confirmation"
                                                   data-key="<?php echo $link_delete."/".md5($row->protocol_id); ?>"
                                                   data-code="<?php echo $row->code; ?>"
                                                   data-name="<?php echo $row->title; ?>"
                                                   data-desc="" >
                                                    <span class="me-1 text-red">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                           <path d="M4 7l16 0"></path>
                                                           <path d="M10 11l0 6"></path>
                                                           <path d="M14 11l0 6"></path>
                                                           <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                           <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </td>
                                        <?php } ?>
                                    </tr>

                                    <?php
                                        if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS)==ACCESS_LEVEL_COMPLETE){
                                            echo fsModalDelete($row->protocol_id);
                                        }
                                    ?>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end: visualização por lista-->
<?php }else{ ?>
    <!--begin: visualização por cards-->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards row-deck">

                <?php foreach ($ds_dataset as $row){
                    $ls_filter = 'filter-'.$row->status;
                    ?>

                    <div class="col-md-6 col-xl-4 portfolio-item <?php echo $ls_filter; ?> mb-1">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <span class="small text-muted"><?php echo '#'.$row->protocol_id.' '; ?></span>
                                    <?php echo $row->code; ?>
                                </h3>
                                <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS)==ACCESS_LEVEL_COMPLETE){ ?>
                                    <div class="card-options">
                                        <a class="text-blue me-2" href="<?php echo $link_update."/".md5($row->protocol_id); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                <path d="M13.5 6.5l4 4"></path>
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0)"
                                           class="confirma_exclusao text-red"
                                           data-target="#modal_confirmation"
                                           data-key="<?php echo $link_delete."/".md5($row->protocol_id); ?>"
                                           data-code="<?php echo $row->code; ?>"
                                           data-name="<?php echo $row->title; ?>"
                                           data-desc="" >
                                           <span class="me-1 text-red">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                   <path d="M4 7l16 0"></path>
                                                   <path d="M10 11l0 6"></path>
                                                   <path d="M14 11l0 6"></path>
                                                   <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                   <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="card-body pt-2">
                                <div class="pb-3">
                                    <span class="avatar avatar-sm bg-<?php echo $row->type_color; ?>-lt"><?php echo $row->type_short_name; ?></span>
                                    <?php echo $row->title; ?>
                                </div>
                                <div style="position: absolute; bottom: 0px; width: 85%;"
                                     class="pt-4">
                                    <small class="text-muted">
                                        <?php echo fdDateMySQL_to_DateBr($row->dt_start).' - '.fdDateMySQL_to_DateBr($row->dt_end_planned); ?>
                                    </small>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar <?php echo fs_progress_color($row->protocol_progress); ?>"
                                             style="width: <?php echo $row->protocol_progress; ?>%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-header"> <!-- BEGIN: card header 2 -->

                                        <div>
                                            <?php echo fs_buttons($row->protocol_id, $row->type_id, $row->designing_id, $row->status); ?>
                                        </div>

                            </div> <!-- END: card header 2 -->

                        </div>
                    </div>

                    <?php
                        if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS)==ACCESS_LEVEL_COMPLETE){
                            echo fsModalDelete($row->protocol_id);
                        }
                    ?>

                <?php } ?>

            </div>
            <!--end: visualização por cards-->

        </div>
    </div>
<?php } ?>

<!--begin: navegação entre listas e cards-->
<div class="container-xl">
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card-footer d-flex align-items-center">
                <?php if(PAGINATION_ACTIVE=='Y'){
                    echo (!empty($lo_pagination) ? $lo_pagination : '');
                    echo $lo_lines_page;
                } ?>
            </div>
        </div>
    </div>
</div>
<!--end: navegação entre listas e cards-->
<script>
function validateForm(event) {
  event.preventDefault(); // Evita o envio padrão do formulário

  const checkboxes = document.querySelectorAll('input[name="search[]"]:checked');

  if (checkboxes.length === 0) {
    alert("Selecione pelo menos uma linha de pesquisa!");
  } else {
    // O formulário será enviado se pelo menos um checkbox estiver marcado
    document.getElementById("search").submit();
  }
}
</script>