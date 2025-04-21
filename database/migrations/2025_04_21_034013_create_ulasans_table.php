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
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id();
            $table->string('isi_ulasan');
            $table->integer('rating');
            $table->date('tanggal');
            $table->foreignId('user_id')->nullable()->index('fk_ulasans_to_users');
            $table->foreignId('buku_id')->nullable()->index('fk_ulasans_to_bukus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasans');
    }
};
