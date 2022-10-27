<?php

class RolesModel {

    private $db;
    private $pdo;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_lol;charset=utf8', 'root', '', array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
          ));
    }

    /**
     * Devuelve la lista de champs completa.
     */
    public function GetRoles() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase
        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM roles_table");
        $query->execute();
        // 3. obtengo los resultados
        $roles = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos      
        return $roles;
    }

    public function GetRol($id) {
        $query = $this->db->prepare("SELECT * FROM roles_table WHERE ID_rol = ?");
        $query->execute([$id]);
        $rol = $query->fetch(PDO::FETCH_OBJ);       
        return $rol;
    }

    public function Add_Rol($Name) {
        $query = $this->db->prepare("INSERT INTO roles_table (Rol_name) VALUES (?)");
        $query->execute([$Name]);

        return $this->db->lastInsertId();
    }

    public function EditRol($Name, $id) {
        $query = $this->db->prepare('UPDATE roles_table SET rol_name = ? WHERE ID_rol = ?');
        $query->execute([$Name, $id]);
    }

    function Delete_Rol($id) {
        try {
        $query = $this->db->prepare('DELETE FROM roles_table WHERE ID_rol = ?');
        $query->execute([$id]);
        }
        catch (PDOException $e) {
            error_log('PDO Exception: '.$e->getMessage());
            die('No se puede borrar este Rol');
        }
    }
}