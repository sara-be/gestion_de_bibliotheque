<?php 
namespace App\Controllers;

use App\Models\UserModel;
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
        return view('dashboard');  // Charge la vue du tableau de bord
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
}

?>