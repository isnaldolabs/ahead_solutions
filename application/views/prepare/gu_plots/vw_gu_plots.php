<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <?php echo fsReturnPage(RT_GU_FARMS, '#'.$farm_code.' '.$farm_name); ?>
        <div class="my-3 my-md-5">
          <div class="container">

            <?php if(isset($flash_message)){echo $flash_message;} ?>
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><?php echo $view_title; ?></h3>
                    <div class="card-options">
                      <?php if (fiLevelAccess(fi_get_user(), FNC_GU_PLOTS)==ACCESS_LEVEL_COMPLETE){ ?>
                        <a href="<?php echo $link_insert; ?>" class="btn btn-primary">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M12 5l0 14"></path>
                                   <path d="M5 12l14 0"></path>
                                </svg>
                            </span>Incluir</a>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                      <thead>
                        <tr role="row">
                          <th>Região</th>
                          <th>Gleba</th>
                          <th>Talhão</th>
                          <th>Variedade</th>
                          <th></th>
                          <th>Corte</th>
                          <th class="text-end">Dist.</th>
                          <th class="text-end">Área</th>
                          <th class="text-end">Tons.</th>
                          <?php if (fiLevelAccess(fi_get_user(), FNC_GU_PLOTS)==ACCESS_LEVEL_COMPLETE){ ?>
                            <th class="text-center"></th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $lr_dist = 0;
                        $lr_area = 0;
                        $lr_tons = 0;
                        foreach ($ds_dataset as $row_plot){
                        ?>
                        <tr role="row" class="odd">
                            <td><?php echo $row_plot->region_name; ?></td>
                            <td><?php echo $row_plot->block_code; ?></td>
                            <td><?php echo $row_plot->plot_code; ?></td>
                            <td><?php echo $row_plot->variety_name; ?></td>
                            <td><?php echo $row_plot->maturity_name; ?></td>
                            <td><?php echo $row_plot->cutting_name; ?></td>
                            <td class="text-end"><?php echo frDecimals($row_plot->distance,1); ?></td>
                            <td class="text-end"><?php echo frDecimals($row_plot->total_area,1); ?></td>
                            <td class="text-end"><?php echo frDecimals($row_plot->tons,1); ?></td>
                            <?php if (fiLevelAccess(fi_get_user(), FNC_GU_PLOTS)==ACCESS_LEVEL_COMPLETE){ ?>
                                <td class="text-end">
                                  <a class="text-blue me-2" href="<?php echo $link_parcels."/".md5($row_plot->plot_id); ?>">
                                    <i class="fa fa-puzzle-piece me-1"></i>Parcelas
                                  </a>
                                  <a class="text-blue me-2" href="<?php echo $link_update."/".md5($row_plot->plot_id); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <path d="M13.5 6.5l4 4"></path>
                                    </svg>
                                  </a>
                                  <a href="javascript:void(0)"
                                     class="confirma_exclusao text-red"
                                     data-target="#modal_confirmation"
                                     data-key="<?php echo $link_delete."/".md5($row_plot->plot_id); ?>"
                                     data-code="<?php echo 'Gleba: '.$row_plot->block_code; ?>"
                                     data-name="<?php echo 'Talhão: '.$row_plot->plot_code; ?>"
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

                        <?php if (fiLevelAccess(fi_get_user(), FNC_GU_PLOTS)==ACCESS_LEVEL_COMPLETE){
                                echo fsModalDelete($row_plot->plot_id);
                              }
                        ?>

                        <?php
                            if (isset($row_plot->season_dist)){$lr_dist = $row_plot->season_dist;}
                            if (isset($row_plot->season_area)){$lr_area = $row_plot->season_area;}
                            if (isset($row_plot->season_tons)){$lr_tons = $row_plot->season_tons;}
                         ?>

                      <?php } ?>
                      </tbody>
                        <tfoot style="border-top: 1px solid #E0E5EC;">
                            <tr role="row" style="background-color: #F5F7FB;">
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td class="text-end"><b><?php echo frDecimals($lr_dist,1); ?></b></td>
                              <td class="text-end"><b><?php echo frDecimals($lr_area,1); ?></b></td>
                              <td class="text-end"><b><?php echo frDecimals($lr_tons,1); ?></b></td>
                              <td class="text-center"></td>
                            </tr>
                        </tfoot>
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

