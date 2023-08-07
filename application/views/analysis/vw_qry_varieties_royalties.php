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
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                      <thead>
                        <tr role="row">
                          <th>Variedade</th>
                          <th class="text-end">Mínimo</th>
                          <th class="text-end">Máximo</th>
                          <th class="text-end">TPH</th>
                          <th class="text-end">Royalties R$/ha</th>
                          <th class="text-end">Viabilidade</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($ds_varieties_royalties as $row_list){ ?>
                        <tr role="row" class="odd">
                          <td><?php echo $row_list->variety_name; ?></td>
                          <td class="text-end"><?php echo frDecimals($row_list->min_tph,2); ?></td>
                          <td class="text-end"><?php echo frDecimals($row_list->max_tph,2); ?></td>
                          <td class="text-end"><?php echo frDecimals($row_list->avg_tph,2); ?></td>
                          <td class="text-end"><?php echo frDecimals($row_list->royalties,2); ?></td>
                          <td class="text-end"><?php echo frDecimals($row_list->viability,2); ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards row-deck">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-bar-chart"></i>
                        <h4 class="card-title">&nbsp;Viabilidade por Variedade</h4>
                    </div>
                    <div id="chart_varieties_royalties" style="min-height: 250px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards row-deck">
            <div class="col-sm-6 col-lg-6">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                            <thead>
                                <tr role="row">
                                    <th>Licenciante</th>
                                    <th class="text-end">Mínimo</th>
                                    <th class="text-end">Máximo</th>
                                    <th class="text-end">TPH</th>
                                    <th class="text-end">Royalties R$/ha</th>
                                    <th class="text-end">Viabilidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ds_varieties_royalties_licensors as $row_list){ ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $row_list->licensor_name; ?></td>
                                    <td class="text-end"><?php echo frDecimals($row_list->min_tph,2); ?></td>
                                    <td class="text-end"><?php echo frDecimals($row_list->max_tph,2); ?></td>
                                    <td class="text-end"><?php echo frDecimals($row_list->avg_tph,2); ?></td>
                                    <td class="text-end"><?php echo frDecimals($row_list->royalties,2); ?></td>
                                    <td class="text-end"><?php echo frDecimals($row_list->viability,2); ?></td>
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
                        <h4 class="card-title">&nbsp;Viabilidade por Licenciante</h4>
                    </div>
                    <div id="chart_varieties_royalties_licensors" style="min-height: 200px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
