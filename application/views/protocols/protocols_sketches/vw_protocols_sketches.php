<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <?php echo fsReturnPage(RT_PROTOCOLS, '#'.$protocol_id.' '.$protocol_title); ?>

        <?php if(count($ds_treatments_done) > 0){ ?>
            <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-lg order-lg-first">
                    <ul class="nav nav-tabs border-0 flex-column flex-lg-row">

                      <?php if(count($ds_dataset) <= 0){ ?>
                        <li class="nav-item">
                          <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#myModalGerar">
                              <i class="fe fe-check me-1"></i>Gerar
                          </a>
                        </li>
                      <?php }else{ ?>
                        <li class="nav-item">
                          <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#myModalEliminar">
                              <i class="fa fa-eraser me-1"></i>Eliminar
                          </a>
                        </li>
                      <?php } ?>

                    </ul>
                  </div>
                </div>

                <!-- Modal Gerar -->
                <div class="modal fade" id="myModalGerar" tabindex="-1" role="dialog" aria-labelledby="myModalGerarLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="card-status bg-green"></div>
                      <div class="modal-header">
                        <h5 class="modal-title">Croqui</h5>
                      </div>
                      <div class="modal-body">
                        <div class="row row-cards">
                          <div class="col">
                            <div class="card">
                              <div class="card-body p-1 text-center">
                                  <div class="h1 m-0"><?php echo $ds_repetitions[0]->amount; ?></div>
                                <div class="text-muted mb-1">Tratamentos</div>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card">
                              <div class="card-body p-1 text-center">
                                <div class="h1 m-0"><?php echo $ds_repetitions[0]->repetitions; ?></div>
                                <div class="text-muted mb-1">Repetições</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <a href="<?php echo base_url(RT_PROTOCOLS_SKETCHES_DB_INS).'/'.md5($ds_repetitions[0]->protocol_id); ?>" class="btn btn-md btn-square btn-primary"><i class="fe fe-check me-1"></i>Gerar o Croqui</a>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Eliminar -->
                <div class="modal fade" id="myModalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalEliminarLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="card-status bg-red"></div>
                      <div class="modal-header">
                        <h5 class="modal-title">Croqui</h5>
                      </div>
                      <div class="modal-body">
                            <div class="alert alert-danger" role="alert">
                              <h4>Atenção</h4>
                              Todos os apontamentos realizados para qualquer uma das Parcelas serão eliminados!
                            </div>
                            <p>Se necessário o usuário deverá refazer manualmente os apontamentos.</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <a href="<?php echo base_url(RT_PROTOCOLS_SKETCHES_DB_DEL).'/'.md5($ds_repetitions[0]->protocol_id); ?>" class="btn btn-md btn-square btn-danger"><i class="fa fa-eraser me-1"></i>Eliminar o Croqui</a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
        <?php } ?>


        <div class="my-3 my-md-5">
          <div class="container">

            <?php if(isset($flash_message)){echo $flash_message;} ?>

              <div class="row row-deck row-cards">

                <?php 
                if((count($ds_treatments_done) > 0) and (count($ds_dataset) > 0)){ ?>

                    <?php for ($i=1; $i <= $ds_repetitions[0]->repetitions; $i++){ ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                              <?php echo fs_protocol_repetition_colors($i); ?>
                              <div class="card-header">
                                <h3 class="card-title">Bloco: <?php echo $i; ?></h3>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                                  <thead>
                                    <tr role="row">
                                      <th>#id</th>
                                      <th>Tratamento</th>
                                      <th class="text-end"></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($ds_dataset as $row){ ?>
                                        <?php if($row->num_block == $i){ ?>

                                            <tr role="row" class="odd">
                                                <td><?php echo $row->sketch_id; ?></td>
                                                <td><?php echo $row->treatment_name; ?></td>
                                                <td class="text-center">
                                                    <?php if($row->before_id!=NULL){ ?>
                                                        <a class="text-blue"
                                                           href="<?php echo $link_new_order.'/'.$row->sketch_id.'/'.($row->num_order-1).'/'.$row->before_id.'/'.$row->num_order; ?>">
                                                          <i class="fe fe-arrow-up me-2"></i>
                                                        </a>
                                                        <?php log_message('info', $link_new_order.'/'.$row->sketch_id.'/'.($row->num_order-1).'/'.$row->before_id.'/'.$row->num_order); ?>
                                                    <?php } ?>
                                                    <?php if($row->next_id!=NULL){ ?>
                                                        <a class="text-blue"
                                                           href="<?php echo $link_new_order.'/'.$row->sketch_id.'/'.($row->num_order+1).'/'.$row->next_id.'/'.$row->num_order; ?>">
                                                          <i class="fe fe-arrow-down me-2"></i>
                                                        </a>
                                                        <?php log_message('info', $link_new_order.'/'.$row->sketch_id.'/'.($row->num_order+1).'/'.$row->next_id.'/'.$row->num_order); ?>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                    <?php } ?>

                <?php }else{ ?>
                    <div class="container alert alert-icon alert-danger" role="alert">
                        <i class="fe fe-bell me-2" aria-hidden="true"></i>
                        Ainda não houve a configuração dos tratamentos para este experimento ou nenhum croqui foi criado.<br/>
                        Use o botão Gerar para fazê-lo.
                    </div>
                <?php } ?>
              </div>
            </div>

          </div>
