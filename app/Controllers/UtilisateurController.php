<?php
namespace App\Controllers;
use App\Models\BookModel;
use App\Models\UtilisateurModel;


class UtilisateurController extends BaseController
{

    //index
    public function index()
    {
        return view('Utilisateur/dashboard');
    }


    //inscription
    public function inscription()
    {
        return view('Utilisateur/inscription');
    }


    //acceuil
    public function acceuil()
    {
        $bookModel = new BookModel();
        $livresDisponibles = $bookModel->where('remaining_copies >', 1)->findAll();

        // Préfixer les chemins d'image avec le dossier public/uploads
        foreach ($livresDisponibles as &$livre) {
            if (!empty($livre['photo'])) {
                $livre['photo'] = base_url('uploads/' . $livre['photo']);
            }
        }

        return view('Utilisateur/acceuil', ['livresDisponibles' => $livresDisponibles]);
    }


    //livres empruntés
    public function livresEmpruntes()
    {
        $utilisateurModel = new UtilisateurModel();
        $bookModel  = new BookModel();

        $utilisateur = $utilisateurModel->find(4);

        if(!$utilisateur){
            return redirect()->to("/erreur")->with('erreur', 'Utilisateur Introuvable!');
        }
        $livre = null;
        if (!empty($utilisateur['livre_id'])) {
            $livre = $bookModel->find($utilisateur['livre_id']);
        }


        return view('Utilisateur/livresEmpruntes', [
            'utilisateur' => $utilisateur,
            'livre' => $livre,
        ]);
    }

    // get livres empruntes
    public function getEmpruntedBooks()
    {
        $utilisateurModel = new UtilisateurModel();
        $bookModel = new BookModel();

        // Récupérer les informations de l'utilisateur
        $utilisateur = $utilisateurModel->find(4);

        if (!$utilisateur) {
            return redirect()->to('/erreur')->with('error', 'Utilisateur introuvable.');
        }

        // Récupérer les détails du livre emprunté (par livre_id)
        $livre = null;
        if (!empty($utilisateur['livre_id'])) {
            $livre = $bookModel->find($utilisateur['livre_id']);
        }

        // Charger une vue pour afficher les livres empruntés
        return view('utilisateurs/emprunted_books', [
            'utilisateur' => $utilisateur,
            'livre' => $livre
        ]);
    }

    //profile
    public function profile($userId = 4)
    {
        $utilisateurModel = new UtilisateurModel();
        $utilisateur = $utilisateurModel->find($userId);
        return view('Utilisateur/profile',['utilisateur' => $utilisateur] );
    }

    public function addPendingBook($userId, $bookId)
    {
        $utilisateurModel = new UtilisateurModel();
        // Récupérer l'utilisateur
        $user = $utilisateurModel->find($userId);
        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur introuvable.');}
        // Ajouter un nouveau livre à la liste des livres en attente
        $livresEnAttente = !empty($user['livres_en_attente']) ? explode(',', $user['livres_en_attente']) : [];
        $livresEnAttente[] = $bookId; // ID du nouveau livre
        $livresEnAttente = array_unique($livresEnAttente); // Éviter les doublons
        // Sauvegarder dans la base de données
        $utilisateurModel->update($userId, ['livres_en_attente' => implode(',', $livresEnAttente)]);
        return redirect()->back()->with('success', 'Livre ajouté à la liste des livres en attente.');
    }

    public function showPendingBooks($userId = 4)
    {
        $utilisateurModel = new UtilisateurModel();
        $bookModel = new BookModel();
    
        // Récupérer l'utilisateur
        $utilisateur = $utilisateurModel->find($userId);
        if (!$utilisateur) {
            return redirect()->to('/erreur')->with('error', 'Utilisateur introuvable.');
        }
    
        // Récupérer les livres en attente
        $livresEnAttenteIds = !empty($utilisateur['livres_en_attente']) ? explode(',', $utilisateur['livres_en_attente']) : [];
        $livresEnAttente = [];
    
        // Récupérer les détails des livres en attente
        if (!empty($livresEnAttenteIds)) {
            $livresEnAttente = $bookModel->whereIn('id', $livresEnAttenteIds)->findAll();
        }
    
        // Charger une vue pour afficher les livres en attente
        return view('Utilisateur/livresEnAttente', [
            'livresEnAttente' => $livresEnAttente
        ]);
    }
    

    

    public function emprunterLivre()
    {
        $livreId = $this->request->getPost('livre_id');
        if (!$livreId) {
            return redirect()->back()->with('error', 'Aucun livre sélectionné.');
        }
    
        $utilisateurModel = new UtilisateurModel();
        $bookModel = new BookModel();

        // $userId = session()->get('user_id');
    
        // if (!$userId) {
        //     return redirect()->to('/login')->with('error', 'Veuillez vous connecter pour emprunter un livre.');
        // }
    
        $utilisateur = $utilisateurModel->find($userId=4);
        $livre = $bookModel->find($livreId);
    
        if (!$utilisateur || !$livre) {
            return redirect()->back()->with('error', 'Utilisateur ou livre introuvable.');
        }
    
        if ($livre['remaining_copies'] <= 0) {
            return redirect()->back()->with('error', 'Ce livre n\'est plus disponible.');
        }
    
        $livresEnAttente = !empty($utilisateur['livres_en_attente']) ? explode(',', $utilisateur['livres_en_attente']) : [];
        if (in_array($livreId, $livresEnAttente)) {
            return redirect()->back()->with('warning', 'Ce livre est déjà dans votre liste d\'attente.');
        }
    
        $livresEnAttente[] = $livreId;
        $utilisateurModel->update($userId, ['livres_en_attente' => implode(',', $livresEnAttente)]);
        $bookModel->update($livreId, ['remaining_copies' => $livre['remaining_copies'] - 1]);
    
        return redirect()->back()->with('success', 'Livre ajouté à la liste des livres en attente.');
    }
    
    
}
