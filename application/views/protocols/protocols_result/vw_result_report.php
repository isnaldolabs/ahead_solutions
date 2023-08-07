<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function fbDropdownItemActive($piOption, $piMenuActive){
    return ($piOption==$piMenuActive?' active':'');
}

function fs_route_math($piDesigning){
$ls_result = '';
switch ($piDesigning){
    case 1: $ls_result = base_url(RT_PROTOCOLS_RESULT_MATH_DIC);    break;      // DIC
    case 2: $ls_result = base_url(RT_PROTOCOLS_RESULT_MATH_DBA);    break;      // DBA
    case 3: $ls_result = base_url(RT_PROTOCOLS_RESULT_MATH_DQL);    break;      // DQL
}
return $ls_result;
}

echo fsReturnPage(RT_PROTOCOLS, '#'.$protocol_id.' '.$protocol_title);
if(isset($flash_message)){
    echo $flash_message;
}
?>
<div class="page-body mt-0 bg-white">

    <!---------------------------------------------------------------------- -->
    <!--Protocolos: Detalhes------------------------------------------------ -->
    <!---------------------------------------------------------------------- -->
    <div class="container-xl">
        <div class="page-header d-print-none mt-1 mb-1">
            <div class="row row-cards row-deck">
                <div class="col">
                    <h2 class="page-title">Protocolo</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xl">
        <?php if(count($ds_protocolo) > 0){ ?>
            <!--line 1-->
            <div class="row">
                <div class="col-sm-6 col-lg-2">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Código</label>
                        <input type="text" class="form-control" name="edtCode" value="<?php echo $ds_protocolo[0]->code; ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Tipo</label>
                        <input type="text" class="form-control" name="edtType" value="<?php echo $ds_protocolo[0]->type_name; ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Metodologia</label>
                        <input type="text" class="form-control" name="edtMethodology" value="<?php echo $ds_protocolo[0]->methodology_name; ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Ensaio</label>
                        <input type="text" class="form-control" name="edtTest" value="<?php echo $ds_protocolo[0]->test_name; ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Linha de Pesquisa</label>
                        <input type="text" class="form-control" name="edtLine" value="<?php echo $ds_protocolo[0]->line_name; ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Sublinha</label>
                        <input type="text" class="form-control" name="edtSubline" value="<?php echo $ds_protocolo[0]->subline_name; ?>" readonly>
                    </div>
                </div>
            </div>
            <!--line 2-->
            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Título</label>
                        <input type="text" class="form-control" name="edtGoal" value="<?php echo $ds_protocolo[0]->title; ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Objetivos</label>
                        <input type="text" class="form-control" name="edtGoal" value="<?php echo $ds_protocolo[0]->goal; ?>" readonly>
                    </div>
                </div>
            </div>
            <!--line 3-->
            <div class="row">
                <div class="col-sm-6 col-lg-2">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Data de Início</label>
                        <input type="text" class="form-control" name="edtDtStart" value="<?php echo fdDateMySQL_to_DateBr($ds_protocolo[0]->dt_start); ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Data de Término</label>
                        <input type="text" class="form-control" name="edtDtEnd"
                               value="<?php echo ($ds_protocolo[0]->dt_end==NULL?'':fdDateMySQL_to_DateBr($ds_protocolo[0]->dt_end)); ?>"
                               readonly>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Data de Término Planejada</label>
                        <input type="text" class="form-control" name="edtDtEndPlanned" value="<?php echo fdDateMySQL_to_DateBr($ds_protocolo[0]->dt_end_planned); ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Delineamento</label>
                        <input type="text" class="form-control" name="edtDesigning" value="<?php echo $ds_protocolo[0]->designing_name; ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Repetições</label>
                        <input type="text" class="form-control" name="edtRepetitions" value="<?php echo $ds_protocolo[0]->repetitions; ?>" readonly>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!---------------------------------------------------------------------- -->
    <!--Amostras: Pré-Análises --------------------------------------------- -->
    <!---------------------------------------------------------------------- -->
    <?php if(count($ds_samples_analyze) > 0){ ?>
        <div class="container-xl">
            <div class="page-header d-print-none mt-1 mb-1">
                <div class="row row-cards row-deck">
                    <div class="col">
                        <h2 class="page-title">Índices médios por tratamento</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover card-table table-vcenter text-nowrap" id="task-table">
                                <thead>
                                    <tr role="row">
                                        <th>Tratamento</th>
                                        <th class="text-end">ATR</th>
                                        <th class="text-center">#</th>
                                        <th class="text-end">TCH</th>
                                        <th class="text-center">#</th>
                                        <th class="text-end">TAH</th>
                                        <th class="text-center">#</th>
                                        <th class="text-end">Peso</th>
                                        <th class="text-center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ds_samples_analyze as $row){ ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $row->treatment_name; ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_atr,2); ?></td>
                                        <td class="text-center"><?php echo fs_protocol_result($row->pos_atr); ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_tch,2); ?></td>
                                        <td class="text-center"><?php echo fs_protocol_result($row->pos_tch); ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_tah,2); ?></td>
                                        <td class="text-center"><?php echo fs_protocol_result($row->pos_tah); ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_wei,2); ?></td>
                                        <td class="text-center"><?php echo fs_protocol_result($row->pos_wei); ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if(count($ds_samples_analyze_period) > 0){ ?>
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <div id="chart_samples_analyze_period" style="min-height: 350px;"></div>
            </div>
        </div>
    <?php } ?>

    <?php if(count($ds_samples_analyze) > 0){ ?>
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <!--ATR-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0">
                        <div id="chart_atr" style="min-height: 350px;"></div>
                    </div>
                </div>
                <!--TCH-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0">
                        <div id="chart_tch" style="min-height: 350px;"></div>
                    </div>
                </div>
                <!--TAH-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0">
                        <div id="chart_tah" style="min-height: 350px;"></div>
                    </div>
                </div>
                <!--WEI-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0">
                        <div id="chart_wei" style="min-height: 350px;"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="container-xl">
        <div class="page-header d-print-none mt-1 mb-1">
            <div class="row row-cards row-deck">
                <div class="col">
                    <h2 class="page-title">Índices médios por períodos</h2>
                </div>
            </div>
        </div>
    </div>

    <!--Begin: gráfico das Médias das Amostras por Período-->
    <div class="container-xl">
        <div class="row row-cards row-deck">
            <!--ATR-->
            <?php if(!empty($ds_samples_analyze_graphic_period_atr)){ ?>
                <div class="col-sm-6 col-lg-12">
                    <div class="card border-0">
                        <div id="chart_sample_atr_period" style="min-height: 350px;"></div>
                    </div>
                </div>
            <?php } ?>
            <!--TCH-->
            <?php if(!empty($ds_samples_analyze_graphic_period_tch)){ ?>
            <div class="col-sm-6 col-lg-12">
                <div class="card border-0">
                    <div id="chart_sample_tch_period" style="min-height: 350px;"></div>
                </div>
            </div>
            <?php } ?>
            <!--TPH-->
            <?php if(!empty($ds_samples_analyze_graphic_period_tah)){ ?>
            <div class="col-sm-6 col-lg-12">
                <div class="card border-0">
                    <div id="chart_sample_tah_period" style="min-height: 350px;"></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!--End: gráficos da Médias das Amostras por Período-->

    <!---------------------------------------------------------------------- -->
    <!--Amostras: Stems/Colmos --------------------------------------------- -->
    <!---------------------------------------------------------------------- -->
    <?php if(!empty($ds_biometry_stems)){ ?>
        <div class="container-xl">
            <div class="page-header d-print-none mt-1 mb-1">
                <div class="row row-cards row-deck">
                    <div class="col">
                        <h2 class="page-title">Biometria de Colmos</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover card-table table-vcenter text-nowrap" id="task-table">
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
                                    <?php foreach ($ds_biometry_stems as $row){ ?>
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
        </div>
    <?php } ?>

    <div class="container-xl">
        <div class="row row-cards row-deck">
            <!--Stem, Diameter, and Height-->
            <?php if(!empty($ds_biometry_stems)){ ?>
                <div class="col-sm-6 col-lg-12">
                    <div class="card border-0">
                        <div id="chart_biometry_stems" style="min-height: 350px;"></div>
                    </div>
                </div>
            <?php } ?>
            <!--TCH Volumetric-->
            <?php if(!empty($ds_biometry_stems)){ ?>
            <div class="col-sm-6 col-lg-12">
                <div class="card border-0">
                    <div id="chart_tch_volumetric_minus15" style="min-height: 350px;"></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!---------------------------------------------------------------------- -->
    <!--Amostras: Internodes/Entrenós (Stem, Diameter, and Height) --------- -->
    <!---------------------------------------------------------------------- -->
    <?php if(!empty($ds_biometry_internodes)){ ?>
        <div class="container-xl">
            <div class="page-header d-print-none mt-1 mb-1">
                <div class="row row-cards row-deck">
                    <div class="col">
                        <h2 class="page-title">Biometria de Entrenós</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover card-table table-vcenter text-nowrap" id="task-table">
                                <thead>
                                    <tr role="row">
                                        <th>Tratamento</th>
                                        <th class="text-end">Entrenós</th>
                                        <th class="text-center">#</th>
                                        <th class="text-end">Isoporos</th>
                                        <th class="text-center">#</th>
                                        <th class="text-end">%</th>
                                        <th class="text-end">Flores</th>
                                        <th class="text-center">#</th>
                                        <th class="text-end">%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ds_biometry_internodes as $row){ ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $row->treatment_name; ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_node,2); ?></td>
                                        <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_node); ?></strong></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_pith,2); ?></td>
                                        <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_pith); ?></strong></td>
                                        <td class="text-end"><?php echo frDecimals($row->perc_pith,2); ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_flower,2); ?></td>
                                        <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_flower); ?></strong></td>
                                        <td class="text-end"><?php echo frDecimals($row->perc_flower,2); ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="container-xl">
        <div class="row row-cards row-deck">
            <!--Stem, Diameter, and Height-->
            <?php if(!empty($ds_biometry_internodes)){ ?>
                <div class="col-sm-6 col-lg-12">
                    <div class="card border-0">
                        <div id="chart_biometry_internodes" style="min-height: 350px;"></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!---------------------------------------------------------------------- -->
    <!--Amostras: Tillers/Perfilhos ---------------------------------------- -->
    <!---------------------------------------------------------------------- -->
    <?php if(!empty($ds_biometry_tillers)){ ?>
        <div class="container-xl">
            <div class="page-header d-print-none mt-1 mb-1">
                <div class="row row-cards row-deck">
                    <div class="col">
                        <h2 class="page-title">Biometria de Perfilhos</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover card-table table-vcenter text-nowrap" id="task-table">
                                <thead>
                                    <tr role="row">
                                        <th>Tratamento</th>
                                        <th class="text-end">Perfilhos</th>
                                        <th class="text-center">#</th>
                                        <th class="text-end">Falha (m)</th>
                                        <th class="text-center">#</th>
                                        <th class="text-end">Perfilhos/m</th>
                                        <th class="text-center">#</th>
                                        <th class="text-end">% Falhas</th>
                                        <th class="text-center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ds_biometry_tillers as $row){ ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $row->treatment_name; ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_tiller,2); ?></td>
                                        <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_tiller); ?></strong></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_gap,2); ?></td>
                                        <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_gap); ?></strong></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_tiller_mts,2); ?></td>
                                        <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_tiller_mts); ?></strong></td>
                                        <td class="text-end"><?php echo frDecimals($row->perc_gap,2); ?></td>
                                        <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_perc_gap); ?></strong></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="container-xl">
        <div class="row row-cards row-deck">
            <?php if(!empty($ds_biometry_tillers)){ ?>
                <div class="col-sm-6 col-lg-12">
                    <div class="card border-0">
                        <div id="chart_biometry_tillers" style="min-height: 350px;"></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!---------------------------------------------------------------------- -->
    <!--Amostras: Infestation/Infestações ---------------------------------- -->
    <!---------------------------------------------------------------------- -->
    <?php if(!empty($ds_biometry_infestation)){ ?>
        <div class="container-xl">
            <div class="page-header d-print-none mt-1 mb-1">
                <div class="row row-cards row-deck">
                    <div class="col">
                        <h2 class="page-title">Biometria de Perfilhos</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover card-table table-vcenter text-nowrap" id="task-table">
                                <thead>
                                    <tr role="row">
                                        <th>Tratamento</th>
                                        <th class="text-end">Entrenós</th>
                                        <th class="text-center">#</th>
                                        <th class="text-end">Infestações</th>
                                        <th class="text-center">#</th>
                                        <th class="text-end">Furos</th>
                                        <th class="text-center">#</th>
                                        <th class="text-end">%</th>
                                        <th class="text-end">Danos</th>
                                        <th class="text-center">#</th>
                                        <th class="text-end">%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ds_biometry_infestation as $row){ ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $row->treatment_name; ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_node,2); ?></td>
                                        <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_node); ?></strong></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_infestation,2); ?></td>
                                        <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_infestation); ?></strong></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_hole,2); ?></td>
                                        <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_hole); ?></strong></td>
                                        <td class="text-end"><?php echo frDecimals($row->perc_hole,2); ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_damage,2); ?></td>
                                        <td class="text-center"><strong><?php echo fs_protocol_result($row->pos_damage); ?></strong></td>
                                        <td class="text-end"><?php echo frDecimals($row->perc_damage,2); ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="container-xl">
        <div class="row row-cards row-deck">
            <?php if(!empty($ds_biometry_infestation)){ ?>
                <div class="col-sm-6 col-lg-12">
                    <div class="card border-0">
                        <div id="chart_biometry_infestation" style="min-height: 350px;"></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!---------------------------------------------------------------------- -->
    <!--Amostras: Compounds/Produtos --------------------------------------- -->
    <!---------------------------------------------------------------------- -->
    
    <!--Begin: Garantias-->
    <?php if(!empty($ds_compounds)){ ?>
        <div class="container-xl">
            <div class="page-header d-print-none mt-1 mb-1">
                <div class="row row-cards row-deck">
                    <div class="col">
                        <h2 class="page-title">Garantias</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover card-table table-vcenter text-nowrap" id="task-table">
                                <thead>
                                    <tr role="row">
                                        <th colspan="2">Produto</th>
                                        <th colspan="2">Composto</th>
                                        <th class="text-end">Garantia</th>
                                        <th class="text-end">Amostra</th>
                                        <th class="text-end" colspan="2">Resultado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ds_compounds as $row){ ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $row->treatment_name; ?></td>
                                        <td><?php echo $row->manufacturer_name; ?></td>
                                        <td><?php echo $row->compound_short_name; ?></td>
                                        <td><?php echo $row->compound_name; ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->guarantee,2); ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->num_compound,2); ?></td>
                                        <td class="text-right pr-0"><?php echo frDecimals($row->perc_result,2); ?><span class="text-muted small">&nbsp;%</span></td>
                                        <td class="text-right pl-0">
                                            <?php if(round($row->perc_result,0)>0){
                                                echo '<i class="fa fa-circle text-green"></i>';
                                            }else{
                                                echo '<i class="fa fa-circle text-red"></i>';
                                            }
                                            ?>
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
    <?php } ?>
    <!--End: Garantias-->

    <!--Begin: Custos por Tratamento e Produto-->
    <?php if(!empty($ds_treatment_cost)){ ?>
        <div class="container-xl mt-2">
            <div class="page-header d-print-none mb-1">
                <div class="row row-cards row-deck">
                    <div class="col">
                        <h2 class="page-title">Custos por Tratamento e Produto</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover card-table table-vcenter text-nowrap" id="task-table">
                                <thead>
                                    <tr role="row">
                                        <th colspan="3">Tratamento</th>
                                        <th colspan="2">Produto</th>
                                        <th class="text-end">Dose</th>
                                        <th class="text-center">Compra</th>
                                        <th class="text-end">Custo $</th>
                                        <th class="text-end">Custo $/ha</th>
                                        <th class="text-end">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ds_treatment_cost as $row){ ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo '#'.$row->treatment_id; ?></td>
                                        <td><?php echo $row->product_name_main; ?></td>
                                        <td><?php echo $row->manufacturer_name; ?></td>
                                        <td><?php echo $row->product_name; ?></td>
                                        <td class="text-center"><?php echo fs_html_is_main($row->is_main); ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->dose,3); ?><span class="text-muted small">&nbsp;g/cm3</span></td>
                                        <td class="text-center"><?php echo fdDateMySQL_to_DateBr($row->purchase_dt); ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->dose_cost,2); ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->ha_cost,2); ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->rate_value,2); ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!--End: Custos por Tratamento e Produto-->

    <!--Begin: gráfico dos custos totais por tratamento e produto-->
    <div class="container-xl mt-2">
        <div class="page-header d-print-none mb-1">
            <div class="row row-cards row-deck">
                <div class="col">
                    <h2 class="page-title">Custos Totais por Tratamento e Produto</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xl">
        <div class="row row-cards row-deck">
            <?php if(!empty($ds_treatment_cost_total)){ ?>
                <div class="col-sm-6 col-lg-12">
                    <div class="card border-0">
                        <div id="chart_finance_cost" style="min-height: 350px;"></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!--End: gráfico dos custos totais por tratamento e produto-->

    <!---------------------------------------------------------------------- -->
    <!--Amostras: Diseases/Doenças ----------------------------------------- -->
    <!---------------------------------------------------------------------- -->
    <?php if(!empty($ds_biometry_diseases)){ ?>
        <div class="container-xl mt-2">
            <div class="page-header d-print-none mb-1">
                <div class="row row-cards row-deck">
                    <div class="col">
                        <h2 class="page-title">Amostragem das Doenças</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover card-table table-vcenter text-nowrap" id="task-table">
                                <thead>
                                    <tr role="row">
                                        <th colspan="2">Doença</th>
                                        <th>Sigla</th>
                                        <th>Agente Causador</th>
                                        <th class="text-end">Qtdade</th>
                                        <th class="text-end">Perc. %</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ds_biometry_diseases as $row){ ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo '#'.$row->disease_id; ?></td>
                                        <td><?php echo $row->disease_name; ?></td>
                                        <td><?php echo $row->disease_short_name; ?></td>
                                        <td><?php echo $row->disease_agent; ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->subtotal,0); ?></td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-right">
                                                    <strong><?php echo frDecimals($row->disease_perc,2); ?>%</strong>
                                                </div>
<!--                                                    <div class="float-right">
                                                    <small class="text-muted">28/07/2018 - 23/08/2020</small>
                                                </div>-->
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-red"
                                                     role="progressbar"
                                                     style="width: <?php echo round($row->disease_perc); ?>%"
                                                     aria-valuenow="<?php echo round($row->disease_perc); ?>"
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
    
        <!--BEGIN: diseases crosstab-->
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover card-table table-vcenter text-nowrap" id="task-table">
                                <thead>
                                    <tr role="row">
                                        <th colspan="2">Tratamento</th>
                                        <?php foreach ($ds_biometry_diseases_dat as $row){
                                            echo '<th class="text-center">'.$row->disease_short_name.'</th>';
                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ds_biometry_diseases_cross->result_array() as $row){ ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo '#'.$row['treatment_id']; ?></td>
                                        <td><?php echo $row['treatment_name']; ?></td>
                                        <?php
                                            for ($x=1; $x <= count($ds_biometry_diseases_dat); $x++){
                                                if ($row['col'.$x]==0){
                                                    echo '<td class="text-center text-muted">-</td>';
                                                }else{
                                                    echo '<td class="text-center"><span class="avatar avatar-red">'.$row['col'.$x].'</span></td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END: diseases crosstab-->
    <?php } ?>

    <!--BEGIN: diseases by groups-->
    <div class="container-xl">
        <div class="row row-cards row-deck">
            <?php if(!empty($ds_biometry_diseases_groups_cross) and !empty($ds_biometry_diseases_groups_dat)){ ?>
                <div class="col-sm-6 col-lg-12">
                    <div class="card border-0">
                        <div id="chart_diseases_groups" style="min-height: 350px;"></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!--END: diseases by groups-->

    <!---------------------------------------------------------------------- -->
    <!--Amostras: Pests/Pragas --------------------------------------------- -->
    <!---------------------------------------------------------------------- -->
    <?php if(!empty($ds_biometry_pests)){ ?>
        <div class="container-xl mt-2">
            <div class="page-header d-print-none mb-1">
                <div class="row row-cards row-deck">
                    <div class="col">
                        <h2 class="page-title">Amostragem das Pragas</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover card-table table-vcenter text-nowrap" id="task-table">
                                <thead>
                                    <tr role="row">
                                        <th colspan="2">Pragas</th>
                                        <th>Sigla</th>
                                        <th class="text-end">Qtdade</th>
                                        <th class="text-end">Perc. %</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ds_biometry_pests as $row){ ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo '#'.$row->pest_id; ?></td>
                                        <td><?php echo $row->pest_name; ?></td>
                                        <td><?php echo $row->pest_short_name; ?></td>
                                        <td class="text-end"><?php echo frDecimals($row->subtotal,0); ?></td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-right">
                                                    <strong><?php echo frDecimals($row->pest_perc,2); ?>%</strong>
                                                </div>
<!--                                                    <div class="float-right">
                                                    <small class="text-muted">28/07/2018 - 23/08/2020</small>
                                                </div>-->
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-red"
                                                     role="progressbar"
                                                     style="width: <?php echo round($row->pest_perc); ?>%"
                                                     aria-valuenow="<?php echo round($row->pest_perc); ?>"
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
    
        <!--BEGIN: pests crosstab-->
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover card-table table-vcenter text-nowrap" id="task-table">
                                <thead>
                                    <tr role="row">
                                        <th colspan="2">Tratamento</th>
                                        <?php foreach ($ds_biometry_pests_dat as $row){
                                            echo '<th valign="bottom" class="text-center">'.$row->pest_short_name.'</th>';
                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ds_biometry_pests_cross->result_array() as $row){ ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo '#'.$row['treatment_id']; ?></td>
                                        <td><?php echo $row['treatment_name']; ?></td>
                                        <?php
                                            for ($x=1; $x <= count($ds_biometry_pests_dat); $x++){
                                                if ($row['col'.$x]==0){
                                                    echo '<td class="text-center text-muted">-</td>';
                                                }else{
                                                    echo '<td class="text-center"><span class="avatar avatar-red">'.$row['col'.$x].'</span></td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END: pests crosstab-->
    <?php } ?>

    <!--BEGIN: pests by groups-->
    <div class="container-xl">
        <div class="row row-cards row-deck">
            <?php if(!empty($ds_biometry_pests_groups_cross) and !empty($ds_biometry_pests_groups_dat)){ ?>
                <div class="col-sm-6 col-lg-12">
                    <div class="card border-0">
                        <div id="chart_pests_groups" style="min-height: 350px;"></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!--END: pests by groups-->








    







    
    
    
    
    
    
    
    
    
    
    
    
    

    <!---------------------------------------------------------------------- -->
    <!--Condições climáticas------------------------------------------------ -->
    <!---------------------------------------------------------------------- -->
    <?php if(!empty($ds_climatic_history)){ ?>
        <div class="container-xl mt-2">
            <div class="page-header d-print-none mb-1">
                <div class="row row-cards row-deck">
                    <div class="col">
                        <h2 class="page-title">Condições climáticas</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <div class="row row-cards row-deck">
                <div id="chart_climatic" style="min-height: 350px;"></div>
            </div>
        </div>
    <?php } ?>

    <!---------------------------------------------------------------------- -->
    <!--Protocolos: Conclusão----------------------------------------------- -->
    <!---------------------------------------------------------------------- -->
    <div class="container-xl">
        <div class="page-header d-print-none mt-3">
            <div class="row row-cards row-deck">
                <div class="col">
                    <h2 class="page-title">Conclusões</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xl">
        <?php if(count($ds_protocolo) > 0){ ?>
            <!--line 1-->
            <div class="row mt-2">
                <div class="col-12 text-truncate">
                    <div class="form-group mb-2">
                        <textarea wrap="hard" cols="100" rows="10" disabled 
                                  style="width: 100%; border: 1px solid #dee2e6;">
                                      <?php echo $ds_protocolo[0]->conclusion; ?>
                        </textarea>
                    </div>
                </div>
            </div>
            <!--line 2-->
            <div class="row">
                <div class="col-3">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Solicitante</label>
                        <input type="text" class="form-control" name="edtApplicant" value="<?php echo $ds_protocolo[0]->applicant_name; ?>" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group mb-2">
                        <label class="form-label mb-1">Responsável</label>
                        <input type="text" class="form-control" name="edtResponsible" value="<?php echo $ds_protocolo[0]->responsible_name; ?>" readonly>
                    </div>
                </div>
                <?php if(count($ds_protocolo_idealizers) > 0){ ?>
                <div class="col-3">
                    <label class="form-label mb-1">Idealizadores</label>
                    <div class="list-group">
                        <?php foreach ($ds_protocolo_idealizers as $row){ ?>
                            <div class="list-group-item pt-1 pb-1">
                                <div class="row align-items-center">
                                    <div class="col text-truncate">
                                        <?php echo $row->idealizer_name; ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
                <?php if(count($ds_protocolo_teams) > 0){ ?>
                <div class="col-3">
                    <label class="form-label mb-1">Equipe Técnica</label>
                    <div class="list-group">
                        <?php foreach ($ds_protocolo_teams as $row){ ?>
                            <div class="list-group-item pt-1 pb-1">
                                <div class="row align-items-center">
                                    <div class="col text-truncate">
                                        <?php echo $row->team_name; ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>

    <!---------------------------------------------------------------------- -->

</div>
