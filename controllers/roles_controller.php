<?php

require_once './models/roles_model.php';
require_once './views/roles_view.php';
require_once './helpers/auth_helper.php';

class Roles_controller {
    private $model;
    private $view;
    private $auth_helper;

    public function __construct() {
        $this->model = new Roles_model();
        $this->view = new Roles_view();
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
        $this->view->ShowFormEditChamp($id);
    }

    public function Add_Rol() {
        $this->auth_helper->checkLoggedIn();
        $Name = $_POST['Name'];
        $id = $this->model->Add_Rol($Name);

        header("Location: " . BASE_URL);
    }

    public function Edit_Rol($id) {
        $this->auth_helper->checkLoggedIn();
        $Name = $_POST['Name'];

        $this->model->EditRol($Name, $id);
    }

    public function Delete_Rol($id) {
        $this->auth_helper->checkLoggedIn();
        $this->model->Delete_Rol($id);
    }
}