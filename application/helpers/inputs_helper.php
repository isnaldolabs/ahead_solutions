<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
| Regras usadas para construir os inputs fields dos formulários
|--------------------------------------------------------------------------------------------------------------------------------------------------------------
|
*/
function input_hidden($poInput){
  return
    '<input type="hidden"'.
          ' name="edt_'.$poInput['name'].'"'.
          ' id="id_'.$poInput['id'].'"'.
          ' class="form-control"'.
          ($poInput['style']==NULL?'':' style="'.$poInput['style'].'"').
          ($poInput['value']==NULL?'':' value="'.$poInput['value'].'"').'>';
}

function input_email($poInput){
  return
    ($poInput['row']==TRUE?'<div class="row">':'').
      '<div class="col-sm-6 col-md-6 col-lg-'.$poInput['col'].'">'.
        '<div class="form-group">'.
          '<label class="form-label">'.$poInput['label'].'</label>'.
          '<input type="email"'.
                ' name="edt_'.$poInput['name'].'"'.
                ' id="id_'.$poInput['id'].'"'.
                ' class="form-control"'.
                ' maxlength="'.$poInput['maxlength'].'"'.
                ' placeholder="'.$poInput['placeholder'].'"'.
                ($poInput['style']==NULL?'':' style="'.$poInput['style'].'"').
                ($poInput['value']==NULL?'':' value="'.$poInput['value'].'"').'>'.
          fsInputError($poInput['error_msg']).
        '</div>'.
      '</div>'.
    ($poInput['row']==TRUE?'</div>':'');
}

function input_code($poInput){
  return
    ($poInput['row']==TRUE?'<div class="row">':'').
      '<div class="col-sm-6 col-md-6 col-lg-'.$poInput['col'].'">'.
        '<div class="form-group">'.
          '<label class="form-label">'.$poInput['label'].'</label>'.
          '<input type="text"'.
                ' name="edt_'.$poInput['name'].'"'.
                ' id="id_'.$poInput['id'].'"'.
                ' class="form-control"'.
                ' placeholder="'.$poInput['placeholder'].'"'.
                ($poInput['style']==NULL?'':' style="'.$poInput['style'].'"').
                ($poInput['value']==NULL?'':' value="'.$poInput['value'].'"').'>'.
          fsInputError($poInput['error_msg']).
        '</div>'.
      '</div>'.
    ($poInput['row']==TRUE?'</div>':'');
}

function input_name($poInput){
  if (isset($poInput['autofocus'])){
    $ls_autofocus = ($poInput['autofocus']==TRUE?' autofocus="autofocus"':'');
  }else{
    $ls_autofocus = '';
  }
  return
    ($poInput['row']==TRUE?'<div class="row">':'').
      '<div class="col-sm-6 col-md-6 col-lg-'.$poInput['col'].'">'.
        '<div class="form-group">'.
          '<label class="form-label">'.$poInput['label'].'</label>'.
          '<input type="text"'.
                ' name="edt_'.$poInput['name'].'"'.
                ' id="id_'.$poInput['id'].'"'.
                ' class="form-control"'.
                ' maxlength="'.$poInput['maxlength'].'"'.
                ' placeholder="'.$poInput['placeholder'].'"'.
                $ls_autofocus.
                ($poInput['style']==NULL?'':' style="'.$poInput['style'].'"').
                ($poInput['value']==NULL?'':' value="'.$poInput['value'].'"').'>'.
          fsInputError($poInput['error_msg']).
        '</div>'.
      '</div>'.
    ($poInput['row']==TRUE?'</div>':'');
}

function input_name_readonly($poInput){
  return
    ($poInput['row']==TRUE?'<div class="row">':'').
      '<div class="col-sm-6 col-md-6 col-lg-'.$poInput['col'].'">'.
        '<div class="form-group">'.
          '<label class="form-label">'.$poInput['label'].'</label>'.
          '<input type="text"'.
                ' name="edt_'.$poInput['name'].'"'.
                ' id="id_'.$poInput['id'].'"'.
                ' class="form-control"'.
                ' maxlength="'.$poInput['maxlength'].'"'.
                ' placeholder="'.$poInput['placeholder'].'"'.
                'readonly '.
                ($poInput['style']==NULL?'':' style="'.$poInput['style'].'"').
                ($poInput['value']==NULL?'':' value="'.$poInput['value'].'"').'>'.
          fsInputError($poInput['error_msg']).
        '</div>'.
      '</div>'.
    ($poInput['row']==TRUE?'</div>':'');
}

