<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaAsetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna_aset', function (Blueprint $table) {
            $table->id(); // This creates an auto-incrementing primary key
            $table->string('nama_pengguna'); // This creates a VARCHAR(255) column
            $table->string('jabatan'); // This creates a VARCHAR(255) column
            $table->string('posisi_pengguna'); // This creates a VARCHAR(255) column
            $table->timestamps(); // This creates created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengguna_aset');
    }
}
