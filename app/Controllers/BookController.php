<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;
use App\Models\UserModel;

class BookController extends BaseController

{
    public function index()
{
    $bookModel = new BookModel();
    
    // Nombre de livres par page
    $perPage = 3;

    // Récupérer les livres avec la pagination
    $books = $bookModel->paginate($perPage);
    
    // Récupérer l'objet pager
    $pager = $bookModel->pager;

    // Passer les livres et le pager à la vue
    return view('backend/pages/auth/books', [
        'books' => $books,
        'pager' => $pager
    ]);
}

    public function addUserForm($bookId)
    {
        return view('backend/pages/auth/add_user_form', ['bookId' => $bookId]);
    }
   
    public function addUser()
    {
        $userModel = new UserModel();
        $bookModel = new BookModel();
    
        // Récupérer les données du formulaire
        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'livre_id' => $this->request->getPost('book_id'),
        ];
    
        // Vérification si le nom d'utilisateur existe déjà
        if ($userModel->where('username', $data['username'])->first()) {
            return redirect()->back()->with('error', 'Le nom d\'utilisateur existe déjà.');
        }
    
        // Calculer la date de début (date actuelle)
        $startDate = date('Y-m-d'); // Date actuelle
        // Calculer la date de fin (10 jours après la date actuelle)
        $endDate = date('Y-m-d', strtotime('+10 days')); // 10 jours après
    
        // Ajouter les dates de début et de fin aux données de l'utilisateur
        $data['debut_emprunt'] = $startDate;  // Utiliser 'debut_emprunt' au lieu de 'start_date'
        $data['fin_emprunt'] = $endDate;      // Utiliser 'fin_emprunt' au lieu de 'end_date'
    
        // Récupérer l'ID du livre
        $bookId = $data['livre_id'];
    
