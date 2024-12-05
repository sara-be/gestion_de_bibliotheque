<?php

namespace App\Controllers\Home;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->group('/', function ($routes) {
//     $routes->get('', 'Home::index');
// });


$routes->group('admin',static function($routes){
    $routes->group('',[], static function($routes){
     
    
          // Routes du tableau de bord et déconnexion
    $routes->get('dashboard', 'AdminController::index', ['as' => 'admin.dashboard']);
    $routes->get('admin/logout', 'AdminController::logout', ['as' => 'admin.logout']);

    // Routes des livres
    $routes->get('books', 'BookController::index', ['as' => 'books.index']);
    $routes->get('books/create', 'BookController::create', ['as' => 'books.create']);  // Afficher le formulaire
    $routes->post('books/store', 'BookController::store', ['as' => 'books.store']);    // Enregistrer le livre

    // Routes des catégories
    $routes->get('categories/create', 'CategoryController::create', ['as' => 'categories.create']);
    $routes->post('categories/store', 'CategoryController::store', ['as' => 'categories.store']);

    $routes->get('books/delete/(:num)', 'BookController::delete/$1', ['as' => 'books.delete']);

    $routes->get('books/edit/(:num)', 'BookController::edit/$1', ['as' => 'books.edit']); // Formulaire d'édition
    $routes->post('books/update/(:num)', 'BookController::update/$1', ['as' => 'books.update']); // Mise à jour du livre
    
    $routes->get('books/show/(:num)', 'BookController::show/$1', ['as' => 'books.show']);
   


    $routes->get('books/addUserForm/(:num)', 'BookController::addUserForm/$1', ['as' => 'books.addUserForm']);
    $routes->post('books/addUser', 'BookController::addUser', ['as' => 'books.addUser']);
    

    });
    

    $routes->group('', [],static function($routes){
       // $routes->view('example-auth', 'example-auth');
       $routes->get('login', 'AuthController::loginForm', ['as'=>'admin.login.form']);
       $routes->post('login', 'AuthController::loginHandler', ['as'=>'admin.login.handler']);
    });
    
});





// Routes utilisateur
// $routes->get('utilisateur/dashboard', 'UtilisateurController::index');
$routes->group('utilisateur', function($routes){
    $routes->get('acceuil','UtilisateurController::acceuil');
    $routes->get('inscription','UtilisateurController::inscription');
    $routes->get('connexion','UtilisateurController::connexion');
    $routes->get('profile','UtilisateurController::profile');
    $routes->get('livresEmpruntes','UtilisateurController::livresEmpruntes');
    $routes->get('livresEnAttente','UtilisateurController::showPendingBooks');
    $routes->post('emprunter', 'UtilisateurController::emprunterLivre');

});


    // $routes->get('utilisateur/acceuil', 'UtilisateurController::acceuil');
    // $routes->get('utilisateur/inscription', 'UtilisateurController::inscription');
    // $routes->get('utilisateur/connexion', 'UtilisateurController::connexion');
    // $routes->get('utilisateur/profile', 'UtilisateurController::profile');
    // $routes->get('utilisateur/livresEmpruntes', 'UtilisateurController::livresEmpruntes');
