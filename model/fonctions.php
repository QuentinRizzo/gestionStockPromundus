<?php
// ========================= Début des fonction lié a l'inscription Connexion Profil Utilisateur ============================ \\

// Vérifi si un user est enregistrer en bdd \\
function verifUserExiste($pdo, $mail){
    $reqUserExiste = $pdo->prepare('SELECT * FROM utilisateur WHERE mail = ?');
    $reqUserExiste->execute([$mail]);
    $userExiste = $reqUserExiste->fetch();
    return $userExiste;
}
// Inseré un utilisateur a la bdd \\
function inserUser($pdo, $nom, $prenom, $mail, $tel, $hashMdp){
    $reqInsertUser = $pdo->prepare('INSERT INTO utilisateur(nom, prenom, mail, tel, mdp, deleted, id_role) VALUES(?, ?, ?, ?, ?, ?, ?)');
    $reqInsertUser->execute([$nom, $prenom, $mail, $tel, $hashMdp, 0, 3]);
}

// Permet d'inseret l'adresse de l'utilisateur a la base de données \\
function insertAdressUser($pdo, $adresse, $id_ville, $id_user){
    $reqInsertAdressUser = $pdo->prepare('INSERT INTO adresses(adresse, id_ville, id_user) VALUES(?, ?, ?)');
    $reqInsertAdressUser->execute([$adresse, $id_ville, $id_user]);
}
// Recuperation des départements \\
function recupDepartement($pdo){
    $reqRecupDepartement = $pdo->prepare("SELECT * FROM departement");
    $reqRecupDepartement->execute();
    $dep = $reqRecupDepartement->fetchall();
    return $dep;
}
// Récupération des villes des Départements
function recupVillesDept($pdo, $id_departement){
    $reqRecupecupVillesDept = $pdo->prepare('SELECT * FROM ville WHERE id_departement = ?');
    $reqRecupecupVillesDept->execute([$id_departement]);
    $recupVillesDept = $reqRecupecupVillesDept->fetchAll();
    return $recupVillesDept;
}
// Vérifie si l'utilisateur est connecter \\
function utilisateurConnecter($pdo, $id_user){
    $reqUserExiste = $pdo->prepare('SELECT * FROM utilisateur WHERE id_user = ?');
    $reqUserExiste->execute([$id_user]);
    $userExiste = $reqUserExiste->fetch();
    return $userExiste;
}

function recupMontantcommande($pdo, $id_commande){
    $reqRecupMontantcommande = $pdo->prepare('SELECT prix_total FROM commande WHERE id_commande = ?');
    $reqRecupMontantcommande->execute([$id_commande]);
    $Recupmontantcommande = $reqRecupMontantcommande->fetch();
    return $Recupmontantcommande['prix_total'];
}
// ===================================================================================================== \\
// ===================================================================================================== \\

