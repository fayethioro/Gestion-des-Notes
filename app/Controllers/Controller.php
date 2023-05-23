<?php

namespace App\Controllers;

use Database\DBConnection;

abstract class Controller
{

    protected $db;

    public function __construct(DBConnection $db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->db = $db;
    }
    protected function view(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require_once VIEWS . $path . '.php';
        $content = ob_get_clean();
        require_once VIEWS . 'layout.php';
    }

    /**
     * @return mixed
     */
    public function getDB()
    {
        return $this->db;
    }
}
