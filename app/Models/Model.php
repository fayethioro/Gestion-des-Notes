<?php

namespace App\Models;

use Database\DBConnection;

abstract class Model {

    protected $db;
    protected $table;

    public function __construct( DBConnection $db ) {
        $this->db = $db;
    }

    public function isLibelleUnique( string $libelle ): bool {
        $statement =  $this->db->getPDO()->prepare( 'SELECT COUNT(*) FROM AnneeScolaire WHERE nom_annee = :nom_annee' );
        $statement->bindParam( ':nom_annee', $libelle );
        $statement->execute();

        return $statement->fetchColumn() == 0;
    }

    // public function delete( $id ) {
    //     $query = 'DELETE FROM {$this->table}  WHERE id = :id';
    //     $stmt = $this->db->getPDO()->prepare( $query );
    //     $stmt->bindParam( ':id', $id );
    //     $stmt->execute();

    //     return $stmt->rowCount();
    // }
}
