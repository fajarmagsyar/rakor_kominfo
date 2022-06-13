<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('artikel', function (Blueprint $table) {
            $table->uuid('artikel_id')->primary();
            $table->uuid('user_id')->nullable();
            $table->longText('isi')->nullable();
            $table->longText('link')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE artikel ALTER COLUMN artikel_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikel');
    }
}