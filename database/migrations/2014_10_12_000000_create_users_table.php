<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('user_id')->primary();
            $table->text('nama')->nullable();
            $table->string('email')->nullable()->unique();
            $table->text('asal')->nullable();
            $table->string('hp', 12)->nullable();
            $table->string('password')->nullable();
            $table->uuid('role_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE users ALTER COLUMN user_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
