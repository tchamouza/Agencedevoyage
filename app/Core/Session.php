<?php
namespace App\Core;

class Session {
    
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public static function set($key, $value) {
        self::start();
        $_SESSION[$key] = $value;
    }
    
    public static function get($key, $default = null) {
        self::start();
        return $_SESSION[$key] ?? $default;
    }
    
    public static function has($key) {
        self::start();
        return isset($_SESSION[$key]);
    }
    
    public static function remove($key) {
        self::start();
        unset($_SESSION[$key]);
    }
    
    public static function destroy() {
        self::start();
        session_unset();
        session_destroy();
    }
    
    public static function flash($key, $value = null) {
        self::start();
        
        if ($value !== null) {
            $_SESSION['flash'][$key] = $value;
        } else {
            $flashValue = $_SESSION['flash'][$key] ?? null;
            unset($_SESSION['flash'][$key]);
            return $flashValue;
        }
    }
    
    public static function isAuthenticated() {
        return self::has('user');
    }
    
    public static function getUser() {
        return self::get('user');
    }
    
    public static function setUser($user) {
        self::set('user', $user);
    }
    
    public static function logout() {
        self::remove('user');
    }
}
?>