<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function fsActionIntegration($pi_action, $pi_active, $pi_code){
    $ls_modal = '<a href="#" data-bs-toggle="modal" data-bs-target="#myModalSamples">
            <span class="me-1 text-blue">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                   <path d="M7 9l5 -5l5 5"></path>
                   <path d="M12 4l0 12"></path>
                </svg>
            </span>Amostras</a>';
    /* exportação do template */
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_ANALYZE){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_ANALYZE_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_WEIGHT){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_WEIGHT_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_STEMS){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_STEMS_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_HEIGHT){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_HEIGHT_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_DIAMETER){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_DIAMETER_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_INTERNODES){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_INTERNODES_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_PITH){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_PITH_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_FLOWERING){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_FLOWERING_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_INFESTATION){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_INFESTATION_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_HOLES){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_HOLES_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_DAMAGES){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_DAMAGES_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_TILLERS){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_TILLERS_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_COMPOUNDS){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_COMPOUNDS_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_DISEASES){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_DISEASES_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_PESTS){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_PESTS_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }
    if($pi_action==1 and $pi_active==ACTIVE_YES and $pi_code==SHD_SAMPLES_GAPS){
        return '<a href="'.base_url(RT_INTEGRATIONS_SPL_GAPS_TEMPLATE).'">
                    <span class="me-1 text-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                           <path d="M7 11l5 5l5 -5"></path>
                           <path d="M12 4l0 12"></path>
                        </svg>
                    </span>Template</a>';
    }

    /* importação das amostras */
    $la_imp_samples = array(SHD_SAMPLES_ANALYZE, SHD_SAMPLES_WEIGHT, SHD_SAMPLES_STEMS,
                            SHD_SAMPLES_HEIGHT, SHD_SAMPLES_DIAMETER, SHD_SAMPLES_INTERNODES,
                            SHD_SAMPLES_PITH, SHD_SAMPLES_FLOWERING, SHD_SAMPLES_INFESTATION,
                            SHD_SAMPLES_HOLES, SHD_SAMPLES_DAMAGES, SHD_SAMPLES_TILLERS,
                            SHD_SAMPLES_COMPOUNDS, SHD_SAMPLES_DISEASES, SHD_SAMPLES_PESTS,
                            SHD_SAMPLES_GAPS);
    if ($pi_action==2 and $pi_active==ACTIVE_YES and in_array($pi_code, $la_imp_samples)){
        return $ls_modal;
    }
}

function fs_file_upload_spl($pi_integration){
    $ls_file_upload = '';
    switch ($pi_integration){
        case SHD_SAMPLES_ANALYZE:
            $ls_file_upload = FILE_SAMPLES_ANALYZE; break;
        case SHD_SAMPLES_WEIGHT:
            $ls_file_upload = FILE_SAMPLES_WEIGHT; break;
        case SHD_SAMPLES_STEMS:
            $ls_file_upload = FILE_SAMPLES_STEMS; break;
        case SHD_SAMPLES_HEIGHT:
            $ls_file_upload = FILE_SAMPLES_HEIGHT; break;
        case SHD_SAMPLES_DIAMETER:
            $ls_file_upload = FILE_SAMPLES_DIAMETER; break;
        case SHD_SAMPLES_INTERNODES:
            $ls_file_upload = FILE_SAMPLES_INTERNODES; break;
        case SHD_SAMPLES_PITH:
            $ls_file_upload = FILE_SAMPLES_PITH; break;
        case SHD_SAMPLES_FLOWERING:
            $ls_file_upload = FILE_SAMPLES_FLOWERING; break;
        case SHD_SAMPLES_INFESTATION:
            $ls_file_upload = FILE_SAMPLES_INFESTATION; break;
        case SHD_SAMPLES_HOLES:
            $ls_file_upload = FILE_SAMPLES_HOLES; break;
        case SHD_SAMPLES_DAMAGES:
            $ls_file_upload = FILE_SAMPLES_DAMAGES; break;
        case SHD_SAMPLES_TILLERS:
            $ls_file_upload = FILE_SAMPLES_TILLERS; break;
        case SHD_SAMPLES_COMPOUNDS:
            $ls_file_upload = FILE_SAMPLES_COMPOUNDS; break;
        case SHD_SAMPLES_DISEASES:
            $ls_file_upload = FILE_SAMPLES_DISEASES; break;
        case SHD_SAMPLES_PESTS:
            $ls_file_upload = FILE_SAMPLES_PESTS; break;
        case SHD_SAMPLES_GAPS:
            $ls_file_upload = FILE_SAMPLES_GAPS; break;
    }
    return $ls_file_upload;
}
?>
        <?php echo fsReturnPage($original_route, '#'.$protocol_id.' '.$protocol_title); ?>
        <div class="my-3 my-md-5">
          <div class="container">

            <?php if(isset($flash_message)){echo $flash_message;} ?>

            <div class="row">
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
                        <div class="modal fade" id="myModalSamples" tabindex="-1" role="dialog" aria-labelledby="myModalSamplesLabel">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalSamplesLabel">
                                  <i class="fe fe-upload me-2"></i>Importar amostras
                                </h4>
                              </div>
                              <div class="modal-body">
                                    <form action="<?php echo base_url($form_action); ?>" method="post" enctype="multipart/form-data">
                                        <div class="alert alert-primary" role="alert">
                                            <h4 class="alert-title">Observações</h4>
                                            <div class="text-muted">
                                                <p class="text-muted">
                                                    <i class="fa fa-caret-right me-2" aria-hidden="true"></i>O arquivo deve possuir no máximo 2MB</br>
                                                    <i class="fa fa-caret-right me-2" aria-hidden="true"></i>O arquivo deve ser do tipo csv</br>
                                                    <i class="fa fa-caret-right me-2" aria-hidden="true"></i>As colunas já preenchidas não deverão ser alteradas
                                                </p>
                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <div class="form-label">Localize o arquivo <?php echo fs_file_upload_spl($row->code); ?> com a planilha de amostras</div>
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
