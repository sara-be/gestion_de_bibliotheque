<?php

// app/Models/User.php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'username', 'email', 'password', 'created_at', 'modified_at'];
}
