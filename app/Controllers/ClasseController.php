<?php

namespace App\Controllers;

use App\Models\ClasseModel;

class ClasseController extends Controller
 {
    public function showClass()
 {
        $post = new ClasseModel( $this->getDB() );
        $posts = $post->allC();

        return $this->view( 'classe.classe', compact( 'posts' ) );
    }
}
