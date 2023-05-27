<?php

namespace App\Models;

use Database\DBConnection;
use PDO;

abstract class Model
 {

    protected $db;
    protected $table;

    public function __construct( DBConnection $db )
 {
        $this->db = $db;
    }

    public function isLibelleUnique( string $libelle ): bool
 {
        $statement = $this->db->getPDO()->prepare( 'SELECT COUNT(*) FROM AnneeScolaire WHERE nom_annee = :nom_annee' );
        $statement->bindParam( ':nom_annee', $libelle );
        $statement->execute();

        return $statement->fetchColumn() == 0;
    }

    public function find( $id )
 {
        $statement = $this->db->getPDO()->prepare( 'SELECT * FROM Anneescolaire WHERE id = :id' );
        $statement->execute( [ 'id' => $id ] );
        return $statement->fetch();
    }

    public function destroy( int $id )
 {
        $statement = $this->db->getPDO()->prepare( 'DELETE FROM Anneescolaire WHERE id = :id' );
        $statement->execute( [ 'id' => $id ] );
        return $statement->fetch();
    }
}