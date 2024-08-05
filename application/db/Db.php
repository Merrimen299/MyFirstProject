<?php

namespace application\db;

use PDO;

class Db
{
    protected PDO $db;

    public function __construct(){
        $user = "root";
        $password = "";
        $dsn = "mysql:host=localhost;dbname=fitwear-db;port=3306;charset=utf8";
        $this->db = new PDO($dsn, $user, $password);
    }

    public function query($sql, $params = []){
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':'.$key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }
    public function row($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetch();
    }

}