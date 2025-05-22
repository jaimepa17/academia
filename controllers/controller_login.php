<?php
ob_start();
require_once dirname(__DIR__) . '/config/config.php';

class login {
    public function index($params = []) {
        require_once dirname(__DIR__) . '/views/login/templates/form_login.php';
    }

    public function auth() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            // Verificar conexión a la base de datos
            $pdo = DB::connect();
            // var_dump($pdo); // Solo para debug, comentar en producción
            
            $sql = "SELECT * FROM usuarios WHERE email = :email AND estado = '1' LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && isset($user['password']) && password_verify($password, $user['password'])) {
                $_SESSION['usuario'] = $user['nombres'];
                $_SESSION['id_usuario'] = $user['id_usuario'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['cargos'] = $user['cargos'];
                header('Location: '.APP_URL.'/public/');
                exit();
            } else {
                $_SESSION['login_error'] = 'Usuario o contraseña incorrectos';
                header('Location: '.APP_URL.'/public/login');
                exit();
            }
        }
    }
    // Puedes agregar aquí el método logout si lo necesitas
}
