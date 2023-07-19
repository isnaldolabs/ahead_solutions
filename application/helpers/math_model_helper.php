<?php

/*
|-----------------------------------------------------------------------------|
 Mathematical Model
 ------------------
 Arquivo contendo os métodos que serão aplicados para calcular os resultos
 de cada experimento.
|-----------------------------------------------------------------------------|
*/

/*-- Stats ------------------------------------------------------------------ */
function stats_media(array $paSamples) {
    if(count($paSamples)>0){
        return array_sum($paSamples) / count($paSamples);
    }else{
        return 0;
    }
}
function stats_soma(array $paSamples) {
    return array_sum($paSamples);
}
function stats_moda(array $paSamples) {
    $moda = array();
    if (empty($paSamples)) {
        return $moda;
    }

    // Calcular quantidade de ocorrencias de cada valor
    $ocorrencias = array();
    foreach ($paSamples as $valor) {
        $valor_str = var_export($valor, true);
        if (!isset($ocorrencias[$valor_str])) {
            $ocorrencias[$valor_str] = array(
                'valor' => $valor,
                'ocorrencias' => 0
            );
        }
        $ocorrencias[$valor_str]['ocorrencias'] += 1;
    }

    // Determinar maior ocorrencia
    $quantidade = null;
    foreach ($ocorrencias as $item) {
        if ($quantidade === null || $item['ocorrencias'] >= $quantidade) {
            $quantidade = $item['ocorrencias'];
        }
    }

    // Obter valores com a maior ocorrencia
    foreach ($ocorrencias as $item) {
        if ($item['ocorrencias'] == $quantidade) {
            $moda[] = $item['valor'];
        }
    }
    return $moda;
}
function stats_mediana(array $paSamples, $comparacao = null) {
    if (empty($paSamples)) {
        return false;
    }

    // Ordenar o array
    if ($comparacao === null) {
        sort($paSamples);
    } else {
        usort($paSamples, $comparacao);
    }

    $tamanho = count($paSamples);

    // Tamanho impar: obter valor mediano
    if ($tamanho % 2) {
        $mediana = $paSamples[(($tamanho + 1) / 2) - 1];

    // Tamanho par: obter a media simples entre os dois valores medianos
    } else {
        $v1 = $paSamples[($tamanho / 2) - 1];
        $v2 = $paSamples[$tamanho / 2];
        $mediana = ($v1 + $v2) / 2;
    }
    return $mediana;
}
function stats_amplitude(array $paSamples) {
    sort($paSamples);
    reset($paSamples);
    $lr_min = current($paSamples);
    $lr_max = end($paSamples);
    return ($lr_max - $lr_min);
}
function stats_variancia_s2($paSamples, $piTreatments, $prAvg) {
    $lrSum = 0;
    foreach ($paSamples as $item) {
        $lrSum += pow($item - $prAvg,2);
    }
    return ($lrSum / ($piTreatments - 1));
}
function stats_desvio_padrao($prVariancia) {
    return sqrt($prVariancia);
}
function stats_erro_padrao($prDesvioPadrao, $li_treatments) {
    return ($prDesvioPadrao / sqrt($li_treatments));
}
function stats_coeficiente($prDesvioPadrao, $prMedia) {
    if($prMedia>0){
        return (($prDesvioPadrao / $prMedia) * 100);
    }else{
        return 0;
    }
}

/*-- DIC: Anova ------------------------------------------------------------- */
function dic_anova_sq_total($paSamples, $piTreatments, $piRepetitions) {
    $lrSumTotal = 0;
    $lrPowValue = 0;
    foreach ($paSamples as $item) {
        $lrSumTotal += $item->value;
        $lrPowValue += pow($item->value, 2);
    }
    $lrPowTotal = pow($lrSumTotal, 2);
    $lrResult = round($lrPowValue-($lrPowTotal/($piTreatments*$piRepetitions)),3);
    return $lrResult;
}
function dic_anova_sq_treatments($paSamples, $piTreatments, $piRepetitions) {
    $lrSumTotal = 0;
    $lrPowValue = 0;
    foreach ($paSamples as $item) {
        $lrSumTotal += $item->value;
        $lrPowValue += pow($item->value, 2);
    }
    $lrPowTotal = pow($lrSumTotal, 2);
    $lrResult = round(($lrPowValue/$piRepetitions)-($lrPowTotal/($piTreatments*$piRepetitions)),3);
    return $lrResult;
}
function dic_anova_sq_error($prSqTotal, $prSqTreatment) {
    return round($prSqTotal - $prSqTreatment,3);
}
function dic_anova_qm($prSomaQuadrados, $piGrausLiberdade) {
    if ($piGrausLiberdade!=0){
        return round($prSomaQuadrados / $piGrausLiberdade,3);
    }else{
        return 0;
    }
}

