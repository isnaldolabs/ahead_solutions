<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function fsColumnActive($piActive=0){
  if($piActive==1){
    $lsReturn = '<i class="fa fa-toggle-on me-2 text-blue"></i>';
  }else{
    $lsReturn = '<i class="fa fa-toggle-off me-2 text-gray"></i>';
  }
  return $lsReturn;
}

function fsReturnPage($poRedirect, $psTitle=''){
    $lsReturnNav =
        '<div class="pt-2 pb-2 container-xl border-bottom"
              style="background-color: rgb(246, 248, 251);">
            <ol class="breadcrumb breadcrumb-dots" aria-label="breadcrumbs">
                <li class="breadcrumb-item">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M5 12l14 0"></path>
                           <path d="M5 12l6 6"></path>
                           <path d="M5 12l6 -6"></path>
                        </svg>
                    </span>
                    <a href="'.base_url($poRedirect).'" 
                        style="text-decoration: none; color: black;">Retornar
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">'.$psTitle.'</a></li>
            </ol>
        </div>';
  return $lsReturnNav;
}

function fs_html_is_main($pi_is_main=0){
  if($pi_is_main==1){
    $lsReturn = '<span><i class="fe fe-check-circle text-green"></i></span>';
  }else{
    $lsReturn = '<span><i class="fe fe-circle text-gray"></i></span>';
  }
  return $lsReturn;
}

function fs_protocol_status($pi_status=PROTOCOL_STATUS_OPENED){
    switch ($pi_status){
        case PROTOCOL_STATUS_OPENED:
            $lsContent = '<span><i class="fe fe-unlock text-green"></i></span>'; break;
        case PROTOCOL_STATUS_CLOSED:
            $lsContent = '<span><i class="fe fe-lock text-gray"></i></span>'; break;
        case PROTOCOL_STATUS_CANCELED:
            $lsContent = '<span><i class="fe fe-x text-red"></i></span>'; break;
    }
  return $lsContent;
}

function fs_protocol_status_color($pi_status=PROTOCOL_STATUS_OPENED){
    switch ($pi_status){
        case PROTOCOL_STATUS_CLOSED:
            $lsContent = '#868E96'; break;
        case PROTOCOL_STATUS_CANCELED:
            $lsContent = '#CD201F'; break;
        default:
            $lsContent = '#5EBA00'; break;
    }
  return $lsContent;
}

function fs_protocol_check_status($pi_status=CHECK_STATUS_OPENED){
    switch ($pi_status){
        case CHECK_STATUS_UPCOMING:
            $lsContent = '<i class="fa fa-calendar-plus-o text-yellow"></i>'; break;
        case CHECK_STATUS_DELAYED:
            $lsContent = '<i class="fa fa-calendar-minus-o text-red"></i>'; break;
        case CHECK_STATUS_PROGRESS:
            $lsContent = '<i class="fa fa-calendar text-green"></i>'; break;
        case CHECK_STATUS_CLOSED:
            $lsContent = '<i class="fa fa-calendar-check-o text-gray"></i>'; break;
        case CHECK_STATUS_CANCELED:
            $lsContent = '<i class="fa fa-calendar-times-o text-red"></i>'; break;
        default:
            $lsContent = '<i class="fa fa-calendar-o text-blue"></i>'; break;
    }
  return $lsContent;
}

function fs_progress_color($pr_progress){
    $ls_bg_color = 'bg-green';
    if ($pr_progress > 90 and $pr_progress <=100){
        $ls_bg_color = 'bg-yellow';
    }
    if ($pr_progress > 100){
        $ls_bg_color = 'bg-red';
    }
  return $ls_bg_color;
}

