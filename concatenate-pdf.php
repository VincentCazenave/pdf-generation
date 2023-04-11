<?php

require_once('fpdf.php');
require_once('fpdf_merge.php');




// Créer le premier fichier PDF
$pdf1 = new FPDF();
$pdf1->AddPage();
$pdf1->SetFont('Arial', 'B', 16);
$pdf1->Cell(0, 10, 'Premier fichier PDF', 0, 1, 'C');
$pdf1->Output('fichier1.pdf', 'F');

// Créer le deuxième fichier PDF
$pdf2 = new FPDF();
$pdf2->AddPage();
$pdf2->SetFont('Arial', 'B', 16);
$pdf2->Cell(0, 10, 'Deuxieme fichier PDF', 0, 1, 'C');
$pdf2->Output('fichier2.pdf', 'F');

// Concaténer les deux fichiers PDF
$merge = new FPDF_Merge();
$merge->add('doc1.pdf');
$merge->add('doc2.pdf');
$merge->output();

echo "Le fichier concaténé a été créé avec succès !";

?>
