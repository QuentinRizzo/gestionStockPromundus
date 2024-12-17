<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";
$id_user = $_SESSION['idUser'];
$userExiste = recupInfosUsers($pdo, $id_user);

?>

<div class="container">
    <div class="row mx-auto mt-5 d-flex mx-auto BorderCardLivraion">
        <div class="row mx-auto mt-1 box-descProd-bOffice">
            <div class="col-lg-12 text-center h-100">
                <div class="box-detailtext mt-2 mb-5 mx-auto w-100">
                    <div class="row">
                        <h1 class="mt-5 text-light fs-1 mb-5">Détail De l'utilisateur</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light  ">Nom :</h5>
                            <p class="card-text text-center text-light mb-2"><?php echo $userExiste['nom'] ?></p>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light  ">Prénom :</h5>
                            <p class="card-text text-center text-light mb-2"><?php echo $userExiste['prenom'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light  ">mail :</h5>
                            <p class="card-text text-center text-light mb-2"><?php echo $userExiste['mail'] ?></p>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light  ">tel :</h5>
                            <p class="card-text text-center text-light mb-2"><?php echo $userExiste['tel'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light">Role :</h5>
                            <p class="card-text text-center text-light mb-2"><?php echo $userExiste['libelle'] ?></p>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light">Adresse :</h5>
                            <p class="card-text text-center text-light mb-2"><?php echo $userExiste['adresse'] ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light">Ville :</h5>
                            <p class="card-text text-center text-light mb-2"><?php echo $userExiste['nom_ville'] ?></p>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="card-title text-center text-light">code postal :</h5>
                            <p class="card-text text-center text-light mb-2"><?php echo $userExiste['code_postal'] ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="card-title text-center text-light">Departement :</h5>
                            <p class="card-text text-center text-light mb-2"><?php echo $userExiste['nom_departement'] ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <form action="../public/index.php?promundus=affichageUtilisateur">
                            <input type="submit" value="Retour a la gesion" class="btnDesAjouts btn mt-2 btn-sm d-block mx-auto">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

