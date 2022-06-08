<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAbsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('absen', function (Blueprint $table) {
            $table->uuid('absen_id')->primary();
            $table->uuid('kegiatan_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->text('status_peserta')->nullable();
            $table->text('absensi')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE absen ALTER COLUMN absen_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absen');
    }
}
