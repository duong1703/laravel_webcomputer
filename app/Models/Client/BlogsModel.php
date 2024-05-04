<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogsModel extends Model
{
    use HasFactory;

    protected $table = "blogs_models";

    protected $primaryKey = 'id';

    protected $allowedFields = ['images', 'title', 'content ', 'status'];
}
