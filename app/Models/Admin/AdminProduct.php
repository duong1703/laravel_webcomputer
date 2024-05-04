<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProduct extends Model
{
    use HasFactory;
    protected $table = "admin_products";

    protected $primaryKey = 'id';

    protected $allowedFields = ['images','name', 'price', 'description ', 'category', 'amount', 'status'];
}
