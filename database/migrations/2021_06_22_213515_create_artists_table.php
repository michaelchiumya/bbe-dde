<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("biography");
            $table->lineString("image")->nullable();
            $table->lineString("instagram")->nullable();
            $table->lineString("facebook")->nullable();
            $table->lineString("applemusic")->nullable();
            $table->lineString("youtube")->nullable();
            $table->lineString("soundcloud")->nullable();
            $table->lineString("spotify")->nullable();
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
        Schema::dropIfExists('artists');
    }
}
