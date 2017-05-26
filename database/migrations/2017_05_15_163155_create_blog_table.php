<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->text('content');
          $table->string('seo_title')->nullable();
          $table->string('seo_description')->nullable();
          $table->string('seo_keywords')->nullable();
          $table->timestamps();
        });

        Schema::create('blog', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('photo');
          $table->text('content');
          $table->string('seo_title')->nullable();
          $table->string('seo_description')->nullable();
          $table->string('seo_keywords')->nullable();
          $table->timestamps();
        });

        Schema::create('blog_tags', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('blog_id');
          $table->integer('tag_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('blog_tags');
      Schema::dropIfExists('blog');
      Schema::dropIfExists('tags');
    }
}
