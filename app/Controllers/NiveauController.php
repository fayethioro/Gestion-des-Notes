<?php

namespace App\Controllers;

use App\Models\NiveauModel;

class NiveauController extends Controller
{

    public function showNiveau()
    {
        $Niveau = new NiveauModel($this->getDB());
        $post = $Niveau->allCycle();
        $errorMessage = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $niveau = $_POST['niveau'];

            if (!$Niveau->isLibelleUnique($niveau)) {
                $errorMessage = 'Ce cycle existe déjà.';
            } else {
                $Niveau->add($niveau);

                header('Location:  /niveau');

                exit();
            }

        }

        return $this->view('niveau.niveau', compact('post', 'errorMessage'));
    }
    public function destroyNiveau(int $id)
    {
        (new NiveauModel($this->getDB()))->destroy($id);

        header('Location: /niveau');
    }




}