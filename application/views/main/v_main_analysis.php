<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Analisar
                </h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards row-deck">
            <?php echo fsCreateMenu('Experimentos', getAnalysisOverall()); ?>
            <?php echo fsCreateMenu('Condições Climáticas', getAnalysisWeathers()); ?>
            <?php echo fsCreateMenu('Alertas Gerais', getAnalysisGeneralAlerts()); ?>
        </div>
    </div>
</div>
