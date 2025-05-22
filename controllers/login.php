<?php
ob_start();
require_once __DIR__ . '/../app/core/AuthService.php';

class login extends BaseController {
    public function index($params = []) {
        require_once dirname(__DIR__) . '/views/login/templates/form_login.php';
    }

    public function auth() {
        try {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $authService = new AuthService();
            
            $user = $authService->autenticar($email, $password);
            if ($user) {
                $_SESSION['usuario'] = $user['nombres'];
                $_SESSION['id_usuario'] = $user['id_usuario'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['cargos'] = $user['cargos'] ?? null;
                header('Location: '.APP_URL.'/public/');
                exit();
            } else {
                $_SESSION['login_error'] = 'Usuario o contraseña incorrectos';
                header('Location: '.APP_URL.'/public/login');
                exit();
            }
        } catch (PDOException $e) {
            error_log('Error en la autenticación: ' . $e->getMessage());
            $_SESSION['login_error'] = 'Ocurrió un error al procesar la solicitud. Inténtelo de nuevo más tarde.';
            header('Location: '.APP_URL.'/public/login');
            exit();
        }
    }
    // Puedes agregar aquí el método logout si lo necesitas
}
