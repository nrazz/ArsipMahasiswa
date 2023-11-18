<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->string('kategori');
            $table->string('judul');
            $table->timestamp('waktu_pengarsipan')->useCurrent();
            $table->string('file_surat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
