<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


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




    });
    

    $routes->group('', [],static function($routes){
       // $routes->view('example-auth', 'example-auth');
       $routes->get('login', 'AuthController::loginForm', ['as'=>'admin.login.form']);
       $routes->post('login', 'AuthController::loginHandler', ['as'=>'admin.login.handler']);
    });
    
});




