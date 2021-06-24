<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->linestring("title");
            $table->linestring("link");
            $table->lineString("image")->nullable();
            $table->linestring("producer")->nullable();
            $table->linestring("writer")->nullable();
            $table->linestring("feature")->nullable();
            $table->integer("downloads")->nullable();
            $table->integer("streams")->nullable();
            $table->unsignedBigInteger("artist_id");
            $table->unsignedBigInteger("album_id");
            $table->timestamps();

            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
