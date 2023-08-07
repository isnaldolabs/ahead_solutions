<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="my-3 my-md-5" style="margin-top: 0.5rem !important;">
          <div class="container">

            <?php if(count($ds_biometry_group_sdh) > 0){ ?>
                <div class="row row-cards row-deck">
                    <div class="col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                                    <thead>
                                        <tr role="row">
                                            <th>Tratamento</th>
                                            <th class="text-end">Colmos/m</th>
                                            <th class="text-center">#</th>
                                            <th class="text-end">Diâmetro (cm)</th>
                                            <th class="text-center">#</th>
                                            <th class="text-end">Altura (m)</th>
                                            <th class="text-center">#</th>
                                            <th class="text-end">TCH Volumétrico</th>
                                            <th class="text-center">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ds_biometry_group_sdh as $row){ ?>
                                        <tr role="row" class="odd">
                                            <td><?php echo $row->treatment_name; ?></td>
                                            <td class="text-end"><?php echo frDecimals($row->num_stems,2); ?></td>
                                            <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_stems); ?></strong></td>
                                            <td class="text-end"><?php echo frDecimals($row->num_diameter,2); ?></td>
                                            <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_diameter); ?></strong></td>
                                            <td class="text-end"><?php echo frDecimals($row->num_height,2); ?></td>
                                            <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_height); ?></strong></td>
                                            <td class="text-end"><?php echo frDecimals($row->tch_volumetric_minus15,2); ?></td>
                                            <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_tch); ?></strong></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cards row-deck">
                    <!--Stem, Diameter, and Height-->
                    <div class="col-sm-6 col-lg-12" style="min-height: 350px;">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="fe fe-bar-chart me-2"></i>Biometria dos Colmos
                                </h4>
                            </div>
                            <div id="chart_biometry_stems" style="min-height: 350px;"></div>
                        </div>
                    </div>
                </div>

                <div class="row row-cards row-deck">
                    <!--TCH Volumetric-->
                    <div class="col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="fe fe-bar-chart me-2"></i>TCH Volumétrico -15%
                                </h4>
                            </div>
                            <div id="chart_tch_volumetric_minus15" style="min-height: 350px;"></div>
                        </div>
                    </div>
                </div>

            <?php } ?>

          </div>
        </div>
