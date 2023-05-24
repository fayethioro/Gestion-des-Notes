<?php

namespace App\Models;

class AnneeModel extends Model
 {

    public function allA()
 {
        $stmt = $this->db->getPDO()->query( 'SELECT * FROM AnneeScolaire' );
        return $stmt->fetchAll();

    }

    public function add( $nom_annee )
 {
        $statement =  $this->db->getPDO()->prepare( 'INSERT INTO AnneeScolaire (nom_annee) VALUES (:nom_annee)' );
        $statement->execute( [ 'nom_annee' => $nom_annee ] );
    }
}