function fs_protocol_check_status_ico($pi_status=CHECK_STATUS_OPENED){
    switch ($pi_status){
        case CHECK_STATUS_UPCOMING:
            $lsContent =
                '<span class="ps-3 text-orange">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5"></path>
                        <path d="M16 3v4"></path>
                        <path d="M8 3v4"></path>
                        <path d="M4 11h16"></path>
                        <path d="M16 19h6"></path>
                        <path d="M19 16v6"></path>
                     </svg>
                </span>';
            break;
        case CHECK_STATUS_DELAYED:
            $lsContent = 
                '<span class="text-red">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-minus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v8"></path>
                        <path d="M16 3v4"></path>
                        <path d="M8 3v4"></path>
                        <path d="M4 11h16"></path>
                        <path d="M16 19h6"></path>
                     </svg>
                </span>';
            break;
        case CHECK_STATUS_PROGRESS:
            $lsContent = 
                '<span class="text-green">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-time" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4"></path>
                        <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                        <path d="M15 3v4"></path>
                        <path d="M7 3v4"></path>
                        <path d="M3 11h16"></path>
                        <path d="M18 16.496v1.504l1 1"></path>
                     </svg>
                </span>';
            break;
        case CHECK_STATUS_CLOSED:
            $lsContent = 
                '<span class="text-gray">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M11.5 21h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v6"></path>
                        <path d="M16 3v4"></path>
                        <path d="M8 3v4"></path>
                        <path d="M4 11h16"></path>
                        <path d="M15 19l2 2l4 -4"></path>
                     </svg>
                </span>';
            break;
        case CHECK_STATUS_CANCELED:
            $lsContent = 
                '<span class="text-red">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M13 21h-7a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v6.5"></path>
                        <path d="M16 3v4"></path>
                        <path d="M8 3v4"></path>
                        <path d="M4 11h16"></path>
                        <path d="M22 22l-5 -5"></path>
                        <path d="M17 22l5 -5"></path>
                     </svg>
                </span>';
            break;
        default:
            $lsContent = 
                '<span class="text-blue">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                        <path d="M16 3l0 4"></path>
                        <path d="M8 3l0 4"></path>
                        <path d="M4 11l16 0"></path>
                        <path d="M8 15h2v2h-2z"></path>
                     </svg>
                </span>';
            break;
    }
  return $lsContent;
}

function fs_protocol_check_status_color($pi_status=CHECK_STATUS_OPENED){
    switch ($pi_status){
        case CHECK_STATUS_UPCOMING:
            $lsContent = '#F1C40F'; break;
        case CHECK_STATUS_DELAYED:
            $lsContent = '#CD201F'; break;
        case CHECK_STATUS_PROGRESS:
            $lsContent = '#5EBA00'; break;
        case CHECK_STATUS_CLOSED:
            $lsContent = '#868E96'; break;
        case CHECK_STATUS_CANCELED:
            $lsContent = '#CD201F'; break;
        default:
            $lsContent = '#467FCF'; break;
    }
  return $lsContent;
}

function fs_protocol_check_status_color_name($pi_status=CHECK_STATUS_OPENED){
    switch ($pi_status){
        case CHECK_STATUS_UPCOMING:
            $lsContent = 'orange'; break;
        case CHECK_STATUS_DELAYED:
            $lsContent = 'red'; break;
        case CHECK_STATUS_PROGRESS:
            $lsContent = 'green'; break;
        case CHECK_STATUS_CLOSED:
            $lsContent = 'gray'; break;
        case CHECK_STATUS_CANCELED:
            $lsContent = 'red'; break;
        default:
            $lsContent = 'blue'; break;
    }
  return $lsContent;
}

function fs_protocol_repetition_colors($pi_repetition=0){
    switch ($pi_repetition){
        case 1:
            $lsColor = '<div class="card-status bg-primary"></div>'; break;
        case 2:
            $lsColor = '<div class="card-status bg-secondary"></div>'; break;
        case 3:
            $lsColor = '<div class="card-status bg-success"></div>'; break;
        case 4:
            $lsColor = '<div class="card-status bg-warning"></div>'; break;
        case 5:
            $lsColor = '<div class="card-status bg-info"></div>'; break;
        default:
            $lsColor = '<div class="card-status bg-danger"></div>'; break;
    }
  return $lsColor;
}

