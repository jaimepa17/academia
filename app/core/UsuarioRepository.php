<?php
// Ejemplo de patrón Repository para usuarios
class UsuarioRepository {
    protected $db;
    public function __construct() {
        $this->db = DB::getInstance();
    }
    public function findByEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Puedes agregar más métodos como findAll, save, delete, etc.
}
