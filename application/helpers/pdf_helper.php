<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function fsHtmlProtocolTitle($po_protocolo){
    return '<h4 style="padding-top: 10px;">#'.$po_protocolo[0]->protocol_id.' - '.$po_protocolo[0]->title.'</h4>';
}
function fsHtmlProtocolDat($po_protocolo, $po_idealizers, $po_teams){
    return
        '<table style="font-size: 12px; border: 0px solid black; border-collapse: collapse; width: 100%;">'.
            '<tbody>'.
                // Line 1
                '<tr>'.
                    '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;">'.
                        '<span style="color: #404040;"><b>Código</b></span><p>'.$po_protocolo[0]->code.'</p></td>'.
                    '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;">'.
                        '<span style="color: #404040;"><b>Tipo</b></span><p>'.$po_protocolo[0]->type_name.'</p></td>'.
                    '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;">'.
                        '<span style="color: #404040;"><b>Metodologia</b></span><p>'.$po_protocolo[0]->methodology_name.'</p></td>'.
                    '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;">'.
                        '<span style="color: #404040;"><b>Ensaio</b></span><p>'.$po_protocolo[0]->test_name.'</p></td>'.
                '</tr>'.
                '<br/>'.
                // Line 2
                '<tr>'.
                    '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;" colspan="2">'.
                        '<span style="color: #404040;"><b>Linha de Pesquisa</b></span><p>'.$po_protocolo[0]->code.'</p></td>'.
                    '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;" colspan="2">'.
                        '<span style="color: #404040;"><b>Sublinha</b></span><p>'.$po_protocolo[0]->type_name.'</p></td>'.
                '</tr>'.
                '<br/>'.
                // Line 3
                '<tr>'.
                    '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;" colspan="4">'.
                        '<span style="color: #404040;"><b>Objetivos</b></span><p>'.$po_protocolo[0]->goal.'</p></td>'.
                '</tr>'.
                '<br/>'.
                // Line 4
                '<tr>'.
                    '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;" colspan="1">'.
                        '<span style="color: #404040;"><b>Data de Início</b></span><p>'.fdDateMySQL_to_DateBr($po_protocolo[0]->dt_start).'</p></td>'.
                    '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;" colspan="1">'.
                        '<span style="color: #404040;"><b>Data de Término</b></span><p>'.fdDateMySQL_to_DateBr($po_protocolo[0]->dt_end).'</p></td>'.
                    '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;" colspan="2">'.
                        '<span style="color: #404040;"><b>Data de Término Planejada</b></span><p>'.fdDateMySQL_to_DateBr($po_protocolo[0]->dt_end_planned).'</p></td>'.
                '</tr>'.
                '<br/>'.
                // Line 5
                '<tr>'.
                    '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;" colspan="3">'.
                        '<span style="color: #404040;"><b>Delineamento</b></span><p>'.$po_protocolo[0]->designing_name.'</p></td>'.
                    '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;" colspan="1">'.
                        '<span style="color: #404040;"><b>Repetições</b></span><p>'.$po_protocolo[0]->repetitions.'</p></td>'.
                '</tr>'.
                '<br/>'.
                // Line 6
                '<tr>'.
                    '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;" colspan="2">'.
                        '<span style="color: #404040;"><b>Solicitante</b></span><p>'.$po_protocolo[0]->applicant_name.'</p></td>'.
                    '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;" colspan="2">'.
                        '<span style="color: #404040;"><b>Responsável</b></span><p>'.$po_protocolo[0]->responsible_name.'</p></td>'.
                '</tr>'.
                '<br/>'.
                // Line 7
                '<tr>'.
                    '<td valign="top"; style="border: 0px solid black; border-collapse: collapse; text-align: left;" colspan="2">'.
                        '<span style="color: #404040;"><b>Idealizadores</b></span>'.fsHtmlProtocolIdealizers($po_idealizers).'</td>'.
                    '<td valign="top"; style="border: 0px solid black; border-collapse: collapse; text-align: left;" colspan="2">'.
                        '<span style="color: #404040;"><b>Equipe Técnica</b></span>'.fsHtmlProtocolTeams($po_teams).'</td>'.
                '</tr>'.
                '<br/>'.
            '</tbody>'.
        '</table>'.
        '<br/>';
}
function fsHtmlProtocolIdealizers($po_idealizers){
    $ls_idealizers = '';
    if(count($po_idealizers) > 0){
        foreach ($po_idealizers as $row){
            $ls_idealizers .= '<p>'.$row->idealizer_name.'</p>';
        }
    }
    return $ls_idealizers;
}
function fsHtmlProtocolTeams($po_teams){
    $ls_teams = '';
    if(count($po_teams) > 0){
        foreach ($po_teams as $row){
            $ls_teams .= '<p>'.$row->team_name.'</p>';
        }
    }
    return $ls_teams;
}
function fsHtmlProtocolConclusion($po_conclusion){
    $ls_result = '';
    if(count($po_conclusion) > 0){
        $ls_result .=
            // table 1
            '<table style="font-size: 12px; border: 0px solid black; border-collapse: collapse; width: 100%;">'.
                '<thead>'.
                    '<tr>'.
                        '<th style="text-align: left;">Classificação:</th>'.
                    '</tr>'.
                '</thead>'.
                '<tbody>'.
                    '<tr>'.
                        '<td style="border-collapse: collapse; text-align: left;">'.$po_conclusion[0]->rating.' - '.$po_conclusion[0]->rating_name.'</td>'.
                    '</tr>'.
                '</tbody>'.
            '</table>'.
            '<br/>'.
            // table 2
            '<table style="font-size: 12px; border: 0px solid black; border-collapse: collapse; width: 100%;">'.
                '<thead>'.
                    '<tr>'.
                        '<th style="text-align: left;">Conclusões:</th>'.
                    '</tr>'.
                '</thead>'.
                '<tbody>'.
                    '<tr>'.
                        '<td style="border-collapse: collapse; text-align: left;">'.nl2br($po_conclusion[0]->conclusion).'</td>'.
                    '</tr>'.
                '</tbody>'.
            '</table>';
    return $ls_result;
    }
}
function fsHtmlProtocolPrecision($po_precision){
    $ls_result = '';
    if(count($po_precision) > 0){
        $ls_result .=
            '<h5>Avaliação da precisão experimental</h5>'.
            '<table style="font-size: 12px; border: 0px solid black; border-collapse: collapse; width: 100%;">'.
                '<tbody>'.
                    '<tr>'.
                        '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;">'.
                            '<span style="color: #404040;"><b>Ftab = F5%</b></span><p>'.frDecimals($po_precision[0]->anova_ftb,2).'</p></td>'.
                        '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;">'.
                            '<span style="color: #404040;"><b>% CV</b></span><p>'.frDecimals($po_precision[0]->anova_ftb_cv,2).'</p></td>'.
                        '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;">'.
                            '<span style="color: #404040;"><b>Faixa</b></span><p>'.$po_precision[0]->anova_rat_values.'</p></td>'.
                        '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;">'.
                            '<span style="color: #404040;"><b>Classificação</b></span><p>'.$po_precision[0]->anova_rat_sort.'</p></td>'.
                        '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;">'.
                            '<span style="color: #404040;"><b>Precisão</b></span><p>'.$po_precision[0]->anova_rat_accuracy.'</p></td>'.
                    '</tr>'.
                '</tbody>'.
            '</table>'.
            '<p style="font-size: 0.75rem;">'.
                'Quanto menor o valor do CV melhor é a precisão experimental, ou seja, maior confiabilidade das informações.'.
            '</p>'.
            '<br/>';
    return $ls_result;
    }
}

