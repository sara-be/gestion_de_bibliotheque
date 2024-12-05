<?php 
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BookModel;
use App\Models\EmpruntEnCoursModel;
use CodeIgniter\Controller;



class UserController extends BaseController
{
    public function register()
    {
        // Récupérer les données du formulaire
        $name = $this->request->getPost('nname');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $passwordConfirm = $this->request->getPost('password_confirm');

        // Validation des données
        if ($password !== $passwordConfirm) {
            return redirect()->back()->with('error', 'Les mots de passe ne correspondent pas.');
        }

        // Vérifier si l'utilisateur existe déjà
        $userModel = new UserModel();
        if ($userModel->where('email', $email)->first()) {
            return redirect()->back()->with('error', 'Cet email est déjà utilisé.');
        }

        // Hachage du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Créer l'utilisateur
        $userData = [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword
        ];

        // Insérer l'utilisateur dans la base de données
        if ($userModel->insert($userData)) {
            // Enregistrer un message de succès dans la session
            session()->setFlashdata('message', 'Inscription réussie ! Bienvenue sur votre tableau de bord.');
            return redirect()->to('/dashboard');
        } else {
            // Gérer l'erreur en cas d'échec
            return redirect()->back()->with('error', 'Une erreur s\'est produite, veuillez réessayer.');
        }
    }

    // Optionnel: Méthode pour afficher le tableau de bord
    public function dashboard()
    {
        // Charger le modèle BookModel pour récupérer les livres
        $bookModel = new BookModel();

        // Récupérer les livres, vous pouvez ajuster la requête en fonction de vos besoins
        $books = $bookModel->findAll();

        // Passer les livres à la vue du tableau de bord
        return view('dashboard', ['books' => $books]);
    }
    public function logout()
    {
        // Supprimer la session de l'utilisateur
        session()->destroy();  // Cela détruira toutes les données de session

        // Rediriger vers la page d'accueil (localhost:8080)
        return redirect()->to('http://localhost:8080');  // Redirige vers la page d'accueil
    }

    public function authenticate()
    {
        // Récupérer les données du formulaire
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Charger le modèle UserModel
        $userModel = new UserModel();

        // Vérifier si l'email existe dans la base de données
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email ou mot de passe incorrect');
        }

        // Vérifier si le mot de passe correspond
        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Email ou mot de passe incorrect');
        }

        // Si l'authentification est réussie, enregistrer l'utilisateur dans la session
        session()->set('user_id', $user['id']);
        session()->set('user_name', $user['name']);
        session()->set('user_email', $user['email']);

        // Rediriger vers le tableau de bord (par exemple)
        return redirect()->to('/dashboard');
    }

    public function details($id)
    {
        $bookModel = new BookModel();
        $book = $bookModel->find($id); // Récupérer les détails du livre par ID

        if (!$book) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Livre non trouvé");
        }

        // Passer les détails du livre à la vue
        return view('details', ['book' => $book]);
    }

    public function borrowBook($bookId)
    {
        // Récupérer l'ID de l'utilisateur depuis la session
        $session = session();
        $userId = $session->get('user_id');  // ID de l'utilisateur connecté
    
        if (!$userId) {
            // Si l'utilisateur n'est pas connecté, renvoyer une erreur
            return $this->response->setJSON(['error' => 'Vous devez être connecté pour emprunter un livre.']);
        }
    
        // Récupérer les détails du livre
        $bookModel = new BookModel();
        $book = $bookModel->find($bookId);
    
        if (!$book) {
            // Si le livre n'existe pas, renvoyer une erreur
            return $this->response->setJSON(['error' => 'Livre non trouvé.']);
        }
    
        // Vérifier si une demande d'emprunt est déjà en cours
        $empruntEnCoursModel = new EmpruntEnCoursModel();
        $existingBorrow = $empruntEnCoursModel->where('user_id', $userId)
                                             ->where('book_id', $bookId)
                                             ->where('status', 'pending')
                                             ->first();
    
        if ($existingBorrow) {
            // Si une demande est déjà en cours, renvoyer une réponse d'erreur
            return $this->response->setJSON(['error' => 'Vous avez déjà une demande en cours pour ce livre.']);
        }
    
        // Ajouter la demande d'emprunt
        $data = [
            'user_id' => $userId,
            'book_id' => $bookId,
            'status'  => 'pending',  // Demande en attente
        ];
    
        if ($empruntEnCoursModel->save($data)) {
            // Si la demande est enregistrée avec succès
            return $this->response->setJSON(['success' => 'Demande d\'emprunt envoyée avec succès.']);
        } else {
            // Si une erreur se produit
            return $this->response->setJSON(['error' => 'Une erreur est survenue, veuillez réessayer.']);
        }
    }
    
    

    public function updateBorrowStatus($id, $status)
    {
        // Validation du statut avant mise à jour
        if (!in_array($status, ['accepted', 'rejected'])) {
            return redirect()->to('/admin/emprunts')->with('error', 'Statut invalide.');
        }

        $empruntEnCoursModel = new EmpruntEnCoursModel();

        // Mettre à jour le statut de la demande d'emprunt
        $data = ['status' => $status];

        if ($empruntEnCoursModel->update($id, $data)) {
            return redirect()->to('/admin/emprunts')->with('message', 'Statut mis à jour avec succès.');
        } else {
            return redirect()->to('/admin/emprunts')->with('error', 'Erreur lors de la mise à jour du statut.');
        }
    }

    public function enAttente()
    {
        $session = session();
        $userId = $session->get('user_id'); // ID de l'utilisateur connecté
    
        // Récupérer les emprunts en attente avec les informations du livre
        $empruntEnCoursModel = new EmpruntEnCoursModel();
        $empruntsEnAttente = $empruntEnCoursModel
            ->select('emprunt_en_cours.*, livres.photo, livres.title, livres.author') // Utilisation correcte des noms de tables
            ->join('livres', 'livres.id = emprunt_en_cours.book_id') // Jointure avec la table livres
            ->where('emprunt_en_cours.user_id', $userId)
            ->where('emprunt_en_cours.status', 'pending')
            ->findAll();
    
        // Passer les emprunts et les livres associés à la vue
        return view('en_attente', ['borrowedBooks' => $empruntsEnAttente]);
    }
    
    
    
}

?>