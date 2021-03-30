<?php require('../fpdf/fpdf.php');
 session_start();




$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Ln(20);
$pdf->Cell(40,10,$_SESSION["idd"]);
$pdf->Ln(20);
$pdf->Cell(40,10,$_SESSION["date_ligne"]);
$pdf->Ln(20);
$pdf->Cell(40,10,utf8_decode($_SESSION["nom_complet"]));
$pdf->Ln(20);
$pdf->Cell(40,10,$_SESSION["date_reservation"]);
$pdf->Ln(20);
$pdf->Cell(40,10,utf8_decode($_SESSION["salle"]));
$pdf->Ln(20);
$pdf->Cell(40,10,$_SESSION["heure_deb"]);
$pdf->Ln(20);
$pdf->Cell(40,10,$_SESSION["heure_fin"]);
$pdf->Ln(20);

$pdf->Output();
?>