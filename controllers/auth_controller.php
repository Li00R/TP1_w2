<?php

require_once './models/user_model.php';
require_once './views/auth_view.php';

class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Usermodel();
        $this->view = new AuthView();
    }

    public function Show_Form_Login() {
        $this->view->ShowFormLogin();
    }

    public function Validate_User() {
        // toma los datos del form
        $email = $_POST['email'];
        $password = $_POST['password'];

        // busco el usuario por email
        $user = $this->model->getUserByEmail($email);

        // verifico que el usuario existe y que las contraseñas son iguales
        if ($user && password_verify($password, $user->password)) {

            // inicio una session para este usuario
            session_start();
            $_SESSION['USER_ID'] = $user->ID_user;
            $_SESSION['USER_EMAIL'] = $user->email;
            $_SESSION['IS_LOGGED'] = true;
            header("Location: " . BASE_URL);
        } else {
            // si los datos son incorrectos muestro el form con un erro
           $this->view->ShowFormLogin("El usuario o la contraseña no existe.");
        } 
    }

    public function Logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    } 

}