<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviereviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moviereview', function (Blueprint $table) {
            $table->id('MovieReviewID');
            $table->string('movie_title');
            $table->date('release_date');
            $table->decimal('movie_rating', 3, 1);
            $table->string('genre');
            $table->string('studio_email');
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
        Schema::dropIfExists('moviereview');
    }
}
