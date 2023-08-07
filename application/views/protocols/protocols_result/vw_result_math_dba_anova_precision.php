<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="my-3 my-md-5" style="margin-top: 0.5rem !important;">
            <div class="container">

                <div class="row row-cards">
                    <div class="col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Avaliação da precisão experimentals</h4>
                            </div>
                            <table class="table card-table">
                                <thead>
                                    <th class="text-left">Fontes</th>
                                    <th class="text-center">Ftab = F5%</th>
                                    <th class="text-center">% CV</th>
                                    <th class="text-center">Faixa</th>
                                    <th class="text-center">Classificação</th>
                                    <th class="text-center" style="color: inherit;">
                                        <b>Precisão Experimental</b>
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-start">Blocos</td>
                                        <td class="text-center"><?php echo frDecimals($lr_anova_ftb_bl,2); ?></td>
                                        <td class="h4 text-center"><?php echo ($lr_anova_ftb_cv_bl==-9999?'***':frDecimals($lr_anova_ftb_cv_bl,2)); ?></td>
                                        <td class="text-center"><?php echo ($lr_anova_ftb_cv_bl==-9999?'***':$lr_anova_rat_values_bl); ?></td>
                                        <td class="text-center"><?php echo ($lr_anova_ftb_cv_bl==-9999?'***':$lr_anova_rat_sort_bl); ?></td>
                                        <td class="text-center">
                                            <div class="h4 mb-0 p-1 <?php echo $lr_anova_rat_color_bl; ?>">
                                                <?php echo $lr_anova_rat_accuracy_bl; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Tratamentos</td>
                                        <td class="text-center"><?php echo frDecimals($lr_anova_ftb_tr,2); ?></td>
                                        <td class="h4 text-center"><?php echo ($lr_anova_ftb_cv_tr==-9999?'***':frDecimals($lr_anova_ftb_cv_tr,2)); ?></td>
                                        <td class="text-center"><?php echo ($lr_anova_ftb_cv_tr==-9999?'***':$lr_anova_rat_values_tr); ?></td>
                                        <td class="text-center"><?php echo ($lr_anova_ftb_cv_tr==-9999?'***':$lr_anova_rat_sort_tr); ?></td>
                                        <td class="text-center">
                                            <div class="h4 mb-0 p-1 <?php echo $lr_anova_rat_color_tr; ?>">
                                                <?php echo $lr_anova_rat_accuracy_tr; ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            <h6 class="text-muted" style="font-size: 0.85rem;">
                                                Quanto menor o valor do CV melhor é a precisão experimental, ou seja, maior confiabilidade das informações.
                                            </h6>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <!----------------------->
                <!--end: ANOVA outcomes-->
                <!----------------------->

            </div>
        </div>
