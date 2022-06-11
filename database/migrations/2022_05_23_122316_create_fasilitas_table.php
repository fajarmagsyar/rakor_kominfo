<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->uuid('fasilitas_id')->primary();
            $table->longText('kategori')->nullable();
            $table->longText('nama_fasilitas')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->longText('lokasi')->nullable();
            $table->text('long_lat')->nullable();
            $table->longText('foto')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE fasilitas ALTER COLUMN fasilitas_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fasilitas');
    }
}
