// ==================================================\\
// Changement de Card dynamique Inscription Connexion \\
// ====================================================\\
document.addEventListener('DOMContentLoaded', function () {
    let container = document.getElementById('container');
    let registerBtn = document.getElementById('register');
    let loginBtn = document.getElementById('login');
    let buttons = [registerBtn, loginBtn];

    if (buttons.every(button => button !== null)) {
        buttons.forEach(button => {
            button.onclick = function () {
                let action;
                if (this.id === 'register') {
                    action = 'add';
                } else {
                    action = 'remove';
                }
                container.classList[action]('active');
            };
        });
    }
});

// ==================================================\\
//      Modifié mon Mot de passe Page Mon_Profil      \\
// ====================================================\\

// Afficher le formulaire  Modifier  mot de passe \\

// $ = appel de jQuery
$(document).ready(function () {
    // Lorsque l'utilisateur clique sur le lien "Modifier mon mot de passe"
    $("#modifierMdp").click(function (e) {
        e.preventDefault(); // Empêche le lien de suivre le lien href

        // On Vérifie si le formulaire est visible ou non
        if ($("#form-mdp").is(":visible")) {
            // Si visible on le cache
            $("#form-mdp").hide();
            $("#contactForm").show();
        } else {
            // Sinon on l'affiche
            $("#form-mdp").show();
            $("#contactForm").hide();
        }
    });

    // Lorsque l'utilisateur clique sur le lien "Afficher Mon Profil"
    $("#afficherMonProfil").click(function (e) {
        e.preventDefault(); // Empêche le lien de suivre le lien href
        if ($("form-mdp").is(":visible")) {
            $("#contactForm").hide();
            $("#form-mdp").show();
        } else {
            $("#contactForm").show();
            $("#form-mdp").hide();
        }

    });

});

// Selectionner les produits pour livré le client \\



// ================================================================= \\

// Ajouter ou Retirer des produits au panier Dynamiquement \\
let btnPlus = document.getElementById('plusArticles');

let btnMoins = document.getElementById('moinsArticles');

if (btnPlus !== null && btnMoins !== null) {
    
    btnPlus.addEventListener('click', function () {
        
        let qteActuelle = $('#resultatQte').text();
        modifQteProdPanier(this.id);
        
        if (qteActuelle == 1) {
            
            if (btnMoins.classList.contains('cacher')) {
                
                btnMoins.classList.remove('cacher');
                btnMoins.classList.add('afficher');
            }
        }
    });

    btnMoins.addEventListener('click', function () {
        let qteActuelle = $('#resultatQte').text();
        
        modifQteProdPanier(this.id);
        
        if (qteActuelle == 2) {
            
            if (btnMoins.classList.contains('afficher')) {
                
                btnMoins.classList.remove('afficher');
                btnMoins.classList.add('cacher');

            }
        }
    });
}

// Ajouter retirer produit du panier via btn \\

function modifQteProdPanier(action) {
    let id_produit = $('#id_produit').val(); //on récupère l'id des departement $ veux dire jquery val = valeur des département donc le nom
    let qteActuelle = $('#resultatQte').text();
    
    $.ajax({
        url: '../controler/ajax.php',
        method: 'POST',
        dataType: 'json',
        data: { qteProduit: qteActuelle, id_produit: id_produit, action: action },
        
        success: function (reponse) {
            
            if (action === 'plusArticles') {
                qteActuelle++; 
            }
            if (action === 'moinsArticles') {
                qteActuelle--;
            }
            reponse = qteActuelle;
            $('#resultatQte').text(reponse);
        }
       
    })
}

// Recherche des produits Dynamiquement \\

// ================================================================= \\

// Affichage des filtres de recherche \\
let btnFiltres = document.getElementById('btnFiltre');

if (btnFiltres !== null) {
    btnFiltres.addEventListener('click', function () {
        document.getElementById('filtres').classList.toggle('d-none');
        document.getElementById('recherchenom').classList.toggle('d-none');
    });

}
// Fin de l'affichage des filtres de recherche \\

// ================================================================= \\

//Début Recherche dynamique par nom Partit Ajax \\
let input_rechercher = document.getElementById('input_rechercher');

if (input_rechercher !== null) {
    input_rechercher.addEventListener('keyup', function () {
        console.log(this.value);
        let motCle = this.value;
        rechercherProduit(motCle);
    });
}

function rechercherProduit(motCle) {
    if (motCle == '') {
        document.location.href = "../public/index.php?promundus=nosProduitsPromundus";
        return;
    }
    console.log('sdans la fonction', motCle);
    $.ajax({
        url: '../controler/ajax.php',
        method: 'POST',
        dataType: 'json',
        data: { motCle: motCle, action: 'searchBar' },
        success: function (reponse) {
            console.log('reponse',reponse);
            document.getElementById('AffichageProdFiltrees').innerHTML = reponse;
        }
    })
}


// On récupère id du select
let select = document.getElementById('departement');

if (select !== null) {
    select.addEventListener('change', selectDept);

    function selectDept() {
        let idDept = $('#departement').val(); //on récupère l'id des departement $ veux dire jquery val = valeur des département donc le nom
        $.ajax({
            url: '../controler/ajax.php',
            method: 'POST',
            dataType: 'json',
            data: { idDepartement: idDept, action: 'selectvilledept' },
            success: function (reponse) {
                // console.log(reponse);
                let selectVilles = document.getElementById('ville');
                // console.log(selectVilles);
                for (let i = 0; i < reponse.length; i++) {
                    cp = reponse[i].code_postal;
                    tabCps = cp.split('-');
                    for (let j = 0; j < tabCps.length; j++) {
                        let option = document.createElement('option');
                        option.value = reponse[i].id_ville + '-' + tabCps[j];
                        option.text = reponse[i].nom_ville + ' (' + tabCps[j] + ')';
                        selectVilles.appendChild(option);
                    }
                }
            }
        })
    }
}

    // Obtenir la date du jour
// let today = new Date();
// let formattedDate = today.toISOString().substr(0, 10);

// if (today !== null && formattedDate !== null) {

//     document.getElementById("traceDateDebut").value = formattedDate;
//     document.getElementById("traceDateFin").value = formattedDate;
    
// }