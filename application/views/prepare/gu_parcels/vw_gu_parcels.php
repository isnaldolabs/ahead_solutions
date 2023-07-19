<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <?php echo fsReturnPage(RT_GU_PLOTS, '#'.$farm_code.' '.$farm_name.' - Talhão '.$plot_code); ?>
        <div class="my-3 my-md-5">
          <div class="container">

            <?php if(isset($flash_message)){echo $flash_message;} ?>
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><?php echo $view_title; ?></h3>
                    <div class="card-options">
                      <?php if (fiLevelAccess(fi_get_user(), FNC_GU_PARCELS)==ACCESS_LEVEL_COMPLETE){ ?>
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
                          <th>Gleba</th>
                          <th>Talhão</th>
                          <th>Parcela</th>
                          <th>Variedade</th>
                          <th></th>
                          <th>Plantio</th>
                          <th class="text-end">Área</th>
                          <?php if (fiLevelAccess(fi_get_user(), FNC_GU_PARCELS)==ACCESS_LEVEL_COMPLETE){ ?>
                            <th class="text-center"></th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $lr_area = 0;
                        foreach ($ds_dataset as $row_parcel){
                        ?>
                        <tr role="row" class="odd">
                            <td><?php echo $row_parcel->block_code; ?></td>
                            <td><?php echo $row_parcel->plot_code; ?></td>
                            <td><?php echo $row_parcel->parcel_code; ?></td>
                            <td><?php echo $row_parcel->variety_name; ?></td>
                            <td><?php echo $row_parcel->maturity_name; ?></td>
                            <td><?php echo fdDateMySQL_to_DateBr($row_parcel->dt_planting); ?></td>
                            <td class="text-end"><?php echo frDecimals($row_parcel->area,1); ?></td>
                            <?php if (fiLevelAccess(fi_get_user(), FNC_GU_PARCELS)==ACCESS_LEVEL_COMPLETE){ ?>
                                <td class="text-end">
                                  <a class="text-blue me-2" href="<?php echo $link_update."/".md5($row_parcel->parcel_id); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <path d="M13.5 6.5l4 4"></path>
                                    </svg>
                                  </a>
                                  <a href="javascript:void(0)"
                                     class="confirma_exclusao text-red"
                                     data-target="#modal_confirmation"
                                     data-key="<?php echo $link_delete."/".md5($row_parcel->parcel_id); ?>"
                                     data-code="<?php echo 'Gleba: '.$row_parcel->block_code; ?>"
                                     data-name="<?php echo 'Talhão: '.$row_parcel->parcel_code; ?>"
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

                        <?php if (fiLevelAccess(fi_get_user(), FNC_GU_PARCELS)==ACCESS_LEVEL_COMPLETE){
                                echo fsModalDelete($row_parcel->parcel_id);
                              }
                        ?>

                        <?php
                            if (isset($row_parcel->area)){$lr_area = $row_parcel->plot_area;}
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
                              <td class="text-end"><b><?php echo frDecimals($lr_area,1); ?></b></td>
                              <?php if (fiLevelAccess(fi_get_user(), FNC_GU_PARCELS)==ACCESS_LEVEL_COMPLETE){ ?>
                                <td></td>
                              <?php } ?>
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
