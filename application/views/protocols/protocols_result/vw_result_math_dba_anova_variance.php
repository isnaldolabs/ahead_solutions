<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="my-3 my-md-5" style="margin-top: 0.5rem !important;">
            <div class="container">

                <div class="page-header">
                    <h1 class="page-title">
                        <b>ANOVA</b>
                    </h1>
                </div>

                <div class="row row-cards">
                    <div class="col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Quadro de análise de variância</h4>
                            </div>
                            <table class="table card-table">
                                <thead>
                                    <th>Fontes ou Causas de Variação</th>
                                    <th class="text-center">Graus de Liberdade <span class="small text-muted ms-1">(GL)</span></th>
                                    <th class="text-center">Soma de Quadrados <span class="small text-muted ms-1">(SQ)</span></th>
                                    <th class="text-center">Quadrado Médio <span class="small text-muted ms-1">(QM)</span></th>
                                    <th class="text-center">F<span class="small text-muted ms-1">cal</span></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Blocos</td>
                                        <td class="text-center"><?php echo frDecimals($li_anova_gl_bl,0); ?></td>
                                        <td class="text-center"><?php echo frDecimals($lr_anova_sq_bl,2); ?></td>
                                        <td class="text-center"><?php echo frDecimals($lr_anova_qm_bl,3); ?></td>
                                        <td class="h4 text-center"><?php echo frDecimals($lr_anova_fcalc_bl,3); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tratamentos</td>
                                        <td class="text-center"><?php echo frDecimals($li_anova_gl_tr,0); ?></td>
                                        <td class="text-center"><?php echo frDecimals($lr_anova_sq_tr,2); ?></td>
                                        <td class="text-center"><?php echo frDecimals($lr_anova_qm_tr,3); ?></td>
                                        <td class="h4 text-center"><?php echo frDecimals($lr_anova_fcalc_tr,3); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Erro</td>
                                        <td class="text-center"><?php echo frDecimals($li_anova_gl_er,0); ?></td>
                                        <td class="text-center"><?php echo frDecimals($lr_anova_sq_er,2); ?></td>
                                        <td class="text-center"><?php echo frDecimals($lr_anova_qm_er,3); ?></td>
                                        <td class="text-center">-</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="text-center"><?php echo frDecimals($li_anova_gl_tt,0); ?></td>
                                        <td class="text-center"><?php echo frDecimals($lr_anova_sq_tt,2); ?></td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
