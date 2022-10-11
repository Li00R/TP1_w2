<?php

class Champs_model {

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
        //CAMBIAR NOMBRE DE LA TABLAAAAAAAAAAAAAAAAAAA
        $query = $this->db->prepare("SELECT * FROM champs_table LEFT JOIN roles_table ON champs_table.ID_rol = roles_table.ID_rol");
        $query->execute();
        // 3. obtengo los resultados
        $champs = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        return $champs;
    }

    public function GetChamp($name) {
        $query = $this->db->prepare("SELECT * FROM champs_table LEFT JOIN roles_table ON champs_table.ID_rol = roles_table.ID_rol WHERE Champ_name = ?");
        $query->execute([$name]);
        $champ = $query->fetchAll(PDO::FETCH_OBJ);       
        return $champ;
    }
    
    public function GetChampsByRol($id) {
        $query = $this->db->prepare("SELECT * FROM champs_table WHERE ID_rol = ?");
        $query->execute([$id]);
        $champs = $query->fetchAll(PDO::FETCH_OBJ);    
        return $champs;
    }

}
