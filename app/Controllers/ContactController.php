<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Contact;

class ContactController extends Controller {
    private $contactModel;
    
    public function __construct() {
        parent::__construct();
        $this->contactModel = new Contact();
    }
    
    public function index() {
        $errors = [];
        $success = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->handleContactForm();
            $errors = $result['errors'];
            $success = $result['success'];
        }
        
        $this->view('contact/index', [
            'title' => 'Contact - Airline Travel',
            'errors' => $errors,
            'success' => $success
        ]);
    }
    
    private function handleContactForm() {
        session_start();
        $errors = [];
        $success = '';
        
        $data = [
            'nom' => htmlspecialchars(trim($_POST['name'] ?? '')),
            'email' => filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL),
            'message' => htmlspecialchars(trim($_POST['message'] ?? ''))
        ];
        
        // Validation
        if (empty($data['nom'])) {
            $errors[] = "Le nom est obligatoire.";
        }
        
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Veuillez entrer une adresse email valide.";
        }
        
        if (empty($data['message'])) {
            $errors[] = "Le message ne peut pas être vide.";
        }
        
        if (empty($errors)) {
            try {
                if ($this->contactModel->create($data)) {
                    $success = "Votre message a bien été envoyé. Nous vous contacterons bientôt!";
                    $_POST = []; // Reset form
                }
            } catch (\Exception $e) {
                $errors[] = "Une erreur est survenue lors de l'envoi du message.";
            }
        }
        
        return ['errors' => $errors, 'success' => $success];
    }
}
?>