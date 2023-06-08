// Fonction pour charger les cycles depuis le serveur


const nouveau = document.querySelector('.nouveau');
console.log(nouveau);
function loadCycles() {
  fetch('/cycles')
    .then(response => response.json())
    .then(cycles => {
      const cycleSelect = document.getElementById('cycle');
      cycleSelect.innerHTML = '';

      const defaultOption = document.createElement('option');
      defaultOption.value = '';
      defaultOption.textContent = 'Sélectionner un cycle';
      cycleSelect.appendChild(defaultOption);

      cycles.forEach(cycle => {
        const option = document.createElement('option');
        option.value = cycle.id;
        option.textContent = cycle.libelle;
        cycleSelect.appendChild(option);
      });
    })
    .catch(error => {
      console.error('Une erreur s\'est produite lors du chargement des cycles:', error);
    });
}

// Fonction pour charger les classes en fonction du cycle sélectionné
function loadClasses() {
  const cycleId = document.getElementById('cycle').value;
  if (cycleId === '') {
    const message = document.createElement('p');
    message.textContent = 'Veuillez sélectionner un cycle.';
    document.getElementById('classe').innerHTML = '';
    document.getElementById('classe').appendChild(message);
    return;
  }
  

  fetch(`/classes/${cycleId}`)
    .then(response => response.json())
    .then(classes => {
      const classeSelect = document.getElementById('classe');

      
      classeSelect.innerHTML = '';

      const defaultOption = document.createElement('option');
      defaultOption.value = '';
      defaultOption.textContent = 'Sélectionner une classe';
      classeSelect.appendChild(defaultOption);

      classes.forEach(classe => {
        const option = document.createElement('option');
        option.value = classe.id;
        option.textContent = classe.libelle;
        classeSelect.appendChild(option);
      });
      console.log(classeSelect);
    })
    .catch(error => {
      console.error('Une erreur s\'est produite lors du chargement des classes:', error);
    });
}


// Fonction pour charger les groupes de disciplines lors du chargement de la page
function loadGroupes() {
  // Faire une requête AJAX pour récupérer les groupes de disciplines depuis le serveur
  fetch('/groupes')
    .then(response => response.json())
    .then(groupes => {
      // Sélectionner l'élément HTML pour afficher les groupes de disciplines
      const groupeSelect = document.getElementById('groupe');

      // Parcourir les groupes de disciplines et créer les options du sélecteur
      groupes.forEach(groupe => {
        const option = document.createElement('option');
        option.value = groupe.id;
        option.textContent = groupe.libelle;
        groupeSelect.appendChild(option);
        

      });
      const options = document.createElement('option');

    

        options.innerHTML = '<option value="null">Autre</option>';
        groupeSelect.appendChild(options);

    })
    .catch(error => {
      console.error('Une erreur s\'est produite lors du chargement des groupes de disciplines:', error);
    });
}

// Fonction pour charger les disciplines en fonction de la classe sélectionnée
function loadDisciplines() {
  const classeId = document.getElementById('classe').value;
  if (classeId === '') {
    const message = document.createElement('p');
    message.textContent = 'Veuillez sélectionner une classe.';
    document.getElementById('discipline-table').innerHTML = '';
    document.getElementById('discipline-table').appendChild(message);
    return;
  }
  const classeDiscipline = document.querySelector('.classeDiscipline');
  classeDiscipline.textContent =  classeId;
  
  fetch(`/classes/${classeId}/disciplines`)
    .then(response => response.json())
    .then(disciplines => {
      if (disciplines.length === 0) {
        const message = document.createElement('p');
        message.textContent = 'Cette classe n\'a pas de disciplines.';
        document.getElementById('discipline-table').innerHTML = '';
        document.getElementById('discipline-table').appendChild(message);
        return;
      }

      const disciplineTable = document.getElementById('discipline-table');
      disciplineTable.innerHTML = '';

      disciplines.forEach(discipline => {
        const row = document.createElement('tr');

        const checkboxCell = document.createElement('td');
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.value = discipline.id;
        checkbox.checked = true;
        checkboxCell.appendChild(checkbox);
        row.appendChild(checkboxCell);

        const libelleCell = document.createElement('td');
        libelleCell.textContent = discipline.libelle;
        row.appendChild(libelleCell);

        const codeCell = document.createElement('td');
        codeCell.textContent = discipline.code_discipline;
        row.appendChild(codeCell);

        disciplineTable.appendChild(row);
      });
    })
    .catch(error => {
      console.error('Une erreur s\'est produite lors du chargement des disciplines:', error);
    });
}
// Fonction pour ajouter une discipline
async function addDiscipline() {
  let classeId = document.getElementById('classe').value;
  let groupeId = document.getElementById('groupe').value;
  let discipline = document.getElementById('discipline').value;

  const objet = new FormData();
  objet.append('classeId', +classeId );
  objet.append('groupeId', +groupeId );
  objet.append('discipline', discipline );

  // Vérifier si le champ de discipline est vide
  if (discipline.trim() === '') {
    alert('Veuillez saisir une discipline');
    return;
  }
  const result = await fetch('/disciplines/add', {
    method: 'POST',
    body: objet
  });
  const r = await result.text();
  console.log(r);
  if (result.ok) {
    loadDisciplines();
           
          } else {
            console.error('Une erreur s\'est produite lors de l\'ajout la discipline');
          }
}

const table = document.querySelector("#discipline-table");
console.log(table);
// Fonction pour ajouter une gestion de discipline
// Fonction pour supprimer les disciplines sélectionnées
async function deleteDisciplines() {
  console.log(table.querySelectorAll('input[type=checkbox]'));
   const disciplineIds = Array
    .from(document.querySelectorAll('input[type=checkbox]'))
    .filter(checkbox => checkbox.checked)
    .map(checkedBox => +checkedBox.value);
    
  console.log(disciplineIds);
  const fd = new FormData();
  fd.append('ids', disciplineIds);

  const result = await fetch('/disciplines/supprimer', {
    method: 'POST',
    body: fd
  });
  const r = await result.text();
  if (result.ok) {
  loadClasses();
  loadDisciplines();
         
        } else {
          console.error('Une erreur s\'est produite lors de la suppression des disciplines');
        }
}
// Fonction d'initialisation
function init() {
  loadCycles();
  loadGroupes();
  loadDisciplines();

  const cycleSelect = document.getElementById('cycle');
  cycleSelect.addEventListener('change', loadClasses);

  const classeSelect = document.getElementById('classe');
  classeSelect.addEventListener('change', loadDisciplines);

  const addButton = document.getElementById('add-button');
  addButton.addEventListener('click', function() {
    addDiscipline();
  });

  const deleteButton = document.getElementById('delete-button');
  deleteButton.addEventListener('click', deleteDisciplines);
}


// Appeler la fonction d'initialisation lors du chargement de la page
document.addEventListener('DOMContentLoaded', init);

const modalformulaire = document.querySelector('.modal-formulaire');
console.log(modalformulaire);


nouveau.addEventListener('click' , ()=>{
  console.log('ok');
  modalformulaire.style.display = 'block'; 
});