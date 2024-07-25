// const inputField = document.getElementById('mdp');
// const divToHide = document.getElementById('form-input');

// inputField.addEventListener('input', function() {
//     if (inputField.value) {
//         divToHide.style.display = 'none';
//     } else {
//         divToHide.style.display = 'block';
//     }
// });

function validerFormulaire() {
    let nomfam = document.getElementById('nomfam').value.trim();
    let mdp = document.getElementById('mdp').value.trim();
    let isValid = true;

    document.getElementById('erreur-aff').innerText = '';
    document.getElementById('erreur-fam').innerText = '';
    document.getElementById('erreur-mdp').innerText = '';

    if (nomfam === '') {
        document.getElementById('erreur-fam').innerText = 'Veuillez saisir le nom de votre famille.';
        isValid = false;
    }

    if (mdp === '') {
        document.getElementById('erreur-mdp').innerText = 'Veuillez saisir votre mot de passe.';
        isValid = false;
    }

    if (!isValid) {
        document.getElementById('erreur-aff').innerText = 'Veuillez remplir tous les champs requis.';
    }

    return isValid;
}
