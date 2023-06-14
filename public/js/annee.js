const erreur = document.querySelector('.erreur');

let bloc = document.createElement('div');

bloc.classList.add("notif");
erreur.appendChild(bloc);
function notification(texte) {
    let chg = document.createElement('div');
    bloc.appendChild(chg);
    chg.classList.add('dive');
    chg.innerHTML = texte;
    chg.style.color = 'red';

    setTimeout(function () {
        chg.style.display = 'none';
    }, 2500);

}
const errorMessage =document.querySelector('.error-message');
setTimeout(function () {
    errorMessage.style.display = 'none';
    }, 2500);

function validateForm() {
    let anneeScolaireInput = document.getElementById("anneeScolaireInput").value;
    let annees = anneeScolaireInput.split("-");
    let regex = /^(\d{4}-\d{4})$/;


    if (anneeScolaireInput.length === 0) {
        notification("ce champs est obligatoire.");
        return false;
    }
    else {
        if (!regex.test(anneeScolaireInput)) {
            notification("Le format de date doit être dddd-mmmm (ex. 2021-2022).");
            return false;
        }
    }

    return true;
}
let envoi = document.getElementById("envoi");
let ajout = document.getElementById("ajout");
envoi.addEventListener("click", validateForm) 


ajout.addEventListener("click", validateForm)   
const modal = document.querySelector('.modal-content');
