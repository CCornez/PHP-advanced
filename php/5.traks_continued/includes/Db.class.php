<?php

class Db
{
    private $db_host = 'db';
    private $db_user = 'root';
    private $db_password = 'rootpass';
    private $db_db = 'syntra';
    private $db_port = 3306;
    private $pdo;

    public function __construct()
    {
        if ($this->pdo === null) {
            try {
                $this->pdo = new PDO("mysql:host=" . $this->db_host . ";port=" . $this->db_port . ";dbname=" . $this->db_db . ";charset=utf8mb4", $this->db_user, $this->db_password);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                return null;
            }
        }
    }

    public function executeQuery($sql, $fetch = PDO::FETCH_OBJ)
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll($fetch);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
