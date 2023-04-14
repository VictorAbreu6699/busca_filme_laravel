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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('category_id')->constrained('categories');
            $table->string('title');
            $table->string('english_title')->nullable();
            $table->date('released_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {            
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('movies');        
    }
};
