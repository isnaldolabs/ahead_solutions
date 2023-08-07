<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="my-3 my-md-5" style="margin-top: 0.5rem !important;">
            <div class="container">

                <div class="page-header">
                    <h1 class="page-title">
                        Estatística geral para a variável resposta <b><?php echo $ls_response_variable; ?></b>
                    </h1>
                </div>

                <div class="row row-cards">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Medidas de tendência central</h4>
                            </div>
                            <table class="table card-table">
                                <tbody>
                                    <tr>
                                        <td>Média<span class="text-muted ms-1">(Y)</span></td>
                                        <td class="text-end"><?php echo frDecimals($lr_stats_avg,2); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mediana<span class="text-muted ms-1">(Md)</span></td>
                                        <td class="text-end"><?php echo frDecimals($lr_stats_med,2); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Moda<span class="text-muted ms-1">(Mo)</span></td>
                                        <td class="text-end"><?php echo frDecimals($lr_stats_mod,2); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Valor Mínimo</td>
                                        <td class="text-end"><?php echo frDecimals($lr_stats_min,2); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Valor Máximo</td>
                                        <td class="text-end"><?php echo frDecimals($lr_stats_max,2); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Medidas de variabilidade ou dispersão</h4>
                            </div>
                            <table class="table card-table">
                                <tbody>
                                    <tr>
                                        <td>Amplitude<span class="text-muted ms-1">(h)</span></td>
                                        <td class="text-end"><?php echo frDecimals($lr_stats_amp,2); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Variância<span class="text-muted ms-1">(s2)</span></td>
                                        <td class="h4 text-right"><?php echo frDecimals($lr_stats_vs2,2); ?><span class="small text-muted ms-1">%</span></td>
                                    </tr>
                                    <tr>
                                        <td>Desvio Padrão<span class="text-muted ms-1">(SD)</span></td>
                                        <td class="text-end"><?php echo frDecimals($lr_stats_dsv,2); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Erro Padrão da Média<span class="text-muted ms-1">(EP)</span></td>
                                        <td class="text-end"><?php echo frDecimals($lr_stats_err,2); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Coeficiente de Variação<span class="text-muted ms-1">(CV)</span></td>
                                        <td class="h4 text-right"><?php echo frDecimals($lr_stats_coe,2); ?><span class="small text-muted ms-1">%</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