function fs_protocol_repetition_colors_col($pi_repetition=0){
    switch ($pi_repetition){
        case 1:
            $lsColor = '<span class="badge bg-blue-lt">B'.$pi_repetition.'</span>'; break;
        case 2:
            $lsColor = '<span class="badge bg-gray-lt">B'.$pi_repetition.'</span>'; break;
        case 3:
            $lsColor = '<span class="badge bg-green-lt">B'.$pi_repetition.'</span>'; break;
        case 4:
            $lsColor = '<span class="badge bg-orange-lt">B'.$pi_repetition.'</span>'; break;
        case 5:
            $lsColor = '<span class="badge bg-indigo-lt">B'.$pi_repetition.'</span>'; break;
        default:
            $lsColor = '<span class="badge bg-red-lt">B'.$pi_repetition.'</span>'; break;
    }
  return $lsColor;
}

function fs_protocol_result($pi_position){
    switch ($pi_position){
        case ($pi_position <= 5):
            $lsContent = $pi_position.
                '<span class="small pr-3 text-green">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M5 12l5 5l10 -10"></path>
                    </svg>
                </span>';
            break;
        case ($pi_position > 5) and ($pi_position <= 10):
            $lsContent = $pi_position.
                '<span class="small pr-3 text-blue">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-equal" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M5 10h14"></path>
                       <path d="M5 14h14"></path>
                    </svg>
                </span>';
            break;
        case ($pi_position > 10):
            $lsContent = $pi_position.
                '<span class="small pr-3 text-red">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M18 6l-12 12"></path>
                       <path d="M6 6l12 12"></path>
                    </svg>
                </span>';
            break;
    }
  return $lsContent;
}

function fsFlashMessage($poFlasdata){
    $lsMsg = '';
    $lsIcoCheck =
        '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 12l5 5l10 -10"></path>
        </svg>';
    $lsIcoBell =
       '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
            <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
            <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path>
            <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path>
        </svg>';
    $lsIcoAlert =
       '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z"></path>
            <path d="M12 9v4"></path>
            <path d="M12 17h.01"></path>
        </svg>';

    if($poFlasdata){
        $lsType = '';
        $lsIco = '';
        $loType = $poFlasdata['type'];
        $loText = $poFlasdata['text'];
        if ($loType == TYPE_PRIMARY){
            $lsType = 'primary';
            $lsIco = $lsIcoBell;
        }
        if ($loType == TYPE_SECONDARY){
            $lsType = 'secondary';
            $lsIco = $lsIcoBell;
        }
        if ($loType == TYPE_SUCCESS){
            $lsType = 'success';
            $lsIco = $lsIcoCheck;
        }
        if ($loType == TYPE_INFO){
            $lsType = 'info';
            $lsIco = $lsIcoBell;
        }
        if ($loType == TYPE_WARNING){
            $lsType = 'warning';
            $lsIco = $lsIcoBell;
        }
        if ($loType == TYPE_DANGER){
            $lsType = 'danger';
            $lsIco = $lsIcoAlert;
        }
        $lsMsg =
            '<div class="alert alert-'.$lsType.' alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <span class="me-2" aria-hidden="true">'.$lsIco.'</span>
                    </div>
                    <div>
                        '.$loText.'
                    </div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
            </div>';
    }
    return $lsMsg;
}

function fsInputError($psMessage){
  if (isset($psMessage)) {
    $lsHtml = $psMessage;
  }else{
    $lsHtml = '';
  }
  return $lsHtml;
}

function fsModalDelete($piKey=0){
  if($piKey==0){
    $lsReturn = '';
  }else{
    $lsReturn =
      '<div class="modal modal-danger fade" id="modal_confirmation">'.
        '<div class="modal-dialog modal-dialog-centered">'.
          '<div class="modal-content">'.
            '<div class="modal-header bg-gray-lightest">'.
              '<h3 class="modal-title">'.
                '<i class="fe fe-trash me-2 text-red"></i>Excluir<br>'.
              '</h3>'.
            '</div>'.
            '<div class="modal-body">'.
              '<div class="text-muted">Esta ação não poderá ser desfeita ou o registro recuperado.</div>'.
              '<hr class="mt-2"/>'.
              '<div class="pb-3">'.
                '<strong>Deseja excluir o registro selecionado?</strong>'.
              '</div>'.
              '<h4 class="pb-3">'.
                '<div id="code_exclusao"></div>'.
                '<strong><span id="name_exclusao"></span></strong>'.
                '<div id="desc_exclusao"></div>'.
              '</h4>'.
            '</div>'.
            '<div class="modal-footer">'.
              '<button type="button" class="btn btn-secondary" data-dismiss="modal">Não, retornar</button>'.
              '<button type="button" class="btn btn-danger" id="btn_excluir">Sim, excluir</button>'.
            '</div>'.
          '</div><!-- /.modal-content -->'.
        '</div><!-- /.modal-dialog -->'.
      '</div><!-- /.modal -->';
  }
  return $lsReturn;
}

