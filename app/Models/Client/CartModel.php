<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;

    
    protected $table = "cart_models";

    protected $primaryKey = 'id';

    protected $allowedFields = ['quantity', 'productId', 'UserId '];
}
