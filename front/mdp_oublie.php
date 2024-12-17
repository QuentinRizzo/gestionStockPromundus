
<div class="container my-5">
    <main class="form-signin m-auto row">

        <!-- Email -->
        <?php
        if (isset($_GET['saisir'])) {
            if ($_GET['saisir'] == 'email') {
        ?>
        <form class="col-lg-6 p-5 m-auto bg-white rounded shadow" method="post" action="../controler/mdp_resetMail.php">
        <h1 class="h3 mb-3 fw-normal text-center">Quelle est votre adresse mail ?</h1>

        <!-- Message erreur TOKEN -->
        <?php
        if (isset($_GET['retour'])) {
            if ($_GET['retour'] == 'pasDeToken') {
        ?>
        <div class="p-4 my-3 text-center">
            <span class="border border-2 rounded border-danger p-3 text-danger">
                Une erreur est survenue.
            </span>
        </div>
        <?php
            } elseif ($_GET['retour'] == 'invalideToken') {
                ?>
                <div class="p-4 my-3 text-center">
                    <span class="border border-2 rounded border-danger p-3 text-danger">
                        Le lien est invalide.
                    </span>
                </div>
                <?php
                    } elseif ($_GET['retour'] == 'lienExpire') {
                        ?>
                        <div class="p-4 my-3 text-center">
                            <span class="border border-2 rounded border-danger p-3 text-danger">
                                Le lien est expiré.
                            </span>
                        </div>
                        <?php
                            }
        } ?>
        <!-- FIN Message erreur TOKEN -->

            <div class="form-floating">
                <input type="email" class="form-control my-5" name="email" placeholder="name@example.com">
                <label for="email">Adresse Email</label>
            </div>
            <button class="btn btn-dark w-100 py-2" type="submit">Suivant</button>
        </form>
        <?php
            }
        } ?>

        <!-- Mot de passe -->
        <?php
        if (isset($_GET['saisir'])) {
            if ($_GET['saisir'] == 'nouveauMdp') {
            $token =  $_GET['token'];
            $idUser = $_GET['id'];
        ?>
        <form class="col-lg-6 p-5 m-auto bg-white rounded shadow" method="post" action="../src/controller/mdp_resetMaj.php?token=<?php echo $token ?>&id=<?php echo $idUser ?>">
            <h1 class="h3 mb-3 fw-normal text-center">Définissez votre nouveau mot de passe</h1>
                <?php
                if (isset($_GET['verif'])) {
                if ($_GET['verif'] == 'faux') {
                ?>
                <div class="p-4 my-3 text-center">
                    <span class="border border-2 rounded border-danger p-3 text-danger">
                        Veuillez entrer deux fois le même mot de passe.
                    </span>
                </div>
                <?php
                    }
                }
                ?>
            <div class="form-floating">
                <input type="password" class="form-control mt-5" name="mdp" placeholder="************">
                <label for="mdp">Mot de passe</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control mt-3 mb-5" name="confirmationMdp" placeholder="************">
                <label for="confirmationMdp" class="form-label">Confirmez votre mot de passe</label>
            </div>
            <button class="btn btn-dark w-100 py-2" type="submit" name="btnResetMdp">Confirmer</button>
        </form>
        <?php
            }
        }
        ?>

    </main>
</div>