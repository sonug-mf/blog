<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLkArticleCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lk_article_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article');
            $table->unsignedBigInteger('category');
            $table->timestamps();

            $table->foreign('article')->references('id')->on('articles')->onDelete('cascade');

            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lk_article_category');
    }
}
