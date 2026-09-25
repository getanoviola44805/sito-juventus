<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partite', function (Blueprint $table) {
            $table->id();
            $table->string('avversario');
            $table->dateTime('data');
            $table->boolean('in_casa')->default(true);
            $table->integer('gol_fatti')->nullable();
            $table->integer('gol_subiti')->nullable();
            $table->string('competizione');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partite');
    }
};