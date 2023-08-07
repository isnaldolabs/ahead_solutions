<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Avaliações
                </h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards row-deck">
            <?php 
                if (count($ds_dashboard_checks_status) > 0){
                    foreach ($ds_dashboard_checks_status as $row){
                        echo fs_dashboard_frame_checks($row->check_status, $row->check_status_name, $row->amount, $row->perc);
                    }
                }
            ?>
        </div>
    </div>
</div>

<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Experimentos
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
                                <tr>
                                    <th colspan="3">Descrição</th>
                                    <th>Progresso</th>
                                    <th>Avaliações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ds_dashboard_protocols_status as $row){ ?>
                                <tr role="row" class="odd">
                                    <td><span class="avatar avatar-sm bg-<?php echo $row->type_color; ?>-lt"><?php echo $row->type_short_name; ?></span></td>
                                    <td><?php echo $row->protocol_id; ?></td>
                                    <td><?php echo $row->title; ?></td>

                                    <td>
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <strong><?php echo $row->protocol_progress; ?>%</strong>
                                            </div>
                                            <div class="float-right">
                                                <small class="text-muted"><?php echo fdDateMySQL_to_DateBr($row->dt_start); ?> - <?php echo fdDateMySQL_to_DateBr($row->dt_end_planned); ?></small>
                                            </div>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar <?php echo fs_progress_color($row->protocol_progress); ?>"
                                                 role="progressbar"
                                                 style="width: <?php echo $row->protocol_progress; ?>%"
                                                 aria-valuenow="<?php echo $row->protocol_progress; ?>"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100">
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <strong><?php echo $row->checks_perc; ?>%</strong>
                                            </div>
                                            <div class="float-right">
                                                <small class="text-muted"><?php echo $row->checks_done; ?> de <?php echo $row->checks_total; ?></small>
                                            </div>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-gray"
                                                 role="progressbar"
                                                 style="width: <?php echo $row->checks_perc; ?>%"
                                                 aria-valuenow="<?php echo $row->checks_perc; ?>"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100">
                                            </div>
                                        </div>
                                    </td>

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
