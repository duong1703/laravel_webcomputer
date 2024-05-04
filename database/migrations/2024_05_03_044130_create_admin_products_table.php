<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('images')->nullable();
            $table->string('name');
            $table->string('price');
            $table->string('description');
            $table->string('category');
            $table->string('amount');
            $table->string('status')->default('1')->comment('Trạng thái sản phẩm 1 là show 0 ngược lai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_products');
    }
};