/*-- DBA: Anova ------------------------------------------------------------- */
function dba_anova_sq_total($paSamples, $piTreatments, $piRepetitions) {
    $lrSumTotal = 0;
    $lrPowValue = 0;
    foreach ($paSamples as $item) {
        $lrSumTotal += $item->value;
        $lrPowValue += pow($item->value, 2);
    }
    $lrPowTotal = pow($lrSumTotal, 2);
    $lrResult = round($lrPowValue-($lrPowTotal/($piTreatments*$piRepetitions)),3);
    return $lrResult;
}
function dba_anova_sq_treatments($paSamples, $piTreatments, $piRepetitions) {
    $lrSumTotal = 0;
    $lrPowValue = 0;
    foreach ($paSamples as $item) {
        $lrSumTotal += $item->value;
        $lrPowValue += pow($item->value, 2);
    }
    $lrPowTotal = pow($lrSumTotal, 2);
    $lrResult = round(($lrPowValue/$piRepetitions)-($lrPowTotal/($piTreatments*$piRepetitions)),3);
    return $lrResult;
}
function dba_anova_sq_blocks($paSamples, $piTreatments, $piRepetitions) {
    $lrSumTotal = 0;
    $lrPowValue = 0;
    foreach ($paSamples as $item) {
        $lrSumTotal += $item->value;
        $lrPowValue += pow($item->value, 2);
    }
    $lrPowTotal = pow($lrSumTotal, 2);
    $lrResult = round(($lrPowValue/$piTreatments)-($lrPowTotal/($piTreatments*$piRepetitions)),3);
    return $lrResult;
}
function dba_anova_sq_error($prSqTotal, $prSqTreatment, $prError) {
    return round($prSqTotal - $prSqTreatment - $prError,3);
}
function dba_anova_qm($prSomaQuadrados, $piGrausLiberdade) {
    if ($piGrausLiberdade!=0){
        return round($prSomaQuadrados / $piGrausLiberdade,3);
    }else{
        return 0;
    }
}

/*
|-----------------------------------------------------------------------------|
*/












function media_aritmetica(array $paSamples) {
    return array_sum($paSamples) / count($paSamples);
}

function moda(array $paSamples) {
    $moda = array();
    if (empty($paSamples)) {
        return $moda;
    }

    // Calcular quantidade de ocorrencias de cada valor
    $ocorrencias = array();
    foreach ($paSamples as $valor) {
        $valor_str = var_export($valor, true);
        if (!isset($ocorrencias[$valor_str])) {
            $ocorrencias[$valor_str] = array(
                'valor' => $valor,
                'ocorrencias' => 0
            );
        }
        $ocorrencias[$valor_str]['ocorrencias'] += 1;
    }

    // Determinar maior ocorrencia
    $quantidade = null;
    foreach ($ocorrencias as $item) {
        if ($quantidade === null || $item['ocorrencias'] >= $quantidade) {
            $quantidade = $item['ocorrencias'];
        }
    }

    // Obter valores com a maior ocorrencia
    foreach ($ocorrencias as $item) {
        if ($item['ocorrencias'] == $quantidade) {
            $moda[] = $item['valor'];
        }
    }
    return $moda;
}

function mediana(array $paSamples, $comparacao = null) {
    if (empty($paSamples)) {
        return false;
    }

    // Ordenar o array
    if ($comparacao === null) {
        sort($paSamples);
    } else {
        usort($paSamples, $comparacao);
    }

    $tamanho = count($paSamples);

    // Tamanho impar: obter valor mediano
    if ($tamanho % 2) {
        $mediana = $paSamples[(($tamanho + 1) / 2) - 1];

    // Tamanho par: obter a media simples entre os dois valores medianos
    } else {
        $v1 = $paSamples[($tamanho / 2) - 1];
        $v2 = $paSamples[$tamanho / 2];
        $mediana = ($v1 + $v2) / 2;
    }
    return $mediana;
}

