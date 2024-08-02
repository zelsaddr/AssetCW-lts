<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset', function (Blueprint $table) {
            $table->id(); // Membuat kolom id sebagai auto-incrementing primary key
            $table->string('nomor_invoice')->nullable(); // Kolom nomor_invoice bersifat nullable
            $table->foreignId('barang_id')->constrained('barang')->onDelete('cascade'); // Merujuk ke tabel barang
            $table->integer('identitas_barang')->nullable(); // Kolom identitas_barang bersifat nullable
            $table->date('tanggal_barang_datang'); // Kolom tanggal_barang_datang
            $table->string('foto_barang_path'); // Kolom foto_barang_path
            $table->foreignId('pengguna_id')->constrained('pengguna_aset')->onDelete('cascade'); // Merujuk ke tabel pengguna_aset
            $table->foreignId('satuan_id')->constrained('satuan')->onDelete('cascade'); // Merujuk ke tabel satuan
            $table->string('kondisi'); // Kolom kondisi
            $table->foreignId('lokasi_aset_id')->constrained('lokasi_aset')->onDelete('cascade'); // Merujuk ke tabel lokasi_aset
            $table->bigInteger('nilai_perolehan'); // Kolom nilai_perolehan bertipe BIGINT
            $table->text('keterangan')->nullable(); // Kolom keterangan bersifat nullable
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aset');
    }
}
