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
        $statement = $this->db->getPDO()->prepare( 'SELECT COUNT(*) FROM '.$this->table.' WHERE libelle = :libelle' );
        $statement->bindParam( ':libelle', $libelle );
        $statement->execute();

        return $statement->fetchColumn() == 0;
    }

    public function find( $id )
 {
        $statement = $this->db->getPDO()->prepare( 'SELECT * FROM '.$this->table.' WHERE id = :id' );
        $statement->execute( [ 'id' => $id ] );
        return $statement->fetch();
    }

    public function destroy( int $id )
 {
        $statement = $this->db->getPDO()->prepare( 'DELETE FROM '.$this->table.' WHERE id = :id' );
        $statement->execute( [ 'id' => $id ] );
        return $statement->fetch();
    }

    public function findStatut()
 {
        $statement = $this->db->getPDO()->prepare( 'SELECT * FROM AnneeScolaire WHERE statut = 1' );
        $statement->execute();
        return $statement->fetch () ;
    }
}