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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('jenis_rawat');
            $table->foreignId('bagian_id')->constrained('bagians')->onDelete('cascade');
            $table->foreignId('indek_id')->constrained('indeks')->onDelete('cascade');
            $table->string('saran_kritik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
