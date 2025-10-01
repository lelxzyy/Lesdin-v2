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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('nis')->unique();
            $table->string('nisn')->unique();
            $table->foreignId('jurusan_id')->constrained('jurusans')->cascadeOnDelete();
            $table->string('tempat_tanggal_lahir');
            $table->string('kontak')->nullable();
            $table->text('alamat')->nullable();
            $table->enum('gender', ['Laki-Laki', 'Perempuan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
