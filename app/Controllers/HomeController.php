<?php
namespace App\Controllers;

require_once('app/Core/Controller.php');

use App\Core\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $this->view('home/index', [
            'title' => 'Accueil - Airline Travel'
        ]);
    }

    public function destinations()
    {
        $this->view('home/destinations', [
            'title' => 'Destinations - Airline Travel'
        ]);
    }
    public function services()
    {
        $this->view('home/services', [
            'title' => 'Services - Airline Travel'
        ]);
    }
    public function about()
    {
        $this->view('home/about', [
            'title' => 'À propos - Airline Travel'
        ]);
    }
}
?>