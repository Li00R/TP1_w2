<?php

require_once './models/roles_model.php';
require_once './views/roles_view.php';
require_once './helpers/auth_helper.php';

class RolesController {
    private $model;
    private $view;
    private $auth_helper;

    public function __construct() {
        $this->model = new RolesModel();
        $this->view = new RolesView();
        $this->auth_helper = new AuthHelper();
    }

    public function Show_All_Roles() {
        $roles = $this->model->GetRoles();
        $this->view->ShowRoles($roles);
    }

    public function Show_form_Add_Rol() {
        $this->auth_helper->checkLoggedIn();
        $this->view->ShowFormAddRol();
    }

    public function Show_Form_Edit_Rol($id) {
        $this->auth_helper->checkLoggedIn();
        $rol = $this->model->GetRol($id);
        $this->view->ShowFormEditRol($rol);
    }

    public function Add_Rol() {
        $this->auth_helper->checkLoggedIn();
        if (isset($_POST['Name']) && $_POST['Name'] != "") {
            $this->model->Add_Rol($_POST['Name']);
        }
        header("Location: " . BASE_URL);
    }

    public function Edit_Rol($id) {
        $this->auth_helper->checkLoggedIn();
        if (isset($_POST['Name']) && $_POST['Name'] != "" && isset($id) && $id != "") {
            $this->model->EditRol($_POST['Name'], $id);
        }
        header("Location: " . BASE_URL);
    }

    public function Delete_Rol($id) {
        $this->auth_helper->checkLoggedIn();
        $this->model->Delete_Rol($id);
        header("Location: " . BASE_URL);
    }
}