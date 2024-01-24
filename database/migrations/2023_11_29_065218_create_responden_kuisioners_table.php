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
        Schema::create('responden_kuisioners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identitas_kuisioner_id')->constrained('identitas_kuisioners')->onDelete('cascade');
            $table->foreignId('kuisioner_id')->constrained('kuisioners')->onDelete('cascade');
            $table->foreignId('jawaban_id')->constrained('jawabans')->onDelete('cascade');
            $table->string('keluhan') ->nullable();
            $table->string('skor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responden_kuisioners');
    }
};
