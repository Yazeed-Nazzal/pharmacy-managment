<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('s_name');
            $table->string('price');
            $table->text('description');
            $table->integer('count');
            $table->unsignedBigInteger('alternative_id')->nullable();
            $table->string('expired_date');
            $table->integer('buying_count');
            $table->text('place');
            $table->timestamps();

            $table->foreign('alternative_id')->on('drugs')
                                                    ->references('id')
                                                    ->onUpdate('cascade')
                                                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drugs');
    }
}
