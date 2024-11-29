<?php
// app/Controllers/AdminController.php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Admin;
use App\Models\UserModel;
use App\Models\BookModel;

class AdminController extends Controller
{
    public function index()
    {
        // Charger le modèle des utilisateurs
        $userModel = new UserModel();
        
        // Compter le nombre total d'utilisateurs
        $userCount = $userModel->countAll();
        
        // Charger le modèle des livres
        $bookModel = new BookModel();
        
        // Compter le nombre total de livres
        $bookCount = $bookModel->countAll();
    
        // Récupérer le nombre d'utilisateurs par mois
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT 
                MONTHNAME(created_at) as month_name,
                MONTH(created_at) as month_number,
                COUNT(id) as user_count
            FROM utilisateurs
            WHERE YEAR(created_at) = YEAR(CURDATE()) -- Limiter aux utilisateurs de l'année en cours
            GROUP BY month_number, month_name
            ORDER BY month_number
        ");
    
        $results = $query->getResultArray();
    
        // Générer un tableau de mois avec des valeurs par défaut (0 utilisateurs)
        $months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        $userCounts = array_fill(0, 12, 0); // Tableau initialisé à 0 pour chaque mois
    
        foreach ($results as $row) {
            $index = array_search($row['month_name'], $months);
            if ($index !== false) {
                $userCounts[$index] = $row['user_count'];
            }
        }
    
        // Passer les données à la vue
        return view('backend/pages/auth/dashboard', [
            'userCount' => $userCount,
            'bookCount' => $bookCount,
            'months' => $months,
            'userCounts' => $userCounts,
        ]);
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