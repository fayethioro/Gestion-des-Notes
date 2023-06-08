<?php

namespace App\Controllers;

use PDO;
use App\Models\ClasseModel;
use App\Models\DisciplineModel;

class DisciplineController extends Controller
{

    public function getDisciplines()
    {
        $disciplines = (new DisciplineModel($this->getDB()))->getAllDisciplines();
        echo json_encode($disciplines);
    }

    public function addDiscipline()
    {

        if (isset($_POST['classeId'], $_POST['groupeId'], $_POST['discipline']) && !empty($_POST['discipline'])) {
            $classeId = intval($_POST['classeId']);
            $groupeId = intval($_POST['groupeId']);
            $discipline = $_POST['discipline'];

            (new DisciplineModel($this->getDB()))->addDiscipline($classeId, $groupeId, $discipline);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Missing or empty discipline']);
        }
    }
    public function deleteDisciplines()
    {
        $disciplineIds = explode(',', $_POST['ids']);
        print_r($disciplineIds);
        foreach ($disciplineIds as $value) {
            (new DisciplineModel($this->getDB()))->deleteDisciplines($value);
        }
        echo json_encode(['success' => true]);

    }

    public function showAddGestionDisciplineForm()
    {
        // Charger le contenu HTML du formulaire
        $content = file_get_contents('../views/discipline/discipline.php');

        // Afficher le contenu HTML
        echo $content;
    }


}