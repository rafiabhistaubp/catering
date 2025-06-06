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
        Schema::create('makanan_terima', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->unsignedBigInteger('pesanan_id'); // Make sure it's unsignedBigInteger
            $table->foreign('pesanan_id')->references('id')->on('pesanan')->onDelete('cascade'); // Foreign key to pesanan table
            $table->integer('porsi_terima');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('makanan_terima');
    }
};
