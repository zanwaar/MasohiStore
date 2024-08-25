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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            // $table->string('owner_nama_lengkap');
            $table->string('owner_no_hp');
            // $table->string('owner_alamat_lengkap');
            // $table->string('owner_no_ktp');
            // $table->string('owner_ktp_file_url');
            $table->string('merchant_nama');
            $table->string('slug');
            $table->string('merchant_alamat');
            // $table->string('merchant_lokasi');
            $table->string('merchant_foto');
            $table->string('merchant_banner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};
