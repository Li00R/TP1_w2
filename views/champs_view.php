<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

    class Champs_view {
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
            // asigno variables al tpl smarty
            $this->smarty->assign('Champ', $champ);
            // mostrar el tpl
            $this->smarty->assign('title', $champ[0]->Champ_name);
            $this->smarty->assign('nav_name', $champ[0]->Champ_name);
            $this->smarty->display('Header.tpl');
            $this->smarty->assign('id', $champ[0]->ID_champ);
            $this->smarty->assign('thing', "Champ");
            $this->smarty->assign('delete', True);
            if (isset($_SESSION['IS_LOGGED'])) {
                $this->smarty->display('ItemOptions.tpl');
            }
            $this->smarty->display('ChampDetail.tpl');
        }

        function ShowChampsByRol($champs, $rol) {
            // asigno variables al tpl smarty
            $this->smarty->assign('count', count($champs)); 
            $this->smarty->assign('champs', $champs);
            $this->smarty->assign('title', $rol[0]->Rol_name);
            $this->smarty->assign('nav_name', $rol[0]->Rol_name);
            $this->smarty->display('Header.tpl');
            $this->smarty->assign('id', $rol[0]->ID_rol);
            $this->smarty->assign('thing', "Rol");
            if ($champs == null) {
                $this->smarty->assign('delete', True);
            }
            // mostrar el tpl
            if (isset($_SESSION['IS_LOGGED'])) {
                $this->smarty->display('ItemOptions.tpl');
            }
            $this->smarty->display('ChampsList.tpl');
        }
    }