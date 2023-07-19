<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Preparar
                </h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards row-deck">
            <?php echo fsCreateMenu('Dados Agronômicos', getMenuDadosAgronomicos()); ?>
            <?php echo fsCreateMenu('Dados Biológicos', getMenuDadosBiologicos()); ?>
            <?php echo fsCreateMenu('Unidades Geográficas', getPrepareDivisoesGeograficas()); ?>
            <?php echo fsCreateMenu('Insumos', getMenuPrepareInsumos()); ?>
            <?php echo fsCreateMenu('Finanças', getMenuPrepareFinance()); ?>
            <?php echo fsCreateMenu('Experimentos', getPrepareExperiments()); ?>
            <?php echo fsCreateMenu('Preferências', getPreparePreferences()); ?>
        </div>
    </div>
</div>
