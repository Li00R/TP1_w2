<?php
    require_once './models/champs_model.php';
    require_once './views/champs_view.php';
    require_once './models/roles_model.php';

    class Champs_controller {
        private $model;
        private $model_rol;
        private $view;

        public function __construct() {
            $this->model = new Champs_model();
            $this->model_rol = new Roles_model();
            $this->view = new Champs_view();
        }

        public function Show_All_Champs() {
            $champs = $this->model->GetChamps();
            $this->view->ShowChamps($champs, "Champs");
        }

        public function Champ_Detail($id) {
            $champ = $this->model->GetChamp($id);
            $this->view->ShowChampDetail($champ);
        }

        public function Show_Champs_By_Rol($id) {
            $champs = $this->model->GetChampsByRol($id);
            $rol = $this->model_rol->GetRol($id);
            $this->view->ShowChampsByRol($champs, $rol);
        }
        
        public function Show_form_Add_Champ() {
            $this->view->ShowFormAddChamp();
        }

        public function Add_Champ() {
            $Name = $_POST['Name'];
            $ID_Rol = $_POST['ID_rol'];
            $Line = $_POST['Line'];

            $id = $this->model->Add_Champ($Name, $ID_Rol, $Line);

            header("Location: " . BASE_URL); 
        }

        public function Edit_Champ($id) {

        }

        public function Delete_Champ($id) {
            
        }

    }

