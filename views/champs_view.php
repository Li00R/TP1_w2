<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

    class ChampsView {
        private $smarty;
        
        
        public function __construct() {
            $this->smarty = new Smarty(); // inicializo Smarty
        }

        function ShowChamps($champs, $title) {
            // asigno variables al tpl smarty
            $this->smarty->assign('count', count($champs)); 
            $this->smarty->assign('champs', $champs);
            $this->smarty->assign('title', $title );
            $this->smarty->assign('nav_name', $title);
            // mostrar el tpl
            $this->smarty->display('Header.tpl');
            $this->smarty->display('ChampsList.tpl');
        }

        function ShowChampDetail($champ) {
            $this->smarty->assign('Champ', $champ);
            $this->smarty->assign('title', $champ->Champ_name);
            $this->smarty->assign('nav_name', $champ->Champ_name);
            $this->smarty->display('Header.tpl');
            $this->smarty->assign('id', $champ->ID_champ);
            $this->smarty->assign('thing', "Champ");
            if (isset($_SESSION['IS_LOGGED'])) {
                $this->smarty->assign('delete', True);
                $this->smarty->display('ItemOptions.tpl');
            }
            $this->smarty->display('ChampDetail.tpl');
        }

        function ShowChampsByRol($champs, $rol) {
            $this->smarty->assign('count', count($champs)); 
            $this->smarty->assign('champs', $champs);
            $this->smarty->assign('title', $rol[0]->Rol_name);
            $this->smarty->assign('nav_name', $rol[0]->Rol_name);
            $this->smarty->display('Header.tpl');
            $this->smarty->assign('id', $rol[0]->ID_rol);
            $this->smarty->assign('thing', "Rol");
            if (isset($_SESSION['IS_LOGGED'])) {
                if ($champs == null) {
                    $this->smarty->assign('delete', True);
                }
                $this->smarty->display('ItemOptions.tpl');
            }
            $this->smarty->display('ChampsList.tpl');
        }

        public function ShowFormAddChamp($roles) {
            $this->smarty->assign('nav_name', "Add Champ");
            $this->smarty->assign('title', "Add Champ");
            $this->smarty->display('Header.tpl');
            $this->smarty->assign('roles', $roles);
            $this->smarty->assign('action', 'AddChamp');
            $this->smarty->assign('nav_id', ""); 
            $this->smarty->display('FormChamp.tpl');
        }

        public function ShowFormEditChamp($id, $roles) {
            $this->smarty->assign('nav_name', "Edit Champ");
            $this->smarty->assign('title', "Edit Champ");
            $this->smarty->display('Header.tpl');
            $this->smarty->assign('roles', $roles);
            $this->smarty->assign('action', 'EditChamp');
            $this->smarty->assign('nav_id', '/' . $id);
            $this->smarty->display('FormChamp.tpl');
        }
        
    }