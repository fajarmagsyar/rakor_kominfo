<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('profil', function (Blueprint $table) {
            $table->uuid('profil_id')->primary();
            $table->text('nama')->nullable();
            $table->longText('visi')->nullable();
            $table->longText('misi')->nullable();
            $table->longText('sejarah')->nullable();
            $table->longText('struktur')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE profil ALTER COLUMN profil_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil');
    }
}
