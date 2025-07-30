<?php

namespace App\Core;

class Controller {
    protected $db;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection ();
    }
    
    protected function view($view, $data = []) {
        extract($data);
        require_once "app/Views/{$view}.php";
    }
    
    protected function redirect($url) {
        header("Location: {$url}");
        exit();
    }
    
    protected function requireAuth() {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/Agencedevoyage/login');
        }
    }
    
    protected function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }
}
?>