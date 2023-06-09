<?php

namespace App\Controllers;

use App\Models\NiveauModel;
use App\Models\ClasseModel;

class ClasseController extends Controller
{
    public function allClasse($id)
    {
        $classe = (new NiveauModel($this->getDB()))->allClasse($id);
        $name = (new NiveauModel($this->getDB()))->getNameById($id);

        return $this->view('classe.classe', compact('classe', 'id', 'name'));
    }
    public function destroyClasse(int $id)
    {
        $classe = (new NiveauModel($this->getDB()))->destroy($id);

        return $this->view('classe.classe', compact('classe', ));

    }

    public function ajouterClasse()
    {
        $errorMessage = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les valeurs du formulaire
            $libelle = $_POST['libelle'];
            $id_cycle = $_POST['id_cycle'];

            // Instancier le modèle de classe
            $classeModel = new ClasseModel($this->getDB());

            if (!$classeModel->isLibelleUnique($libelle)) {
                $errorMessage = 'Cette classe existe déjà.';


            } else {
                // Appeler la fonction du modèle pour insérer la classe
                $classeModel->insertClasse($libelle, $id_cycle);

            }
            // Rediriger ou afficher un message de succès
            header('Location: /niveau/classe/' . $_POST['id_cycle']);
            exit();
        }
    }

    public function getClasses($id)
    {
        $classes = (new NiveauModel($this->getDB()))->allClasse($id);
        echo json_encode($classes);
    }
    public function getDisciplines($classeId)
    {
        $disciplines = (new ClasseModel($this->getDB()))->getDisciplinesByClasse($classeId);
        // Retourner les disciplines au format JSON
        echo json_encode($disciplines);
    }

    // public function getponderation()
    // {
    //     $disciplines = (new ClasseModel($this->getDB()))->getDisciplinesByClasse($classeId);
    //     // Retourner les disciplines au format JSON
    //     echo json_encode($disciplines);
    // }

    public function showAddGestionDiscipline()
    {
        // Charger le contenu HTML du formulaire
        $content = file_get_contents('../views/classe/ponderation.php');

        // Afficher le contenu HTML
        echo $content;
    }


}