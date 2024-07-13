<?php

namespace App\Traits;

use PDO;

trait HasExecution
{

    private function executeQuery(object $connection, string $query, array $params = [])
    {
        $stmt = $connection->prepare($query);


        foreach ($params as $key => &$val) {
            $stmt->bindParam($key, $val, PDO::PARAM_INT);
        }


        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;

        return $result;
    }
}