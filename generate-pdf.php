<?php

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Load the Twig template
$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);
$html = $twig->render('test.html.twig', [
    'title' => 'My Devis',
    'description' => 'This is my Devis description'
]);

// Instantiate and use the Dompdf class
$options = new Options();
$options->setChroot('');

$dompdf = new Dompdf();
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('devis.pdf', ['Attachment' => false]);

echo 'Fichier outputed'
?>