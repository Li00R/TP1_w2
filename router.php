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
$Champs_Controller = new Champs_controller();
$Roles_Controller = new Roles_controller();

session_start();

// tabla de ruteo
switch ($params[0]) {
    case 'Champs':
        $Champs_Controller->Show_All_Champs();
        break;
    case 'Roles':
        $Roles_Controller->Show_All_Roles();
        break;
    case 'ChampDetail':
        $id= $params[1];
        $Champs_Controller->Champ_Detail($id);
        break;
    case 'ChampsByRol':
        $id= $params[1];
        $Champs_Controller->Show_Champs_By_Rol($id);
        break;
    case 'Login':
        $Auth_Controller = new Auth_Controller();
        $Auth_Controller->Show_Form_Login();
        break;
    case "Logout":
        $Auth_Controller = new Auth_Controller();
        $Auth_Controller->Logout();
        break;
    case 'validate':
        $authController = new Auth_Controller();
        $authController->Validate_User();
        break;
    case 'AddChamp':
        $Champs_Controller->Agregar_Champ();
        break;
    case 'AddRol':
            $Champs_Controller->Agregar_Champ();
            break;
    case 'EditChamp':
        $id= $params[1];
        $Champs_Controller->Edit_Champ($id);
        break;
    case 'EditRol':
        $id= $params[1];
        $Roles_Controller->Edit_Rol($id);
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
