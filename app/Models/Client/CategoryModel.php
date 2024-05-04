<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Admin\AdminProduct;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    public static function uniqueCategories()
    {
        return static::select('category')->distinct()->pluck('category');
    }
}
