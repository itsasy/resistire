<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbFoodsafetiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('tb_foodsafety', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fds_title');
            $table->string('slug')->unique();
            $table->longText('fds_desc');
            $table->string('fds_source');
            $table->string('fds_url');
            $table->string('fds_youtube');
            $table->string('fds_instagram');
            $table->string('fds_facebook');
            $table->string('fds_img')->nullable();
            $table->date('fds_date');
            $table->boolean('fds_enable');
            $table->unsignedBigInteger('fds_id_usr');
            $table->foreign('fds_id_usr')->references('id')->on('tb_users')->onDelete('cascade');
            $table->unsignedBigInteger('fds_id_fdst');
            $table->foreign('fds_id_fdst')->references('id')->on('tb_foodsafety_types')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_foodsafety');
    }
}