function amplitude(array $paSamples) {
    sort($paSamples);
    reset($paSamples);
    $lr_min = current($paSamples);
    $lr_max = end($paSamples);
    return ($lr_max - $lr_min);
}

function variancia_s2($piTreatments, $prSumS2) {
    return ($prSumS2 / ($piTreatments - 1));
}

function variancia_sI($paSamples, $piTreatments, $piRepetitions) {
    $lrSum = 0;
    foreach ($paSamples as $item) {
        $lrSum += $item;
    }
    $lrAverage = round($lrSum / $piTreatments,3);
    $lrPotency = 0;
    foreach ($paSamples as $item) {
        $lrPotency += pow($item - $lrAverage, 2);
    }
    $lrResult = round(($lrPotency / ($piTreatments-1)) * $piRepetitions,3);
    return $lrResult;
}

function desvio_padrao($prVariancia) {
    return sqrt($prVariancia);
}

function erro_padrao($prDesvioPadrao, $li_treatments) {
    return ($prDesvioPadrao / sqrt($li_treatments));
}

function coeficiente($prDesvioPadrao, $prMedia) {
    return (($prDesvioPadrao / $prMedia) * 100);
}

function sq_total($paSamples, $piTreatments, $piRepetitions) {
    $lrSumTotal = 0;
    $lrPotency = 0;
    foreach ($paSamples as $item) {
        $lrSumTotal += $item;
        $lrPotency += pow($item, 2);
    }
    $lrPotencyTotal = pow($lrSumTotal, 2);
    $liUnits = ($piTreatments * $piRepetitions);
    $lrResult = round($lrPotency-($lrPotencyTotal/$liUnits),3);
    return $lrResult;
}

function sq_treatment($paSamples, $piTreatments, $piRepetitions) {
    $lrSum = 0;
    $lrPotency = 0;
    foreach ($paSamples as $item) {
        $lrSum += $item;
        $lrPotency += pow($item, 2);
    }
    $lrCalc1 = round($lrPotency / $piRepetitions,3);
    $lrPotencySum = pow($lrSum, 2);
    $liUnits = ($piTreatments * $piRepetitions);
    $lrCalc2 = round($lrPotencySum / $liUnits,3);
    return ($lrCalc1 - $lrCalc2);
}

function sq_block($paRepetitions, $piTreatments, $piRepetitions) {
    $lrSumTotal = 0;
    $lrPotency = 0;
    foreach ($paRepetitions as $item) {
        $lrSumTotal += $item;
        $lrPotency += pow($item, 2);
    }
    $lrPotencyTotal = pow($lrSumTotal, 2);
    $liUnits = ($piTreatments * $piRepetitions);
    $lrCalc = ($lrPotency / $piTreatments) - ($lrPotencyTotal / $liUnits);
    $lrResult = round($lrCalc,3);
    return $lrResult;
}

function sq_treatments($paAnalyze, $piTreatments, $piRepetitions) {
    $lrSumTotal = 0;
    $lrPotency = 0;
    foreach ($paAnalyze as $item) {
        $lrSumTotal += $item;
        $lrPotency += pow($item, 2);
    }
    $lrPotencyTotal = pow($lrSumTotal, 2);
    $liUnits = ($piTreatments * $piRepetitions);
    $lrCalc = ($lrPotency / $piRepetitions) - ($lrPotencyTotal / $liUnits);
    $lrResult = round($lrCalc,3);
    return $lrResult;
}

function sq_total_dba($paValues, $piTreatments, $piRepetitions) {
    $lrSumTotal = 0;
    $lrPotency = 0;
    foreach ($paValues as $item) {
        $lrSumTotal += $item;
        $lrPotency += pow($item, 2);
    }
    $lrPotencyTotal = pow($lrSumTotal, 2);
    $liUnits = ($piTreatments * $piRepetitions);
    $lrCalc = $lrPotency - ($lrPotencyTotal / $liUnits);
    $lrResult = round($lrCalc,3);
    return $lrResult;
}

//    print_r($lrSumTotal.'<br>');
//    print_r($lrPotency.'<br>');
//    print_r($lrPotencyTotal.'<br>');
//    print_r($lrCalc.'<br>');
