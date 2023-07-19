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

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards row-deck">
            <div class="col-sm-6 col-lg-8" style="min-height: 300px;">
                <div class="card">
                    <div class="card-header">
                        <i class="fe fe-bar-chart"></i>
                        <h4 class="card-title">&nbsp;Registro Diário</h4>
                    </div>
                    <div id="chart_weather_daily" style="min-height: 300px;"></div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4" style="min-height: 300px;">
                <div class="card">
                    <div class="card-header">
                        <i class="fe fe-bar-chart"></i>
                        <h4 class="card-title">&nbsp;Resultado Mensal</h4>
                    </div>
                    <div id="chart_weather_monthly" style="min-height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body mt-1">
    <div class="container-xl">
        <div class="row row-cards row-deck">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                            <thead>
                                <tr role="row">
                                    <th class="text-center">Data</th>
                                    <th class="text-end">Pluviometria (mm)</th>
                                    <th class="text-end">Temperatura (ºC)</th>
                                    <th class="text-end">Temperatura Min. (ºC)</th>
                                    <th class="text-end">Temperatura Máx. (ºC)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ds_weathers_table as $row){ ?>
                                <tr role="row" class="odd">
                                    <td class="text-center"><?php echo fdDateMySQL_to_DateBr($row->dt_weather); ?></td>
                                    <td class="text-end"><?php echo $row->temperature; ?></td>
                                    <td class="text-end"><?php echo $row->pluviometry; ?></td>
                                    <td class="text-end"><?php echo $row->temperature_min; ?></td>
                                    <td class="text-end"><?php echo $row->temperature_max; ?></td>
                                </tr>
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
