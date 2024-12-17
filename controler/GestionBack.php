<?php
if (isset($_GET['promundus'])) {
    // =============================\\
    // Pages Global de l'application \\
    // ===============================\\
    if ($_GET['promundus'] == 'accueilPromundus') {
        
    }
    if ($_GET['promundus'] == 'contactPromundus') {
       
    }
    if ($_GET['promundus'] == 'monProfilPromundus') {
        
    }
    if ($_GET['promundus'] == 'nosProduitsPromundus') {
        $recupClient = listeClients($pdo);
    }
    if ($_GET['promundus'] == 'pannierCommandePromundus') {
        if (isset($_SESSION['idCommande'])) {
            $produitPanier = recupListeProduitDetail($pdo, $_SESSION['idCommande']);
        }
    }
    if ($_GET['promundus'] == 'creerUserPromundus') {
        
    }

    // =============================\\
    // Pages Dédier a la Modération  \\
    // ===============================\\
    
    if ($_GET['promundus'] == 'stockPromundus') {
        $produitExiste = recupListeProduits($pdo);
        if (isset($_GET['sucess'])) {

            if ($_GET['sucess'] == 'ok') {
                echo '<p class="text-success text-center mt-5 alert alert-success">Le produit à été ajouter avec succès ! </p>';
            }
            if ($_GET['sucess'] == 'produitMAj') {
                echo '<p class="text-success text-center mt-5 alert alert-success">Le stock du produit à été Mis a jour avec succès ! </p>';
            }
        }
        if (isset($_GET['erreur'])) {

            if ($_GET['erreur'] == 'FigurineExiste') {
                echo '<p class="Error text-center text-danger mt-5 alert alert-danger">Le produit existe déja ! </p>';
            }
        }
    }
    if ($_GET['promundus'] == 'traceProdPromundus') {
        
    }
    if ($_GET['promundus'] == 'ajouterProdPmd') {
       
    }
    if ($_GET['promundus'] == 'detailProdPmd') {
        
    }
    if ($_GET['promundus'] == 'editStockPromundus') {
        
    }
    if ($_GET['promundus'] == 'supprimerStockPromundus') {
        
    }
    if ($_GET['promundus'] == 'stockClientPromundus') {
        
    }
    if ($_GET['promundus'] == 'afficherClientPromundus') {
        
    }
    if ($_GET['promundus'] == 'editerClientPromundus') {
        
    }
    if ($_GET['promundus'] == 'MessagesRecuPromundus') {
        
    }
    if ($_GET['promundus'] == 'MessagesArchiverPromundus') {
        
    }
    if ($_GET['promundus'] == 'MessagesReponduPromundus') {
        
    }
    if ($_GET['promundus'] == 'MessagesSupprimerPromundus') {
       
    }
    if ($_GET['promundus'] == 'DetailMessageRecuPromundus') {
        
    }
    if ($_GET['promundus'] == 'DetailMessageArchiverPromundus') {
        
    }
    if ($_GET['promundus'] == 'DetailMessageReponduPromundus') {
        
    }
    if ($_GET['promundus'] == 'DetailMessageSupprimerPromundus') {
        
    }
    if ($_GET['promundus'] == 'ReponsePromundus') {
        
    }
    if ($_GET['promundus'] == 'CommandesEnAttente') {
        
    }
    if ($_GET['promundus'] == 'commandesAccepterPromundus') {
        
    }
    if ($_GET['promundus'] == 'affichageUtilisateur') {
        
    }
    if ($_GET['promundus'] == 'detailUtilisateur') {
        
    }
}

?>