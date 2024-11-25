<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->date('date');
            $table->enum('status', ['Hadir', 'Izin', 'Alpha']);
            $table->timestamps();

            // Menambahkan unique constraint untuk mencegah duplikasi absensi
            $table->unique(['siswa_id', 'date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('absens');
    }
};