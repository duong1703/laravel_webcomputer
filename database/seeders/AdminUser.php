<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('adminuser')->insert([
            'name' => 'admin',
            'email' => 'dduong1703@gmail.com',
            'status' => '1',
            'password' => Hash::make('Duonghk123@'),
        ]);
    }
}
