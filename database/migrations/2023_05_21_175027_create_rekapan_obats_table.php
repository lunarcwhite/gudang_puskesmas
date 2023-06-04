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
        Schema::create('rekapan_obats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('obat_id')->unsigned();
            $table->integer('jumlah');
            $table->char('status',1)->default('1');
            $table->timestamps();

            $table->foreign('obat_id')->references('id')->on('obats')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekapan_obats');
    }
};
