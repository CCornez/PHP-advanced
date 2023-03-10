<?php

class Track
{

    private $db;


    public function __construct($db)
    {
        $this->db = $db;
    }


    public function getTotal($filters = [])
    {
        $where = $this->buildWhere($filters);
        $sql = "SELECT COUNT(id) AS total FROM tracks $where";
        return $this->db->executeQuery($sql, $filters)[0]->total;
    }


    public function getAll($offset = 0, $limit = 50, $filters = [])
    {
        $where = $this->buildWhere($filters);
        $sql = "SELECT id, track_id, track_name, artist_name, genre FROM tracks $where LIMIT $limit OFFSET $offset";
        return $this->db->executeQuery($sql, $filters);
    }

    public function getById($id)
    {
        $sql = "SELECT id, track_id, track_name, artist_name, genre FROM tracks WHERE id = :id";
        return $this->db->executeQuery($sql, ["id" => $id]);
    }

    private function buildWhere($filters)
    {
        $where = '';
        if (count($filters)) {
            $where = [];
            foreach ($filters as $key => $value) {
                $where[] = "$key = :$key";
            }
            $where = 'WHERE ' . implode(' AND ', $where);
        }
        return $where;
    }
}
