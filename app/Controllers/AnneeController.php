<?php

namespace App\Controllers;

use App\Models\AnneeModel;

class AnneeController extends Controller
 {
    public function showAnnee()
 {
        $Annee = new AnneeModel( $this->getDB() );
        $posts = $Annee->allA();
        $errorMessage = '';
        $annees = ( new AnneeModel( $this->getDB() ) )->findStatut();
        $_SESSION[ 'statut' ] = $annees->libelle;

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

                    header( 'Location:  /annee' );

                    exit();
                }
            }

        }

        return $this->view( 'annee.annee', compact( 'posts', 'errorMessage' ) );
    }

    public function modifierStatut( $id )
 {
        $anneeModel = new AnneeModel( $this->getDB() );
        $annee = $anneeModel->find( $id );

        if ( $annee ) {
            $statutActuel = $annee->statut;
            $nouveauStatut = ( $statutActuel == 0 ) ? 1 : 0;

            // Désactiver tous les autres statuts
            $anneeModel->disableAllStatusExcept( $id );

            // Mettre à jour le statut de l'année sélectionnée
            $anneeModel->updateStatut($id, $nouveauStatut);
    
            header('Location: /annee');
        }
    }
    

    public function edit( $id )
 {
        $post = ( new AnneeModel( $this->getDB() ) )->find( $id );
        return $this->view( 'annee.edit', compact( 'post', ) );
}

    public function destroy( int $id )
 {
        ( new AnneeModel( $this->getDB() ) )->destroy( $id );

        header( 'Location: /annee' );
        }

    }