function input_active($poInput){
  return
    ($poInput['row']==TRUE?'<div class="row">':'').
      '<div class="col-sm-6 col-md-6 col-lg-'.$poInput['col'].'">'.
        '<div class="form-group">'.
//          '<label class="form-label">'.$poInput['label'].'</label>'.
          '<label class="custom-switch pl-0";">'.
            '<input type="checkbox"'.
                  ' name="edt_'.$poInput['name'].'"'.
                  ' id="id_'.$poInput['id'].'"'.
                  ' class="custom-switch-input"'.
                  ($poInput['style']==NULL?'':' style="'.$poInput['style'].'"').
                  ($poInput['checked']==NULL?'':' checked="'.$poInput['checked'].'"').'>'.
            '<span class="custom-switch-indicator"></span>'.
            '<strong><span class="custom-switch-description">'.$poInput['label'].'</span></strong>'.
          '</label>'.
          fsInputError($poInput['error_msg']).
        '</div>'.
      '</div>'.
    ($poInput['row']==TRUE?'</div>':'');
}

function input_number($poInput){
  return
    ($poInput['row']==TRUE?'<div class="row">':'').
      '<div class="col-sm-6 col-md-6 col-lg-'.$poInput['col'].'">'.
        '<div class="form-group">'.
          '<label class="form-label">'.$poInput['label'].'</label>'.
          '<input type="number"'.
                ' name="edt_'.$poInput['name'].'"'.
                ' id="id_'.$poInput['id'].'"'.
                ' class="form-control"'.
                ($poInput['maxlength']==NULL?'':' maxlength="'.$poInput['maxlength'].'"').
                ' placeholder="'.$poInput['placeholder'].'"'.
                ' size="'.$poInput['size'].'"'.
                ($poInput['style']==NULL?'':' style="'.$poInput['style'].'"').
                ($poInput['value']==NULL?'':' value="'.$poInput['value'].'"').'>'.
          fsInputError($poInput['error_msg']).
        '</div>'.
      '</div>'.
    ($poInput['row']==TRUE?'</div>':'');
}

function input_currency($poInput){
  return
    ($poInput['row']==TRUE?'<div class="row">':'').
      '<div class="col-sm-6 col-md-6 col-lg-'.$poInput['col'].'">'.
        '<div class="form-group">'.
          '<label class="form-label">'.$poInput['label'].'</label>'.
          '<input type="text"'.
                ' name="edt_'.$poInput['name'].'"'.
                ' id="id_'.$poInput['id'].'"'.
                ' class="form-control"'.
                ' maxlength="'.$poInput['maxlength'].'"'.
                ' placeholder="'.$poInput['placeholder'].'"'.
                ' pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"'.
                ' data-type="currency" '.
                ($poInput['style']==NULL?'':' style="'.$poInput['style'].'"').
                ($poInput['value']==NULL?'':' value="'.$poInput['value'].'"').'>'.
          fsInputError($poInput['error_msg']).
        '</div>'.
      '</div>'.
    ($poInput['row']==TRUE?'</div>':'');
}

function input_value($poInput){
  return
    ($poInput['row']==TRUE?'<div class="row">':'').
      '<div class="col-sm-6 col-md-6 col-lg-'.$poInput['col'].'">'.
        '<div class="form-group">'.
          '<label class="form-label">'.$poInput['label'].'</label>'.
          '<input type="text"'.
                ' name="edt_'.$poInput['name'].'"'.
                ' id="id_'.$poInput['id'].'"'.
                ' class="form-control"'.
                ' style="text-align: right;"'.
                ' maxlength="'.$poInput['maxlength'].'"'.
                ' placeholder="'.$poInput['placeholder'].'"'.
                ($poInput['style']==NULL?'':' style="'.$poInput['style'].'"').
                ($poInput['value']==NULL?'':' value="'.$poInput['value'].'"').'>'.
          fsInputError($poInput['error_msg']).
        '</div>'.
      '</div>'.
    ($poInput['row']==TRUE?'</div>':'');
}

function input_value_readonly($poInput){
  return
    ($poInput['row']==TRUE?'<div class="row">':'').
      '<div class="col-sm-6 col-md-6 col-lg-'.$poInput['col'].'">'.
        '<div class="form-group">'.
          '<label class="form-label">'.$poInput['label'].'</label>'.
          '<input type="text"'.
                ' name="edt_'.$poInput['name'].'"'.
                ' id="id_'.$poInput['id'].'"'.
                ' class="form-control id_'.$poInput['id'].'"'.
                ' style="text-align: right;"'.
                ' maxlength="'.$poInput['maxlength'].'"'.
                ' placeholder="'.$poInput['placeholder'].'"'.
                ' readonly '.
                ($poInput['style']==NULL?'':' style="'.$poInput['style'].'"').
                ($poInput['value']==NULL?'':' value="'.$poInput['value'].'"').'>'.
          fsInputError($poInput['error_msg']).
        '</div>'.
      '</div>'.
    ($poInput['row']==TRUE?'</div>':'');
}

