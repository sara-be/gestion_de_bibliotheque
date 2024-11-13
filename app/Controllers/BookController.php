<?php

namespace App\Controllers;
use App\Models\BookModel;
use App\Models\CategoryModel;


class BookController extends BaseController
{
    public function index()
    {
        // Retourner directement la vue sans passer de données
        return view('backend/pages/auth/books');
    }
    public function create()
    {
        // Charger les catégories depuis la base de données
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll(); // Récupère toutes les catégories

        // Passer les catégories à la vue
        return view('backend/pages/auth/createBooks', ['categories' => $categories]);
    }
    public function store()
    {
        $bookModel = new BookModel();
    
        // Gestion de l'upload de la photo
        $photo = $this->request->getFile('photo');
        $photoName = $photo->getRandomName();
    
        // Vérifier si la photo est valide
        if (!$photo->isValid() || $photo->hasMoved()) {
            // Ajouter un message d'erreur si l'upload échoue
            return redirect()->route('books.create')->with('error', 'Erreur lors de l\'upload de la photo.');
        }
    
        // Enregistrement du fichier
        $photo->move(WRITEPATH . 'uploads', $photoName);
    
        // Enregistrement des données du livre
        $bookModel->save([
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'year' => $this->request->getPost('year'),
            'categorie_id' => $this->request->getPost('categorie'), // Associe l'ID de la catégorie
            'description' => $this->request->getPost('description'),
            'photo' => $photoName,
        ]);
    
        // Redirection avec un message de succès
        return redirect()->route('books.create')->with('success', 'Livre ajouté avec succès');
    }
    
}
