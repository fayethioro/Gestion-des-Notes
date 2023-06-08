<?php
namespace App\Models;


use PDO;

class GroupeDisciplineModel extends Model
{
    protected $table = 'GroupeDiscipline';
    public function getAllGroupes()
    {
        $pdo = $this->db->getPDO();
        $query = "SELECT * FROM GroupeDiscipline";
        $result = $pdo->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}