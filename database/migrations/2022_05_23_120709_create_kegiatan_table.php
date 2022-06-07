<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->uuid('kegiatan_id')->primary();
            $table->longText('nama_kegiatan')->nullable();
            $table->date('tanggal')->nullable();
            $table->text('jam_masuk')->nullable();
            $table->text('jam_keluar')->nullable();
            $table->integer('kuota')->nullable();
            $table->text('lokasi')->nullable();
            $table->text('long_lat')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE kegiatan ALTER COLUMN kegiatan_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}