function input_date($poInput){
  return
    ($poInput['row']==TRUE?'<div class="row">':'').
      '<div class="col-sm-6 col-md-6 col-lg-'.$poInput['col'].'">'.
        '<div class="form-group">'.
          '<label class="form-label">'.$poInput['label'].'</label>'.
          '<input type="date"'.
                ' name="edt_'.$poInput['name'].'"'.
                ' id="id_'.$poInput['id'].'"'.
                ' class="form-control js-date '.($poInput['value']==NULL?'text-muted':'').'"'.
                ' placeholder="dd/mm/aaaa"'.
                ' maxlength="10"'.
                ($poInput['style']==NULL?'':' style="'.$poInput['style'].'"').
                ($poInput['value']==NULL?'':' value="'.$poInput['value'].'"').'>'.
          fsInputError($poInput['error_msg']).
        '</div>'.
      '</div>'.
    ($poInput['row']==TRUE?'</div>':'');
}

function input_select($poInput, $poOptions, $pbSelect=TRUE){
  $loList = '';
  foreach ($poOptions as $row){
    $loList .=
      '<option '.($poInput['value']!=$row->column_key?'':' selected="selected"').' value="'.$row->column_key.'">'.$row->column_name.'</option>';
  }
  return
    ($poInput['row']==TRUE?'<div class="row">':'').
      '<div class="col-sm-6 col-md-6 col-lg-'.$poInput['col'].'">'.
        '<div class="form-group">'.
          '<label class="form-label">'.$poInput['label'].'</label>'.

            '<div class="input-group">'.
              '<div class="input-icon mb-3">'.
                '<select name="edt_'.$poInput['name'].'" id="id_'.$poInput['id'].'" class="form-control custom-select">'.
                  ($pbSelect==TRUE?'<option value="">Selecione uma opção</option>':'').
                  $loList.
                '</select>'.
                '<span class="input-icon-addon">'.
                  '<i class="fe fe-arrow-down"></i>'.
                '</span>'.
              '</div>'.
            '</div>'.

          fsInputError($poInput['error_msg']).
        '</div>'.
      '</div>'.
    ($poInput['row']==TRUE?'</div>':'');
}

function input_select_readonly($poInput, $poOptions){
  $loList = '';
  foreach ($poOptions as $row){
    if ($poInput['value']==$row->column_key){
        $loList .=
          '<option '.($poInput['value']!=$row->column_key?'':' selected="selected"').' value="'.$row->column_key.'">'.$row->column_name.'</option>';
    }
  }
  return
    ($poInput['row']==TRUE?'<div class="row">':'').
      '<div class="col-sm-'.$poInput['col'].' col-md-'.$poInput['col'].'">'.
        '<div class="form-group">'.
          '<label class="form-label">'.$poInput['label'].'</label>'.

            '<div class="input-group">'.
              '<div class="input-icon mb-3">'.
                '<select name="edt_'.$poInput['name'].'" id="id_'.$poInput['id'].'" class="form-control custom-select" style="background-color: #f8f9fa;">'.
                  $loList.
                '</select>'.
              '</div>'.
            '</div>'.

          fsInputError($poInput['error_msg']).
        '</div>'.
      '</div>'.
    ($poInput['row']==TRUE?'</div>':'');
}

function input_textarea($poInput){
  if (isset($poInput['autofocus'])){
    $ls_autofocus = ($poInput['autofocus']==TRUE?' autofocus="autofocus"':'');
  }else{
    $ls_autofocus = '';
  }
  return
    ($poInput['row']==TRUE?'<div class="row">':'').
      '<div class="col-sm-12 col-md-12 col-lg-'.$poInput['col'].'">'.
        '<div class="form-group">'.
          '<label class="form-label">'.$poInput['label'].'</label>'.
          '<textarea'.
                ' name="edt_'.$poInput['name'].'"'.
                ' id="id_'.$poInput['id'].'"'.
                ' class="form-control"'.
                ' placeholder="'.$poInput['placeholder'].'"'.
                ' rows="8" cols="100"'.
                $ls_autofocus.
                ($poInput['style']==NULL?'':' style="'.$poInput['style'].'"').'>'.
                ($poInput['value']==NULL?'':$poInput['value'].'"').
          '</textarea>'.
          fsInputError($poInput['error_msg']).
        '</div>'.
      '</div>'.
    ($poInput['row']==TRUE?'</div>':'');
}
