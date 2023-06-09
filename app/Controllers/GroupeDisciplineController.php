<?php

namespace App\Controllers;

use App\Models\GroupeDisciplineModel;

class GroupeDisciplineController extends Controller
{
    public function getGroupes()
    {
        $groupes = (new GroupeDisciplineModel($this->getDB()))->getAllGroupes();
        // Retourner les groupes au format JSON
        echo json_encode($groupes);
    }
    public function addDisciplineGroupes()
    {
        echo $_POST['libelle'];

        if (isset($_POST['libelle'])) {
            $libelle = $_POST['libelle'];
            echo $libelle;

            (new GroupeDisciplineModel($this->getDB()))->insertGroupeDiscipline($libelle);

            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'libelle Manquant']);
        }
    }

}