<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_reviews')->insert([
            'product_id' => 'test',
            'user_id' => 'test',
            'rating' => 'test',
            'comment' => 'test',
        ]);
    }
}
