<?php
session_start();
require "../model/connexion_bdd.php";
require "../model/fonctions.php";


if (isset($_POST['action'])) {

    if ($_POST['action'] == 'selectvilledept') {
        $idDept = filter_input(INPUT_POST, 'idDepartement', FILTER_SANITIZE_NUMBER_INT);
        $villesDept = recupVillesDept($pdo, $idDept);

        echo json_encode($villesDept);
    }

    // Produit dynamique panier \\
    

        if ($_POST['action'] == 'plusArticles' || $_POST['action'] == 'moinsArticles') {

            $id_produit = filter_input(INPUT_POST, 'id_produit', FILTER_SANITIZE_NUMBER_INT);
            $recupProduit = verifproduit($pdo, $id_produit);
            $qte = 1;
            
            if($_POST['action'] == 'moinsArticles') {
                $qte = -1;
            }
            
            updateQteProduit($pdo, $_SESSION['idCommande'], $id_produit, $qte);
            echo json_encode($qte);
        }


    // Recherche produit par nom ajax \\
    
        if ($_POST['action'] == 'searchBar') {
            $motCle = $_POST['motCle'];
            $rechercheProduit = rechercheProduitsParNom($pdo, $motCle);

            if (count($rechercheProduit) == 0) {
                $reponse = '<p class="text-center alert alert-danger mt-3">Aucun produit n\'a été trouvé !</p>';
            } else {
                $reponse = '';

                foreach ($rechercheProduit as $produit) {
                    $reponse .= '<div class="col-md-4 mb-4">';
                    $reponse .= '<div class="card BorderCardLivraion">';
                    $reponse .= '<div class="d-flex justify-content-between p-3">';
                    $reponse .= '<p class="lead mb-0">Stock Restant :</p>';
                    $reponse .= '<div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong" style="width: 35px; height: 35px;">';
                    $stock = $produit['stock'];
                    $reponse .= '</div></div>';
                    $logo = $produit['logo'];
                    $reponse .= '<img src="../public/ressource/img/' . $logo . '" class="card-img-top" alt="../public/ressource/img/' . $logo . '" />';
                    $reponse .= '<div class="card-body">';
                    $reponse .= '<div class="d-flex justify-content-between mb-3">';
                    $nomProd = htmlspecialchars($produit['nom_produit'], ENT_QUOTES, 'UTF-8');
                    $reponse .= '<h5 class="mb-0">' . $nomProd . '</h5>';
                    $reponse .= '</div>';
                    $reponse .= '<div class="d-flex justify-content-between">';
                    $description = htmlspecialchars($produit['description'], ENT_QUOTES, 'UTF-8');
                    $reponse .= '<p class="small">' . $description . '</p>';
                    $reponse .= '</div>';
                    $reponse .= '<form action="../controler/traitement_panier.php" method="post" class="d-flex justify-content-between">';

                    if ($stock < 1) {
                        $reponse .= '<p class="text-danger text-center mb-0 small fs-4">En rupture de stocks</p>';

                    } else {

                        $reponse .= '<select name="id_site_client" class="form-select" aria-label="Default select example">';
                        $reponse .= '<option value="">Choisissez le client à livrer</option>';

                        $recupClient = listeClients($pdo);
                        foreach ($recupClient as $client) {
                            $idSiteClients = $client['id_sites_clients'];

                            $nomSiteClient = $client['nom_site'];
                            $reponse .= '<option value="' . $idSiteClients . '">' . $nomSiteClient . '</option>';
                        }
                        $reponse .= '</select>';
                    }
                    $idProd = $produit['id_produit'];
                    $reponse .= '<input type="hidden" name="idProd" value="' . $idProd . '">';
                    $reponse .= '<input type="hidden" name="action" value="ajoutProd">';
                    $reponse .= '<input class="btn btnDesAjouts mx-auto" type="submit" value="Ajouter à la livraison">';
                    $reponse .= '</form>';
                    $reponse .= '</div></div></div>';
                    $reponse .= '</div></div>';
                }
            }
           echo json_encode($reponse);
        }
}
