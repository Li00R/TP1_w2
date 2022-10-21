<?php
    require_once './models/champs_model.php';
    require_once './views/champs_view.php';
    require_once './models/roles_model.php';
    require_once './helpers/auth_helper.php';

    class Champs_controller {
        private $model;
        private $model_rol;
        private $view;
        private $auth_helper;

        public function __construct() {
            $this->model = new Champs_model();
            $this->model_rol = new Roles_model();
            $this->view = new Champs_view();
            $this->auth_helper = new AuthHelper();
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
        
        public function Show_Form_Add_Champ() {
            $this->auth_helper->checkLoggedIn();
            $roles = $this->model_rol->GetRoles();
            $this->view->ShowFormAddChamp($roles);
        }

        public function Show_Form_Edit_Champ($id) {
            $this->auth_helper->checkLoggedIn();
            $roles = $this->model_rol->GetRoles();
            $this->view->ShowFormEditChamp($id, $roles);
        }

        public function Add_Champ() {
            $this->auth_helper->checkLoggedIn();
            $Name = $_POST['Name'];
            $ID_Rol = $_POST['ID_rol'];
            $Line = $_POST['Line'];

            $id = $this->model->Add_Champ($Name, $ID_Rol, $Line);

            header("Location: " . BASE_URL); 
        }

        public function Edit_Champ($id) {
            $this->auth_helper->checkLoggedIn();
            $Name = $_POST['Name'];
            $ID_Rol = $_POST['ID_rol'];
            $Line = $_POST['Line'];

            $this->model->EditChamp($id, $Name, $ID_Rol, $Line);
        }

        public function Delete_Champ($id) {
            $this->auth_helper->checkLoggedIn();
            $this->model->Delete_Champ($id);
        }

    }

