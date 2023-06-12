// Fonction pour mettre à jour les disciplines
async function updateDisciplines() {
  // Récupérer les valeurs des champs de chaque ligne
  const rows = document.querySelectorAll('#discipline-table tbody tr');
  const discipline = [];

  rows.forEach((row) => {
    const disciplineData = {
      libelle:'',
      ressource:0,
      examen:0
    }
    const libelle = row.querySelector('td:nth-child(1)').textContent;;
    const ressource = row.querySelector('[name="ressource"]').value;
    const examen = row.querySelector('[name="examen"]').value;
    disciplineData.libelle = libelle;
    disciplineData.ressource = ressource;
    disciplineData.examen = examen;

    discipline.push(disciplineData);
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
    console.log(result); 
    alert('bien');// Faire quelque chose avec la réponse
  } else {
    console.error('Erreur lors de la mise à jour des disciplines');
  }
}
const form = document.getElementById('update-form');

// Ajouter un gestionnaire d'événement sur l'événement "submit" du formulaire
form.addEventListener('submit', async (e) => {
  e.preventDefault(); 
  await updateDisciplines(); 
});



// const disciplineId = document.getElementById('discipline');


async function deleteDisciplines() {
  const classeId = document.getElementById('classe');
  console.log(classeId.value);
const disciplineId = document.getElementById('discipline');
console.log(disciplineId.value);
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