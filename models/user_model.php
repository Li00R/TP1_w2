<?php

class  UserModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_lol;charset=utf8', 'root', '');
    
    }

    public function getUserByEmail($email) {
        $query = $this->db->prepare("SELECT * FROM users_table WHERE email = ?");
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

}