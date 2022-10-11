<?php
    require_once './models/champs_model.php';
    require_once './views/champs_view.php';

    class Champs_controller {
        private $model;
        private $view;

        public function __construct() {
            $this->model = new Champs_model();
            $this->view = new Champs_view();
        }

        public function Show_All_Champs() {
            $champs = $this->model->GetChamps();
            $this->view->ShowChamps($champs);
        }

        public function Champ_Detail($name) {
            $champ = $this->model->GetChamp($name);
            $this->view->ShowChampDetail($champ);
        }

        public function Show_Champs_By_Rol($id) {
            $champs = $this->model->GetChampsByRol($id);
            $this->view->ShowChamps($champs);
        }
    
    }

