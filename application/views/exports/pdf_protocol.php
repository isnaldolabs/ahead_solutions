<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$ls_html  = fsHtmlProtocolTitle($ds_protocolo);
$ls_html .= fsHtmlProtocolDat($ds_protocolo, $ds_protocolo_idealizers, $ds_protocolo_teams);
$ls_html .= fsHtmlProtocolPrecision($ds_protocolo);
$ls_html .= fsHtmlProtocolConclusion($ds_protocolo);

$ls_html .= fsHtmlProtocolNotes($ds_protocolo_notes);

switch ($li_sample){
    case 1:
        $ls_html .= fsHtmlProtocolAnalyze($ds_samples_analyze);
        break;
    case 2:
        break;
}

date_default_timezone_set('America/Sao_Paulo');
$mpdf=new mPDF('utf-8', 'A4-P');
$mpdf->SetDisplayMode('fullpage');
$mpdf->useOnlyCoreFonts = TRUE;
$mpdf->SetHeader(fs_get_license_name().'||');
$mpdf->WriteHTML($ls_html);
$mpdf->defaultfooterline = TRUE;
$mpdf->defaultfooterfontstyle = FALSE;
$mpdf->SetFooter('{DATE j/m/Y H:i}||Página {PAGENO}/{nb}');
$mpdf->Output();
exit();
