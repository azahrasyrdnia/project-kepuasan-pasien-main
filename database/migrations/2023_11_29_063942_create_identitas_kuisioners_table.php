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
        Schema::create('identitas_kuisioners', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('no_telepon');
            $table->string('jenis_rawat');
            $table->string('jenis_tanggungan');
            $table->string('selesai_kuisioner')->default('belum');
            $table->string('total_skor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identitas_kuisioners');
    }
};
