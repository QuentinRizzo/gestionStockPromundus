<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";

if(isset($_POST['action'])){
    $messageExiste = recupListeMessagesArchiver($pdo);
    $id_message = $_POST['id_messages'];

    if ($_POST['action'] == 'supprimerMessage') {
        if($messageExiste){
            supprimerMessage($pdo, $id_message);
            header('Location:../public/index.php?promundus=MessagesSupprimerPromundus&sucess=AccepterAvecSuccess');
        }else{

            header('Location:../public/index.php?promundus=MessagesSupprimerPromundus&erreur=erreurAcceptation');
        }
    }else{
        header('Location:../public/index.php?promundus=MessagesSupprimerPromundus&erreur=erreurArchivation');
    }
}else{

    header('Location:../public/index.php?promundus=MessagesSupprimerPromundus&erreur=erreurAcceptation');
}


