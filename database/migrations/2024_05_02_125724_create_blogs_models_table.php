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
        Schema::create('blogs_models', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('images')->nullable();
            $table->string('title');
            $table->string('content');
            $table->string('status')->default('1')->comment('Trạng thái bài viết 1 là show 0 ngược lai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs_models');
    }
};
