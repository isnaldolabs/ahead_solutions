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
                      <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_CHECKS)==ACCESS_LEVEL_COMPLETE){ ?>
                        <a href="<?php echo $link_insert; ?>" class="btn btn-primary me-2">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M12 5l0 14"></path>
                                   <path d="M5 12l14 0"></path>
                                </svg>
                            </span>Incluir</a>
                        <a href="#"
                           class="btn btn-secondary"
                           data-bs-toggle="modal" data-bs-target="#myModalHelp">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                   <path d="M12 16v.01"></path>
                                   <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path>
                                </svg>
                            </span>Ajuda

                        </a>
                      <?php } ?>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModalHelp" tabindex="-1" role="dialog" aria-labelledby="myModalHelpLabel">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myModalHelpLabel">
                              <i class="fe fe-alert-circle me-2"></i>Status das Avaliações
                            </h4>
                          </div>
                          <div class="modal-body">
                            <p style="padding: 0.25rem 0.25rem;"><i class="fa fa-calendar-o text-blue mr-4"></i>Aberta</p>
                            <p style="padding: 0.25rem 0.25rem;"><i class="fa fa-calendar-plus-o text-yellow mr-4"></i>Chegando</p>
                            <p style="padding: 0.25rem 0.25rem;"><i class="fa fa-calendar-minus-o text-red mr-4"></i>Atrasada</p>
                            <p style="padding: 0.25rem 0.25rem;"><i class="fa fa-calendar-check-o text-gray mr-4"></i>Finalizada</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                      <thead>
                        <tr role="row">
                          <th class="text-center">Planejada</th>
                          <th class="text-center">Aplicada</th>
                          <th class="text-left">Duração</th>
                          <th>Avaliação</th>
                          <th>Observações</th>
                          <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_CHECKS)==ACCESS_LEVEL_COMPLETE){ ?>
                            <th class="text-center"></th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($dataset as $row){ ?>
                        <tr role="row" class="odd">
                          <td class="text-center"><?php echo fdDateMySQL_to_DateBr($row->dt_planned); ?></td>
                          <td class="text-center"><?php echo ($row->dt_applied==NULL?NULL:fdDateMySQL_to_DateBr($row->dt_applied)); ?></td>
                          <td class="text-start"><?php echo fs_protocol_check_status($row->status); ?>
                            <span class="text-muted pl-2"><?php echo ($row->duration!=null?$row->duration.' dias':''); ?></span>
                          </td>
                          <td><?php echo $row->description_name; ?>
                            <div><?php echo $row->method_name; ?></div>
                          </td>
                          <td><?php echo $row->notes; ?></td>
                          <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_CHECKS)==ACCESS_LEVEL_COMPLETE){ ?>
                            <td class="text-end">
                                <a class="text-blue me-2" href="<?php echo $link_update."/".md5($row->check_id); ?>">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                    <path d="M13.5 6.5l4 4"></path>
                                  </svg>
                                </a>
                                <a href="javascript:void(0)"
                                   class="confirma_exclusao text-red"
                                   data-target="#modal_confirmation"
                                   data-key="<?php echo $link_delete."/".md5($row->check_id); ?>"
                                   data-code="<?php echo $row->description_name; ?>"
                                   data-name="<?php echo $row->method_name; ?>"
                                   data-desc="<?php echo $row->notes; ?>" >
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
                          if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_CHECKS)==ACCESS_LEVEL_COMPLETE){
                            echo fsModalDelete($row->check_id);
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
