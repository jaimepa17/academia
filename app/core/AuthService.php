<?php
// Ejemplo de patrón Service para lógica de autenticación
class AuthService {
    protected $usuarioRepository;
    public function __construct() {
        $this->usuarioRepository = new UsuarioRepository();
    }
    public function autenticar($email, $password) {
        $user = $this->usuarioRepository->findByEmail($email);
        if ($user && isset($user['password']) && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
