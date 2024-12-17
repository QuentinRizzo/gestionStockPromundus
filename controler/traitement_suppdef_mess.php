<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";

if(isset($_POST['action'])){
    $messageExiste = recupListeMessagesSupprimer($pdo);
    $id_message = $_POST['id_messages'];

    if ($_POST['action'] == 'supprimerMessageDef') {

        if($messageExiste){

            supprimerMessageDef($pdo, $id_message);
            
            header('Location:../public/index.php?promundus=MessagesSupprimerPromundus&sucess=supdeffok');
            
        }else{

            header('Location:../public/index.php?promundus=MessagesSupprimerPromundus&erreur=erreurAcceptation');
        }
    }else{
        header('Location:../public/index.php?promundus=MessagesSupprimerPromundus&erreur=erreurArchivation');
    }
}else{
    header('Location:../public/index.php?promundus=MessagesSupprimerPromundus&erreur=erreurAcceptation');
}


