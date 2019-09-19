<?php
require_once 'tcpdf/tcpdf.php';

$pdf=new TCPDF(PDF_PAGE_ORIENTATION,PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor("Max Muster");
$pdf->SetTitle("Rechnung Nr.");

$pdf->setFont("dejavusans","",12);

$pdf->AddPage();

$html="<h1>Hallo Welt</h1>";

$pdf->writeHTML($html,true,false,true,false,'');
$pdf->Output("test.pdf","I");

