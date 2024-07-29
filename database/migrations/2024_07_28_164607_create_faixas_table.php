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
        Schema::create('faixas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('album_id');
            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('albuns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faixas');
    }
};