function fo_lines_page($poRegsPage, $psRedirect){
    $lsReturn = '<ul class="pagination m-0 ms-auto">';
    // 5 records per page
    $li_5 = PARAM_LINES_PAGE_5;
    if ($poRegsPage==$li_5){
        $lsReturn .= '<li class="page-item active"><span class="page-link"><span>'.$li_5.'</span></span></li>';
    }else{
        $lsReturn .= '<li class="page-link"><a href="'.base_url(RT_PARAMS_LINES_PAGE).'/'.$li_5.'/'.$psRedirect.'">'.$li_5.'</a></li>';
    }

    // 10 records per page
    $li_10 = PARAM_LINES_PAGE_10;
    if ($poRegsPage==$li_10){
        $lsReturn .= '<li class="page-item active"><span class="page-link"><span>'.$li_10.'</span></span></li>';
    }else{
        $lsReturn .= '<li class="page-link"><a href="'.base_url(RT_PARAMS_LINES_PAGE).'/'.$li_10.'/'.$psRedirect.'">'.$li_10.'</a></li>';
    }

    // 50 records per page
    $li_50 = PARAM_LINES_PAGE_50;
    if ($poRegsPage==$li_50){
        $lsReturn .= '<li class="page-item active"><span class="page-link"><span>'.$li_50.'</span></span></li>';
    }else{
        $lsReturn .= '<li class="page-link"><a href="'.base_url(RT_PARAMS_LINES_PAGE).'/'.$li_50.'/'.$psRedirect.'">'.$li_50.'</a></li>';
    }

    // 100 records per page
    $li_100 = PARAM_LINES_PAGE_100;
    if ($poRegsPage==$li_100){
        $lsReturn .= '<li class="page-item active"><span class="page-link"><span>'.$li_100.'</span></span></li>';
    }else{
        $lsReturn .= '<li class="page-link"><a href="'.base_url(RT_PARAMS_LINES_PAGE).'/'.$li_100.'/'.$psRedirect.'">'.$li_100.'</a></li>';
    }

    // all records per page
    $li_all = PARAM_LINES_PAGE_ALL;
    if ($poRegsPage==$li_all){
        $lsReturn .= '<li class="page-item active"><span class="page-link"><span>Todos</span></span></li>';
    }else{
        $lsReturn .= '<li class="page-link"><a href="'.base_url(RT_PARAMS_LINES_PAGE).'/'.$li_all.'/'.$psRedirect.'">Todos</a></li>';
    }

    $lsReturn .= '</ul>';
  return $lsReturn;
}

function foPagination($psControle, $piTotal){
  $loPages = &get_instance();

  $config['attributes'] = array('');

  $config['full_tag_open']  = "<ul class='pagination pull-right'>";
  $config['full_tag_close'] = "</ul>";

  $config['num_tag_open']  = "<li class='page-link'>";
  $config['num_tag_close'] = "</li>";

  $config['cur_tag_open']  = '<li class="page-item active"><span class="page-link"><span>';
  $config['cur_tag_close'] = '</span></span></li>';

  $config['first_link']      = '<<'; // 'Primeiro';
  $config['first_tag_open']  = '<li class="page-link">';
  $config['first_tag_close'] = '</li>';

  $config['next_link']      = '>'; // 'Próximo';
  $config['next_tag_open']  = "<li class='page-link next'>";
  $config['next_tag_close'] = '</li>';

  $config['prev_link']      = '<'; // 'Anterior';
  $config['prev_tag_open']  = "<li class='page-link prev'>";
  $config['prev_tag_close'] = '</li>';

  $config['last_link']      = '>>'; // 'Último';
  $config['last_tag_open']  = '<li class="page-link">';
  $config['last_tag_close'] = '</li>';

  $config['use_page_numbers'] = FALSE;

  $config['base_url']    = base_url($psControle);
  $config['total_rows']  = $piTotal;
  $config['per_page']    = fi_get_lines_page();
  $config['uri_segment'] = 2;
  $config['num_links']   = 2;

  $loPages->pagination->initialize($config);
  return $loPages->pagination->create_links();
}

