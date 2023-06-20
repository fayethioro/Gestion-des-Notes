// Fonction pour mettre à jour les disciplines
async function updateDisciplines() {

  const changes = document.querySelectorAll('.changed');
  console.log(changes);
  console.log(changes.length);

  // Récupérer les valeurs des champs de chaque ligne
  // const rows = document.querySelectorAll('#discipline-table tbody tr');
  const discipline = [];

  let newDiscipline= {
    id : 0, 
    libelle :'',
    note:0
    
  };
  changes.forEach((row) => {
    if (row.id.split('_')[0] === 'ressource') {
      if (row.value == 0 || row.value >=10) {
        newDiscipline.id= row.id.split('_')[1];
        newDiscipline.libelle= row.id.split('_')[0];
        newDiscipline.note= row.value;
    discipline.push(newDiscipline); 
      }
      else{
        alert(' pas bien');
      }
    }
    else{
      if (row.value >=10) {
        newDiscipline.id= row.id.split('_')[1];
        newDiscipline.libelle= row.id.split('_')[0];
        newDiscipline.note= row.value;
    discipline.push(newDiscipline); 
      } 
      else{
        alert(' pas bien');
      }          
    }
   
  });
console.log(discipline);
  // Envoyer les données au serveur
  const response = await fetch('/classe/update', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(discipline),
  });
console.log(response);
  // Vérifier la réponse du serveur
  if (response.ok) {
    const result = await response.text();
    console.log(result); // Faire quelque chose avec la réponse
  } else {
    console.error('Erreur lors de la mise à jour des disciplines');
  }
}
const form = document.getElementById('update-form');
const libelles = document.querySelectorAll('.lib');

// Ajouter un gestionnaire d'événement sur l'événement "submit" du formulaire
form.addEventListener('submit', async (e) => {
  e.preventDefault(); 
  await updateDisciplines(); 
 
});
const libell = document.querySelectorAll('.lib');
libell.forEach(element => {
  console.log(element.value);
});

async function deleteDisciplines() {
  const classeId = document.getElementById('classe');
const disciplineId = document.getElementById('discipline');
  const formData = new FormData();
  formData.append('disciplineId', disciplineId);
  formData.append('classeId', classeId);

console.log(formData);
  const result = await fetch('/disciplines/delete', {
    method: 'POST',
    body:  formData
  });
  const r = await result.text();
  console.log(r);
  if (result.ok) {
  alert('Disciplines supprimées avec succès');
        } else {
          console.error('Une erreur s\'est produite lors de la suppression des disciplines');
        }
}

const supprimer = document.querySelector('.supprimer');

supprimer.addEventListener('click', deleteDisciplines);


const ressources = document.querySelectorAll('input');
console.log(ressources.length);

ressources.forEach(ressource => {
  ressource.addEventListener('input',() => {
      ressource.setAttribute('class' ,'changed' );
console.log(ressource);
  });
});