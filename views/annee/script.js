const erreur = document.querySelector('.erreur');

let bloc=document.createElement('div');

bloc.classList.add("notif");
erreur.appendChild(bloc);


function notification(texte) 
{
    let chg=document.createElement('div');
    bloc.appendChild(chg);
    chg.classList.add('dive');
    chg.innerHTML=texte;
    chg.style.color = 'red';
    
    setTimeout(function(){
        chg.style.display='none';
    }, 2500);
   
}
    function validateForm() {
      var anneeScolaireInput = document.getElementById("anneeScolaireInput").value;
      var annees = anneeScolaireInput.split("-");
      var regex = /^(\d{4}-\d{4})$/;


      if (anneeScolaireInput.length === 0) {
        notification("ce champs est obligatoire.");
        return false;
      }
      else {
        if (!regex.test(anneeScolaireInput)) 
        {
          notification("Le format de date doit être dddd-mmmm (ex. 2021-2022).");
          return false;
        }
        else {
          if (annees.length !== 2 || parseInt(annees[1]) - parseInt(annees[0]) !== 1) 
          {
            notification("La différence entre les années doit être égale à 1.");
            return false;
          }
        }
      }

      return true;
    }
    let envoi = document.getElementById("envoi");

    envoi.addEventListener("click", validateForm)