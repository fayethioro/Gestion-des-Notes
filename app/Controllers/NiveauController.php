<?php

namespace App\Controllers;

use App\Models\NiveauModel;

class NiveauController extends Controller
{

    public function show()
    {
        $post = new NiveauModel($this->getDB());
        $posts = $post->allN();
        return $this->view('niveau.niveau', compact('posts'));
    }
    public function selectionCycle()
    {
        $cycle = new NiveauModel($this->getDB());
        $cycles = $cycle->allCycle();
        var_dump($cycles);
        return $this->view('niveau.niveau', compact('cycles'));
    }
}
