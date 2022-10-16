<?php

require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class Auth_view {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function ShowFormLogin($error = null) {
        $this->smarty->assign("error", $error);
        $this->smarty->assign('nav_name', "Login");
        $this->smarty->assign('title', "Login");
        $this->smarty->display('FormLogin.tpl');
    }
}