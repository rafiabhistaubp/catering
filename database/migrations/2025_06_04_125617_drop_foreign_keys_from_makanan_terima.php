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
    Schema::table('makanan_terima', function (Blueprint $table) {
        $table->dropForeign(['user_id']); // Drop foreign key for user_id
        $table->dropForeign(['pesanan_id']); // Drop foreign key for pesanan_id
    });
}

public function down()
{
    Schema::table('makanan_terima', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('pesanan_id')->references('id')->on('pesanan')->onDelete('cascade');
    });
}

};
