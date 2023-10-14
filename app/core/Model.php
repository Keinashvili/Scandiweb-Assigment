<?php

namespace app\app\core;

use app\app\Database\Database;
use PDO;

class Model extends Database
{
    protected string $table;
    private static array $childrenArray = [];

    public function all(): array
    {
        $static = new static();

        $connect = $static->pdo();

        $sql = "SELECT * FROM $this->table";

        $result = $connect->query($sql);

        foreach ($result->fetchAll() as $key => $fetchArray) {
            $childClass = new static();

            foreach ($fetchArray as $itemKey => $itemValue) {
                $childClass->{$itemKey} = $itemValue;
            }

            self::$childrenArray[] = $childClass;
        }

        return self::$childrenArray;
    }

    public function findOrFail($id)
    {
        $static = new static();

        $connect = $static->pdo();

        $sql = "SELECT * FROM $this->table WHERE id = $id";

        $result = $connect->query($sql);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $array)
    {
        $columns = '';
        $values = '';
        $num = 0;
        $execute = [];

        $static = new static();

        foreach ($array as $key => $value) {
            $num++;
            $num != count($array) ? $columns .= "$key, " : $columns .= $key;
            $num != count($array) ? $values .= ":$key, " : $values .= ":$key";
            $execute[":$key"] = $value;
        }

        $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
        $statement = $static->pdo()->prepare($sql);
        $statement->execute($execute);
    }

    public function update(int $id, array $array)
    {
        $execute = [];

        $static = new static();
        $sql = "UPDATE $this->table SET ";

        foreach ($array as $key => $value) {
            $sql = $sql . " " . $key . " = '" . $value . "', ";
        }

        $len = strlen($sql) - 2;

        $sql = substr($sql, 0, $len);
        $sql = $sql . " WHERE id=$id ";

        $statement = $static->pdo()->prepare($sql);
        $statement->execute($execute);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE ID = $id";

        $this->pdo()->query($sql);
    }

    public function column($column, $table)
    {
        $static = new static();
        $connect = $static->pdo();
        $query = $connect->prepare("SELECT $column FROM $table");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_NUM);
    }
}
