<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->nullable(false)->primary();
            $table->string('email', 255)->nullable(false)->unique('email');
            $table->string('password', 255)->nullable(false);
            $table->string('remember_token', 100)->nullable(true);
            $table->string('filename', 100)->nullable(true);
            $table->string('filetype', 100)->nullable(true);
            $table->integer('size')->nullable(true);
            $table->binary('driversLicencePDF')->nullable(true);
            $table->timestamps();
        });
        DB::statement("ALTER TABLE users MODIFY driversLicencePDF LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
