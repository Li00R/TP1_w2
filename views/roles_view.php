<?php

require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class Roles_view {
    private $smarty;
    
    
    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function ShowRoles($roles) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($roles)); 
        $this->smarty->assign('roles', $roles);

        // mostrar el tpl
        $this->smarty->display('RolesList.tpl');
    }
}