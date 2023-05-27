<?php

namespace App\Controllers;

use App\Models\AnneeModel;
use App\Validation\Validation;

class AnneeController extends Controller
 {

    public function showAnnee()
 {
        $Annee = new AnneeModel( $this->getDB() );
        $posts = $Annee->allA();
        $errorMessage = '';

        if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
            $annee_scolaire = $_POST[ 'annee_scolaire' ];
            $isValid = $this->validateDates( $annee_scolaire );

            if ( !$isValid ) {
                $errorMessage = 'La différence entre les années doit être égale à 1.';
            } else {
                if ( !$Annee->isLibelleUnique( $annee_scolaire ) ) {
                    $errorMessage = 'Cette année scolaire existe déjà.';
                } else {
                    $Annee->add( $annee_scolaire );
                    header( 'Location: /' );
                    exit();
                }
            }
        }

        return $this->view( 'annee.annee', compact( 'posts', 'errorMessage' ) );
    }

    public function modifierStatut()
 {
        $id = $_GET[ 'id' ];
        $Annee = new AnneeModel( $this->getDB() );
        $annee = $Annee->find( $id );
        if ( $annee ) {
            $statutActuel = $annee[ 'statut' ];
            $nouveauStatut = ( $statutActuel == 0 ) ? 1 : 0;

            $Annee->updateStatut( $id, $nouveauStatut );

            header( 'Location: /' );
            exit();
        }
    }

}
