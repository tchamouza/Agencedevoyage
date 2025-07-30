<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Reservation;

class ReservationController extends Controller {
    private $reservationModel;
    
    public function __construct() {
        parent::__construct();
        $this->reservationModel = new Reservation();
    }
    
    public function index() {
        session_start();
        $this->requireAuth();
        $user = $_SESSION['user'];
        $userEmail = $user['email'];
        
        // Supprimer les réservations expirées
        $this->reservationModel->deleteExpired($userEmail);
        
        // Récupérer les réservations
        $reservations = $this->reservationModel->findByEmail($userEmail);
        
        $this->view('reservation/index', [
            'title' => 'Mes Réservations - Airline Travel',
            'reservations' => $reservations,
            'user' => $user
        ]);
    }
    
    public function create() {
        session_start();
        $this->requireAuth();
        
        $this->view('reservation/create', [
            'title' => 'Réservation - Airline Travel',
            'user' => $_SESSION['user']
        ]);
    }

    public function AnnulerReservation()
    {
        session_start();
        $this->requireAuth();
        $id=$_GET['id'];
        $errors=[];

        if ($id && is_numeric($id)) {
            $result=$this->reservationModel->deleteReservation($id);
            if ($result) {
                $_SESSION['success']="reservations annuler avec succes";
                $this->redirect('/Agencedevoyage/reservations');
            }else{
                $errors[] = 'echec de suppression de reservation';
            }
            
        } else {
            $errors[]='Reservation invalide';
        }
        $reservations = $this->reservationModel->findByEmail($userEmail);
        
        $this->view('reservation/index', [
            'title' => 'Mes Réservations - Airline Travel',
            'reservations' => $reservations,
            'user' => $user
        ]);              
    }
    
    public function store() {
        session_start();
        $this->requireAuth();
        
        $errors = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'numerodevol' => $this->reservationModel->generateFlightNumber(),
                'name' => htmlspecialchars($_POST['name']),
                'email' => htmlspecialchars($_POST['email']),
                'phone' => htmlspecialchars($_POST['phone']),
                'depart' => htmlspecialchars($_POST['departure']),
                'arrive' => htmlspecialchars($_POST['arrival']),
                'date' => $_POST['date'],
                'tarif' => htmlspecialchars($_POST['tarif'])
            ];
            
            // Validation
            $required = ['name', 'email', 'phone', 'depart', 'arrive', 'date', 'tarif'];
            foreach ($required as $field) {
                if (empty($data[$field])) {
                    $errors[] = "Le champ {$field} est obligatoire.";
                }
            }
            
            if (empty($errors)) {
                try {
                    if ($this->reservationModel->create($data)) {
                        $this->redirect('/Agencedevoyage/confirmation');
                    }
                } catch (\Exception $e) {
                    $errors[] = "Erreur lors de la réservation : " . $e->getMessage();
                }
            }
        }
        
        $this->view('reservation/create', [
            'title' => 'Réservation - Airline Travel',
            'user' => $_SESSION['user'],
            'errors' => $errors
        ]);
    }
    
    public function confirmation() {
        session_start();
        $this->requireAuth();
        $user = $_SESSION['user'];
        $userEmail = $user['email'];
        
        $reservation = $this->reservationModel->findLatestByEmail($_SESSION['user']['email']);
        
        if (!$reservation) {
            $this->redirect('/Agencedevoyage/reservation');
        }
        
        $this->view('reservation/confirmation', [
            'title' => 'Confirmation - Airline Travel',
            'reservation' => $reservation,
            'user' =>$user
        ]);
    }
}
?>