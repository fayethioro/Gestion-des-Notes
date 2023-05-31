<?php

namespace App\Controllers;

use App\Models\ClasseModel;
use App\Models\EleveModel;

class EleveController extends Controller
{
    public function allEleve($id)
    {
        $eleve = (new ClasseModel($this->getDB()))->allEleve($id);
        $niveau = (new ClasseModel($this->getDB()))->getIdCycleById($id);
        return $this->view('eleve.eleve', compact('eleve', 'id', 'niveau'));
    }

    public function AjouterEleve()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $photo = $_POST['photo'];
            $date_naissance = $_POST['date_naissance'];
            $profil = $_POST['profil'];
            $sexe = $_POST['sexe'];
            $id_classe = $_POST['id_classe'];

            // Instancier le modèle "EleveModel"
            $eleveModel = new EleveModel($this->getDB());

            // Appeler la méthode d'insertion des données
            $eleveModel->insertEleve($prenom, $nom, $photo, $date_naissance, $profil, $sexe, $id_classe);

            header('Location: /niveau/classe/eleve/' . $_POST['id_classe']);
            exit();
        }

    }



}