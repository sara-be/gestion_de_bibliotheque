<?php
namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function create()
    {
        return view('backend/pages/auth/createCategory'); // Assurez-vous que le chemin de la vue est correct.
    }
    public function store()
    {
        try {
            $categoryModel = new CategoryModel();
    
            // Récupérer les données du formulaire
            $categoryName = $this->request->getPost('categoryName');
    
            // Validation basique
            if (empty($categoryName)) {
                return redirect()->back()->with('error', 'Le nom de la catégorie est requis.');
            }
    
            // Insertion dans la base de données
            $categoryModel->insert([
                'category_name' => $categoryName,
            ]);
    
            // Redirection avec message de succès
            return redirect()->to(route_to('books.index'))->with('success', 'Catégorie ajoutée avec succès.');
       
        } catch (\Exception $e) {
            // En cas d'exception, logguer l'erreur
            log_message('error', 'Erreur dans store() : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue.');

        }
    }
    
    
}