// ========================= Début des fonction lié au Formulaire de contact  ============================ \\
function recupObjetsContact($pdo){
    $reqRecupObjetsContact = $pdo->prepare("SELECT * FROM categ_message");
    $reqRecupObjetsContact->execute();
    $recupObjets = $reqRecupObjetsContact->fetchall();
    return $recupObjets;
}
// Permet d'insert les messages dans la bdd \\ 
function insertMessageEnvoyer($pdo,$nom_envoyeur, $prenom_envoyeur, $mail_envoyeur, $objet_message, $contenue_message, $id_user, $status, $date_message, $id_categ_message){
    $reqInsertMessageEnvoyer = $pdo->prepare('INSERT INTO messages(nom_envoyeur, prenom_envoyeur, mail_envoyeur, objet_message, contenue_message, id_user, status_message, date_message, id_categ_message) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $reqInsertMessageEnvoyer->execute([$nom_envoyeur, $prenom_envoyeur, $mail_envoyeur, $objet_message, $contenue_message, $id_user, $status, $date_message, $id_categ_message]);
}
// On récupére les information d'un seul utilisateur \\
function recupInfosUsers($pdo, $id_user){
    $reqRecupInfosUser = $pdo->prepare("SELECT * FROM utilisateur, adresses, departement, ville, role  
    WHERE role.id_role = utilisateur.id_role 
    AND departement.id_departement = ville.id_departement 
    AND ville.id_ville = adresses.id_ville 
    AND adresses.id_user = utilisateur.id_user 
    AND utilisateur.id_user = ?");
    $reqRecupInfosUser->execute([$id_user]);
    $infoUser = $reqRecupInfosUser->fetch();
    return $infoUser;
}
function recupCommande($pdo,$id_commande){
    $reqRecupCommande = $pdo->prepare("SELECT * FROM commande  WHERE id_commande = ?");
    $reqRecupCommande->execute([$id_commande]);
    $commande= $reqRecupCommande->fetch();
    return $commande;
}
function recupCommandeEnAttente($pdo){
    $reqRecupCommandeEnAttente = $pdo->prepare("SELECT * FROM commande WHERE id_statut_commande = 1 ORDER BY date_commande DESC");
    $reqRecupCommandeEnAttente->execute();
    $commandeEnAttente = $reqRecupCommandeEnAttente->fetchAll();
    return $commandeEnAttente;
}

function recupCommanValider($pdo){
    $reqRecupCommandeValider = $pdo->prepare("SELECT * FROM commande  WHERE id_statut_commande = 2 ORDER BY date_commande DESC");
    $reqRecupCommandeValider->execute();
    $commandeValider = $reqRecupCommandeValider->fetchAll();
    return $commandeValider;
}

// ===================================================================================================== \\
// ===================================================================================================== \\

// ========================= Début des fonction lié au Profil de L'utilisateur  ============================ \\

// Verification du Mot de passe 
function recupMdp($pdo, $id_user){
    $reqVerifMdp = $pdo->prepare("SELECT mdp FROM utilisateur WHERE id_user = ?");
    $reqVerifMdp->execute([$id_user]);
    $verifMdp = $reqVerifMdp->fetch();
    return $verifMdp['mdp'];
}

// Modification du Mot de passe \\
function updatePassword($pdo, $mdp, $id_user){
    try{
        $reqUpdatePassword = $pdo->prepare('UPDATE utilisateur SET mdp = ? WHERE id_user = ?');
        $reqUpdatePassword->execute([$mdp, $id_user]);
    }catch(PDOException $e){
        return false;
    }
    return true;   
}

function updateInfosUser($pdo, $nom, $prenom, $mail, $tel, $id_user){
    $reqUpdateInfosUser = $pdo->prepare('UPDATE utilisateur SET nom = ?, prenom = ?, mail = ?, tel = ? WHERE id_user = ?');
    $reqUpdateInfosUser->execute([$nom, $prenom, $mail, $tel, $id_user]);
}

function updateAdresseInfosUser($pdo, $adresse, $id_ville, $id_user){
    $reqUpdateAdresseInfosUser = $pdo->prepare('UPDATE adresses SET adresse = ?, id_ville = ? WHERE id_user = ?');
    $reqUpdateAdresseInfosUser->execute([$adresse, $id_ville, $id_user]);
}



// FIN DES FONCTIONS LIER AU SITE 

// ===================================================================================================== \\
// ===================================================================================================== \\
// ===================================================================================================== \\
// ===================================================================================================== \\
// ===================================================================================================== \\
// ===================================================================================================== \\

// Début de la  Partie du  BACK OFFICE \\

// ========================= Début des fonction lié au produits ============================ \\
// Récupère la liste de tout les produit index.php\\
function recupListeProduits($pdo){
    $reqrecupListeProduit = $pdo->prepare('SELECT * FROM produits WHERE deleted = 0');
    $reqrecupListeProduit->execute();
    $produitExiste = $reqrecupListeProduit->fetchAll();
    return $produitExiste;
}
function recupInfosProduits($pdo, $id_produit){
    $reqrecupInfosProduit = $pdo->prepare('SELECT * FROM produits WHERE id_produit = ?');
    $reqrecupInfosProduit->execute([$id_produit]);
    $produitExiste = $reqrecupInfosProduit->fetch();
    return $produitExiste;
}

// Vérification si les Fproduit existe déja ou non\\
function produitExistant($pdo, $nom_produit){
    $reqProduitExistant = $pdo->prepare('SELECT * FROM produits WHERE nom_produit = ?');
    $reqProduitExistant->execute([$nom_produit]);
    $produitExistant = $reqProduitExistant->fetch();
    return $produitExistant;
}

// Inséret les produits dans la bdd \\
function insertProduit($pdo,$nom_produit, $description, $prix_unite, $chemin, $stock, $deleted){
    $reqCreationProduit = $pdo->prepare('INSERT INTO produits (nom_produit, description, prix_unite, logo, stock, deleted) VALUES(?, ?, ?, ?, ?, ?)');
    $reqCreationProduit->execute([$nom_produit, $description, $prix_unite, $chemin, $stock, $deleted]);
}
function insertLivraisonPromundus($pdo, $nom_livreur, $date_livraison, $id_produit, $qte_produit){
    $reqInsertLivraisonPmd = $pdo->prepare('INSERT INTO livraison_promundus(nom_livreur, date_livraison, id_produit, qte_produit) VALUES(?, ?, ?, ?)');
    $reqInsertLivraisonPmd->execute([$nom_livreur, $date_livraison, $id_produit, $qte_produit]);
}
function updateStockProduit($pdo, $qte_produit, $id_produit){
    $reqUpdateStockProduit = $pdo->prepare('UPDATE produits SET stock = stock + ? WHERE id_produit = ?');
    $reqUpdateStockProduit->execute([$qte_produit, $id_produit]);
}

function insertStockClient($pdo,$id_produit, $id_site_client, $stock_client){
    $reqCreationStockClient = $pdo->prepare('INSERT INTO stock_client (id_produit, id_sites_clients, stock_client) VALUES(?, ?, ?)');
    $reqCreationStockClient->execute([$id_produit, $id_site_client, $stock_client]);
}
// Permet d'inseret une image 
function insertImg($pdo, $nom_img, $date_publication, $id_produit){
    $reqInsertImg = $pdo->prepare('INSERT INTO image (nom_img, date_publication, id_produit) VALUES(?, ?, ?)');
    $reqInsertImg->execute([$nom_img, $date_publication, $id_produit]);
}



function stockClientExiste($pdo, $id_sites_clients){
    $reqrecupListeProduitClient = $pdo->prepare('SELECT * FROM stock_client WHERE id_sites_clients = ?');
    $reqrecupListeProduitClient->execute([$id_sites_clients]); // Passer la valeur dans un tableau
    $produitExiste = $reqrecupListeProduitClient->fetchAll();
    return $produitExiste;
}

// permet de mettre a jours  la quantité du stock client \\
function updateQteStockCl($pdo, $id_sites_clients, $id_produit, $stock_client){
    $reqUpdateQteProd = $pdo->prepare('UPDATE stock_client SET stock_client = stock_client + ? WHERE id_sites_clients = ? AND id_produit = ?');
    $reqUpdateQteProd->execute([$stock_client, $id_sites_clients, $id_produit]);
}
function recupListeProduitsClient($pdo){
    $reqrecupListeProduitClient = $pdo->prepare('SELECT * FROM stock_client, produits, sites_clients 
    WHERE sites_clients.id_sites_clients = stock_client.id_sites_clients 
    AND stock_client.id_produit = produits.id_produit');
    $reqrecupListeProduitClient->execute();
    $produitExiste = $reqrecupListeProduitClient->fetchAll();
    return $produitExiste;
}
function updateInfosClient($pdo, $nom_site, $adresse_site, $ville_site, $cp_site, $id_sites_clients){
    $reqUpdateInfosClient = $pdo->prepare('UPDATE sites_clients SET nom_site = ?, adresse_site = ?, ville_site = ?, cp_site = ? WHERE id_sites_clients = ?');
    $reqUpdateInfosClient->execute([$nom_site, $adresse_site, $ville_site, $cp_site, $id_sites_clients]);
}
function recupInfosClient($pdo, $id_sites_clients){
    $reqRecupInfosClient = $pdo->prepare('SELECT * FROM sites_clients WHERE id_sites_clients = ?');
    $reqRecupInfosClient->execute([$id_sites_clients]);
    $infosClient = $reqRecupInfosClient->fetch();
    return $infosClient;
}
function recupInfosStockClient($pdo, $id_sites_clients){
    $reqrecupListeProduitClient = $pdo->prepare('SELECT * FROM stock_client, produits ,sites_clients
    WHERE sites_clients.id_sites_clients = stock_client.id_sites_clients 
    AND stock_client.id_produit = produits.id_produit  
    AND stock_client.id_sites_clients = ? ');
    $reqrecupListeProduitClient->execute([$id_sites_clients]);
    $listeProdClient = $reqrecupListeProduitClient->fetchAll();
    return  $listeProdClient;
}

// ========================= Début des fonctions lié au Pannier des commandes ============================ \\

// Récuperation du Détail commande pour la Vue Front \\
function recupListeProduitDetail($pdo, $id_commande){
    $reqListeProduitDetail = $pdo->prepare('SELECT * FROM detail_commande, produits , commande, sites_clients WHERE sites_clients.id_sites_clients = detail_commande.id_sites_clients AND detail_commande.id_produit = produits.id_produit AND detail_commande.id_commande = commande.id_commande AND detail_commande.id_commande = ?');
    $reqListeProduitDetail->execute([$id_commande]);
    $produitsDetails = $reqListeProduitDetail->fetchAll();
    return $produitsDetails;
}

function verifProduit($pdo, $id_produit){
    $reqIdProduitExiste = $pdo->prepare('SELECT * FROM produits WHERE id_produit = ?');
    $reqIdProduitExiste->execute([$id_produit]);
    $produitExiste = $reqIdProduitExiste->fetch();
    return $produitExiste;
}
function listeClients($pdo){
    $reqListeClients = $pdo->prepare('SELECT * FROM sites_clients');
    $reqListeClients->execute();
    $listeClients = $reqListeClients->fetchAll();
    return $listeClients;
}
// Verifier si le produit existe dans le commande \\
function produitExistecommande($pdo, $id_produit, $id_commande){
    $reqProduitExistcommande = $pdo->prepare('SELECT * FROM detail_commande WHERE id_produit = ? AND id_commande = ?');
    $reqProduitExistcommande->execute([$id_produit, $id_commande]);
    $ProduitExistcommande = $reqProduitExistcommande->fetch();
    return $ProduitExistcommande;
}
// permet de mettre a jours  la quantité du produit \\
function updateQteProduit($pdo, $id_commande, $id_produit, $qte){
    $reqUpdateQteProd = $pdo->prepare('UPDATE detail_commande SET qte_com = qte_com + ? WHERE id_commande = ? AND id_produit = ?');
    $reqUpdateQteProd->execute([$qte, $id_commande, $id_produit]);
}
// Update montant commande \\ :
function updateMontantcommande($pdo, $id_commande, $prix_total){
    $reqUpdatecommande = $pdo->prepare('UPDATE commande SET prix_total = prix_total + ? WHERE id_commande = ?');
    $reqUpdatecommande->execute([$prix_total, $id_commande]);
}
// Creation du commande avec Id User \\
function createcommandeUser($pdo, $datecommande, $prixTotal, $id_user){
    $reqCreationcommandeUser = $pdo->prepare('INSERT INTO commande (date_commande, prix_total, id_user) VALUES(?, ?, ?)');
    $reqCreationcommandeUser->execute([$datecommande, $prixTotal, $id_user]);
}
// Insérer le produit au commande \\
function insertDetailcommande($pdo, $id_produit, $id_commande, $qte_com, $prix_unite, $id_site_client){
    $reqCreationDetailcommande = $pdo->prepare('INSERT INTO detail_commande (id_produit, id_commande, qte_com, prix_unite, id_sites_clients) VALUES(?, ?, ?, ?, ?)');
    $reqCreationDetailcommande->execute([$id_produit, $id_commande, $qte_com, $prix_unite, $id_site_client]);
}
// Suppression du commande \\
function  suprimerProdPan($pdo, $id_produit, $id_commande){
    $reqSuprimerProdPan = $pdo->prepare('DELETE FROM detail_commande WHERE id_produit = ? AND id_commande = ?');
    $reqSuprimerProdPan->execute([$id_produit, $id_commande]);
}
// fonction qui retourne le nombre de produits dans le commande en cours \\
function recupNbProdcommandes($pdo, $id_commande){
    $reqNbProdcommande = $pdo->prepare('SELECT COUNT(*) as nbProdsPan FROM detail_commande WHERE id_commande = ?');
    $reqNbProdcommande->execute([$id_commande]);
    $nbProdcommande = $reqNbProdcommande->fetch();
    return $nbProdcommande['nbProdsPan'];
}
// Suppression produit commande \\ 
function Suprimecommande($pdo, $id_commande){
    $reqSuprimecommande = $pdo->prepare('DELETE FROM commande WHERE id_commande = ?');
    $reqSuprimecommande->execute([$id_commande]);
}
function updateStatutCommande($pdo,$id_statut_commande, $id_commande){
    $reqUpdateStatutcommande = $pdo->prepare('UPDATE commande SET id_statut_commande = ? WHERE id_commande = ?');
    $reqUpdateStatutcommande->execute([$id_statut_commande, $id_commande]);
}
// ========================= Début des fonction lié à la Facturation ============================ \\

// recupérer le numero Facture dont l id facture correspond au max \\
function recupNumFactIdMax($pdo){
    $reqRecupNumFactIdMax = $pdo->prepare('SELECT num_facture FROM facturation WHERE id_facturation = (SELECT MAX(id_facturation) FROM facturation)');
    $reqRecupNumFactIdMax->execute();
    $numFactIdMax = $reqRecupNumFactIdMax->fetch();
    return $numFactIdMax;
}


// Ajout de la facture du pannier en Bdd\\
function insertFacture($pdo, $num_facture, $date_facture, $id_adresse, $id_commande, $id_user, $id_bon){
    $req = 'INSERT INTO facturation (num_facture, date_facture, id_adresse, id_adresse_1, id_commande, id_user) VALUES(?, ?, ?, ?, ?, ?)';
    $tabValues = [$num_facture, $date_facture, $id_adresse, 2, $id_commande, $id_user];
    if ($id_bon != -1) {
        $req = 'INSERT INTO facturation (num_facture, date_facture, id_adresse, id_adresse_1, id_commande, id_user, id_bon) VALUES(?, ?, ?, ?, ?, ?, ?)';
        $tabValues = [$num_facture, $date_facture, $id_adresse, 2, $id_commande, $id_user, $id_bon];
    }
    $reqInsertFacture = $pdo->prepare($req);
    $reqInsertFacture->execute($tabValues);
}

// ========================= Fin des fonction lié à la Facturation ============================ \\

// ========================= Début des fonctions lié a la Pagination ============================ \\

function countProduits($pdo){
    $reqRecupCountProduits = $pdo->prepare('SELECT COUNT(*) as nbProduits FROM produits');
    $reqRecupCountProduits->execute();
    $resNbProduits = $reqRecupCountProduits->fetch();
    return $resNbProduits['nbProduits'];
}

function recupProduitforEdit($pdo, $id_produit){
    $reqRecupProduitforEdit = $pdo->prepare('SELECT * FROM produits WHERE id_produit = ?');
    $reqRecupProduitforEdit->execute([$id_produit]);
    $produitforEdit = $reqRecupProduitforEdit->fetch();
    return $produitforEdit;
}
function updateStockPromundus($pdo, $nom_produit, $description, $prix_unit, $nom_img, $stock, $id_produit ){
    $reqUpdateStockPromundus = $pdo->prepare('UPDATE produits SET nom_produit = ?, description = ?, prix_unite = ?, logo = ?, stock = ?  WHERE id_produit = ?');
    $reqUpdateStockPromundus->execute([$nom_produit,$description, $prix_unit, $nom_img, $stock, $id_produit ]);
}
function suprimerProduit($pdo, $id_produit){
    $reqSuppProduit = $pdo->prepare('UPDATE produits SET deleted = 1 WHERE id_produit = ?');
    $reqSuppProduit->execute([$id_produit]);
}
function recupProduits($pdo, $debut, $limit){
    $req = "SELECT * FROM produits WHERE deleted = 0";
    if (isset($_SESSION['tris'])) {
        $tris = $_SESSION['tris'];

        switch ($tris) {
            case 'ordreCroissant':
                $req .= " ORDER BY prix_unite ASC";
                break;
            case 'ordreDecroissant':
                $req .= " ORDER BY prix_unite DESC";
                break;
            case 'alphabet':
                $req .= " ORDER BY titre ASC";
                break;
        }
    }
    $req .= " LIMIT " . $debut . "," . $limit;
    $reqRecupProduits = $pdo->prepare($req);
    $reqRecupProduits->execute();
    $recupProduits = $reqRecupProduits->fetchAll();
    return $recupProduits;
}

// Début des fonctions lié a l'affichage des produits client \\



// Affichage des Messages \\

function recupUtilisateur($pdo, $id_user){
    $reqRecupUtilisateur = $pdo->prepare('SELECT * FROM utilisateur, role WHERE role.id_role = utilisateur.id_role AND id_user = ?');
    $reqRecupUtilisateur->execute([$id_user]);
    $recupUtilisateur = $reqRecupUtilisateur->fetch();
    return $recupUtilisateur;
}
function recupInfosMessage($pdo, $id_message){
    $reqRecupInfosMessage = $pdo->prepare('SELECT * FROM messages WHERE id_message = ?');
    $reqRecupInfosMessage->execute([$id_message]);
    $recupInfosMessage = $reqRecupInfosMessage->fetch();

    return $recupInfosMessage;
}
function recupListeMessagesReçu($pdo){
    $reqListeMessagesReçu = $pdo->prepare('SELECT * FROM messages WHERE status_message = "EnAttente"');
    $reqListeMessagesReçu->execute();
    $recupListeMessagesReçu = $reqListeMessagesReçu->fetchAll();
    return $recupListeMessagesReçu;
}
function recupListeMessagesArchiver($pdo){
    $reqListeMessagesArchiver = $pdo->prepare('SELECT * FROM messages WHERE status_message = "Archiver"');
    $reqListeMessagesArchiver->execute();
    $recupListeMessagesArchiver = $reqListeMessagesArchiver->fetchAll();
    return $recupListeMessagesArchiver;
}
function recupListeMessagesRepondu($pdo){
    $reqListeMessagesRepondu = $pdo->prepare('SELECT * FROM messages WHERE status_message = "Repondu"');
    $reqListeMessagesRepondu->execute();
    $recupListeMessagesRepondu = $reqListeMessagesRepondu->fetchAll();
    return $recupListeMessagesRepondu;
}
function recupListeMessagesSupprimer($pdo){
    $reqListeMessagesSupprimer = $pdo->prepare('SELECT * FROM messages WHERE status_message = "Supprimer"');
    $reqListeMessagesSupprimer->execute();
    $recupListeMessagesSupprimer = $reqListeMessagesSupprimer->fetchAll();
    return $recupListeMessagesSupprimer;
}
function archiverMessage($pdo, $id_message){
    $reqArchiverMessage = $pdo->prepare("UPDATE messages SET status_message = 'Archiver' WHERE id_message = ?");
    $reqArchiverMessage->execute([$id_message]);
}
function messageRepondu($pdo, $id_message){
    $reqMessageRepondu = $pdo->prepare("UPDATE messages SET status_message = 'Repondu' WHERE id_message = ?");
    $reqMessageRepondu->execute([$id_message]);
}
function restaureMessage($pdo, $id_message){
    $reqRestaureMessage = $pdo->prepare("UPDATE messages SET status_message = 'EnAttente' WHERE id_message = ?");
    $reqRestaureMessage->execute([$id_message]);
}
function supprimerMessage($pdo, $id_message){
    $reqSupprimerMessage = $pdo->prepare("UPDATE messages SET status_message = 'Supprimer' WHERE id_message = ?");
    $reqSupprimerMessage->execute([$id_message]);
}
function supprimerMessageDef($pdo, $id_message){
    $reqSupprimerMessageDef = $pdo->prepare("DELETE FROM messages WHERE id_message = ?");
    $reqSupprimerMessageDef->execute([$id_message]);
}


// Affichage des Utilisateurs \\

function recupListePUtilisateurs($pdo){
    $reqrecupListeUtilisateurs = $pdo->prepare('SELECT * FROM utilisateur WHERE deleted = 0');
    $reqrecupListeUtilisateurs->execute();
    $userExiste = $reqrecupListeUtilisateurs->fetchAll();
    return $userExiste;
}
function deleteUser($pdo, $id_user){
    $reqUpdateAdresseInfosUser = $pdo->prepare('UPDATE utilisateur SET deleted = 1 WHERE id_user = ?');
    $reqUpdateAdresseInfosUser->execute([$id_user]);
}

// Recherche par nom \\

// Récupérer un produit grace a ça saisie dynamique \\
function rechercheProduitsParNom($pdo, $motCle){
    $motCle = "$motCle%";
    $req = "SELECT * FROM produits WHERE nom_produit LIKE :motCle";
    $reqRecupProduitsParNom = $pdo->prepare($req); // les produits qui commencent par la saisie (motCle)
    $reqRecupProduitsParNom->bindParam(':motCle', $motCle);
    $reqRecupProduitsParNom->execute();
    $recupProduitsParNom = $reqRecupProduitsParNom->fetchAll();
    return $recupProduitsParNom;
}

function recupTraceProdPmd($pdo){
    $reqTraceProd = $pdo->prepare('SELECT * FROM livraison_promundus');
    $reqTraceProd->execute();
    $recupTraceProd = $reqTraceProd->fetchAll();
    return $recupTraceProd;
}
// Récupère la traçabilité des produits Livré a promundus Par la date \\
function recupInfosTracer($pdo, $date_debut, $date_fin){
    $reqInfosTracer = $pdo->prepare('SELECT livraison_promundus.nom_livreur, produits.nom_produit, livraison_promundus.qte_produit, produits.prix_fournisseur, produits.prix_unite  FROM livraison_promundus INNER JOIN produits ON livraison_promundus.id_produit = produits.id_produit WHERE livraison_promundus.date_livraison BETWEEN ? AND ?');
    $reqInfosTracer->execute([$date_debut, $date_fin]);
    $infosTracer= $reqInfosTracer->fetchAll(PDO::FETCH_ASSOC);
    return $infosTracer;
}
function recupFraisDePorts($pdo){
    $reqRecupFraisDePorts = $pdo->prepare("SELECT * FROM frais_port");
    $reqRecupFraisDePorts->execute();
    $recupFraisDePorts = $reqRecupFraisDePorts->fetch();
    return $recupFraisDePorts;
}

function calcultotal($qte_prod, $prix_unit){
    $total = $qte_prod * $prix_unit;
    return $total;
}
// Mot de passe oublié \\
// Insertion du token en base de donnée \\
function inserToken($pdo, $id_user, $token, $date_expiration){
    $reqInsertToken = $pdo->prepare('INSERT INTO token(id_user, token, date_expiration) VALUES(?, ?, ?)');
    $reqInsertToken->execute([$id_user, $token, $date_expiration]);
}
// Vérification si le token est valide
function verifTokenValide($pdo, $id_user, $token){
    $reqVerifTokenValide = $pdo->prepare("SELECT * FROM token WHERE id_user = ? AND token = ?");
    $reqVerifTokenValide->execute([$id_user, $token]);
    $VerifTokenValide = $reqVerifTokenValide->fetch();
    return $VerifTokenValide;
}
// supprimer le token de la bdd \\
function suprimeToken($pdo, $id_user){
    $reqSuprimeToken = $pdo->prepare('DELETE FROM token WHERE id_user = ?');
    $reqSuprimeToken->execute([$id_user]);
}

?>