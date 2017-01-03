<?php
while (ob_get_level()){
    ob_end_clean();
    header("Content-Encoding: None", true);
}

$log = new Vue_ticketDB($cnx);
$ticket = $log->getTicketById($_GET['id_ticket']);
$demain =  time() + 86400;

require('././admin/lib/php/fpdf/fpdf.php');
$pdf = new FPDF('P','cm','A4');
$pdf->AddPage();
$pdf->Image('././admin/images/banniere.jpg',1.1,1,-115);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',12);
$pdf->Image('././admin/images/qrcode.png',11,7,-120);
$pdf->Image('././admin/images//affiches/'.$ticket[0]['image'],4,7,-300);
$pdf->SetXY(4,17);
$pdf->Cell(16,1,utf8_decode("Nom : ".$ticket[0]['nom']),0,1,'L',1);
$pdf->SetXY(4,18);
$pdf->Cell(16,1,utf8_decode("Prix unitaire : ".$ticket[0]['prix'])." euros",0,1,'L',1);
$pdf->SetXY(4,19);
$pdf->Cell(16,1,"Salle    ".$ticket[0]['id_salle'],0,1,'L',1);
$pdf->SetXY(4,20);
$pdf->Cell(16,1,"Nombre de place(s) : ".$ticket[0]['nb_ticket'],0,1,'L',1);
$pdf->SetXY(4,21);
$pdf->Cell(16,1,"Prix total : ".$ticket[0]['prix']*$ticket[0]['nb_ticket']." euros",0,1,'L',1);
$pdf->SetXY(4,22);
$pdf->Cell(16,1,utf8_decode("Date de validité : ".date('d/m/Y', $demain)),0,1,'L',1);
$pdf->SetXY(12,17);
$pdf->Cell(16,1,utf8_decode("Numéro du client : ".$ticket[0]['id_client']),0,1,'L',1);
$pdf->SetXY(12,18);
$pdf->Cell(16,1,utf8_decode("Nom du client : ".$ticket[0]['nom_client']),0,1,'L',1);
$pdf->SetXY(12,19);
$pdf->Cell(16,1,utf8_decode("Préom du client : ".$ticket[0]['prenom_client']),0,1,'L',1);
$pdf->SetXY(12,20);
$pdf->Cell(16,1,utf8_decode("Email : ".$ticket[0]['email_client']),0,1,'L',1);
$pdf->Output();