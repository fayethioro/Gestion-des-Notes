<?php

namespace App\Models;
use PDO;

class NiveauModel extends Model
 {
    protected $table = 'Cycle';

    public function allCycle(): array
 {
        $stmt = $this->db->getPDO()->query( 'SELECT * from Cycle' );
        return $stmt->fetchAll () ;
    }

    public function allClasse( $id )
 {
        $statement = $this->db->getPDO()->prepare( 'SELECT * FROM Classe WHERE id_cycle = :id' );
        $statement->execute( [ 'id' => $id ] );
        return $statement->fetchAll();
    }
}
