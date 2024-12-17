<?php
require '../vendor/autoload.php';
$date_debut = $_POST['traceDateDebut'].' 00:00:00';
$date_fin = $_POST['traceDateFin']. ' 23:59:59';
use Dompdf\Dompdf;
use Dompdf\Options;

ob_start();

include '../front/tracabilite_produit.php';
$html = ob_get_clean();


$options = new Options();
$options->set('defaultFont', 'Arial');
$dompdf = new Dompdf($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$nomPdf = 'tracabiliteProduit.pdf_' . $_POST['traceDateDebut'];
$dompdf->stream($nomPdf, array('Attachment' => 0));


