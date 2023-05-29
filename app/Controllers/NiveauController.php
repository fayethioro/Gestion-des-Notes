<?php

namespace App\Controllers;

use App\Models\NiveauModel;

class NiveauController extends Controller
{

    public function show()
    {

        $post = (new NiveauModel($this->getDB()))->allCycle();
        return $this->view('niveau.niveau', compact('post', ));

    }



    public function allClasse($id)
    {
        $classe = (new NiveauModel($this->getDB()))->allClasse($id);
        return $this->view('classe.classe', compact('classe', ));
    }
}