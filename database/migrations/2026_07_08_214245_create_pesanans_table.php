<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('kode_pesanan')->unique();

            $table->date('tanggal');

            $table->decimal('total_harga',12,2);

            $table->enum('status',[
                'Menunggu',
                'Diproses',
                'Selesai'
            ])->default('Menunggu');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
