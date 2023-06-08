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
}