<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";


if(isset($_POST['action'])){

    $id_commande = $_POST['id_commande'];
    $id_statut_commande = $_POST['id_statut_commande'];
    $commandeExiste = recupCommande($pdo,$id_commande);

    if ($_POST['action'] == 'accepterCommande') {
        if($commandeExiste && $id_statut_commande == 1){
            $id_statut_commande = 2;
            updateStatutCommande($pdo,$id_statut_commande, $id_commande);
            // Ici on update le stock du client en ajoutant qte + stock
            // Ici on update le stock Promundus en retirant stock - qte
            header('Location:../public/index.php?promundus=commandesAccepterPromundus&sucess=AccepterAvecSuccess');
        }else{

            header('Location:../public/index.php?promundus=commandesAccepterPromundus&erreur=erreurAcceptation');
        }
    }else{

        header('Location:../public/index.php?promundus=commandesAccepterPromundus&erreur=erreurArchivation');
    }
}else{

    header('Location:../public/index.php?promundus=commandesAccepterPromundus&erreur=erreurAcceptation');
}
?>