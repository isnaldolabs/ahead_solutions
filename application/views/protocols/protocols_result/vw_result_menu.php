<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function fbDropdownItemActive($piOption, $piMenuActive){
    return ($piOption==$piMenuActive?' active':'');
}

function fs_route_math($piDesigning){
$ls_result = '';
switch ($piDesigning){
    case 1: $ls_result = base_url(RT_PROTOCOLS_RESULT_MATH_DIC);    break;      // DIC
    case 2: $ls_result = base_url(RT_PROTOCOLS_RESULT_MATH_DBA);    break;      // DBA
    case 3: $ls_result = base_url(RT_PROTOCOLS_RESULT_MATH_DQL);    break;      // DQL
}
return $ls_result;
}

echo fsReturnPage(RT_PROTOCOLS, '#'.$protocol_id.' '.$protocol_title);
if(isset($flash_message)){
    echo $flash_message;
}
?>
<div class="card border-top-0">
    <div class="card-header">
        <ul class="nav nav-pills card-header-tabs" data-bs-toggle="tabs">
            <li class="nav-item">
                <a href="#tabs-protocol" class="nav-link active" data-bs-toggle="tab">Protocolo</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-samples" class="nav-link" data-bs-toggle="tab">Amostras</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-weathers" class="nav-link" data-bs-toggle="tab">Condições Climáticas</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-outcomes" class="nav-link" data-bs-toggle="tab">Resultados</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active show" id="tabs-protocol">
                
                
                
                <h4>Home tab</h4>
                <div>Cursus turpis vestibulum, dui in pharetra vulputate</div>
            </div>
            <div class="tab-pane" id="tabs-samples">
                
                
                
                <h4>Profile tab</h4>
                <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies</div>
            </div>
            <div class="tab-pane" id="tabs-weathers">



            </div>
            <div class="tab-pane" id="tabs-outcomes">
                
                
                
                <h4>Profile tab</h4>
                <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies</div>
            </div>
        </div>
    </div>
</div>










        <!--begin: menu para os resultados do experimento-->
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                    <!--Protocolo é exibido por padrão-->
                    <li <?php echo PADDING_NAV_ITEM; ?> class="nav-item">
                        <a href="<?php echo base_url(RT_PROTOCOLS_RESULT_PROT).'/'.md5(fi_get_protocol()); ?>"
                           class="nav-link <?php echo ($menu_prot_active==1?'active':''); ?>">
                            <i class="fe fe-crosshair"></i>Protocolo
                        </a>
                    </li>

                    <!--begin: submenu para as amostras realizadas-->
                    <?php if(count($ds_protocol_samples) > 0){ ?>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link <?php echo ($menu_samp_active==1?'active':''); ?>"
                               data-toggle="dropdown" aria-expanded="false"><i class="fa fa-flask"></i> Amostras
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow" x-placement="top-start" style="position: absolute; transform: translate3d(12px, -60px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <!--Demais amostras configuradas para o Protocolo-->
                                <?php foreach ($ds_protocol_samples as $row){ ?>
                                    <a href="<?php echo base_url($row->sample_link).'/'.md5(fi_get_protocol()); ?>"
                                       class="dropdown-item <?php echo fbDropdownItemActive($row->sample_id, $menu_samp_active); ?>">
                                        <?php echo $row->sample_name; ?>
                                    </a>
                                <?php } ?>

                                <div class="dropdown-divider"></div>

                                <!--Situação climática durante o período do experimento-->
                                <a href="<?php echo base_url(RT_PROTOCOLS_RESULT_CLIMATIC).'/'.md5(fi_get_protocol()); ?>"
                                   class="dropdown-item <?php echo ($menu_clim_active==1?'active':''); ?>">
                                    Condições Climáticas
                                </a>

                            </div>
                        </li>
                    <?php } ?>
                    <!--end: submenu para as amostras realizadas-->

                    <!--begin: menu para os resultados do modelo matemático-->
                    <?php if(count($ds_math_variables) > 0){ ?>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link <?php echo ($menu_math_active==1?'active':''); ?>"
                               data-toggle="dropdown" aria-expanded="false"><i class="fe fe-activity"></i> Modelo Matemático
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow" x-placement="top-start" style="position: absolute; transform: translate3d(12px, -60px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <?php foreach ($ds_math_variables as $row){ ?>
                                    <a href="<?php echo base_url(RT_PROTOCOLS_RESULT_MATH_DBA).'/'.$row->variable_id.'/'.md5(fi_get_protocol()); ?>"
                                       class="dropdown-item <?php echo fbDropdownItemActive($row->variable_id, $menu_variable_active); ?>">
                                        <?php echo $row->variable_name; ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </li>
                    <?php } ?>
                    <!--end: menu para os resultados do modelo matemático-->

                </ul>
              </div>
            </div>
          </div>
        </div>
        <!--end: menu para os resultados do experimento-->
