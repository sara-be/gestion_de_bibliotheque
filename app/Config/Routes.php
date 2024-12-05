<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('dashboard', 'UserController::dashboard');  // Route pour afficher le tableau de bord
$routes->post('register', 'UserController::register');    // Route pour traiter l'inscription de l'utilisateur
$routes->post('logout', 'UserController::logout');  // Route pour la déconnexion

$routes->get('login', 'UserController::login'); // Affiche le formulaire de connexion
$routes->post('authenticate', 'UserController::authenticate'); // Soumet le formulaire de connexion


$routes->get('book/details/(:num)', 'UserController::details/$1', ['as' => 'book.details']);
$routes->get('book/borrow/(:num)', 'UserController::borrowBook/$1');

$routes->get('user/en_attente', 'UserController::enAttente');

$routes->post('demandes/accepter/(:num)', 'DemandesController::accepter/$1');
$routes->get('demandes', 'DemandesController::index', ['as' => 'demandes.index']);
$routes->post('demandes/refuser/(:num)', 'DemandesController::refuser/$1');

$routes->get('accepter', 'AccepterController::index', ['as' => 'accepter']);



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

    $routes->post('books/removeUser', 'BookController::removeUser', ['as' => 'books.removeUser']);

    $routes->get('books/retard', 'BookController::retard', ['as' => 'books.retard']);

  

 
 




    });
    

    $routes->group('', [],static function($routes){
       // $routes->view('example-auth', 'example-auth');
       $routes->get('login', 'AuthController::loginForm', ['as'=>'admin.login.form']);
       $routes->post('login', 'AuthController::loginHandler', ['as'=>'admin.login.handler']);
    });
    
});




