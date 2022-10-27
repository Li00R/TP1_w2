<?php

require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class RolesView {
    private $smarty;
    
    
    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function ShowRoles($roles) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($roles)); 
        $this->smarty->assign('roles', $roles);
        $this->smarty->assign('title', "Roles");
        $this->smarty->assign('nav_name', "Roles");
        // mostrar el tpl
        $this->smarty->display('Header.tpl');
        $this->smarty->display('RolesList.tpl');
    }

    public function ShowFormAddRol() {
        $this->smarty->assign('title', "Add Rol");
        $this->smarty->assign('nav_name', "Add Rol"); 
        $this->smarty->display('Header.tpl');
        $this->smarty->assign('action', "AddRol");
        $this->smarty->assign('nav_id', ""); 
        $this->smarty->display('FormRol.tpl');
    }

    public function ShowFormEditChamp($id) {
        $this->smarty->assign('title', "Edit Rol");
        $this->smarty->assign('nav_name', "Edit Rol"); 
        $this->smarty->display('Header.tpl');
        $this->smarty->assign('action', "EditRol");
        $this->smarty->assign('nav_id', "/" . $id); 
        $this->smarty->display('FormRol.tpl');
    }

    public function ShowFormEditRol($id) {
        $this->smarty->assign('title', "Edit Rol");
        $this->smarty->assign('nav_name', "Edit Rol"); 
        $this->smarty->display('Header.tpl');
        $this->smarty->assign('action', "AddRol");
        $this->smarty->assign('nav_id', "/" . $id); 
        $this->smarty->display('FormRol.tpl');
    }
}