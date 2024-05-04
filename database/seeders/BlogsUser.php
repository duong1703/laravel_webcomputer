<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;
class BlogsUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs_models')->insert([
            'images' => '',
            'title' => 'test',
            'content' => 'test',
            'status' => 1,
        ]);
    }
}
