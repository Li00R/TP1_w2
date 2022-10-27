<?php

require_once './controllers/champs_controller.php';
require_once './controllers/roles_controller.php';
require_once './controllers/auth_controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'Champs'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// instancio el unico controller que existe por ahora
$Champs_Controller = new ChampsController();
$Roles_Controller = new RolesController();


// tabla de ruteo

switch ($params[0]) {         
    case 'Champs':
        if (!isset($params[1]) || $params[1] == "") {
            $Champs_Controller->Show_All_Champs();
        }
        else {
            $Champs_Controller->Champ_Detail($params[1]);  
        }
        break;
    case 'Roles':
        if (!isset($params[1])) {
        $Roles_Controller->Show_All_Roles();
        }
        else {
            $id= $params[1];
            $Champs_Controller->Show_Champs_By_Rol($id);
        }
        break;
    case 'Login':
        $Auth_Controller = new AuthController();
        $Auth_Controller->Show_Form_Login();
        break;
    case "Logout":
        $Auth_Controller = new AuthController();
        $Auth_Controller->Logout();
        break;
    case 'validate':
        $authController = new AuthController();
        $authController->Validate_User();
        break;
    case 'AddChamp': 
        if (isset($params[1]) && $params[1]=="SEND") {
            $Champs_Controller->Add_Champ();
        }
        else {
            $Champs_Controller->Show_form_Add_Champ();
        }
        break;
    case 'AddRol':
        if (isset($params[1]) && $params[1]=="SEND") {
            $Roles_Controller->Add_Rol();
        }
        else {
            $Roles_Controller->Show_Form_Add_Rol();
        }
        break;
    case 'EditChamp':
        $id = $params[1];
        if (isset($params[2]) && $params[2]=="SEND") {
            $Champs_Controller->Edit_Champ($id);
        }
        else {
            $Champs_Controller->Show_Form_Edit_Champ($id);
        }
        break;
    case 'EditRol':
        $id= $params[1];
        if (isset($params[2]) && $params[2]=="SEND") {
            $Roles_Controller->Edit_Rol($id);
        }
        else {
            $Roles_Controller->Show_Form_Edit_Rol($id);
        }
        break;
    case 'DeleteChamp':
        $id= $params[1];
        $Champs_Controller->Delete_Champ($id);
        break;
    case 'DeleteRol':
        $id= $params[1];
        $Roles_Controller->Delete_Rol($id);
        break;
    default:
        echo('404 Page not found');
        break;
}


