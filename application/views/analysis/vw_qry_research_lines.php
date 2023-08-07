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

            <!--research_lines_status-->
            <div class="col-sm-6 col-lg-4" style="min-height: 300px;">
                <div class="card">
                    <div class="card-header">
                        <i class="fe fe-pie-chart"></i>
                        <h4 class="card-title">&nbsp;Status</h4>
                    </div>
                    <div id="chart_research_status" style="min-height: 300px;"></div>
                </div>
            </div>

            <!--research_lines_lines-->
            <div class="col-sm-6 col-lg-4" style="min-height: 300px;">
                <div class="card">
                    <div class="card-header">
                        <i class="fe fe-pie-chart"></i>
                        <h4 class="card-title">&nbsp;Linhas</h4>
                    </div>
                    <div id="chart_research_lines" style="min-height: 300px;"></div>
                </div>
            </div>

            <!--research_lines_sublines-->
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fe fe-bar-chart"></i>
                        <h4 class="card-title">&nbsp;Sublinhas</h4>
                    </div>
                    <div id="chart_research_sublines" style="min-height: 300px;"></div>
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
                                    <th></th>
                                    <th>Status</th>
                                    <th>Linha</th>
                                    <th>Sublinha</th>
                                    <th>Distribuição</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ds_research_list as $row_list){ ?>
                                <tr role="row" class="odd">
                                    <td class="text-center"><?php echo fs_protocol_status($row_list->status); ?></td>
                                    <td><?php echo $row_list->status_name; ?></td>
                                    <td><?php echo $row_list->line_name; ?></td>
                                    <td><?php echo $row_list->subline_name; ?></td>
                                    <td>
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <strong><?php echo $row_list->line_perc; ?>%</strong>
                                            </div>
                                            <div class="float-right">
                                                <small class="text-muted"><?php echo $row_list->amount; ?> de <?php echo $row_list->total_lines; ?></small>
                                            </div>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-green"
                                                 role="progressbar"
                                                 style="width: <?php echo $row_list->line_perc; ?>%"
                                                 aria-valuenow="<?php echo $row_list->line_perc; ?>"
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
