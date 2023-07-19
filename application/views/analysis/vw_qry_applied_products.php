<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($flash_message)){echo $flash_message;}
?>
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    <?php echo $view_title; ?>
                </h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards row-deck">

            <div class="col-sm-6 col-lg-6">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                            <thead>
                                <tr role="row">
                                    <th>Tratamento</th>
                                    <th class="text-end">Mínimo</th>
                                    <th class="text-end">Máximo</th>
                                    <th class="text-end">TPH</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ds_applied_products as $row_list){ ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $row_list->treatment_name; ?></td>
                                    <td class="text-end"><?php echo frDecimals($row_list->min_tph,2); ?></td>
                                    <td class="text-end"><?php echo frDecimals($row_list->max_tph,2); ?></td>
                                    <td class="text-end"><?php echo frDecimals($row_list->avg_tph,2); ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6" style="min-height: 200px;">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-bar-chart"></i>
                        <h4 class="card-title">&nbsp;TPH por Tratamento</h4>
                    </div>
                    <div id="chart_applied_products_amount" style="min-height: 200px;"></div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-xl">
        <div class="row row-cards row-deck mt-1">            
              <div class="col-sm-6 col-lg-6">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                      <thead>
                        <tr role="row">
                          <th>Grupo</th>
                          <th class="text-end">Mínimo</th>
                          <th class="text-end">Máximo</th>
                          <th class="text-end">TPH</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($ds_applied_products_groups as $row_list){ ?>
                        <tr role="row" class="odd">
                          <td><?php echo $row_list->group_name; ?></td>
                          <td class="text-end"><?php echo frDecimals($row_list->min_tph,2); ?></td>
                          <td class="text-end"><?php echo frDecimals($row_list->max_tph,2); ?></td>
                          <td class="text-end"><?php echo frDecimals($row_list->avg_tph,2); ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
              <div class="col-sm-6 col-lg-6" style="min-height: 200px;">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-bar-chart"></i>
                        <h4 class="card-title">&nbsp;TPH por Grupo</h4>
                    </div>
                    <div id="chart_applied_products_groups" style="min-height: 200px;"></div>
                </div>
              </div>

        </div>
    </div>

</div>
