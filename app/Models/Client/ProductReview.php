<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\AdminProduct;
use User;

class ProductReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'comment',
    ];

    public function product()
    {
        return $this->belongsTo(AdminProduct::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
