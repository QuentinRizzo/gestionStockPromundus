<?php
session_start();
require '../model/connexion_bdd.php';
require '../model/fonctions.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['ValiderModifMdp'])) {
    $mdp = $_POST['mdpActuel'];
    $nouvMdp = $_POST['nouvMdp'];
    $confirmationMdp = $_POST['nouvMdpConfirm'];
    if ($nouvMdp == $confirmationMdp) {
        $mdpCorespond = recupMdp($pdo, $_POST['idUser']);
        if (password_verify($mdp, $mdpCorespond)) {
            $hashMdp = password_hash($nouvMdp, PASSWORD_DEFAULT);
            if(updatePassword($pdo, $hashMdp, $_POST['idUser'])){
                $recupInfoUser = recupInfosUsers($pdo, $_POST['idUser']);
                $nom = $recupInfoUser['nom'];
                $prenom = $recupInfoUser['prenom'];
                $mailUtilisateur = $recupInfoUser['mail'];
                // Envoi de l'e-mail à l'utilisateur
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'revoriadeveloppement@gmail.com';
                $mail->Password = 'lhkpxelshcvtlyhg';
                $mail->Port = 465;
                $mail->SMTPSecure = 'ssl';
                $mail->CharSet = 'UTF-8';
                $mail->isHTML(true);
                $mail->setFrom('direction@promundus.fr', 'Promundus Propreté');
                $mail->addAddress($mailUtilisateur);
                $mail->Subject = "Accès à votre compte Promundus";
                // Chemin absolu vers l'image
                $cheminImage = 'www.promundus.fr/services-proprete/wp-content/uploads/2020/06/logo-promundus.png';
                $mail->Body = "Bonjour , <br> Vôtre Mot de passe modifié avec succès : <br> Voici vôtre nouveaux mot de passe :<strong> $nouvMdp </strong> <br> A très vite sur Promundus Propreté.<br> <img src=\"$cheminImage\" alt=\"img test\">";
    
                session_destroy();
                if ($mail->send()) {
                    header('Location: ../public/index.php?sucess=MdpModifSuccess');
                } else {
                    // Gestion de l'erreur d'envoi d'e-mail
                    $errorMail = "Le mot de passe a été mErreur lors de l'envoi de l'email : " . $mail->ErrorInfo;
                    header('Location: ../public/index.php?sucess=MdpModifSuccess&errorEnvoiEmail='.$errorMail);
                } 
            }else{
                // L'update du mdp en BdD a échoué
            }  
        } else {
            echo 'Mot de passe incorrect';
        }
    } else {
        echo 'Mdp Correspond pas';
    }
} else {
    echo 'error';
}
