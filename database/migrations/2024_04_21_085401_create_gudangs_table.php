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
        Schema::create('gudang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vendor_id')->constrained('vendor')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('rak_id')->constrained('rak')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('nomor_id')->constrained('nomor')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('baris_id')->constrained('baris')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('jumlah')->default(0)->nullable();
            $table->foreignId('satuan_id')->constrained('satuan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('info')->nullable();
            $table->timestamps(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gudang');
    }
};
