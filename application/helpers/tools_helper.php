<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Serial:
| Origem: https://pt.stackoverflow.com/questions/256680/como-gerar-um-serial-key-que-contenha-um-prefixo-nos-primeiros-5-caracteres
| 
| Retorna serial com letras e numeros, ex: RQ4BD-1NSBA-PXUD9-DOKS6
| echo Serial();
| 
| Retorna serial só com números, ex: 07295-31860-33824-63832
| echo Serial('numeros');
| 
| Retorna serial só com letras, ex: CDMIC-AXLET-BRMGW-QUVWL
| echo Serial('letras');
| 
| Retorna serial só com números mas quantidade diferente de caracteres, ex: 339-671-633-081-731-120
| echo Serial('numeros', 3, 6);
| 
| Utilizar separadores diferentes, ex: 2CQHJ.SF1E6.D5SOG.UA10K
| echo Serial('aleatorio', 5, 4, '.');
| 
| Juntar formas e quantidades diferentes, ex: AMQGUUY-82468-32482-84190
| echo Serial('letras', 7, 1).'-'.Serial('numeros', 5, 3);
| 
| Juntar texto fixo com serial, ex: XYAMN-16697-17479-56095
| echo 'XYAMN-'.Serial('numeros', 5, 3);
| 
| 65 é o codigo ascii para 'A'
| 90 é o codigo ascii para 'Z'
| -------------------------------------------------------------------------
*/
function fsSerial($tipo = '', $qtdigitos = 5, $qtdbaterias = 2, $separador = '-') {
  $qtdtotal = $qtdbaterias * $qtdigitos;
  $letrasnumeros = array_merge(range(0,9), range('A', 'Z'));

  $serial = '';
  for($i=0; $i < $qtdtotal; $i++){
    if ($tipo == 'numeros'){
      $digito = rand(0, 9);
    }
    else if($tipo == 'letras'){
      $digito = chr(rand(65, 90));
    }
    else{
      $digito = $letrasnumeros[rand(0, count($letrasnumeros) - 1)];
    }
    $serial .= (!($i % $qtdigitos) && $i ? $separador : '').$digito;
  }
  return $serial;
}

function frDecimals($prValue, $piDecimals=2){
  return number_format($prValue, $piDecimals, ",", ".");
}

function fsLetterMonth($piMonth){
  switch ($piMonth){
    case  1: $lsResult = "J"; break;
    case  2: $lsResult = "F"; break;
    case  3: $lsResult = "M"; break;
    case  4: $lsResult = "A"; break;
    case  5: $lsResult = "M"; break;
    case  6: $lsResult = "J"; break;
    case  7: $lsResult = "J"; break;
    case  8: $lsResult = "A"; break;
    case  9: $lsResult = "S"; break;
    case 10: $lsResult = "O"; break;
    case 11: $lsResult = "N"; break;
    case 12: $lsResult = "D"; break;
  }
  return $lsResult;
}
