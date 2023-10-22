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
        Schema::create('siasn_referensi_golongan', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama')->nullable();
            $table->string('nama_pangkat')->nullable();
            $table->string('fungsi_kredit_utama')->nullable();
            $table->string('fungsi_kredit_tambahan')->nullable();
            $table->string('fungsi_kredit_total')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_referensi_golongan');
    }
};
