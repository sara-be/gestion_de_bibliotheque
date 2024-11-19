<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'livres';  // Table associée
    protected $primaryKey = 'id';  // Clé primaire
    protected $allowedFields = [
        'title',
        'author',
        'nombre_livre', // Champ ajouté
        'remaining_copies',
        'year',
        'categorie_id',
        'description',
        'photo'
    ];
}
