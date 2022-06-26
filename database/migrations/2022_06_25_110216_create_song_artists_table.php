<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song_artists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('song_id')->nullable()->constrained('songs')->onDelete('set null');
            $table->foreignId('artist_id')->nullable()->constrained('artists')->onDelete('set null');
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
        Schema::dropIfExists('song_artists');
    }
}
