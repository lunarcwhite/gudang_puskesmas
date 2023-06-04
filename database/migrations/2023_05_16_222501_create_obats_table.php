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
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat')->unique();
            $table->float('harga_obat');
            $table->bigInteger('kategori_id')->unsigned();
            // $table->string('photo_barang')->nullable();
            $table->date('expired_obat');
            $table->integer('stok_obat');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategoris')
            ->onDelete('restrict')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
