<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usr_document');
            $table->string('usr_patname');
            $table->string('usr_matname');
            $table->string('usr_name');
            $table->date('usr_birthdate');
            $table->unsignedBigInteger('usr_id_gnd');

            $table->unsignedBigInteger('usr_id_dst');

            $table->string('usr_address');
            $table->string('usr_email')->unique();
            $table->string('usr_phone_1')->nullable();
            $table->string('usr_phone_2')->nullable();
            $table->string('username');
            $table->string('password');
            $table->unsignedBigInteger('usr_type_id');
            $table->boolean('usr_enable');
            /*  $table->timestamp('email_verified_at')->nullable(); */
            $table->rememberToken();
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
        Schema::dropIfExists('tb_users');
    }
}
