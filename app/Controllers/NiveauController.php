<?php

namespace App\Controllers;

use App\Models\NiveauModel;

class NiveauController extends Controller
 {

    public function show()
 {
        $post = new NiveauModel( $this->getDB() );
        $posts = $post->allN();
        return $this->view( 'niveau.niveauP', compact( 'posts' ) );
    }

    public function showM()
 {
        $post = new NiveauModel( $this->getDB() );
        $posts = $post->allM();
        return $this->view( 'niveau.niveauM', compact( 'posts' ) );
    }

    public function showS()
 {
        $post = new NiveauModel( $this->getDB() );
        $posts = $post->allS();
        return $this->view( 'niveau.niveauS', compact( 'posts' ) );
    }
}
