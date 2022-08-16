<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengaduan_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('pengaduan_id')->references('id')->on('pengaduan');
            $table->string('tanggapan');
            $table->unsignedBigInteger('petugas_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('petugas_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanggapan');
    }
};