function fsEmptyTable($poDataSet){
  if (count($poDataSet) <= 0) {
    $lsHtml =
      '<div class="card">'.
        '<div class="card-body">'.
          '<div class="mb-4 text-center">'.
            '<img class="img-fluid mt-4" src="'.base_url(ICON_EMPTY).'" alt="Tabela vazia">'.
            '<h5 class="pt-4">Tabela vazia !</h5>'.
          '</div>'.
        '</div>'.
      '</div>';
  }else{
    $lsHtml = '';
  }
  return $lsHtml;
}

function fs_dashboard_frame_checks($pi_status, $ps_name, $pr_amout, $pr_perc){
    $ls_result =
        '<div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="d-flex mb-2 text-'.fs_protocol_check_status_color_name($pi_status).'">
                        <div class="text-end"><b>'.$pr_perc.' %</b></div>
                        <div class="ms-auto">
                            <span class="text-green d-inline-flex align-items-center lh-1">'.
                                fs_protocol_check_status_ico($pi_status).'
                            </span>
                        </div>
                    </div>
                    <div class="h1 m-0">'.$pr_amout.'</div>
                    <div class="text-muted mb-1">'.$ps_name.'</div>
                </div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-'.
                          fs_protocol_check_status_color_name($pi_status).'" role="progressbar" style="width: '.
                          $pr_perc.'%" aria-valuenow="'.
                          $pr_perc.'" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
            </div>
        </div>';
  return $ls_result;
}

function fs_name_integration($po_integration){
    $ls_name = '';
    switch ($po_integration){
        case SHD_SAMPLES_ANALYZE:
            $ls_name = 'Amostra(s) de Análises e Pesos'; break;
        case SHD_SAMPLES_WEIGHT:
            $ls_name = 'Amostra(s) de Pesos'; break;
        case SHD_SAMPLES_STEMS:
            $ls_name = 'Amostra(s) de Colmos'; break;
        case SHD_SAMPLES_HEIGHT:
            $ls_name = 'Amostra(s) de Alturas'; break;
        case SHD_SAMPLES_DIAMETER:
            $ls_name = 'Amostra(s) de Diâmetros'; break;
        case SHD_SAMPLES_INTERNODES:
            $ls_name = 'Amostra(s) de Entrenós'; break;
        case SHD_SAMPLES_PITH:
            $ls_name = 'Amostra(s) de Isoporos'; break;
        case SHD_SAMPLES_FLOWERING:
            $ls_name = 'Amostra(s) de Florescimento'; break;
        case SHD_SAMPLES_INFESTATION:
            $ls_name = 'Amostra(s) de Infestações'; break;
        case SHD_SAMPLES_HOLES:
            $ls_name = 'Amostra(s) de Furos'; break;
        case SHD_SAMPLES_DAMAGES:
            $ls_name = 'Amostra(s) de Danos'; break;
        case SHD_SAMPLES_TILLERS:
            $ls_name = 'Amostra(s) de Perfilhos'; break;
        case SHD_SAMPLES_COMPOUNDS:
            $ls_name = 'Amostra(s) de Compostos'; break;
        case SHD_SAMPLES_DISEASES:
            $ls_name = 'Amostra(s) de Doenças'; break;
        case SHD_SAMPLES_PESTS:
            $ls_name = 'Amostra(s) de Pragas'; break;
    }
    return $ls_name;
}
