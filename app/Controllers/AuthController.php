<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\CIAuth;
use App\Libraries\Hash;
use App\Models\Admin;

class AuthController extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function loginForm()
    {
       $data = [
           'pageTitle' => 'login',
           'validation' => null
       ];
       return view('backend/pages/auth/login', $data);
    }

    public function loginHandler()
    {
        $fieldType = filter_var($this->request->getVar('login_id'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $rules = [
            'login_id' => 'required',
            'password' => 'required|min_length[5]|max_length[45]'
        ];

        $errors = [
            'login_id' => [
                'required' => 'Le nom d\'utilisateur ou l\'email est requis.'
            ],
            'password' => [
                'required' => 'Le mot de passe est requis.',
                'min_length' => 'Le mot de passe doit contenir au moins 5 caractères.',
                'max_length' => 'Le mot de passe ne doit pas dépasser 45 caractères.'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            return view('backend/pages/auth/login', [
                'pageTitle' => 'login',
                'validation' => $this->validator
            ]);
        }

        // Récupérer l'utilisateur depuis la table admins
        $adminModel = new Admin();
        $admin = $adminModel->where($fieldType, $this->request->getVar('login_id'))->first();

        if ($admin) {
            // Vérifier le mot de passe haché
            $check_password = Hash::check($this->request->getVar('password'), $admin['password']);
            if ($check_password) {
                CIAuth::setCIAuth($admin); // Initialiser la session
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login.form')->with('fail', 'Mot de passe incorrect')->withInput();
            }
        } else {
            return redirect()->route('admin.login.form')->with('fail', 'Nom d\'utilisateur ou email non trouvé')->withInput();
        }
    }
}