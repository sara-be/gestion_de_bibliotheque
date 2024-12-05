<?php
namespace App\Controllers;

use App\Models\EmpruntEnCoursModel;
use App\Models\BookModel;
use CodeIgniter\Database\Config;

class AccepterController extends BaseController
{
    public function index()
    {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = session()->get('user_id'); // Assurez-vous que l'ID de l'utilisateur est stocké dans la session

        // Requête pour récupérer les livres empruntés par l'utilisateur
        $db = Config::connect();
        $query = $db->table('utilisateurs')
                    ->select('livres.id, livres.title, livres.author, utilisateurs.debut_emprunt, utilisateurs.fin_emprunt')
                    ->join('livres', 'livres.id = utilisateurs.livre_id', 'left')
                    ->where('utilisateurs.id', $userId)
                    ->get();

        $livresEmpruntes = $query->getResultArray();

        // Passer les livres à la vue
        return view('accepter', [
            'livres' => $livresEmpruntes, 
            'userId' => $userId
        ]);
    }
}


