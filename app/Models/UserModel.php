<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'username', 'email', 'password', 'livre_id', 'created_at', 'modified_at', 'debut_emprunt', 'fin_emprunt'];
    
    protected $useTimestamps = true; // Activer la gestion des timestamps
    protected $createdField = 'created_at'; // Colonne pour l'enregistrement
    protected $updatedField = 'modified_at'; // Colonne pour la mise à jour
}