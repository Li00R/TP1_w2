<?php

require_once './models/roles_model.php';
require_once './views/roles_view.php';

class Roles_controller {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Roles_model();
        $this->view = new Roles_view();
    }

    public function Show_All_Roles() {
        $roles = $this->model->GetRoles();
        $this->view->ShowRoles($roles);
    }

    public function Show_form_Add_Rol() {
        $this->view->ShowFormAddRol();
    }

    public function Add_Rol() {
        $Name = $_POST['Name'];
        $id = $this->model->Add_Rol($Name);

        header("Location: " . BASE_URL);
    }

    public function Edit_Rol($id) {
        $this->model->EditRol($id);
    }

    public function Delete_Rol($id) {
        $this->model->Delete_Rol($id);
    }
}