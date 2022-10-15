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

    
}