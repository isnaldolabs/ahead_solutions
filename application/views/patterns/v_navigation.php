<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- BODY OPEN --------------------------------------------------------------------------->
    <body class="layout-fluid">
        <script src="<?php echo base_url('assets/dist/js/demo-theme.min.js'); ?>"></script>

        <!-- PAGE OPEN --------------------------------------------------------------------------->
        <div class="page">
            <div class="sticky-top">                

                <!-- NAVBAR --------------------------------------------------------------------------->
                <header class="navbar navbar-expand-md d-print-none" >
                    <div class="container-xl">
                        <button class="navbar-toggler" type="button" 
                                data-bs-toggle="collapse" data-bs-target="#navbar-menu" 
                                aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                            <a href="<?php echo base_url(RT_MAIN_DASH); ?>">
                                <img src="<?php echo base_url(FAVICON); ?>" 
                                     width="110" height="32" 
                                     alt="<?php echo SYSTEM_NAME; ?>" 
                                     class="navbar-brand-image">
                            </a>
                            <span class="ps-2 border-left border-1">
                                <?php echo fs_get_license_short_name(); ?>
                            </span>
                        </h1>
                        <div class="navbar-nav flex-row order-md-last">

                            <!-- PROFILES BEGIN --------------------------------------------------------------------------->
                            <div class="d-none d-md-flex">

                                <!-- alerts begin --------------------------------------------------------------------------->
                                <?php
                                    $la_params = array(
                                        'license_id' => fi_get_license()
                                    );
                                    $lo_alerts = fo_get_protocols_alerts($la_params);
                                    if (count($lo_alerts)>0){
                                ?>
                                <div class="nav-item dropdown d-none d-md-flex me-3">
                                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                                        <span class="badge bg-red"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Eventos recentes</h3>
                                            </div>
                                            <div class="list-group list-group-flush list-group-hoverable">
                                                <div class="list-group-item">
                                                    <?php foreach ($lo_alerts as $row){
                                                        if (fiLevelAccess(fi_get_user(), FNC_QRY_PROTOCOLS_ALERTS)==ACCESS_LEVEL_COMPLETE){
                                                            $ls_href = base_url(RT_QRY_PROTOCOLS_ALERTS_DB_UPD_AWARE)."/".md5($row->alert_id);
                                                        }else{
                                                            $ls_href = 'javascript:void();';
                                                        }

                                                        $ls_alert_p = preg_replace('/planejada/', '<span class="text-blue" style="font-weight: 500;">planejada</span>', $row->alert_name);
                                                        $ls_alert_d = preg_replace('/atrasada/', '<span class="text-red" style="font-weight: 500;">atrasada</span>', $ls_alert_p);
                                                        echo
                                                            '<a href="'.$ls_href.'" class="dropdown-item d-flex">'.
                                                                '<div>'.$ls_alert_d.'</div>'.
                                                            '</a>';
                                                    } ?>
                                                </div>
                                            </div>
                                            <?php if (fiLevelAccess(fi_get_user(), FNC_QRY_PROTOCOLS_ALERTS)>=ACCESS_LEVEL_READ){ ?>
                                                <div class="card-footer">
                                                    <a href="<?php echo base_url(RT_QRY_PROTOCOLS_ALERTS); ?>"
                                                       class="btn btn-primary">
                                                        Visualizar todos
                                                    </a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- alerts end --------------------------------------------------------------------------->
                            </div>

                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link d-flex lh-1 text-reset p-0"
                                   data-bs-toggle="dropdown" aria-label="Open user menu">
                                    <span class="avatar avatar-sm"
                                          style="background-image: url(<?php echo base_url(ICON_DEFAULT); ?>)">
                                    </span>
                                    <div class="d-none d-xl-block ps-2">
                                        <span class="text-default"><?php echo fs_get_nick_name(); ?></span>
                                        <small class="text-muted d-block mt-1"><?php echo fs_get_level_name(); ?></small>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <?php if(fiLevelAccess(fi_get_user(), FNC_INTEGRATIONS) != ACCESS_LEVEL_DENIED){ ?>
                                        <a class="dropdown-item"
                                           href="<?php echo base_url(RT_INTEGRATIONS_DAT); ?>">
                                            <span class="me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-exchange" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                   <path d="M7 10h14l-4 -4"></path>
                                                   <path d="M17 14h-14l4 4"></path>
                                                </svg>
                                            </span>
                                            Integrações
                                        </a>
                                    <?php } ?>                                
                                    <?php if(fi_get_is_admin()==ACTIVE_YES){ ?>
                                        <a class="dropdown-item"
                                           href="<?php echo base_url(RT_MAIN_ADMIN); ?>">
                                            <span class="me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-briefcase" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                   <path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                                   <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path>
                                                   <path d="M12 12l0 .01"></path>
                                                   <path d="M3 13a20 20 0 0 0 18 0"></path>
                                                </svg>
                                            </span>
                                            Administração
                                        </a>
                                        <?php if(fbAccessSecurity()==TRUE){ ?>
                                            <a class="dropdown-item"
                                               href="<?php echo base_url(RT_MAIN_SECURITY); ?>">
                                                <span class="me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                       <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                                                       <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                                                       <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                                                    </svg>
                                                </span>
                                                Segurança
                                            </a>
                                        <?php } ?>
                                    <?php } ?>
                                    <!-- Licenses begin ----------------------------------------------------->
                                    <div class="dropdown-divider"></div>

                                    <div class="dropdown-item disabled">
                                        <span class="small text-muted me-1">Licença</span>
                                    </div>
                                    <?php
                                        $laParamsLicenses = array(
                                            'user_id' => fi_get_user()
                                        );
                                        $ds_licenses = fo_get_licenses_users($laParamsLicenses);
                                        log_message('info', $this->db->last_query());

                                        foreach ($ds_licenses as $license_row){
                                            $lsIcon = ($license_row->license_id == fi_get_license()?'text-blue':'');
                                            $lsBorder = ($license_row->license_id == fi_get_license()?'style="border-left: 4px solid #467fcf;"':'');
                                        ?>
                                        <a class="dropdown-item" <?php echo $lsBorder;?>
                                           href="<?php echo base_url(RT_SECURITY_USERS_DB_UPD_LICENSE).'/'. fi_get_user().'/'.$license_row->license_id;?>">
                                            <i class="dropdown-icon <?php echo $lsIcon;?>"></i>&nbsp;<?php echo $license_row->short_name;?>
                                        </a>
                                    <?php } ?>
                                    <!-- Licenses end ----------------------------------------------------->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url(RT_SIGNOUT);?>">
                                        <span class="me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                               <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                                               <path d="M9 12h12l-3 -3"></path>
                                               <path d="M18 15l3 -3"></path>
                                            </svg>
                                        </span>
                                        Sair
                                    </a>
                                </div>
                            </div>
                            <!-- PROFILES END --------------------------------------------------------------------------->

                        </div>

                    </div>
                </header>

                  <!-- MENUS BEGIN --------------------------------------------------------------------------->
                <header class="navbar-expand-md">
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <div class="navbar">
                            <div class="container-xl">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle"
                                           href="#navbar-help" 
                                           data-bs-toggle="dropdown" data-bs-auto-close="outside" 
                                           role="button" aria-expanded="false">
                                            <span class="me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-code" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                   <path d="M11.5 21h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v6"></path>
                                                   <path d="M16 3v4"></path>
                                                   <path d="M8 3v4"></path>
                                                   <path d="M4 11h16"></path>
                                                   <path d="M20 21l2 -2l-2 -2"></path>
                                                   <path d="M17 17l-2 2l2 2"></path>
                                                </svg>
                                            </span>
                                            <span class="nav-link-title">
                                                <?php echo (fi_get_season()==NULL?'Selecione a safra':fs_get_season_name()); ?>
                                            </span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <span class="dropdown-header">Selecione a safra</span>
                                            <div class="dropdown-divider"></div>
                                            <?php
                                                $ds_Seasons = fo_get_seasons();
                                                foreach ($ds_Seasons as $season_row){
                                                  $lsIcon = ($season_row->season_id == fi_get_season()?'text-blue':'');
                                                  $lsBorder = ($season_row->season_id == fi_get_season()?'style="border-left: 4px solid #467fcf;"':'');
                                            ?>
                                                <a class="dropdown-item"
                                                   <?php echo $lsBorder;?>
                                                   href="<?php echo base_url(RT_SECURITY_USERS_DB_UPD_SEASONS).'/'. fi_get_user().'/'.$season_row->season_id;?>">
                                                    <i class="dropdown-icon <?php echo $lsIcon;?>"></i>&nbsp;<?php echo $season_row->name;?>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(RT_MAIN_PREPARE); ?>"
                                           class="nav-link <?php echo ($menu_active==MENU_PREPARE?'active':''); ?>">
                                            <span class="me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                   <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"></path>
                                                   <path d="M12 12l8 -4.5"></path>
                                                   <path d="M12 12l0 9"></path>
                                                   <path d="M12 12l-8 -4.5"></path>
                                                </svg>
                                            </span>
                                            Preparar
                                        </a>
                                    </li>                        
                                    <?php if(fiLevelAccess(fi_get_user(), FNC_PROTOCOLS) != ACCESS_LEVEL_DENIED){ ?>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(RT_PROTOCOLS); ?>"
                                           class="nav-link <?php echo ($menu_active==MENU_PROTOCOLS?'active':''); ?>">
                                            <span class="me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-grid-dots" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                   <path d="M18 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                   <path d="M6 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                   <path d="M6 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                   <path d="M18 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                   <path d="M8 18h8"></path>
                                                   <path d="M18 20v1"></path>
                                                   <path d="M18 3v1"></path>
                                                   <path d="M6 20v1"></path>
                                                   <path d="M6 10v-7"></path>
                                                   <path d="M12 3v18"></path>
                                                   <path d="M18 8v8"></path>
                                                   <path d="M8 12h13"></path>
                                                   <path d="M21 6h-1"></path>
                                                   <path d="M16 6h-13"></path>
                                                   <path d="M3 12h1"></path>
                                                   <path d="M20 18h1"></path>
                                                   <path d="M3 18h1"></path>
                                                   <path d="M6 14v2"></path>
                                                </svg>
                                            </span>
                                            Experimentos
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(RT_MAIN_ANALYZE); ?>"
                                           class="nav-link <?php echo ($menu_active==MENU_ANALYSIS?'active':''); ?>">
                                            <span class="me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-histogram" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                   <path d="M3 3v18h18"></path>
                                                   <path d="M20 18v3"></path>
                                                   <path d="M16 16v5"></path>
                                                   <path d="M12 13v8"></path>
                                                   <path d="M8 16v5"></path>
                                                   <path d="M3 11c6 0 5 -5 9 -5s3 5 9 5"></path>
                                                </svg>
                                            </span>
                                            Analisar
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url(RT_MAIN_DASH); ?>"
                                           class="nav-link <?php echo ($menu_active==MENU_DASHBOARD?'active':''); ?>">
                                            <span class="me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-desktop-analytics" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                   <path d="M3 4m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z"></path>
                                                   <path d="M7 20h10"></path>
                                                   <path d="M9 16v4"></path>
                                                   <path d="M15 16v4"></path>
                                                   <path d="M9 12v-4"></path>
                                                   <path d="M12 12v-1"></path>
                                                   <path d="M15 12v-2"></path>
                                                   <path d="M12 12v-1"></path>
                                                </svg>
                                            </span>
                                            Painel
                                        </a>
                                    </li>
                                </ul>
                                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                                    <?php if($search_bar==TRUE){ ?>
                                        <div class="input-icon">
                                            <span class="input-icon-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                                            </span>
                                            <input type="text" value="" class="form-control w-10"
                                                   placeholder="Pesquisar"
                                                   id="task-table-filter" data-action="filter" data-filters="#task-table">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- MENUS END --------------------------------------------------------------------------->

            </div> <!--sticky-top end-->

            <div class="page-wrapper">
