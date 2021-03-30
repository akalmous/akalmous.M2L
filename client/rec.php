<?php require('../fpdf/fpdf.php');
 session_start();
 class PDF extends FPDF{
function Header()
{
    // Logo
    $this->Image('n.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'bonjour',1,0,'C');
    // Line break
    $this->Ln(20);
}

}

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Ln(8);
$pdf->Image('1111.png',10,10,-300);
$pdf->Ln(25);


$pdf->Cell(0,0,utf8_decode('Récapitulatif de votre réservation '),0,1,'C');

$pdf->Ln(20);
$pdf->Cell(40,25,$_SESSION["date_ligne"]);
$pdf->Ln(20);

$pdf->SetTextColor(188, 158, 130);
$pdf->Cell(60,10,'N REFERENCE : ');
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(40,10,$_SESSION["id"]);
$pdf->Ln(10);



$pdf->SetTextColor(188, 158, 130);
$pdf->Cell(60,10,'Nom Complet :');
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(40,10,utf8_decode($_SESSION["nom_complet"]));
$pdf->Ln(10);

$pdf->SetTextColor(188, 158, 130);
$pdf->Cell(60,10,utf8_decode('date de résérvation :'));
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(40,10,$_SESSION["date_reservation"]);
$pdf->Ln(10);

$pdf->SetTextColor(188, 158, 130);
$pdf->Cell(60,10,'Nom de la salle : ');
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(40,10,utf8_decode($_SESSION["salle"]));
$pdf->Ln(10);

$pdf->SetTextColor(188, 158, 130);
$pdf->Cell(60,10,utf8_decode('Heure :'));
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(40,10,utf8_decode($_SESSION["heure"]));
$pdf->Ln(10);



$pdf->Output();
?>
