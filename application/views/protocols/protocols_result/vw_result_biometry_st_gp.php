<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="my-3 my-md-5" style="margin-top: 0.5rem !important;">
          <div class="container">

            <?php 
            
            if(count($ds_biometry_st_gp) > 0) { ?>
                <div class="row row-cards row-deck">
                    <div class="col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover card-table table-vcenter text-nowrap" id="task-table">
                                    <thead>
                                        <tr role="row">
                                            <th>Tratamento</th>
                                            <th class="text-end">Colmos/m</th>
                                            <th class="text-center">#</th>
                                            <th class="text-end">Peso</th>
                                            <th class="text-center">#</th>
                                            <th class="text-end">% Falhas (m)</th>
                                            <th class="text-center">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ds_biometry_st_gp as $row){ ?>
                                        <tr role="row" class="odd">
                                            <td><?php echo $row['treatment_name']; ?></td>
                                            <td class="text-end"><?php echo frDecimals($row['num_stems'],2); ?></td>
                                            <td class="text-center"><strong><?php echo fs_protocol_result($row['pos_stems']); ?></strong></td>
                                            <td class="text-end"><?php echo frDecimals($row['num_weight'],2); ?></td>
                                            <td class="text-center"><strong><?php echo fs_protocol_result($row['pos_weight']); ?></strong></td>
                                            <td class="text-end"><?php echo frDecimals($row['perc_gaps'],2); ?></td>
                                            <td class="text-center"><strong><?php echo fs_protocol_result($row['pos_gaps']); ?></strong></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cards row-deck">
                    <div class="col-sm-6 col-lg-12" style="min-height: 350px;">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="fe fe-bar-chart me-2"></i>Biometria
                                </h4>
                            </div>
                            <div id="chart_1" style="min-height: 350px;"></div>
                        </div>
                    </div>
                </div>

            <?php } ?>

          </div>
        </div>
