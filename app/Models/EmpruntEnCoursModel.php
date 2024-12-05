<?php
namespace App\Models;

use CodeIgniter\Model;

class EmpruntEnCoursModel extends Model
{
    protected $table      = 'emprunt_en_cours';   // Nom de la table
    protected $primaryKey = 'id';                  // Clé primaire
    protected $allowedFields = ['user_id', 'book_id', 'borrow_date', 'status'];  // Champs autorisés pour l'insertion et la mise à jour
    protected $useTimestamps = true;               // Activer les timestamps (création et mise à jour automatique)
    
    // Définir les règles de validation pour les champs
    protected $validationRules = [
        'user_id'   => 'required|integer',
        'book_id'   => 'required|integer',
        'status'    => 'in_list[pending,accepted,rejected]',
    ];
    
    // Définir les messages de validation personnalisés si nécessaire
    protected $validationMessages = [
        'user_id' => [
            'required' => 'L\'ID de l\'utilisateur est requis.',
            'integer'  => 'L\'ID de l\'utilisateur doit être un entier.',
        ],
        'book_id' => [
            'required' => 'L\'ID du livre est requis.',
            'integer'  => 'L\'ID du livre doit être un entier.',
        ],
        'status' => [
            'in_list'  => 'Le statut doit être l\'un des suivants : pending, accepted, rejected.',
        ],
    ];
}
