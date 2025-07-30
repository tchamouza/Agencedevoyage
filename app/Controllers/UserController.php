<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class UserController extends Controller {
    private $userModel;
    
    public function __construct() {
        parent::__construct();
        $this->userModel = new User();
    }
    
    public function dashboard() {
        session_start();
        $this->requireAuth();
        $this->view('user/dashboard', [
            'title' => 'Tableau de bord - Airline Travel',
            'user' => $_SESSION['user']
        ]);
    }
    
    public function profile() {
        session_start();
        $this->requireAuth();
        
        $errors = [];
        $success = '';
        $passwordErrors = [];
        $passwordSuccess = '';
        
        $userId = $_SESSION['user']['id'];
        $user = $this->userModel->find($userId);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['change_password'])) {
                $result = $this->handlePasswordChange($user);
                $passwordErrors = $result['errors'];
                $passwordSuccess = $result['success'];
            } else {
                $result = $this->handleProfileUpdate($user);
                $errors = $result['errors'];
                $success = $result['success'];
                if ($success) {
                    $user = $this->userModel->find($userId);
                    $_SESSION['user'] = $user;
                }
            }
        }
        
        $this->view('user/profile', [
            'title' => 'Profil - Airline Travel',
            'user' => $user,
            'errors' => $errors,
            'success' => $success,
            'passwordErrors' => $passwordErrors,
            'passwordSuccess' => $passwordSuccess
        ]);
    }
    
    private function handlePasswordChange($user) {
        $errors = [];
        $success = '';
        
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];
        
        if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
            $errors[] = 'Tous les champs sont obligatoires.';
        } elseif ($newPassword !== $confirmPassword) {
            $errors[] = 'Les nouveaux mots de passe ne correspondent pas.';
        } elseif (strlen($newPassword) < 4 || strlen($newPassword) > 8) {
            $errors[] = 'Le mot de passe doit contenir entre 4 et 8 caractères.';
        } elseif (!password_verify($currentPassword, $user['motdepasse'])) {
            $errors[] = 'Mot de passe actuel incorrect.';
        }
        
        if (empty($errors)) {
            if ($this->userModel->updatePassword($user['id'], $newPassword)) {
                $success = 'Mot de passe changé avec succès.';
            } else {
                $errors[] = 'Erreur lors de la mise à jour du mot de passe.';
            }
        }
        
        return ['errors' => $errors, 'success' => $success];
    }
    
    private function handleProfileUpdate($user) {
        $errors = [];
        $success = '';
        
        $data = [
            'nom' => htmlspecialchars($_POST['nom']),
            'prenoms' => htmlspecialchars($_POST['prenoms']),
            'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            'age' => $_POST['date_naissance'],
            'telephone' => htmlspecialchars($_POST['telephone']),
            'image' => $user['image']
        ];
        
        // Validation
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Format d\'email invalide.';
        }
        
        if ($this->userModel->emailExists($data['email'], $user['id'])) {
            $errors[] = 'Cet email est déjà utilisé.';
        }
        
        // Gestion de l'image
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $imageResult = $this->validateAndUploadImage($_FILES['image'], $user['image']);
            if (!empty($imageResult['errors'])) {
                $errors = array_merge($errors, $imageResult['errors']);
            } else {
                $data['image'] = $imageResult['filename'];
            }
        }
        
        if (empty($errors)) {
            if ($this->userModel->update($user['id'], $data)) {
                $success = 'Profil mis à jour avec succès.';
            } else {
                $errors[] = 'Erreur lors de la mise à jour.';
            }
        }
        
        return ['errors' => $errors, 'success' => $success];
    }
    
    private function validateAndUploadImage($file, $oldImage = null) {
        $errors = [];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $maxSize = 2 * 1024 * 1024;
        
        if (!in_array($file['type'], $allowedTypes)) {
            $errors[] = "Type d'image non supporté.";
        }
        
        if ($file['size'] > $maxSize) {
            $errors[] = "L'image ne doit pas dépasser 2MB.";
        }
        
        if (empty($errors)) {
            $filename = 'profile_' . uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
            $uploadPath = 'uploads/' . $filename;
            
            if (!file_exists('uploads')) {
                mkdir('uploads', 0755, true);
            }
            
            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                // Supprimer l'ancienne image
                if ($oldImage && file_exists('uploads/' . $oldImage)) {
                    unlink('uploads/' . $oldImage);
                }
                return ['filename' => $filename, 'errors' => []];
            } else {
                $errors[] = "Erreur lors du téléchargement.";
            }
        }
        
        return ['errors' => $errors];
    }
}
?>