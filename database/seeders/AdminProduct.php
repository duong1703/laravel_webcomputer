<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class AdminProduct extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_products')->insert([
            'images'=> '1',
            'name'=> '1', 
            'price'=> '1', 
            'description'=> '1',
            'category'=> '1', 
            'amount'=> '1', 
            'status'=> '1'
        ]);
    }
}
