<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCompaniesTable extends Migration
{
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('tb_companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cmp_name');
            $table->string('cmp_img');
            $table->string('cmp_latitude');
            $table->string('cmp_longitude');
            $table->string('cmp_address');
            $table->string('cmp_url');
            $table->string('cmp_instagram');
            $table->string('fds_facebook');
            $table->boolean('fds_state');
            $table->unsignedBigInteger('cmp_id_usr');
            $table->foreign('cmp_id_usr')->references('id')->on('tb_users')->onDelete('cascade');
            $table->unsignedBigInteger('cmp_id_dst');
            $table->foreign('cmp_id_dst')->references('id')->on('tb_districts')->onDelete('cascade');
            $table->unsignedBigInteger('cmp_id_cmpt');
            $table->foreign('cmp_id_cmpt')->references('id')->on('tb_company_types')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::dropIfExists('tb_companies');
    }
}
