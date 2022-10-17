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
If ($params[0] != 'Admin' || !isset($_SESSION['IS_LOGGED'])) {
    switch ($params[0]) {           // FIXEAR LOS DIRECCIONAMIENTOS DE SOLO ADMIN
        case 'Champs':
            if (!isset($params[1])) {
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
        default:
            echo('404 Page not found');
            break;
    }
}
else {
    switch ($params[1]) {
        case 'AddChamp':  // vas a tener que chequear que no se agregue repetido
            if (isset($params[2]) && $params[2]=="SEND") {
                $Champs_Controller->Add_Champ();
            }
            else {
                $Champs_Controller->Show_form_Add_Champ();
            }
            break;
        case 'AddRol':
            if (isset($params[2]) && $params[2]=="SEND") {
                $Roles_Controller->Add_Rol();
            }
            else {
                $Roles_Controller->Show_Form_Add_Rol();
            }
            break;
        case 'EditChamp':
            $id = $params[2];
            if (isset($params[3]) && $params[3]=="SEND") {
                $Champs_Controller->Edit_Champ($id);
            }
            else {
                $Champs_Controller->Show_Form_Edit_Champ($id);
            }
            break;
        case 'EditRol':
            $id= $params[2];
            if (isset($params[3]) && $params[3]=="SEND") {
                $Roles_Controller->Edit_Rol($id);
            }
            else {
                $Roles_Controller->Show_Form_Edit_Rol($id);
            }
            break;
        case 'DeleteChamp':
            $id= $params[2];
            $Champs_Controller->Delete_Champ($id);
            break;
        case 'DeleteRol':
            $id= $params[2];
            $Roles_Controller->Delete_Rol($id);
            break;
        default:
            echo('404 Page not found');
            break;
    }
}
