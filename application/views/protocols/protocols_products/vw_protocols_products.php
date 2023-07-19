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
                      <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_PRODUCTS)==ACCESS_LEVEL_COMPLETE){ ?>
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
                          <th class="text-end"></th>
                          <th>#id</th>
                          <th colspan="2">Produto Principal</th>
                          <th colspan="2">Fazenda</th>
                          <th>Talhão</th>
                          <th>Parcela</th>
                          <th>Modo de Aplicação</th>
                          <th class="text-center">Plantio</th>
                          <th class="text-end">Área</th>
                          <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_PRODUCTS)==ACCESS_LEVEL_COMPLETE){ ?>
                            <th class="text-center"></th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($dataset as $row){ ?>
                        <tr role="row" class="odd">
                          <td class="text-end"
                            class="odd clickable"
                            data-toggle="collapse" data-target="#col-row-<?php echo $row->treatment_id; ?>">
                            <a href="javascript:void()"><i class="fe fe-corner-left-down text-blue me-1"></i></a>
                          </td>
                          <td class="text-muted"><?php echo $row->treatment_id; ?></td>
                          <td><?php echo $row->product_name; ?></td>
                          <td><?php echo $row->manufacturer_name; ?></td>
                          <td><?php echo $row->farm_code; ?></td>
                          <td><?php echo $row->farm_name; ?></td>
                          <td><?php echo $row->plot_code; ?></td>
                          <td><?php echo $row->parcel_code; ?></td>
                          <td><?php echo $row->application_name; ?></td>
                          <td class="text-center"><?php echo fdDateMySQL_to_DateBr($row->dt_planting); ?></td>
                          <td class="text-end"><?php echo frDecimals($row->area, 1); ?></td>
                          <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_PRODUCTS)==ACCESS_LEVEL_COMPLETE){ ?>
                            <td class="text-end">
                              <a href="javascript:void(0)"
                                 class="confirma_exclusao text-red"
                                 data-target="#modal_confirmation"
                                 data-key="<?php echo $link_delete."/".md5($row->treatment_id); ?>"
                                 data-code=""
                                 data-name="<?php echo $row->product_name; ?>"
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

                        <!--configuração dos produtos e das garantias de cada tratamento principal-->
                        <tr id="col-row-<?php echo $row->treatment_id; ?>" class="collapse">
                            <td colspan="12">
                                <div class="row">

                                    <!--configuração dos produtos de cada tratamento principal-->
                                    <div class="col-sm-6 col-lg-7">
                                        <table class="table table-responsive-sm small border bg-white">
                                          <thead style="background-color: #F5F7FB;">
                                            <tr>
                                                <th colspan="3">Produto</th>
                                                <th class="text-end">Dose</th>
                                                <th class="text-center">Principal</th>
                                                <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_PRODUCTS)==ACCESS_LEVEL_COMPLETE){ ?>
                                                <th scope="col" class="text-end">
                                                  <a class="text-blue me-2" href="<?php echo $link_insert_settings."/".$row->protocol_id."/".$row->treatment_id; ?>">
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
                                            $la_params_prod = array(
                                               'license_id' => fi_get_license(),
                                               'protocol_id' => md5(fi_get_protocol()),
                                               'treatment_id' => md5($row->treatment_id)
                                            );
                                            $lo_products = fo_get_products_settings($la_params_prod);
                                            log_message('info', $this->db->last_query());

                                            foreach ($lo_products as $row_product){
                                            ?>
                                            <tr>
                                                <td><?php echo $row_product->product_id; ?></td>
                                                <td><?php echo $row_product->product_name; ?></td>
                                                <td><?php echo $row_product->manufacturer_name; ?></td>
                                                <td class="text-end">
                                                    <?php echo frDecimals($row_product->dose,2); ?>
                                                    <span class="text-muted ms-1"><?php echo $row_product->measure_short_name; ?></span>
                                                </td>
                                                <td class="text-center"><?php echo fs_html_is_main($row_product->is_main); ?></td>
                                                <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_PRODUCTS)==ACCESS_LEVEL_COMPLETE){ ?>
                                                <td class="text-end">
                                                    <a class="text-blue me-2" href="<?php echo $link_update_settings."/".md5($row_product->setting_id); ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                            <path d="M13.5 6.5l4 4"></path>
                                                        </svg>
                                                    </a>
                                                    <?php if ($row_product->is_main==ACTIVE_NO){ ?>
                                                        <a href="javascript:void(0)"
                                                           class="confirma_exclusao text-red"
                                                           data-target="#modal_confirmation"
                                                           data-key="<?php echo $link_delete_settings."/".md5($row_product->setting_id); ?>"
                                                           data-code="<?php echo $row_product->product_name; ?>"
                                                           data-name=""
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
                                                    <?php } ?>
                                                </td>
                                                <?php } ?>

                                            </tr>
                                            <?php } ?>
                                          </tbody>
                                        </table>

                                    </div>

                                    <!--configuração das garantias de cada tratamento principal-->
                                    <div class="col-sm-6 col-lg-5">
                                        <table class="table table-responsive-sm small border bg-white">
                                          <thead style="background-color: #F5F7FB;">
                                            <tr>
                                              <th colspan="2">Composto</th>
                                              <th class="text-end">Garantia</th>
                                              <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_COMPOUNDS)==ACCESS_LEVEL_COMPLETE){ ?>
                                                <th scope="col" class="text-end">
                                                  <a class="text-blue me-2" href="<?php echo $link_insert_compounds."/".$row->protocol_id."/".$row->treatment_id; ?>">
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
                                            $la_params_comp = array(
                                               'license_id' => fi_get_license(),
                                               'protocol_id' => md5(fi_get_protocol()),
                                               'treatment_id' => md5($row->treatment_id)
                                            );
                                            $lo_compounds = fo_get_products_compounds($la_params_comp);
                                            log_message('info', $this->db->last_query());

                                            foreach ($lo_compounds as $row_compound){
                                            ?>
                                            <tr>
                                                <td><?php echo $row_compound->compound_short_name; ?></td>
                                                <td><?php echo $row_compound->compound_name; ?></td>
                                                <td class="text-end"><?php echo frDecimals($row_compound->guarantee,2); ?></td>
                                                <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_COMPOUNDS)==ACCESS_LEVEL_COMPLETE){ ?>
                                                <td class="text-end">
                                                    <a class="text-blue me-2" href="<?php echo $link_update_compounds."/".md5($row_compound->setting_id); ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                            <path d="M13.5 6.5l4 4"></path>
                                                        </svg>
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                       class="confirma_exclusao text-red"
                                                       data-target="#modal_confirmation"
                                                       data-key="<?php echo $link_delete_compounds."/".md5($row_compound->setting_id); ?>"
                                                       data-code="<?php echo $row_compound->compound_name; ?>"
                                                       data-name=""
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

                                    </div>

                                </div>
                            </td>
                        </tr>

                        <?php
                          if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_PRODUCTS)==ACCESS_LEVEL_COMPLETE){
                            echo fsModalDelete($row->treatment_id);
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
