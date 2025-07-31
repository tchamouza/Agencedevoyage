<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    private $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new User();
    }

    public function showLogin()
    {
        $this->view('auth/login', [
            'title' => 'Connexion - Airline Travel'
        ]);
    }

    public function login()
    {
        session_start();
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['motdepasse'];

            if (empty($email) || empty($password)) {
                $errors[] = 'Veuillez remplir tous les champs.';
            } else {
                $user = $this->userModel->findByEmail($email);

                if ($user && password_verify($password, $user['motdepasse'])) {
                    $_SESSION['user'] = $user;
                    if ($user['role'] === 'admin') {
                        $this->redirect('/Agencedevoyage/admin-dashboard');
                    } else if ($user['role'] === 'user') {
                        $this->redirect('/Agencedevoyage/dashboard');
                    }
                } else {
                    $errors[] = "Email ou mot de passe incorrect.";
                }
            }
        }

        $this->view('auth/login', [
            'title' => 'Connexion - Airline Travel',
            'errors' => $errors
        ]);
    }

    public function showRegister()
    {
        $this->view('auth/register', [
            'title' => 'Inscription - Airline Travel'
        ]);
    }

    public function register()
    {
        $errors = [];
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->validateRegistrationData($_POST, $_FILES);

            if (!empty($data['errors'])) {
                $errors = $data['errors'];
            } else {
                try {
                    if ($this->userModel->createUser($data['userData'])) {
                        $success = 'Inscription réussie. Vous pouvez maintenant vous connecter.';
                    }
                } catch (\Exception $e) {
                    $errors[] = "Erreur lors de l'inscription : " . $e->getMessage();
                }
            }
        }

        $this->view('auth/register', [
            'title' => 'Inscription - Airline Travel',
            'errors' => $errors,
            'success' => $success
        ]);
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        $this->redirect('/Agencedevoyage/login');
    }

    private function validateRegistrationData($post, $files)
    {
        $errors = [];

        // Validation des champs
        $required = ['name', 'prenoms', 'email', 'date', 'phone', 'motdepasse', 'confirmemotdepasse'];
        foreach ($required as $field) {
            if (empty($post[$field])) {
                $errors[] = "Le champ {$field} est obligatoire.";
            }
        }

        // Validation mot de passe
        if (strlen($post['motdepasse']) < 4 || strlen($post['motdepasse']) > 8) {
            $errors[] = 'Le mot de passe doit contenir entre 4 et 8 caractères.';
        }

        if ($post['motdepasse'] !== $post['confirmemotdepasse']) {
            $errors[] = 'Les mots de passe ne correspondent pas.';
        }

        // Validation email
        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Format d\'email invalide.';
        }

        if ($this->userModel->emailExists($post['email'])) {
            $errors[] = 'Cet email est déjà enregistré.';
        }

        // Validation image
        $imageName = '';
        if (isset($files['image']) && $files['image']['error'] === 0) {
            $imageValidation = $this->validateImage($files['image']);
            if (!empty($imageValidation['errors'])) {
                $errors = array_merge($errors, $imageValidation['errors']);
            } else {
                $imageName = $imageValidation['filename'];
            }
        } else {
            $errors[] = "Une photo de profil est requise.";
        }

        return [
            'errors' => $errors,
            'userData' => [
                'nom' => htmlspecialchars($post['name']),
                'prenoms' => htmlspecialchars($post['prenoms']),
                'email' => $post['email'],
                'age' => $post['date'],
                'telephone' => htmlspecialchars($post['phone']),
                'motdepasse' => $post['motdepasse'],
                'image' => $imageName
            ]
        ];
    }

    private function validateImage($file)
    {
        $errors = [];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $maxSize = 2 * 1024 * 1024; // 2MB

        if (!in_array($file['type'], $allowedTypes)) {
            $errors[] = "Format d'image non supporté.";
        }

        if ($file['size'] > $maxSize) {
            $errors[] = "L'image ne doit pas dépasser 2MB.";
        }

        if (empty($errors)) {
            $filename = uniqid() . '_' . basename($file['name']);
            $uploadPath = 'uploads/' . $filename;

            if (!file_exists('uploads')) {
                mkdir('uploads', 0755, true);
            }

            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                return ['filename' => $filename, 'errors' => []];
            } else {
                $errors[] = "Erreur lors du téléchargement de l'image.";
            }
        }

        return ['errors' => $errors];
    }
}
