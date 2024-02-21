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
        Schema::create('siasn_referensi_ref_dokumen', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('layananId', 42)->nullable();
            $table->string('layananNama')->nullable();
            $table->string('subLayananId', 42)->nullable();
            $table->string('subLayananNama')->nullable();
            $table->string('detailLayananId', 42)->nullable();
            $table->string('detailLayananNama')->nullable();
            $table->string('document')->nullable();
            $table->string('jenisDokumen')->nullable();
            $table->string('fileType')->nullable();
            $table->string('linkProses')->nullable();
            $table->string('mandatory')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_referensi_ref_dokumen');
    }
};