<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function fsActionIntegration($pi_action, $pi_active, $pi_code){
    $ls_modal = '<a href="#" data-bs-toggle="modal" data-bs-target="#myModalDat'.$pi_code.'">
            <span class="me-1 text-blue">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                   <path d="M7 9l5 -5l5 5"></path>
                   <path d="M12 4l0 12"></path>
                </svg>
            </span>Planilha</a>';
    /* exportação do template */
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_SOILS){
        return '<a href="'.base_url(RT_INTEGRATIONS_DAT_SOILS_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_VARIETIES){
        return '<a href="'.base_url(RT_INTEGRATIONS_DAT_VARIETIES_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_GEOGRAPHICAL_UNITS){
        return '<a href="'.base_url(RT_INTEGRATIONS_DAT_GEOGRAPHICAL_UNITS_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_TEAMS){
        return '<a href="'.base_url(RT_INTEGRATIONS_DAT_TEAMS_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_PRODUCTS){
        return '<a href="'.base_url(RT_INTEGRATIONS_DAT_PRODUCTS_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_COMPUNDS){
        return '<a href="'.base_url(RT_INTEGRATIONS_DAT_COMPOUNDS_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_DISEASES){
        return '<a href="'.base_url(RT_INTEGRATIONS_DAT_DISEASES_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_PESTS){
        return '<a href="'.base_url(RT_INTEGRATIONS_DAT_PESTS_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }

    /* importação das planilhas de cadastros */
    if($pi_action==2 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_SOILS){
        return $ls_modal;
    }
    if($pi_action==2 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_VARIETIES){
        return $ls_modal;
    }
    if($pi_action==2 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_GEOGRAPHICAL_UNITS){
        return $ls_modal;
    }
    if($pi_action==2 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_TEAMS){
        return $ls_modal;
    }
    if($pi_action==2 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_PRODUCTS){
        return $ls_modal;
    }
    if($pi_action==2 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_COMPUNDS){
        return $ls_modal;
    }
    if($pi_action==2 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_DISEASES){
        return $ls_modal;
    }
    if($pi_action==2 and $pi_active==ACTIVE_YES and $pi_code==SHD_DAT_PESTS){
        return $ls_modal;
    }
}

function fs_form_action($pi_integration){
    $ls_form_action = '';
    switch ($pi_integration){
        case SHD_DAT_SOILS:
            $ls_form_action = RT_INTEGRATIONS_DAT_SOILS_IMPORT; break;
        case SHD_DAT_VARIETIES:
            $ls_form_action = RT_INTEGRATIONS_DAT_VARIETIES_IMPORT; break;
        case SHD_DAT_GEOGRAPHICAL_UNITS:
            $ls_form_action = RT_INTEGRATIONS_DAT_GEOGRAPHICAL_UNITS_IMPORT; break;
        case SHD_DAT_TEAMS:
            $ls_form_action = RT_INTEGRATIONS_DAT_TEAMS_IMPORT; break;
        case SHD_DAT_PRODUCTS:
            $ls_form_action = RT_INTEGRATIONS_DAT_PRODUCTS_IMPORT; break;
        case SHD_DAT_COMPUNDS:
            $ls_form_action = RT_INTEGRATIONS_DAT_COMPOUNDS_IMPORT; break;
        case SHD_DAT_DISEASES:
            $ls_form_action = RT_INTEGRATIONS_DAT_DISEASES_IMPORT; break;
        case SHD_DAT_PESTS:
            $ls_form_action = RT_INTEGRATIONS_DAT_PESTS_IMPORT; break;
    }
    return $ls_form_action;
}

function fs_file_upload_dat($pi_integration){
    $ls_file_upload = '';
    switch ($pi_integration){
        case SHD_DAT_SOILS:
            $ls_file_upload = FILE_DAT_SOILS; break;
        case SHD_DAT_VARIETIES:
            $ls_file_upload = FILE_DAT_VARIETIES; break;
        case SHD_DAT_GEOGRAPHICAL_UNITS:
            $ls_file_upload = FILE_DAT_GEOGRAPHICAL_UNITS; break;
        case SHD_DAT_TEAMS:
            $ls_file_upload = FILE_DAT_TEAMS; break;
        case SHD_DAT_PRODUCTS:
            $ls_file_upload = FILE_DAT_PRODUCTS; break;
        case SHD_DAT_COMPUNDS:
            $ls_file_upload = FILE_DAT_COMPOUNDS; break;
        case SHD_DAT_DISEASES:
            $ls_file_upload = FILE_DAT_DISEASES; break;
        case SHD_DAT_PESTS:
            $ls_file_upload = FILE_DAT_PESTS; break;
    }
    return $ls_file_upload;
}

if(isset($flash_message)){echo $flash_message;}
?>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards row-deck">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $view_title; ?></h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                            <thead>
                                <tr role="row">
                                    <th colspan="2">Processo</th>
                                    <th class="text-center">Exportar</th>
                                    <th class="text-center">Importar</th>
                                    <th class="text-center">Última atualização</th>
                                    <th class="text-end">Linhas</th>
                                    <th>Usuário</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ds_dataset as $row){ ?>
                                <tr role="row" class="odd">
                                    <td class="text-center text-muted"><?php echo $row->code; ?></td>
                                    <td><?php echo $row->integration_name; ?></td>
                                    <td class="text-center"><?php echo fsActionIntegration(1, $row->export, $row->code); ?></td>
                                    <td class="text-center"><?php echo fsActionIntegration(2, $row->import, $row->code); ?></td>
                                    <td class="text-center text-muted"><?php echo fdDateTime_MySQL_to_Br($row->log_at); ?></td>
                                    <td class="text-end text-muted"><?php echo $row->num_records; ?></td>
                                    <td class="text-muted"><?php echo $row->nick_name; ?></td>
                                </tr>

                                <!-- Begin: Modal -->
                                <div class="modal fade" id="myModalDat<?php echo $row->code; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal<?php echo $row->code; ?>Label">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModal<?php echo $row->code; ?>Label">
                                                    <i class="fe fe-upload me-2"></i>Importar planilha de dados
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url(fs_form_action($row->code)); ?>" method="post" enctype="multipart/form-data"/>
                                                    <div class="alert alert-primary" role="alert">
                                                        <h4 class="alert-title">Observações</h4>
                                                        <div class="text-muted">
                                                            <p class="text-muted">
                                                                <i class="fa fa-caret-right me-2" aria-hidden="true"></i>O arquivo deve possuir no máximo 2MB</br>
                                                                <i class="fa fa-caret-right me-2" aria-hidden="true"></i>O arquivo deve ser do tipo csv</br>
                                                                <i class="fa fa-caret-right me-2" aria-hidden="true"></i>A coluna Licença deverá possuir apenas o valor <b><?php echo fi_get_license();?></b>
                                                            </p>
                                                        </div>
                                                    </div>                                        
                                                    <div class="form-group">
                                                        <div class="form-label">Localize o arquivo <?php echo fs_file_upload_dat($row->code); ?> com a planilha de dados</div>
                                                        <input type="file" id="edt_import_sample" name="edt_import_sample" accept=".csv">
                                                    </div>
                                                    <div class="text-right pt-6">
                                                        <input type="submit" name="btnImport" id="btnImport" class="btn btn-primary me-2" style="width: 100px;" value="Importar" />
                                                        <input type="submit" name="btnReturn" id="btnReturn" class="btn btn-secondary" data-dismiss="modal" style="width: 100px;" value="Retornar" />                              
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End: Modal -->

                            <?php } ?>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>           
    </div>
</div>