function fsHtmlProtocolAnalyze($po_samples_analyze){
    $ls_analyze = '';
    if(count($po_samples_analyze) > 0){
        $ls_analyze .=
            '<h5>Amostras de Pré-Análises e Pesos</h5>'.
            '<table style="font-size: 12px; border: 0px solid black; border-collapse: collapse; width: 100%;">'.
                '<thead>'.
                    '<tr>'.
                        '<th style="border: 0px solid black; border-collapse: collapse; text-align: left;">Tratamento</th>'.
                        '<th style="border: 0px solid black; border-collapse: collapse; text-align: right;">ATR</th>'.
                        '<th style="border: 0px solid black; border-collapse: collapse; text-align: center;">#</th>'.
                        '<th style="border: 0px solid black; border-collapse: collapse; text-align: right;">TCH</th>'.
                        '<th style="border: 0px solid black; border-collapse: collapse; text-align: center;">#</th>'.
                        '<th style="border: 0px solid black; border-collapse: collapse; text-align: right;">TAH</th>'.
                        '<th style="border: 0px solid black; border-collapse: collapse; text-align: center;">#</th>'.
                        '<th style="border: 0px solid black; border-collapse: collapse; text-align: right;">Peso</th>'.
                        '<th style="border: 0px solid black; border-collapse: collapse; text-align: center;">#</th>'.
                    '</tr>'.
                '</thead>'.
                '<tbody>';
                foreach ($po_samples_analyze as $row){
                    $ls_analyze .=
                        '<tr>'.
                            '<td style="border: 0px solid black; border-collapse: collapse; text-align: left;">'.$row->treatment_name.'</td>'.
                            '<td style="border: 0px solid black; border-collapse: collapse; text-align: right;">'.frDecimals($row->num_atr,2).'</td>'.
                            '<td style="border: 0px solid black; border-collapse: collapse; text-align: center;">'.fs_protocol_result($row->pos_atr).'</td>'.
                            '<td style="border: 0px solid black; border-collapse: collapse; text-align: right;">'.frDecimals($row->num_tch,2).'</td>'.
                            '<td style="border: 0px solid black; border-collapse: collapse; text-align: center;">'.fs_protocol_result($row->pos_tch).'</td>'.
                            '<td style="border: 0px solid black; border-collapse: collapse; text-align: right;">'.frDecimals($row->num_tah,2).'</td>'.
                            '<td style="border: 0px solid black; border-collapse: collapse; text-align: center;">'.fs_protocol_result($row->pos_tah).'</td>'.
                            '<td style="border: 0px solid black; border-collapse: collapse; text-align: right;">'.frDecimals($row->num_wei,2).'</td>'.
                            '<td style="border: 0px solid black; border-collapse: collapse; text-align: center;">'.fs_protocol_result($row->pos_wei).'</td>'.
                        '</tr>';
                }
        $ls_analyze .=
                '</tbody>'.
            '</table>';
    }
    return $ls_analyze;
}
function fsHtmlProtocolNotes($po_notes){
    $ls_notes = '';
    if(count($po_notes) > 0){
        $ls_notes .=
            '<h5>Observações</h5>'.
            '<table style="font-size: 12px; border: 0px solid black; width: 100%;">'.
                '<thead>'.
                    '<tr>'.
                        '<th style="border: 0px solid black; text-align: left;">Data e Hora</th>'.
                        '<th style="padding-left: 20px; border: 0px solid black; text-align: left;">Usuário</th>'.
                        '<th style="padding-left: 20px; border: 0px solid black; text-align: left;">Conteúdo</th>'.
                    '</tr>'.
                '</thead>'.
                '<tbody>';
                foreach ($po_notes as $row){
                    $ls_notes .=
                        '<tr>'.
                            '<td valign="top"; style="border: 0px solid black; text-align: left;">'.$row->note_at.'</td>'.
                            '<td valign="top"; style="padding-left: 20px; border: 0px solid black; text-align: left;">'.$row->user_name.'</td>'.
                            '<td valign="top"; style="padding-left: 20px; border: 0px solid black; text-align: left;">'.nl2br($row->notes).'</td>'.
                        '</tr>';
                }
        $ls_notes .=
                '</tbody>'.
            '</table>';
    }
    return $ls_notes;
}

