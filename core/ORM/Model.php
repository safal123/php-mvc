<?php


namespace App\core\ORM;

/**
 * Class Model
 * @package App\core
 */
class Model extends BaseModel
{
    /**
     * @param $table
     * @param string $column
     * @return array
     */
    public static function all($table = null, $column = 'id')
    {
        $tableName = self::getTableName($table);
        $sql = "SELECT * FROM $tableName ORDER BY $column DESC";
        $statement = self::db()->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll(\PDO::FETCH_OBJ);
        }
    }

    /**
     * GET single column from given table
     * @param $table
     * @param $column
     * @param $id
     * @return mixed
     */
    public static function get($table = null, $column, $id)
    {
        $sql = "SELECT $column FROM $table where $id = $id";
        $statement = self::db()->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchColumn();
        }
    }


    /**
     * @param $table
     * @param $parameters
     */
    public static function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s) ',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters)),
        );
        try {
            $statement = self::db()->prepare($sql);
            $statement->execute($parameters);
        } catch (\Exception $e) {
            die('Something went wrong.');
        }
    }

    /**
     * @param $table
     * @return string
     */
    private static function getTableName($table): string
    {
        return $table ?? strtolower(explode("\\", get_called_class())[2] . 's');
    }
}