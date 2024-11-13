<?php
// app/Controllers/AdminController.php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend/pages/auth/dashboard');

    }
    public function logout()
    {
        // Supprimer les données de session
        session()->remove(['admin_id', 'admin_username', 'is_logged_in']);

        // Optionnel : détruire complètement la session
        session()->destroy();

        // Rediriger vers la page de connexion
        return redirect()->route('admin.login.form');
    }

   

   

   
}