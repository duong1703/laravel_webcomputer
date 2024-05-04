<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    use HasFactory;

    protected $table = "adminuser";

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'status', 'email', 'password'];
}
