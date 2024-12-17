
<?php
session_start();

require '../model/connexion_bdd.php';
require '../model/fonctions.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'ajoutProd') {
        // Si le formulaire est soumis avec l'action 'ajoutProd'

        // Définition de la quantité du produit à ajouter
        $qte_com = 1;

        // Récupération sécurisée de l'ID du produit depuis les données POST
        $id_produit = filter_input(INPUT_POST, 'idProd', FILTER_SANITIZE_NUMBER_INT);
        $id_site_client = filter_input(INPUT_POST, 'id_site_client', FILTER_SANITIZE_NUMBER_INT);

        // Récupération des détails du produit depuis la base de données
        $produit = verifProduit($pdo, $id_produit);

        // Définition de la date de la commande au format 'Y-m-d H:i:s'
        date_default_timezone_set('Europe/Paris');
        $date_commande = date('Y-m-d H:i:s');

        // Calcul du prix total en multipliant le prix unitaire du produit par la quantité commandée
        $prix_total = $produit['prix_unite'] * $qte_com;

        // Récupération du prix unitaire du produit
        $prix_unite = $produit['prix_unite'];

        // Vérification si une commande est en cours (s'il existe une session d'ID de commande)
        if (isset($_SESSION['idCommande'])) {
            // Vérification si le produit existe déjà dans la commande
            $produitExist = produitExistecommande($pdo, $id_produit, $_SESSION['idCommande']);

            if ($produitExist) {
                // Si le produit existe déjà, mettre à jour la quantité
                updateQteProduit($pdo, $qte_com, $_SESSION['idCommande'], $id_produit);
                // update le stock promundus - qte_prod
            } else {
                // Sinon, insérer un nouveau détail de commande
                insertDetailcommande($pdo, $id_produit, $_SESSION['idCommande'], $qte_com, $prix_unite, $id_site_client);
                
            }

            // Mettre à jour le montant total de la commande
            updateMontantcommande($pdo, $_SESSION['idCommande'], $prix_total);
        } else {
            // Si aucune commande n'est en cours

            // Vérifier si une session utilisateur est active
            if (isset($_SESSION['idUser'])) {
                // Créer une nouvelle commande pour l'utilisateur
                createcommandeUser($pdo, $date_commande, $prix_total, $_SESSION['idUser']);
            }

            // Récupérer l'ID de la dernière commande insérée
            $_SESSION['idCommande'] = $pdo->lastInsertId();

            // Insérer un nouveau détail de commande
            insertDetailcommande($pdo, $id_produit, $_SESSION['idCommande'], $qte_com, $prix_unite, $id_site_client);
            
        }

        // Redirection vers une page spécifique avec un message de succès
        header('Location:../public/index.php?promundus=pannierCommandePromundus&success=ajouterAucommande');
    }

    // Vérifie si le formulaire est soumis avec l'action 'payerPan'
    if ($_POST['action'] == 'payerPan') {
        // Vérifie si une session utilisateur est active
        if (isset($_SESSION['idUser'])) {
            // Vérifie si une session de commande existe
            if (isset($_SESSION['idCommande'])) {
                $stock_client = 1;
                $id_produit = filter_input(INPUT_POST, 'idProd', FILTER_SANITIZE_NUMBER_INT);
                $id_site_client = filter_input(INPUT_POST, 'id_site_client', FILTER_SANITIZE_NUMBER_INT);
                
                // Récupère les informations d'adresse de l'utilisateur connecté
                $recupAdressUser = recupInfosUsers($pdo, $_SESSION['idUser']);
                
                // Récupère l'ID de l'adresse de l'utilisateur
                $id_adresse = $recupAdressUser['id_adresse'];
                
                if ($_SESSION['idRoleUser'] == 1 || $_SESSION['idRoleUser'] == 2) {
                    $id_statut_commande = 2;
                    // Met à jour le statut de la commande à "En cours de traitement"
                    updateStatutCommande($pdo, $id_statut_commande, $_SESSION['idCommande']);
                    $stockClientExiste = stockClientExiste($pdo, $id_site_client);
                    if($stockClientExiste){
                        updateQteStockCl($pdo, $id_site_client, $id_produit, $stock_client);
                        //a rajouter la Possibilité au chef d'equipe de faire l'inventaire sur le site du client \\
                    }else{
                        insertStockClient($pdo,$id_produit, $id_site_client, $stock_client);
                    }

                } else {
                    $id_statut_commande = 1;
                    // Met à jour le statut de la commande à "En cours de traitement"
                    updateStatutCommande($pdo, $id_statut_commande, $_SESSION['idCommande']);
                }

                unset($_SESSION['idCommande']);
                
            } else {
                // Redirige vers une page d'erreur si aucune commande n'existe
                header('Location:../public/index.php?promundus=pannierCommandePromundus&success=AucuncommandeExiste');
            }
        } else {
            // Redirige vers une page d'erreur si l'utilisateur n'est pas connecté
            header('Location:../public/index.php?promundus=accueilPromundus&error=userDeconnecter');
        }
    }
} else {
    // Redirige vers une page d'erreur si aucune action n'est définie
    header('Location:../public/index.php?promundus=pannierCommandePromundus&erreur=commandeNonPayer');
}

// Vérifie si une action est définie dans l'URL
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'supprimerProd') {
        // Récupération sécurisée de l'ID du produit depuis l'URL
        $id_produit = filter_input(INPUT_GET, 'idProd', FILTER_SANITIZE_NUMBER_INT);
        // Vérification si le produit existe dans la commande en cours
        $produit =  produitExistecommande($pdo, $id_produit, $_SESSION['idCommande']);

        // Calcul du montant du produit à supprimer
        $montantProduitASupprimer = -($produit['prix_unite'] * $produit['qte_com']);
        // Supprimer le produit du panier
        suprimerProdPan($pdo, $_GET['idProd'], $_SESSION['idCommande']);
        // Redirection vers une page spécifique avec un message de succès
        header('Location:../public/index.php?promundus=pannierCommandePromundus&sucess=suprimerProdPan');

        // Vérification du nombre de produits restants dans la commande
        $verifprod = recupNbProdcommandes($pdo, $_SESSION['idCommande']);

        if ($verifprod == 0) {
            // Supprimer la commande si aucun produit restant
            Suprimecommande($pdo, $_SESSION['idCommande']);
            header('Location:../public/index.php?promundus=pannierCommandePromundus&sucess=suprimercommande');
            // Supprimer la commande de la session aussi
            unset($_SESSION['idCommande']);
        } else {
            // Mettre à jour le montant de la commande s'il reste des produits
            updateMontantcommande($pdo, $_SESSION['idCommande'], $montantProduitASupprimer);
        }
    }
}