        // Récupérer les informations du livre pour décrémenter les copies restantes
        $book = $bookModel->find($bookId);
        if ($book && $book['remaining_copies'] > 0) {
            // Décrémenter le nombre de copies restantes
            $bookModel->update($bookId, [
                'remaining_copies' => $book['remaining_copies'] - 1
            ]);
    
            // Insérer l'utilisateur dans la base de données
            if ($userModel->insert($data)) {
                return redirect()->to(route_to('books.show', $bookId))
                    ->with('success', 'Utilisateur ajouté avec succès!');
            } else {
                return redirect()->back()->with('error', 'Erreur lors de l\'ajout de l\'utilisateur.');
            }
        } else {
            return redirect()->back()->with('error', 'Aucune copie disponible pour ce livre.');
        }
    }
    

    

    public function create()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        return view('backend/pages/auth/createBooks', ['categories' => $categories]);
    }

    public function store()
    {
        $bookModel = new BookModel();

        // Gestion de l'upload de la photo
        $photo = $this->request->getFile('photo');
        $photoName = $photo->getRandomName();

        if (!$photo->isValid() || $photo->hasMoved()) {
            return redirect()->route('books.create')->with('error', 'Erreur lors de l\'upload de la photo.');
        }

        $photo->move(FCPATH . 'uploads', $photoName);

        // Enregistrement des données du livre
        $bookData = [
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'nombre_livre' => $this->request->getPost('nombre_livre'),
            'remaining_copies' => $this->request->getPost('nombre_livre'), // Initialisation avec nombre_livre
            'year' => $this->request->getPost('year'),
            'categorie_id' => $this->request->getPost('categorie'),
            'description' => $this->request->getPost('description'),
            'photo' => $photoName,
        ];

        $bookModel->save($bookData);
// Après avoir ajouté un livre avec succès

     
        return redirect()->route('books.index')->with('success', 'Livre ajouté avec succès');
    }

    public function delete($id)
    {
        $bookModel = new BookModel();
        $book = $bookModel->find($id);

        if ($book) {
            if (file_exists('uploads/' . $book['photo'])) {
                unlink('uploads/' . $book['photo']);
            }

            $bookModel->delete($id);
            session()->setFlashdata('success', 'Le livre a été supprimé avec succès.');
        } else {
            session()->setFlashdata('error', 'Livre introuvable.');
        }

        return redirect()->to('/admin/books');
    }

    public function edit($id)
    {
        $bookModel = new BookModel();
        $categoryModel = new CategoryModel();

        $book = $bookModel->find($id);
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Livre introuvable.');
        }

        $categories = $categoryModel->findAll();

        return view('backend/pages/auth/editBook', [
            'book' => $book,
            'categories' => $categories,
        ]);
    }

    public function update($id)
    {
        $bookModel = new BookModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required|min_length[3]',
            'author' => 'required|min_length[3]',
            'year' => 'required|numeric',
            'categorie' => 'required',
            'description' => 'permit_empty',
            'photo' => 'if_exist|uploaded[photo]|is_image[photo]|max_size[photo,1024]|mime_in[photo,image/jpg,image/jpeg,image/png]',
            'nombre_livre' => 'required|numeric|min_length[1]',
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->back()->withInput()->with('error', 'Les données sont invalides.');
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'nombre_livre' => $this->request->getPost('nombre_livre'),
            'remaining_copies' => $this->request->getPost('nombre_livre'), // Synchroniser avec nombre_livre
            'year' => $this->request->getPost('year'),
            'categorie_id' => $this->request->getPost('categorie'),
            'description' => $this->request->getPost('description'),
        ];

        $photo = $this->request->getFile('photo');
        if ($photo->isValid() && !$photo->hasMoved()) {
            $existingBook = $bookModel->find($id);
            if ($existingBook && file_exists('uploads/' . $existingBook['photo'])) {
                unlink('uploads/' . $existingBook['photo']);
            }

            $photoName = $photo->getRandomName();
            $photo->move(FCPATH . 'uploads', $photoName);
            $data['photo'] = $photoName;
        }

        $bookModel->update($id, $data);

        session()->setFlashdata('success', 'Livre mis à jour avec succès.');
        return redirect()->route('books.index');
    }

    public function show($id)
    {
        $bookModel = new BookModel();
        $categoryModel = new CategoryModel();
        $userModel = new UserModel();

        $book = $bookModel->find($id);

        if (!$book) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Livre non trouvé');
        }

        $category = $categoryModel->find($book['categorie_id']);
        $users = $userModel->where('livre_id', $id)->findAll();

        return view('backend/pages/auth/show', [
            'book' => $book,
            'category' => $category,
            'users' => $users,
        ]);
    }


    public function removeUser()
    {
        $userId = $this->request->getPost('user_id');
        $bookId = $this->request->getPost('book_id');
    
        if (!$userId || !$bookId) {
            return redirect()->back()->with('error', 'Données invalides.');
        }
    
        $userModel = new UserModel();
        $bookModel = new BookModel();
    
        // Vérifier si l'utilisateur est lié au livre
        $user = $userModel->find($userId);
        if (!$user || $user['livre_id'] != $bookId) {
            return redirect()->back()->with('error', "L'utilisateur n'est pas lié à ce livre.");
        }
    
        // Mettre `livre_id`, `debut_emprunt` et `fin_emprunt` à NULL pour l'utilisateur
        $userModel->update($userId, [
            'livre_id' => null,
            'debut_emprunt' => null,  // Remettre à NULL la date de début
            'fin_emprunt' => null     // Remettre à NULL la date de fin
        ]);
    
        // Incrémenter `remaining_copies` pour le livre
        $book = $bookModel->find($bookId);
        if ($book) {
            $bookModel->update($bookId, ['remaining_copies' => $book['remaining_copies'] + 1]);
        }
    
        // Ajouter un message de confirmation et rediriger
        return redirect()->route('books.show', [$bookId])->with('message', "L'utilisateur a été supprimé avec succès de la liste des emprunteurs.");
    }
    
public function retard()
{
    // Charger le modèle utilisateur
    $userModel = new \App\Models\UserModel();

    // Récupérer les données nécessaires avec une jointure sur le modèle des livres
    $currentDate = date('Y-m-d');
    $usersWithLateReturns = $userModel
        ->select('utilisateurs.username, utilisateurs.email, utilisateurs.debut_emprunt, utilisateurs.fin_emprunt, livres.title AS book_title, DATEDIFF(NOW(), utilisateurs.fin_emprunt) AS days_late')
        ->join('livres', 'livres.id = utilisateurs.livre_id')
        ->where('utilisateurs.fin_emprunt <', $currentDate) // Seulement les utilisateurs en retard
        ->findAll();

    // Passer les données à la vue
    return view('backend/pages/auth/retard', [
        'lateUsers' => $usersWithLateReturns
    ]);
}



}
