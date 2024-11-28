<?php
namespace App\Models;

use CodeIgniter\Model;

class UtilisateurModel extends Model
{
    // Nom de la table
    protected $table = 'utilisateurs';

    // Clé primaire
    protected $primaryKey = 'id';

    // Champs modifiables
    protected $allowedFields = [
        'name',
        'username',
        'email',
        'password',
        'livre_id',
        'created_at',
        'modified_at',
        'debut_emprunt',
        'fin_emprunt',
        'livres_en_attente' 
    ];

    // Activation des horodatages automatiques
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'modified_at';

    // Validation (optionnel)
    protected $validationRules = [
        'name'      => 'required|string|max_length[255]',
        'username'  => 'required|string|max_length[255]|is_unique[utilisateurs.username,id,{id}]',
        'email'     => 'required|valid_email|is_unique[utilisateurs.email,id,{id}]',
        'password'  => 'required|min_length[8]',
    ];
    protected $validationMessages = [
        'username' => [
            'is_unique' => 'Ce nom d\'utilisateur existe déjà.',
        ],
        'email' => [
            'is_unique' => 'Cet email est déjà utilisé.',
        ],
        'password' => [
            'min_length' => 'Le mot de passe doit contenir au moins 8 caractères.',
        ],
    ];

    // Règles d'assainissement des données (optionnel)
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    /**
     * Hacher le mot de passe avant d'insérer ou de mettre à jour
     */
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    /**
     * Fonction pour récupérer les informations des utilisateurs avec les détails du livre emprunté
     */
    public function getUsersWithBooks()
    {
        return $this->select('utilisateurs.*, livres.title AS livre_titre')
                    ->join('livres', 'livres.id = utilisateurs.livre_id', 'left')
                    ->findAll();
    }
}
