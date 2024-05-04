<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBlogs extends Model
{
    use HasFactory;

    protected $table = "blogs_models";

    protected $primaryKey = 'id';

    protected $allowedFields = ['images', 'title', 'content ', 'status'];
}
