<?php

namespace App\Config;

use PDO;
use PDOException;

trait Database
{
    private $host = 'localhost';
    private $db_name = 'ecommerce';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
    private function executeQuery(string $query, array $params = [])
    {
        $stmt = $this->connect()->prepare($query);


        foreach ($params as $key => &$val) {
            $stmt->bindParam($key, $val, PDO::PARAM_INT);
        }


        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;

        return $result;
    }

}
