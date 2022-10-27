<?php

class ChampsModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_lol;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de champs completa.
     */
    public function GetChamps() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase
        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM champs_table");
        $query->execute();
        // 3. obtengo los resultados
        $champs = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        return $champs;
    }

    public function GetChamp($id) {
        $query = $this->db->prepare("SELECT * FROM champs_table LEFT JOIN roles_table ON champs_table.ID_rol = roles_table.ID_rol WHERE ID_champ = ?");
        $query->execute([$id]);
        $champ = $query->fetch(PDO::FETCH_OBJ);       
        return $champ;
    }
    
    public function GetChampsByRol($id) {
        $query = $this->db->prepare("SELECT * FROM champs_table WHERE ID_rol = ?");
        $query->execute([$id]);
        $champs = $query->fetchAll(PDO::FETCH_OBJ);    
        return $champs;
    }

    public function Add_Champ($Name, $ID_Rol, $Line) {
        $query = $this->db->prepare("INSERT INTO champs_table (Champ_name, ID_Rol, Line_name) VALUES (?, ?, ?)");
        $query->execute([$Name, $ID_Rol, $Line]);

        return $this->db->lastInsertId();
    }

    public function EditChamp($id, $Name, $ID_Rol, $Line) {
        
        $query = $this->db->prepare('UPDATE champs_table SET Champ_name = ?, Line_name = ?, ID_rol = ? WHERE ID_champ = ?');
        $query->execute([$Name, $Line, $ID_Rol, $id]);
        header("Location: " . BASE_URL);
    }

    function Delete_Champ($id) {
        $query = $this->db->prepare('DELETE FROM champs_table WHERE ID_champ = ?');
        $query->execute([$id]);
        header("Location: " . BASE_URL);
    }
}
