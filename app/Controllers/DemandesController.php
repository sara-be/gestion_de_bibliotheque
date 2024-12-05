<?php
namespace App\Controllers;

use App\Models\EmpruntEnCoursModel;
use App\Models\UserModel;
use App\Models\BookModel;

class DemandesController extends BaseController
{
    public function index()
    {
        $empruntModel = new EmpruntEnCoursModel();
        $userModel = new UserModel();
        $bookModel = new BookModel();

        // Récupérer les emprunts avec le statut "pending" et joindre les informations sur les livres et les utilisateurs
        $emprunts = $empruntModel
            ->select('emprunt_en_cours.*, livres.title AS book_title, livres.photo AS book_photo, utilisateurs.name AS user_name, utilisateurs.email AS user_email')
            ->join('livres', 'livres.id = emprunt_en_cours.book_id')
            ->join('utilisateurs', 'utilisateurs.id = emprunt_en_cours.user_id')
            ->where('status', 'pending')
            ->findAll();

        return view('backend/pages/auth/demande', ['emprunts' => $emprunts]);
    }

    public function accepter($empruntId)
    {
        $empruntModel = new EmpruntEnCoursModel();
        $userModel = new UserModel();
        $bookModel = new BookModel();

        // Récupérer l'emprunt en cours
        $emprunt = $empruntModel->find($empruntId);
        if (!$emprunt || $emprunt['status'] !== 'pending') {
            return redirect()->to('/demandes')->with('error', 'Demande invalide ou déjà traitée.');
        }

        // Mettre à jour le statut de l'emprunt
        $empruntModel->update($empruntId, ['status' => 'accepted']);

        // Récupérer le livre associé à l'emprunt
        $book = $bookModel->find($emprunt['book_id']);
        if ($book['remaining_copies'] > 0) {
            // Décrémenter le nombre de livres restants
            $bookModel->update($book['id'], ['remaining_copies' => $book['remaining_copies'] - 1]);
        } else {
            return redirect()->to('/demandes')->with('error', 'Aucun livre restant disponible.');
        }

        // Mettre à jour l'utilisateur avec les informations d'emprunt
        $userModel->update($emprunt['user_id'], [
            'livre_id'      => $emprunt['book_id'],
            'debut_emprunt' => date('Y-m-d'), // Date actuelle
            'fin_emprunt'   => date('Y-m-d', strtotime('+7 days')) // Par exemple, emprunt de 7 jours
        ]);

        // Rediriger vers la liste des demandes avec un message de succès
        return redirect()->to('/demandes')->with('success', 'Demande acceptée et emprunt enregistré.');
    }

    public function refuser($empruntId)
{
    $empruntModel = new EmpruntEnCoursModel();
    $bookModel = new BookModel();

    // Récupérer l'emprunt en cours
    $emprunt = $empruntModel->find($empruntId);
    if (!$emprunt || $emprunt['status'] !== 'pending') {
        return redirect()->to('/demandes')->with('error', 'Demande invalide ou déjà traitée.');
    }

    // Mettre à jour le statut de l'emprunt
    $empruntModel->update($empruntId, ['status' => 'rejected']);

    // Récupérer le livre associé à l'emprunt
    $book = $bookModel->find($emprunt['book_id']);
    if ($book) {
        // Incrémenter le nombre de livres restants
        $bookModel->update($book['id'], ['remaining_copies' => $book['remaining_copies'] + 1]);
    }

    // Rediriger vers la liste des demandes avec un message de succès
    return redirect()->to('/demandes')->with('success', 'Demande refusée .');
}

}


