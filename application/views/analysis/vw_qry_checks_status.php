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

            <!--checks_status amount-->
            <div class="col-sm-6 col-lg-8" style="min-height: 300px;">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-bar-chart"></i>
                        <h4 class="card-title">&nbsp;Quantidade</h4>
                    </div>
                    <div id="chart_checks_status_amount" style="min-height: 300px;"></div>
                </div>
            </div>

            <!--checks_status percent-->
            <div class="col-sm-6 col-lg-4" style="min-height: 300px;">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-pie-chart"></i>
                        <h4 class="card-title">&nbsp;Percentual</h4>
                    </div>
                    <div id="chart_checks_status_percent" style="min-height: 300px;"></div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-xl">
        <div class="row row-cards row-deck mt-1">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                            <thead>
                                <tr role="row">
                                    <th>#</th>
                                    <th colspan="2">Título</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Planejada</th>
                                    <th class="text-center">Aplicada</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ds_checks_status_list as $row_list){ ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $row_list->protocol_id; ?></td>
                                    <td><?php echo $row_list->title; ?></td>
                                    <td><?php echo $row_list->description_name; ?></td>
                                    <td class="text-center"><?php echo fs_protocol_check_status($row_list->check_status); ?></td>
                                    <td class="text-center"><?php echo fdDateMySQL_to_DateBr($row_list->dt_planned); ?></td>
                                    <td class="text-center"><?php echo ($row_list->dt_applied==NULL?NULL:fdDateMySQL_to_DateBr($row_list->dt_applied)); ?></td>
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
