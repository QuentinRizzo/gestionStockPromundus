<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$id_message = $_POST['id_messages'];
$messageExiste = recupInfosMessage($pdo, $id_message);

?>

<div class="container">
    <div class="row mx-auto mt-5 d-flex mx-auto BorderCardLivraion">
        <div class="row mx-auto mt-1 box-descProd-bOffice">
            <div class="col-lg-12 text-center h-100">
                <div class="box-detailtext mt-2 mb-5 mx-auto w-100">
                    <div class="row">
                        <h1 class="mt-5 text-light fs-1 mb-5">Détail Du Message</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light mt-2 mb-1">Nom :</h5>
                            <p class="card-text text-center text-light"><?php echo $messageExiste['nom_envoyeur'] ?></p>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light mt-2 mb-1">Prénom :</h5>
                            <p class="card-text text-center text-light"><?php echo $messageExiste['prenom_envoyeur'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light mt-2 mb-1">Objet :</h5>
                            <p class="card-text text-center text-light"><?php echo $messageExiste['objet_message'] ?></p>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light mt-2 mb-1">mail :</h5>
                            <p class="card-text text-center text-light"><?php echo $messageExiste['mail_envoyeur'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="card-title text-center text-light mt-2">Contenu du Message :</h5>
                            <p class="card-text text-center text-light mb-5"><?php echo $messageExiste['contenue_message'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <form class="col-lg-6 mx-auto mt-2" action="../public/index.php?promundus=ReponsePromundus" method="post">
                            <input type="hidden" name="id_message" value="<?php echo $messageExiste['id_message'] ?>">
                            <input type="submit" value="Répondre" class="btnDesAjouts btn mt-2 btn-sm d-block mx-auto">
                        </form>
                        <form action="">
                            <input type="submit" value="Retour a la gesion" class="btnDesAjouts btn mt-2 btn-sm d-block mx-auto">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

