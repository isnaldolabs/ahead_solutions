<?php
function fdDateBr_to_DateMySQL($pdDate){
  if ($pdDate==NULL){
    $pdDate = fdDateMySQL_to_DateBr(Date("Y-m-d"));
  }
  $campos = explode("/", $pdDate);
  return date("Y-m-d", strtotime($campos[2]."/".$campos[1]."/".$campos[0]));
}

function fdDateMySQL_to_DateBr($pdDate){
  if ($pdDate==NULL){
    $pdDate = Date("Y-m-d");
  }
  $campos = explode("-", $pdDate);
  return date("d/m/Y", strtotime($campos[0]."/".$campos[1]."/".$campos[2]));
}

function fdDateTime_MySQL_to_Br($pdDateTime){
    if($pdDateTime != NULL){
        $ld_date = new DateTime($pdDateTime);
        return $ld_date->format('d/m/Y H:i:s');
    }else{
        return '-';
    }
}

function fdHourMySQL_ToBr($pdHour){
  if ($pdHour==NULL){
    $pdHour = Date("H:i");
  }
  $loHour = DateTime::createFromFormat('Y-m-d H:i:s', $pdHour);
  return $loHour->format('H:i');
}

function getDayOfMonth($pdDate){
  $ldDate = strtotime($pdDate);
  $liDay  = date("d",$ldDate);
  return $liDay;
}

function getHourMinuteofDateTime($pdDateTime){
  $liHour = fsGetPartOfDateTime($pdDateTime, 'G');
  $liMinute = fsGetPartOfDateTime($pdDateTime, 'i');
  return $liHour.':'.$liMinute;
}
