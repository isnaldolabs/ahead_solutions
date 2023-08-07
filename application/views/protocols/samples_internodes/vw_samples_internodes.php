<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <?php echo fsReturnPage(RT_PROTOCOLS, '#'.$protocol_id.' '.$protocol_title); ?>
        <div class="my-3 my-md-5">
          <div class="container">
              
            <?php if(isset($flash_message)){echo $flash_message;} ?>

            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><?php echo $view_title; ?></h3>
                    <div class="card-options">
                      <?php if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_INTERNODES)==ACCESS_LEVEL_COMPLETE){ ?>
                        <a href="<?php echo base_url(RT_CALL_INTEGRATIONS_SPL.'/'.SHD_SAMPLES_INTERNODES); ?>" class="btn btn-outline-secondary me-2">
                            <span class="me-1">
                                <?php echo ICO_ARROWS_RIGHT_LEFT; ?>
                            </span>Integrar</a>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                      <thead>
                        <tr role="row">
                            <th class="text-center">Bloco</th>
                            <th>#id</th>
                            <th>Tratamento</th>
                            <th colspan="2">Fazenda</th>
                            <th>Gleba</th>
                            <th>Talhão</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($dataset as $row){ ?>
                        <tr role="row" style="background-color: #f1f5f9 !important;">
                            <td class="text-center"><?php echo fs_protocol_repetition_colors_col($row->num_block); ?></td>
                            <td><?php echo $row->sketch_id; ?></td>
                            <td><?php echo $row->treatment_name; ?></td>
                            <td><?php echo $row->farm_code; ?></td>
                            <td><?php echo $row->farm_name; ?></td>
                            <td><?php echo $row->block_code; ?></td>
                            <td><?php echo $row->plot_code; ?></td>
                        </tr>
                        
                        <!--amostras de entrenós de cada parcela-->
                        <tr>
                            <td colspan="9" style="padding: 0px !important;">
                                <table class="table table-hover table-responsive-sm small bg-white">
                                  <thead>
                                    <tr>
                                      <th scope="col" class="text-center">Data</th>
                                      <th scope="col" class="text-center">Ponto</th>
                                      <th scope="col" class="text-end">Entrenós</th>
                                      <?php if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_INTERNODES)==ACCESS_LEVEL_COMPLETE){ ?>
                                        <th scope="col" class="text-end">
                                          <a class="text-blue me-2" href="<?php echo $link_insert."/".$row->sketch_id; ?>">
                                            <span class="me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                   <path d="M12 5l0 14"></path>
                                                   <path d="M5 12l14 0"></path>
                                                </svg>
                                            </span>
                                          </a>
                                        </th>
                                      <?php } ?>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $la_params = array(
                                       'license_id' => fi_get_license(),
                                       'protocol_id' => md5(fi_get_protocol()),
                                       'sketch_id' => md5($row->sketch_id)
                                    );
                                    $lo_sample = fo_get_sample_internodes($la_params);
                                    foreach ($lo_sample as $row_sample){
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo fdDateMySQL_to_DateBr($row_sample->dt_sample); ?></td>
                                        <td class="text-center"><?php echo $row_sample->spot_id; ?></td>
                                        <td class="text-end text-muted"><?php echo $row_sample->num_node; ?></td>
                                        <?php if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_INTERNODES)==ACCESS_LEVEL_COMPLETE){ ?>
                                        <td class="text-end">
                                            <a class="text-blue me-2" href="<?php echo $link_update."/".md5($row_sample->node_id); ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                    <path d="M13.5 6.5l4 4"></path>
                                                </svg>
                                            </a>
                                            <a href="javascript:void(0)"
                                               class="confirma_exclusao text-red"
                                               data-target="#modal_confirmation"
                                               data-key="<?php echo $link_delete."/".md5($row_sample->node_id); ?>"
                                               data-code="<?php echo fdDateMySQL_to_DateBr($row_sample->dt_sample); ?>"
                                               data-name="<?php echo 'Ponto '.$row_sample->spot_id; ?>"
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
                                    <?php } ?>
                                  </tbody>
                                </table>
                            </td>
                        </tr>

                        <?php
                          if (fiLevelAccess(fi_get_user(), FNC_SAMPLES_INTERNODES)==ACCESS_LEVEL_COMPLETE){
                            echo fsModalDelete($row->sketch_id);
                          }
                        ?>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>

                  <?php if(PAGINATION_ACTIVE=='Y'){ ?>
                    <div class="card-footer d-flex align-items-center">
                      <?php
                        echo (!empty($lo_pagination) ? $lo_pagination : '');
                        echo $lo_lines_page;
                      ?>
                    </div>
                  <?php } ?>

                </div>
              </div>
            </div>           
          </div>
        </div>
