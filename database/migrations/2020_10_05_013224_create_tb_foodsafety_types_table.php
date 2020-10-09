<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbFoodsafetyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('tb_foodsafety_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fdst_id_usr');
            $table->foreign('fdst_id_usr')->references('id')->on('tb_users')->onDelete('cascade');
            $table->unsignedBigInteger('fdst_id_dst');
            $table->foreign('fdst_id_dst')->references('id')->on('tb_districts')->onDelete('cascade');
            $table->longText('fdst_desc');
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
        Schema::dropIfExists('tb_foodsafety_types');
    }
}
