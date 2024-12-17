<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";

if(isset($_POST['action'])){
    $messageExiste = recupListeMessagesReçu($pdo);
    $id_message = $_POST['id_messages'];

    if ($_POST['action'] == 'archiverMessage') {

        if($messageExiste){
            archiverMessage($pdo, $id_message);
            
            header('Location:../public/index.php?promundus=MessagesArchiverPromundus&sucess=AccepterAvecSuccess');
            
        }else{
            header('Location:../public/index.php?promundus=MessagesArchiverPromundus&erreur=erreurAcceptation');
        }
    }else{
        header('Location:../public/index.php?promundus=MessagesArchiverPromundus&erreur=erreurArchivation');
    }
}else{
    header('Location:../public/index.php?promundus=MessagesArchiverPromundus&erreur=erreurAcceptation');
}


