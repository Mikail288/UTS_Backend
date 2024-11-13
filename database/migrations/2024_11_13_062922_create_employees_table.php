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
        Schema::create('employees', function (Blueprint $table) {
            //membuat skema database dengan data sbeagai berikut
            $table->id();
            $table->string('name'); // Nama Pegawai
            $table->char('gender', 1); // Jenis Kelamin Pegawai
            $table->string('phone'); // No HP Pegawai
            $table->text('address'); // Alamat Pegawai
            $table->string('email')->unique(); // Email Pegawai (harus unik)
            $table->string('status'); // Status Pegawai
            $table->date('hired_on'); // Tanggal Masuk Kerja
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
