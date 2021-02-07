<?php

namespace App\Core;

use PDO;
use PDOException;

/**
 * Class Database
 * @package App\Core
 */
class Database
{
    /**
     * @var
     */
    public $db;


    /**
     * @return PDO
     */
    public function make()
    {
        try{
            $this->db = new PDO('mysql:host=127.0.0.1;dbname=test-job', 'root', '');
        } catch(PDOException $e){
            die($e);
        }
        return $this->db;
    }
}