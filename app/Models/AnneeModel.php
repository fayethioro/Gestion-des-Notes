<?php

namespace App\Models;

class AnneeModel extends Model
 {
    protected $table = 'AnneeScolaire';

    public function allA()
 {
        $stmt = $this->db->getPDO()->query( 'SELECT * FROM AnneeScolaire order by nom_annee' );
        return $stmt->fetchAll();

    }

    public function add( $nom_annee )
 {
        $statement =  $this->db->getPDO()->prepare( 'INSERT INTO AnneeScolaire (nom_annee) VALUES (:nom_annee)' );
        $statement->execute( [ 'nom_annee' => $nom_annee ] );
    }

    public function updateStatut( $id, $statut )
 {
        $statement =  $this->db->getPDO()->prepare( 'UPDATE AnneeScolaire SET statut = :statut WHERE id = :id' );
        $statement->execute( [ 'statut' => $statut, 'id' => $id ] );
    }

}
