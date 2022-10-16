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
            $this->smarty->display('ChampsList.tpl');
        }

        function ShowChampDetail($champ) {
            // asigno variables al tpl smarty
            $this->smarty->assign('Champ', $champ);
            // mostrar el tpl
            $this->smarty->assign('title', $champ[0]->Champ_name);
            $this->smarty->assign('nav_name', $champ[0]->Champ_name);
            $this->smarty->display('ChampDetail.tpl');
        }
    }