<?php
    require_once './models/champs_model.php';
    require_once './views/champs_view.php';
    require_once './models/roles_model.php';
    require_once './helpers/auth_helper.php';

    class ChampsController {
        private $model;
        private $model_rol;
        private $view;
        private $auth_helper;

        public function __construct() {
            $this->model = new ChampsModel();
            $this->model_rol = new RolesModel();
            $this->view = new ChampsView();
            $this->auth_helper = new AuthHelper();
        }

        public function Show_All_Champs() {
            $champs = $this->model->GetChamps();
            $this->view->ShowChamps($champs, "Champs");
        }

        public function Champ_Detail($id) {
            $champ = $this->model->GetChamp($id);
            if ($champ != null) {
                $this->view->ShowChampDetail($champ);
            }
            else {
                header("Location: " . BASE_URL);
            }
        }

        public function Show_Champs_By_Rol($id) {
            $champs = $this->model->GetChampsByRol($id);
            $rol = $this->model_rol->GetRol($id);
            if ($rol != null) {
                $this->view->ShowChampsByRol($champs, $rol);
            }
            else {
               header("Location: " . BASE_URL); 
            }
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
            if (isset($_POST['Name']) && $_POST['Name'] != "" && isset($_POST['Line']) && $_POST['Line'] != "") {
                $this->model->Add_Champ($_POST['Name'], $_POST['ID_rol'], $_POST['Line']);
            }    
            header("Location: " . BASE_URL);
        }

        public function Edit_Champ($id) {
            $this->auth_helper->checkLoggedIn();
            if (isset($_POST['Name']) && $_POST['Name'] != "" && isset($_POST['Line']) && $_POST['Line'] != "" && isset($id) && $id != "") {
                $this->model->EditChamp($id, $_POST['Name'], $_POST['ID_rol'], $_POST['Line']);
            }    
            header("Location: " . BASE_URL);
        }

        public function Delete_Champ($id) {
            $this->auth_helper->checkLoggedIn();
            $this->model->Delete_Champ($id);
        }

    }

