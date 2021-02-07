<?php

namespace App\core\ORM;

use App\Core\Application;
use PDO;

/**
 * Class BaseModel
 * @package App\core
 */
abstract class BaseModel
{
    /**
     * @return PDO
     */
    public static function db()
    {
        return Application::$app->db->make();
    }
}