<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";

$infosTracer = recupInfosTracer($pdo, $date_debut, $date_fin);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de livraison</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #333;
            background-color: #ffffff;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #ffffff;
            /* Fond blanc */
        }

        .total {
            font-weight: bold;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .image {
            display: block;
            margin: 0 auto;
            width: 200px;
        }
    </style>
</head>


<?php
$montantTotalTracabilite = 0; // Initialisation du montant total

$tableRows = ''; // Variable pour stocker les lignes du tableau


if (!empty($infosTracer)) {
    foreach ($infosTracer as $infos) {
        $calculTotal = calcultotal($infos['qte_produit'], $infos['prix_unite']);
        $montantTotalTracabilite += $calculTotal; // Ajouter le calcul total au montant total
        
        // Concaténaton des lignes du tableau
        $tableRows .= "<tr>";
        $tableRows .= "<td>" . $infos['nom_livreur'] . "</td>";
        $tableRows .= "<td>" . $infos['nom_produit'] . "</td>";
        $tableRows .= "<td>" . $infos['qte_produit'] . "</td>";
        $tableRows .= "<td>" . $infos['prix_unite'] . " €" . "</td>";
        $tableRows .= "<td>" . $calculTotal . " €" . "</td>";
        $tableRows .= "</tr>";
    }
} else {
    // Si aucune donnée n'est disponible
    $tableRows .= "<tr><td colspan='4'>Aucune donnée disponible pour les dates spécifiées.</td></tr>";
}

// Affichage du résultat
?>
<body>

    <h1>Traçabilité des livraison</h1>
    <h3 class="title">Du <?php echo $date_debut; ?> Au <?php echo $date_fin; ?></h3>

    <table>
        <thead>
            <tr>
                <th>Nom du livreur</th>
                <th>Nom des produits</th>
                <th>Quantité des produits</th>
                <th>Prix Unité</th>
                <th>Montant total </th>
            </tr>
        </thead>
        <tbody>
            <?php echo $tableRows; ?>
        </tbody>
        <tfoot>
            <tr class="total">
                <th colspan="5">Montant Total de la Traçabilité : <?php echo $montantTotalTracabilite; ?> €</th>
            </tr>
        </tfoot>
    </table>
</body>



</html>